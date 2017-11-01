<?php
namespace app\admin\model;
use think\Model;
use think\Db;
class Mediatype extends Model
{
	
   //  public function catetree($cateRes){
   //      return $this->sort($cateRes);
   //  }

   //  public function sort($cateRes,$pid=0,$level=0){
   //      static $arr=array();
   //      foreach ($cateRes as $k => $v) {
   //          if($v['pid']==$pid){
   //              $v['level']=$level;
   //              $arr[]=$v;
   //              $this->sort($cateRes,$v['id'],$level+1);
   //          }
   //      }
   //      return $arr;
   //  }

   //  //获取子栏目id
   // public function childrenids($cateid){
   //      $data=$this->field('id,pid')->select();
   //      return $this->_childrenids($data,$cateid);
   // }

   // private function _childrenids($data,$cateid){
   //      static $arr=array();
   //      foreach ($data as $k => $v) {
   //          if($v['pid']==$cateid){
   //              $arr[]=$v['id'];
   //              $this->_childrenids($data,$v['id']);
   //          }
   //      }
   //      return $arr;
   // }

   public function mediainfo($data){
        $info = DB::name('XwtMediaType')->field('id')->where('title',$data)->find();//dump($info);
        $infoid = $info['id'];
        $info = DB::name('XwtMediaType')->where('pid',$infoid)->select();//halt($souinfo);
        return $info;
    }

    public function equal($field,$data){       
           $where[$field] = array('eq',$data);//收录类型
        return $where;      
    }

    public function like($field,$data){
        $where[$field] = array('like',"%$data%");//收录类型      
        return $where;
    }

}
