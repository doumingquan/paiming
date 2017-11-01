<?php
namespace app\paiming\controller;
use app\common\controller\Adminbase;

use  think\Request;
use  think\Db;

class Mediatype extends Adminbase{
	public function index(){
		$info = DB::name('XwtMediaType')->where('status=1')->select();//halt($info);

		$result = model('admin/admin')->getTree($info);
		//$result = (new Mediatype())->childrenids($info);
		$this->assign('info',$result);//dump($result);exit;
		return $this->fetch();
	}

	public function add_media_type(){
		if(Request::instance()->post()){
			$data = input('post.');
			if($data){
				$data['add_time'] = time();
				$result = DB::name('XwtMediaType')->insert($data);
				if($result){
					$this->success('添加成功','Mediatype/index');exit;
				}else{
					$this->error('添加失败','Mediatype/index');exit;
				}
			}else{
				$this->error('添加错误');exit;
			}
		}
		$info = DB::name('XwtMediaType')->where('status=1')->select();//halt($info);
		$info = model('admin/admin')->getTree($info);
		$this->assign('info',$info);
		return $this->fetch('add_type');
		
	}

	public function edit_media_type($id){
		if(Request::instance()->post()){
			$data = input('post.');

			$info['title'] = $data['title'];
			// $info['pid'] = $data['pid'];
			$info['status'] = $data['status'];
			$result = DB::name('XwtMediaType')->where('id',$id)->update($info);
			if($result){
				$this->success('修改成功','Mediatype/index');exit;
			}else{
				$this->error('修改失败','Mediatype/index');exit;
			}			
		}
		$info = DB::name('XwtMediaType')->where('status=1')->select();//halt($info);
		$info = model('admin/admin')->getTree($info);//halt($info);
		$data = DB::name('XwtMediaType')->where('status=1')->where('id',$id)->find();	//halt($data);
		$this->assign('info',$info);
		$this->assign('data',$data);
		return $this->fetch('edit_type');
	}

	public function delete_media_type($id){
		
			$data['status'] = '0';
			$result = DB::name('XwtMediaType')->where('id',$id)->update($data);
			if($result){
				$datas['status'] = 1000;
				$datas['msg'] = '删除成功';
				$this->success('删除成功','Mediatype/index');exit;
			}else{
				$this->error('删除失败','Mediatype/index');exit;			
			}
	}

}