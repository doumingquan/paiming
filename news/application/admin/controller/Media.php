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
			$channel_id = $data['ch_type_id'];
			if($channel_id){
				$where['ch_type_id'] = array('eq',$channel_id);//收录类型
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
		$info = DB::name('XwtMedia')->alias('x')->where('status=1')->where($where)->paginate(4)->each(function($item,$key){

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
			//halt($item['prov']) ;
			$prov = DB::name('Province')->field('id,name')->where('id',$item['prov'])->find();//调出所有的城市信息
			$item['prov']	=	$prov['name']	;
			return $item;			
		});		
		//halt($info);
			$souinfo = model('Mediatype')->mediainfo('收录类型');
			$pinfo 	=  model('Mediatype')->mediainfo('频道类型');
			$mtinfo =  model('Mediatype')->mediainfo('媒体类型');
			$mfinfo =  model('Mediatype')->mediainfo('媒体来源');
			$minfo =  model('Mediatype')->mediainfo('门户类型');				
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
			$info['yunying_price'] = $data['guide_price'];//运营价格默认等于指导价
			$info['case'] = $data['case'];
			$info['create_time'] = time();
			$info['remark'] = $data['editorValue'];
			$info['prov'] = $data['prov'];
			$info['admin_remark'] = $data['admin_remark'];
			$info['status'] = 1;

			$result = DB::name('XwtMedia')->insert($info);
			if($result){
				$this->success('添加成功','Media/index');exit;
			}else{
				$this->error('添加失败','Media/index');exit;
			}
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
			$info['in_type_id'] = $data['in_type_id'];
			$info['media_type_id'] = $data['media_type_id'];
			$info['media_from_id'] = $data['media_from_id'];
			$info['gate_id'] = $data['gate_id'];
			$info['ch_type_id'] = $data['ch_type_id'];
			$info['cost_price'] = $data['cost_price'];
			$info['guide_price'] = $data['guide_price'];
			
			$info['case'] = $data['case'];
			$info['create_time'] = time();
			$info['remark'] = $data['editorValue'];
			$info['prov'] = $data['prov'];
			$info['status'] = $data['status'];
			$info['admin_remark'] = $data['admin_remark'];
			//halt($info);
			$result = DB::name('XwtMedia')->where('id',$id)->update($info);
			if($result){
				$this->success('修改成功','Media/index');
			}else{
				$this->error('修改失败','Media/index');
			}
		}

			$souinfo = model('Mediatype')->mediainfo('收录类型');
			$pinfo 	=  model('Mediatype')->mediainfo('频道类型');
			$mtinfo =  model('Mediatype')->mediainfo('媒体类型');
			$mfinfo =  model('Mediatype')->mediainfo('媒体来源');
			$minfo =  model('Mediatype')->mediainfo('门户类型');

		$mediainfo = DB::name('XwtMedia')->where('id',$id)->find();//halt($mediainfo);
		$province = DB::name('Province')->field('id,name')->select();
		$this->assign([
			'souinfo'	=>	$souinfo,
			'pinfo'		=>	$pinfo,
			'mtinfo'	=>	$mtinfo,
			'mfinfo'	=>	$mfinfo,
			'minfo'		=>	$minfo,
			'province'	=>	$province,
			'media'		=>	$mediainfo,
		]);		
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

//导出部分数据
	public function export(){
		if (Request::instance()->get()) {
			
			$data = input('get.');//halt($data);
			$title = $data['title'];
			if($title){
				$where['title'] = array('like',"%$title%");//媒体标题
			}
			$type_id = $data['in_type_id'];
			if($type_id){
				$where['in_type_id'] = array('eq',$type_id);//收录类型
			}
			$channel_id = $data['ch_type_id'];
			if($channel_id){
				$where['ch_type_id'] = array('eq',$channel_id);//收录类型
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
			$info = DB::name('XwtMedia')->where('status=1')->alias('m')->field('m.id,m.title,m.url,m.case,m.cost_price,m.guide_price,m.in_type_id,m.in_effect_id,m.ch_type_id,m.media_type_id,m.media_from_id,m.gate_id,m.remark,m.create_time')->where($where)->paginate(4)->each(function($item,$key){
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
				//halt($info);
			$headArr=array('id'=>'ID','title'=>'媒体名称','url'=>'链接地址','case'=>'案例','cost_price'=>'成本价','guide_price'=>'指导价','in_type_id'=>'指导价取消','in_effect_id'=>'指导价取消','ch_type_id'=>'频道类型','media_type_id'=>'媒体类型','media_from_id'=>'媒体来源','gate_id'=>'门户类型','remark'=>'备注','create_time'=>'创建时间');
			$filename='媒体表';
				model('media')->csv($headArr,$info,$filename);
		}else{
			$this->error('数据操作失败!');exit;
		}

	}

}