<?php
namespace app\admin\model;
use think\Db;
class Admin extends \think\Model
{
    /*登录验证*/
    public static function change($id, $data)
    {
        $changedata = Db::name('auth_rule')->where($id)->update($data);
        if ($changedata) {
            return true;
        } else {
            return false;
        }
    }


    public function getTree($data)
    {
        $arr = array();
        foreach ($data as $k => $v) {
            if ($v['pid'] == 0) {

                $data[$k]['_name'] = $data[$k]['title'];
                $arr[] = $data[$k];
                foreach ($data as $m => $n) {
                    if ($v['id'] == $n['pid']) {
                        $data[$m]['_name'] = '|—' . $data[$m]['title'];
                        $arr[] = $data[$m];
                        foreach ($data as $s => $k) {
                            if ($n['id'] == $k['pid']) {
                                $data[$s]['_name'] = '|  |——' . $data[$s]['title'];
                                $arr[] = $data[$s];
                            }
                        }
                    }
                }
            }

        }
        return ($arr);

    }

    public function treedata($items)
    {
        foreach($items as $item)
        $items[$item['pid']]['_data'][$item['id']] = &$items[$item['id']];
    return isset($items[0]['_data']) ? $items[0]['_data'] : array();

    }

    public function diffDate($date1,$date2){ 
        if(strtotime($date1)>strtotime($date2)){ 
            $tmp=$date2; 
            $date2=$date1; 
            $date1=$tmp; 
        } 
            list($Y1,$m1,$d1)=explode('-',$date1); 
            list($Y2,$m2,$d2)=explode('-',$date2); 
            $Y=$Y2-$Y1; 
            $m=$m2-$m1; 
            $d=$d2-$d1; 
        if($d<0){ 
            $d+=(int)date('t',strtotime("-1 month $date2")); 
            $m--; 
        } 
        if($m<0){ 
            $m+=12; 
            $y--; 
        } 
        return array('year'=>$Y,'month'=>$m,'day'=>$d); 
    }

    public function childrenids($cateid){
        $data=$this->field('id,pid')->select();
        return $this->_childrenids($data,$cateid);
   }

   private function _childrenids($data,$cateid){
        static $arr=array();
        foreach ($data as $k => $v) {
            if($v['pid']==$cateid){
                $arr[]=$v['id'];
                $this->_childrenids($data,$v['id']);
            }
        }
        return $arr;
   }

     public function tree($data, $title, $fieldPri = 'cid', $fieldPid = 'pid')
    {
        if (!is_array($data) || empty($data))
            return array();
        $arr = Data::channelList($data, 0, '', $fieldPri, $fieldPid);
        foreach ($arr as $k => $v) {
            $str = "";
            if ($v['_level'] > 2) {
                for ($i = 1; $i < $v['_level'] - 1; $i++) {
                    $str .= "&emsp;│";
                }
            }
            if ($v['_level'] != 1) {
                $t = $title ? $v[$title] : "";
                if (isset($arr[$k + 1]) && $arr[$k + 1]['_level'] >= $arr[$k]['_level']) {
                    $arr[$k]['_name'] = $str . "&emsp;├─ " . $v['_html'] . $t;
                } else {
                    $arr[$k]['_name'] = $str . "&emsp;└─ " . $v['_html'] . $t;
                }
            } else {
                $arr[$k]['_name'] = $v[$title];
            }
        }
        //设置主键为$fieldPri
        $data = array();
        foreach ($arr as $d) {
            $data[$d[$fieldPri]] = $d;
        }
        return $data;
    }

//通过查询出用户的公司的信息
    // public function select($id){
    //    $cate = db('auth_group_access')->alias('au')->field('g.id,g.title,c.pid,c.company')->join('__ADMIN__ a','a.id=au.uid')->join('admin_auth_group g','g.id=au.group_id')->join('__COMPANY__ c','c.id = a.company_id')->where('a.id',$id)->find();
    //     return $cate; 
    // }
}
