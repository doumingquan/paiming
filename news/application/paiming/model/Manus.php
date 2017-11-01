<?php
namespace app\admin\model;
use think\Model;
use think\Db;
class Manus extends Model
{

//根据媒体类型名称查出所有子类信息
     public function equal($field,$data){       
           $where[$field] = array('eq',$data);//收录类型
        return $where;      
    }

    public function like($field,$data){
        $where[$field] = array('like',"'%'.$data.'%'");//收录类型      
        return $where;
    }

}
