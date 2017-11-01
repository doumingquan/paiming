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
		
		if(Request::instance()->post()){
			$data = input('post.');
			$title=$data['title'];
			if($title){
				// $where = model('Admin/Mediatype')->like('title',$title); 	// halt($where);
				$where['a.title'] = array('like',"%$title%");//媒体标题
			}
			$media = $data['media_name'];
			if($media){
				$where['m.title'] = array('like',"%$media%");//媒体标题
			}
			$client = $data['client'];
			if($client){
				$where['s.name'] = array('like',"%$client%");
			}
			$sale = $data['sales'];

			$pay_status = $data['pay_status'];
			if($pay_status){
				$where['pay_status'] = array('eq',$pay_status);
			}
		}
		$info = DB::name('XwtArticleList')->alias('l')->field('l.*,a.order_id,a.title,a.doc_url,a.content,a.add_time,m.title titles,m.yunying_price,m.cost_price,m.guide_price,u.name,s.name username')->join('__XWT_ARTICLE__ a','l.article_id=a.id')->join('__XWT_MEDIA__ m','l.media_id=m.id')->join('__USER__ u','u.id=l.center_id')->join('__USER__ s','s.id=l.user_id')->where($where)->paginate(3)->each(function($item,$key){
					$clients = DB::name('User')->where('id',$item['user_id'])->find();
					$item['client'] = $clients['name'];
				return $item;
			});	
		//dump($info);
		$this->assign('info',$info);
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
			$info['title'] = $data['title'];		$info['doc_url'] = $data['doc_url'];
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
						$list['user_id']	= $data['client'];
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

	//导出部分数据
	public function export(){
		if(Request::instance()->get()){
			$data = input('get.');
			//halt($data);
			$title=$data['title'];
			if($title){
				// $where = model('Admin/Mediatype')->like('title',$title); 	// halt($where);
				$where['a.title'] = array('like',"%$title%");//媒体标题
			}
			$media = $data['media_name'];
			if($media){
				$where['m.title'] = array('like',"%$media%");//媒体标题
			}
			$client = $data['client'];
			if($client){
				$where['s.name'] = array('like',"%$client%");
			}
			$pay_status = $data['pay_status'];
			if($pay_status){
				$where['pay_status'] = array('eq',$pay_status);
			}
		
		$info = DB::name('XwtArticleList')->alias('l')->field('l.*,a.*,m.title titles,m.yunying_price,m.cost_price,m.guide_price,u.name,s.name username')->join('__XWT_ARTICLE__ a','l.article_id=a.id')->join('__XWT_MEDIA__ m','l.media_id=m.id')->join('__USER__ u','u.id=l.center_id')->join('__USER__ s','s.id=l.user_id')->where($where)->paginate(2)->each(function($item,$key){
					$clients = DB::name('User')->where('id',$item['user_id'])->find();
					$item['client'] = $clients['name'];
				return $item;
			});	
			//halt($info);
			$headArr=array('id'=>'ID','title'=>'稿件标题','add_time'=>'创建时间','titles'=>'媒体名称','cost_price'=>'成本价','yunying_price'=>'运营价','name'=>'运营中心','client'=>'客户名称');
			$filename='稿件表';
				model('Admin/media')->csv($headArr,$info,$filename);
		}else{
			$this->error('数据操作失败!');exit;
		}

	}

	public function tobeannounce(){
		if(Request::instance()->post()){
			$data = input('post.');
			$title=$data['title'];
			if($title){
				$where['a.title'] = array('like',"%$title%");//媒体标题
			}
			$media = $data['media_name'];
			if($media){
				$where['m.title'] = array('like',"%$media%");//媒体标题
			}
			$client = $data['client'];
			if($client){
				$where['s.name'] = array('like',"%$client%");
			}
			$sale = $data['sales'];

			$pay_status = $data['pay_status'];
			if($pay_status){
				$where['pay_status'] = array('eq',$pay_status);
			}
		}
		$info = DB::name('XwtArticleList')->alias('l')->field('l.*,a.*,m.title titles,m.yunying_price,m.cost_price,m.guide_price,u.name,s.name username')->join('__XWT_ARTICLE__ a','l.article_id=a.id')->join('__XWT_MEDIA__ m','l.media_id=m.id')->join('__USER__ u','u.id=l.center_id')->join('__USER__ s','s.id=l.user_id')->where($where)->where('l.article_status=-1')->paginate(3)->each(function($item,$key){
					$clients = DB::name('User')->where('id',$item['user_id'])->find();
					$item['client'] = $clients['name'];
				return $item;
			});	
		//dump($info);
		$this->assign('info',$info);
		return $this->fetch('announce');
	}

	public function published(){
		if(Request::instance()->post()){
			$data = input('post.');
			$title=$data['title'];
			if($title){
				// $where = model('Admin/Mediatype')->like('title',$title); 	// halt($where);
				$where['a.title'] = array('like',"%$title%");//媒体标题
			}
			$media = $data['media_name'];
			if($media){
				$where['m.title'] = array('like',"%$media%");//媒体标题
			}
			$client = $data['client'];
			if($client){
				$where['s.name'] = array('like',"%$client%");
			}
			$sale = $data['sales'];

			$pay_status = $data['pay_status'];
			if($pay_status){
				$where['pay_status'] = array('eq',$pay_status);
			}
		}
		$info = DB::name('XwtArticleList')->alias('l')->field('l.*,a.*,m.title titles,m.yunying_price,m.cost_price,m.guide_price,u.name,s.name username')->join('__XWT_ARTICLE__ a','l.article_id=a.id')->join('__XWT_MEDIA__ m','l.media_id=m.id')->join('__USER__ u','u.id=l.center_id')->join('__USER__ s','s.id=l.user_id')->where($where)->where('l.article_status=1')->paginate(3)->each(function($item,$key){
					$clients = DB::name('User')->where('id',$item['user_id'])->find();
					$item['client'] = $clients['name'];
				return $item;
			});	
		//dump($info);
		$this->assign('info',$info);
		return $this->fetch();
	}

	//申请退稿的原因
	public function  rejection(){
		if(Request::instance()->post()){
			$data = input('post.');
			// halt(session('admin'));
			// halt($data);
			$info['article_list_id'] = $data['id'];
			$info['article_status']  = 2;
			$info['price']  = $data['price'];
			
			$info['pay_status'] = $data['pstatus'];
			$info['pay_status'] = $data['pstatus'];
			$info['account_type'] = $data['pstatus'];
			$info['url'] = 'https://baidu.com';
			$info['remark'] = $data['reason'];
			$info['op_time'] = time();
			$info['op_ip'] = $_SERVER['REMOTE_ADDR'];
			if(session('admin')['type']==1){//1是运营中心
				$info['op_level'] =2;
			}elseif(session('admin')['type']==0){
				$info['op_level'] =3;
			}else{

			}
			$info['op_id'] = session('admin')['id'];
			Db::startTrans();
				try{
					$result = DB::name('XwtArticleOp')->insert($info);
				     $result2 = DB::name('XwtArticleList')->where('id',$data['id'])->update(array('article_status'=>2));//更改文章状态
				    // 提交事务
				    Db::commit();    
				} catch (\Exception $e) {
				    // 回滚事务
				    Db::rollback();
				}			
			if($result){
				$this->success('操作成功','Manus/index');
			}else{
				$this->error('操作失败','Manus/index');
			}
		}
	}
	
	//改稿或退稿
	public function  change(){
		if(Request::instance()->post()){
			$data = input('post.');
			// halt(session('admin'));
			// halt($data);
			$info['article_list_id'] = $data['id'];
			$info['article_status']  = $data['question_name'];
			$info['price']  = $data['price'];			
			$info['pay_status'] = $data['pstatus'];
			$info['pay_status'] = $data['pstatus'];
			$info['account_type'] = $data['pstatus'];
			$info['url'] = 'https://baidu.com';
			$info['content'] = $data['question_description'];
			$info['op_time'] = time();
			$info['op_ip'] = $_SERVER['REMOTE_ADDR'];
			if(session('admin')['type']==1){//1是运营中心
				$info['op_level'] =2;
			}elseif(session('admin')['type']==0){
				$info['op_level'] =3;
			}else{

			}
			$info['op_id'] = session('admin')['id'];
			Db::startTrans();
				try{
					$result = DB::name('XwtArticleOp')->insert($info);
				    $result2 = DB::name('XwtArticleList')->where('id',$data['id'])->update(array('article_status'=>2));//更改文章状态
				    // 提交事务
				    Db::commit();    
				} catch (\Exception $e) {
				    // 回滚事务
				    Db::rollback();
				}

			if($result){
				$this->success('操作成功','Manus/index');
			}else{
				$this->error('操作失败','Manus/index');
			}
		}
	}

//确定收款
	public function postchangestatus($id){

		if(Request::instance()->isAjax()){
			//根据id查出price			
			$article_info = DB::name('XwtArticleList')->field('price,user_id')->where('id',$id)->find();//媒体的价格
			$user_consume_price = DB::name('User')->field('total_consume,total_usable')->where('id',$article_info['user_id'])->find();//用户账户信息
			$user_info['total_consume'] = $user_consume_price['total_consume'] + $article_info['price'];//echo $user_info['total_consume'];
			if($user_consume_price['total_usable']<$article_info['price']){
				echo json_encode(array('status'=>1002,'msg'=>'个人账户可用余额不足!'));exit;
			}else{
				$user_info['total_usable'] = $user_consume_price['total_usable'] - $article_info['price'];
			}
			$info['pay_status'] = 2;//已支付
		//根据list表id查出相关数据
			$account = DB::name('XwtArticleList')->field('article_id,media_id,user_id,center_id,price')->where('id',$id)->find();
			//dump($account);
			$order = DB::name('XwtArticle')->field('order_id')->where('id',$account['article_id'])->find();

		//更新article_op表
			$op['account_type']=5;
			$op['pay_type']=1;
			$op['pay_status']=2;
			$option = DB::name('XwtArticleOp')->where('id',$id)->update($op);
			$account['article_id'] = $id;			
			$account['order_id'] = $order['order_id'];			
			$account['account_type'] = 5;
			$account['pay_type'] = 5;
			$account['pay_status'] = 2;//dump($account);
		//echo $id;			
			Db::startTrans();
				try{
				    $result = DB::name('XwtArticleList')->where('id',$id)->update($info);
				    $result = DB::name('User')->where('id',$article_info['user_id'])->update($user_info);
				    $account_info = DB::name('XwtAccount')->insert($account);
				    Db::commit();    
				} catch (\Exception $e) {
				    Db::rollback();
				}						
			if($result){
				echo json_encode(array('status'=>1000,'msg'=>'操作成功!'));
			}else{
				echo json_encode(array('status'=>1001,'msg'=>'操作失败!'));
			}
		}else{
			$this->error('操作失败');exit;
		}
	}
	
	
}