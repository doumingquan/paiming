<?php
namespace app\admin\controller;
use app\common\controller\Adminbase;
use  think\Request;
use  think\Db;


class Media extends Adminbase{
	public function index(){
		if(Request::instance()->post()){
			$data = input('post.');//halt($data);
			$title = $data['title'];//halt($title);
			if($title){
				$where['title'] = array('like',"%$title%");//媒体标题
			}
			$type_id = $data['in_type_id'];
			if($type_id){
				$where['in_type_id'] = array('eq',$type_id);//收录类型
			}
			$media_type_id = $data['media_type_id'];
			if($media_type_id){
				$where['media_type_id'] = array('eq',$media_type_id);//媒体类型
			}
			$media_from_id = $data['media_from_id'];
			if($media_from_id){
				$where['media_from_id'] = array('eq',$media_from_id);//媒体来源
			}
			$gate_id = $data['gate_id'];//门户类型
			if($gate_id){
				$where['gate_id'] = array('eq',$gate_id);
			}
			$province = $data['province'];//省份
			if($province){
				$where['prov'] = array('eq',$province);
			}
			//dump($where);//exit;			
		}
		$info = DB::name('XwtMedia')->where('status=1')->where($where)->paginate(4)->each(function($item,$key){

			$data1 = DB::name('XwtMediaType')->field('id,title')->where('id',$item['in_type_id'])->find();
			$item['in_type_id'] = $data1['title'];    	//halt($item);//收录类型
			$data2 = DB::name('XwtMediaType')->field('id,title')->where('id',$item['in_effect_id'])->find();
			$item['in_effect_id'] = $data2['title'];	//dump($data2);//收录效果
			$data3 = DB::name('XwtMediaType')->field('id,title')->where('id',$item['ch_type_id'])->find();
			$item['ch_type_id'] = $data3['title'];		//dump($data3);//频道类型
			$data4 = DB::name('XwtMediaType')->field('id,title')->where('id',$item['media_type_id'])->find();
			$item['media_type_id'] = $data4['title'];	//dump($data4);//媒体类型
			$data5 = DB::name('XwtMediaType')->field('id,title')->where('id',$item['media_from_id'])->find();
			$item['media_from_id'] = $data5['title'];		//dump($data4);//媒体来源
			$data6 = DB::name('XwtMediaType')->field('id,title')->where('id',$item['gate_id'])->find();
			$item['gate_id'] = $data6['title'];//dump($data4);//门户类型
			return $item;			
		});
		//搜索出收录类型下的所有
			$souinfo = model('Mediatype')->mediainfo('收录类型');halt($info);
			$soulu = DB::name('XwtMediaType')->field('id')->where('title','收录类型')->find();
			$souid = $soulu['id'];
			$souinfo = DB::name('XwtMediaType')->where('pid',$souid)->select();//halt($souinfo);
		//搜索出频道下的所有
			$pin = DB::name('XwtMediaType')->field('id')->where('title','频道类型')->find();
			$pdid = $pin['id'];
			$pinfo = DB::name('XwtMediaType')->where('pid',$pdid)->select();//halt($pinfo);
		//搜索出媒体类型下的所有
			$mtype = DB::name('XwtMediaType')->field('id')->where('title','媒体类型')->find();
			$mtid = $mtype['id'];
			$mtinfo = DB::name('XwtMediaType')->where('pid',$mtid)->select();//halt($souinfo);
		//搜索出媒体来源的所有
			$mfrom = DB::name('XwtMediaType')->field('id')->where('title','媒体来源')->find();
			$mfid = $mfrom['id'];
			$mfinfo = DB::name('XwtMediaType')->where('pid',$mfid)->select();//halt($minfo);
		//搜索出门户类型下的所有
			$menhu = DB::name('XwtMediaType')->field('id')->where('title','门户类型')->find();
			$mid = $menhu['id'];
			$minfo = DB::name('XwtMediaType')->where('pid',$mid)->select();//halt($minfo);
				
			$province = DB::name('Province')->field('id,name')->select();
			$this->assign('souinfo',$souinfo);//收录类型信息
			$this->assign('pinfo',$pinfo);//频道信息
			$this->assign('mtinfo',$mtinfo);//媒体类型信息
			$this->assign('mfinfo',$mfinfo);//媒体类型信息
			$this->assign('minfo',$minfo);//门户信息
			$this->assign('province',$province);
			$this->assign('info',$info);
			return $this->fetch();		
	}

	public function add_media(){
		if(Request::instance()->post()){
			$data = input('post.');//halt($data);
			$info['title'] = $data['title'];
			$info['in_type_id'] = $data['media_id1'];
			$info['media_type_id'] = $data['media_id4'];
			$info['media_from_id'] = $data['media_id7'];
			$info['gate_id'] = $data['media_id10'];
			$info['ch_type_id'] = $data['media_id16'];
			$info['cost_price'] = $data['cost_price'];
			$info['guide_price'] = $data['guide_price'];
			$info['case'] = $data['case'];
			$info['create_time'] = time();
			$info['remark'] = $data['editorValue'];
			$info['status'] = 1;

			$result = DB::name('XwtMedia')->insert($info);
			if($result){
				$this->success('添加成功','Media/index');exit;
			}else{
				$this->error('添加失败','Media/index');exit;
			}
			//halt($info);
		}
		$info = DB::name('XwtMediaType')->where('pid=0')->select();//dump($info);
		$data = DB::name('XwtMediaType')->where('pid!=0')->select();//dump($info);
		$province = DB::name('Province')->field('id,name')->select();

		//$result = model('admin/admin')->treedata($info);
		//halt($result);
		$this->assign('province',$province);
		$this->assign('info',$info);
		$this->assign('data',$data);
		return $this->fetch();
	}

	public function edit_media($id){
		if(Request::instance()->post()){
			$data = input('post.');  //halt($data);

			$info['title'] = $data['title'];
			$info['in_type_id'] = $data['media_id1'];
			$info['media_type_id'] = $data['media_id4'];
			$info['media_from_id'] = $data['media_id7'];
			$info['gate_id'] = $data['media_id10'];
			$info['ch_type_id'] = $data['media_id16'];
			$info['cost_price'] = $data['cost_price'];
			$info['guide_price'] = $data['guide_price'];
			$info['case'] = $data['case'];
			$info['create_time'] = time();
			$info['remark'] = $data['editorValue'];
			// $info['status'] = 1;
			$result = DB::name('XwtMedia')->where('id',$id)->update($info);
			if($result){
				$this->success('修改成功','Media/index');
			}else{
				$this->error('修改失败','Media/index');
			}
		}
		$mediainfo = DB::name('XwtMedia')->where('id',$id)->find();halt($mediainfo);
		$info = DB::name('XwtMediaType')->where('pid=0')->select();//dump($info);
		$data = DB::name('XwtMediaType')->where('pid!=0')->select();//dump($info);
		$province = DB::name('Province')->field('id,name')->select();
		$this->assign('province',$province);
		$this->assign('media',$mediainfo);
		$this->assign('info',$info);
		$this->assign('data',$data);
		return $this->fetch();

	}

		public function delete($id){
			$data['status'] = 0;
			$result = DB::name('XwtMedia')->where('id',$id)->update($data);
			if($result){
				$this->success('删除成功','Media/index');
			}else{
				$this->error('删除失败','Media/index');	
			}
		}

		public function edit_price(){
			if(Request::instance()->post()){
				$data = input('post.');  //halt($data);
				$info['media_id'] = $data['id'];
				$info['price'] = $data['price'];
				$info['cancel_price'] = $data['cancel_price'];
				
				$info['create_user_id'] = session('admin')['id'];
				$info['create_time'] = time();
				$info['create_ip'] = $_SERVER["REMOTE_ADDR"];

				$media['guide_price'] = $info['price'];
				Db::startTrans();
					try{
					   $result =DB::name('XwtMediaPrice')->insert($info);
					   $result2 =DB::name('XwtMedia')->where('id',$data['id'])->update($media);
					    // 提交事务
					    Db::commit();    
					} catch (\Exception $e) {
					    // 回滚事务
					    Db::rollback();
					}
				if($result){
					$this->success('调整成功','Media/index');
				}else{
					$this->error('调整失败','Media/index');
				}
		}else{
			$this->error('访问失败','Media/index');
		}
	}

}