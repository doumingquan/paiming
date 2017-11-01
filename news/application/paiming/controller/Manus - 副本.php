<?php 
namespace app\paiming\controller;
// use app\common\controller\Adminbase;
use think\Controller;
use think\Db;
use think\Request;

/**
* 
*/
class Manus extends Controller
{
	//全部稿件
	public function index(){
		$info = DB::name('XwtArticleList')->alias('l')->field()->join('__XWT_ARTICLE__ a','l.id=media_id')->select();//halt($info);
		return $this->fetch();
	}

//添加稿件
	public function add_manus(){
		if(empty(session('admin')['id'])){
			return $this->redirect('/');exit;
		}
		//$order_id = date('ymdhis');//halt($order_id);
		if(Request::instance()->post()){
			$data = input('post.');
			//halt($data);
			$info['order_id'] = date('ymdhis');
			$info['title'] = $data['title'];	$info['user_id'] = $data['client'];	$info['doc_url'] = $data['doc_url'];
			$info['content'] = $data['editorValue'];
			$center_id = session('admin')['id'];
			// $info['center_id'] = session('admin')['id'];	
			//$info['article_status'] = -2;//待审核状态	
			$medias = 	array_unique(explode(',',$data['media_id']));
			$media_id = implode(',',$medias);//halt($info['media_id']); //字符串去重 
			//$info['media_id'] = implode(',',$medias);//halt($info['media_id']); //字符串去重 
		//根据媒体id查询当前运营中心设置的价格,没有就查出指导价
			$info['article_remark'] = $data['article_remark'];	
			$info['add_time'] = time();
			//$info['price'] = $data['price'];
			//$info['pay_status'] = 1;
			//获取到当前订单id
			
			Db::startTrans();
				try{
					$result = DB::name('XwtArticle')->insert($info);//echo $result;
					$orderid =  DB::name('XwtArticle')->field('id')->where('order_id',$info['order_id'])->find();
				   foreach ($medias as $k => $v) {

						$list['article_id'] = $orderid['id'];
						$list['media_id']	= $media_id;
						$list['center_id']	= $center_id;
						$list['media_id']	= $v;
						$media_price = DB::name('XwtMedia')->field('yunying_price')->where('id',$v)->find();
						$list['price']=$media_price['yunying_price'];
						$list['pay_status']=1;
						$list['article_status']=-2;
						$result2 = DB::name('XwtArticleList')->insert($list);
					}
				    Db::commit();    
				} catch (\Exception $e) {
				    // 回滚事务
				    Db::rollback();
				}


			if($result2){
				$this->success('添加成功','manus/index');exit;
			}else{
				$this->error('添加失败','manus/index');exit;
			}

		}		
//halt($data);
		if(Request::instance()->get()){
			$data = input('get.');//halt($data);
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
				$where['ch_type_id'] = array('eq',$channel_id);//频道类型
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
			$price = $data['price'];
			//dump($price);exit;
			if($price){
				$price = explode('-',$price);
				$count = count($price);//echo $count;
				if($count==2){
					$where['yunying_price'] = array('between',[$price[0],$price[1]]);
				}else{
					$where['yunying_price'] = array('egt',100);
				}
				
			}
		}
		//调出所有的媒体
		$datas = DB::name('XwtMedia')->alias('x')->where('status=1')->where($where)->paginate(10)->each(function($item,$key){

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

		$user =	DB::name('User')->where('type=0')->where('status=1')->select(); //halt($user);//调出所有的客户
		$info = DB::name('XwtMediaType')->where('pid=0')->select();//dump($info);
		$data = DB::name('XwtMediaType')->where('pid!=0')->select();//dump($info);
		$province = DB::name('Province')->field('id,name')->select();

		$souinfo = model('Mediatype')->mediainfo('收录类型');//halt($souinfo);
		$pinfo 	=  model('Mediatype')->mediainfo('频道类型');
		$mtinfo =  model('Mediatype')->mediainfo('媒体类型');
		$mfinfo =  model('Mediatype')->mediainfo('媒体来源');
		$minfo =  model('Mediatype')->mediainfo('门户类型');				
			$this->assign('souinfo',$souinfo);//收录类型信息
			$this->assign('pinfo',$pinfo);//频道信息
			$this->assign('mtinfo',$mtinfo);//媒体类型信息
			$this->assign('mfinfo',$mfinfo);//媒体类型信息
			$this->assign('minfo',$minfo);//门户信息
			$this->assign('province',$province);
			$this->assign('user',$user);
			$this->assign('info',$info);
			$this->assign('data',$data);
			$this->assign('datas',$datas);//媒体列表
		return $this->fetch();
	}

	//全部稿件
	
	
	
}