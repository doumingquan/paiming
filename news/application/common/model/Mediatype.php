<?php
namespace app\common\model;
use think\Model;
use think\Loader;
use think\DB;

class Mediatype extends Model{
	protected $pk='id';
	protected $table='xwtmediatype';
	
	public function mediainfo($data){
		$info = DB::name('XwtMediaType')->field('id')->where('title',$data)->find();//dump($info);
		$infoid = $info['id'];
		$info = DB::name('XwtMediaType')->where('pid',$infoid)->select();//halt($souinfo);
		return $info;
	}
}


?>