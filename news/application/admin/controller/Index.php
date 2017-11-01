<?php

namespace app\admin\controller;

use app\common\controller\Adminbase;
use think\Db;

class Index extends Adminbase
{
    //protected $user_model,$role_model;
    public function index()
    {

  
        return $this->fetch();
    

    }

    public function logout()
    {
        session('admin.admin_id', null);
        session('admin', null);
        $this->success('退出成功、前往登录页面', 'login/login');
    }

    public function ajax_list()
    {
        $id = $this->uid;
        //完成数量
        $ajax_list = db('project')->where("FIND_IN_SET($id, admin_id)")->where('is_delete!=2')->where('status=2')->count();
        return json_encode($ajax_list);
    }
}
