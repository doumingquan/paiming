<?php 
namespace app\admin\model;
use think\Model;
use think\DB;
use think\PHPExcel;
class media extends Model{
	  function csv($nameArr = "", $sqlArr = "", $name = "")
{
    foreach ($nameArr as $key => $value) {
        iconv('utf-8', 'gbk', $value); //转为中文
        $str[] = $value;
    }
    $str = implode(',', $str);
    $str .= "\n"; //用引文逗号分开
    foreach ($sqlArr as $key => $value) {
        $array = array_change_key_case($value, CASE_LOWER);
        $chanJi = array_diff_key($array, $nameArr);
        $jiaoji[] = array_diff_key($array, $chanJi);
    }
    $jiaoji = array_values($jiaoji);
    foreach ($jiaoji as $key => $value) {
        $arrValues[] = implode(',', $value);
    }
    $string = implode("\n", $arrValues);
    $str .= $string;
//    var_dump($str);exit;
    $str = iconv('utf-8', 'gbk//TRANSLIT', $str); //转为中文
    /*去除特殊符号*/
    $regex = "/\/|\~|\!|\|\#|\\$|\%|\^|\&|\*|\(|\)|\_|\+|\{|\}|\<|\>|\?|\[|\]|\|\.|\/|\;|\'|\=|\\\|\|/";
    $str = preg_replace($regex, "", $str);
    $filename = "$name" . date('YmdHis') . '.csv'; //设置文件名
    $data = $str;
    header("Content-type:text/csv");
    header("Content-Disposition:attachment;filename=" . $filename);
    header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
    header('Expires:0');
    header('Pragma:public');
    echo $data;exit;
}


}










