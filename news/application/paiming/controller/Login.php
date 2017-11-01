<?php

namespace app\paiming\controller;

use think\Controller;
use app\common\model\Admin;

class Login extends Controller
{
    public function login()
    {
        //$info=db('admin')->select();dump($info);//数据库链接成功
        //判断是不是post方式
        if (request()->ispost()) {
            $data = input('post.');
            //halt($data);
            if (!captcha_check($data['vcode'])) {
                //  //验证失败
                $this->error('验证码错误！');
                exit;
            };
            // halt(input('post.'));
            //调用admin模型
            $info = (new Admin())->login2(input('post.'));//halt($info);
            if ($info['status']) {
                //echo 1122;
                $this->success($info['msg'], 'paiming/index/index');
                exit;
            } else {
                $this->error($info['msg']);
            }
            //dump($info);
        }
        return $this->fetch();
    }

    // public function index(){
    //     $matchString = 'http://www.gjcar.com/news/list_4_2.html';
    //     $match = '/^http\:\/\/www\.gjcar\.com\/news\/\w+\.\w+/';
    //     preg_match($match, $matchString,$result);
    //     echo "<pre>";
    //     print_r($result);
    //     echo "</pre>";
    // }
    // public function index(){
    //     //echo 123;
    //     $matchString = 'http://www.abc.com/az123/';
    //     $match = 'http://www.abc.com/([a-zA-Z]+)([0-9]+)/';
    //     preg_match($match, $matchString,$result);
    //     echo "<pre>";
    //     print_r($result);
    //     echo "</pre>";
    // }
}
