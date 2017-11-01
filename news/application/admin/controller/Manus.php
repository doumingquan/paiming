<?php
namespace app\admin\controller;
use app\common\controller\Adminbase;
use think\DB;
use think\Request;

class Manus extends Adminbase{
	public function index(){
		$data = DB::name('XwtArticle')->alias('ar')->field('ar.*,a.name')->join('__ADMIN__ a','ar.user_id=a.id')->paginate();
		//dump($data);
		$this->assign('data',$data);
		return $this->fetch();
	}

	public function checkarticle(){
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
		$info = DB::name('XwtArticleList')->alias('l')->field('l.*,a.order_id,a.title,a.doc_url,a.content,a.add_time,m.title titles,m.yunying_price,m.cost_price,m.guide_price,u.name,s.name username')->join('__XWT_ARTICLE__ a','l.article_id=a.id')->join('__XWT_MEDIA__ m','l.media_id=m.id')->join('__USER__ u','u.id=l.center_id')->join('__USER__ s','s.id=l.user_id')->where($where)->where('l.article_status=-2')->paginate(3)->each(function($item,$key){
					$clients = DB::name('User')->where('id',$item['user_id'])->find();
					$item['client'] = $clients['name'];
				return $item;
			});	
		//dump($info);
		$this->assign('info',$info);
		return $this->fetch();
	}

//检查
	public function postcheckstatus(){

		if(Request::instance()->post()){
			$data = input('post.');
			//halt($data);
			if($data['status']==-1){
				$info['article_status'] = -1;//将状态改为待发布
			}else{
				$info['article_status'] = -3;//将状态改为审核失败
				$info['remark'] = $data['reason'];//将状态改为审核失败
			}
//	将ArticleOp XwtArticleList中article状态更改
			$result = DB::name('XwtArticleOp')->where('id',$data['id'])->update($info);
			$result = DB::name('XwtArticleList')->where('id',$data['id'])->update($info);

			if($result){
				$this->success('审核成功');
			}else{
				$this->error('审核失败');
			}
		}else{
			$this->error('操作失败');exit;
		}
	}


}














