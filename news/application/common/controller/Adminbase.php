<?php

namespace app\common\controller;

use app\common\controller\Base;
use think\Request;
use auth\Auth;

/**
 * admin 基类控制器
 */
class AdminBase extends Base
{
    /**
     * 初始化方法
     */
    public function _initialize()
    {
       if(empty(session('admin')['id']) || empty(session('admin')['name'])){
           $this->error('请先登录系统','login/login');
       }
        //parent::_initialize();
       parent::_initialize();
        $auth = new \think\Auth();
        $request = Request::instance();
        $m = $request->module();
        $c = $request->controller();
        $a = $request->action();
        $rule_name = $m . '/' . $c . '/' . $a;
        $this->assign('c', $c);
        //dump($rule_name);
        // 菜单
        $group = $auth->getGroups(session('admin')['id']);   //dump($group);
        $this->uid=(session('admin')['id']);
        /*var_dump(session('user')['id']);*/
        $rules = explode(',', $group[0]['rules']);
        $menu = array();
        $map['pid'] = ['=', 0];
        $map['show'] = ['=', 1];
        $map['id'] = ['in', $rules];
        $_map['id'] = ['in', $rules];
        $menu = db('authRule')->where($map)->select();
        foreach ($menu as $k => $v) {
            $menu[$k]['children'] = db('authRule')->alias('ar')->where($_map)->where(array('pid' => $v['id'], 'show' => 1))->order('ar.id desc')->select();
            foreach ($menu[$k]['children'] as $k1 => $v1) {
                $menu[$k]['children'][$k1]['children'] = db('authRule')->where($_map)->where(array('pid' => $v1['id'], 'show' => 1))->select();
            }
        }
       // dump(session('admin'));
        // halt($menu);
        // echo "<pre>";
        // print_r($menu); 
        // echo "</pre>";die;
        // 连表查出登录账号的角色
        $info = db('auth_group_access')->alias('au')->field('g.id,g.title')->join('__ADMIN__ a','a.id=au.uid')->join('chs_auth_group g','g.id=au.group_id')->where('a.id',$this->uid)->find();//dump($cate);
        //halt($info);
        session('role',$info);
        $this->assign([
            'menu' => $menu,
        ]);

        $result = $auth->check($rule_name, session('admin')['id']);//dump($result);
         if (!$result) {
            $this->error('您没有权限访问');
        }

    }


    // function http_404(){
    //     $theme = get_system_value('site_theme');
    //     $template = 'template/index/'. $theme .'/Public_404.html';
    //     // $info = Request::instance()->header();
    //     return \think\Response::create($template, 'view', '404');
    // }


}
