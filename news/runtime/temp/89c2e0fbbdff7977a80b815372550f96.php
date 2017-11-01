<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:86:"D:\phpStudy\WWW\paimingla\news\public/../application/paiming\view\manus\add_manus.html";i:1509336216;s:83:"D:\phpStudy\WWW\paimingla\news\public/../application/paiming\view\layout\cssjs.html";i:1508912602;s:81:"D:\phpStudy\WWW\paimingla\news\public/../application/paiming\view\layout\top.html";i:1509081588;s:82:"D:\phpStudy\WWW\paimingla\news\public/../application/paiming\view\layout\left.html";i:1509356846;s:82:"D:\phpStudy\WWW\paimingla\news\public/../application/paiming\view\layout\foot.html";i:1508897612;}*/ ?>
<!DOCTYPE html>
<html><head lang="en"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <title>排名啦搜索营销系统管理平台</title>
    
    <link rel="stylesheet" href="/Public/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__STATIC__/paiming/admin/usercss/bootstrap.min.css" charset="utf-8">
    <link rel="stylesheet" href="__STATIC__/paiming/admin/usercss/bootstrap-theme-ny.css">
    <link rel="stylesheet" href="__STATIC__/paiming/admin/usercss/ucCommon.css">
    <link rel="stylesheet" href="__STATIC__/paiming/admin/usercss/ucComponent.css">

    <script src="__STATIC__/paiming/admin/userjs/jquery-1.12.2.min.js" charset="utf-8"></script>
    <script src="__STATIC__/paiming/admin/userjs/bootstrap.min.js" charset="utf-8"></script>
    <script src="__STATIC__/paiming/admin/userjs/template.js" charset="utf-8"></script>
    <script src="__STATIC__/paiming/admin/userjs/jquery.cookie.js" charset="utf-8"></script>
    <link rel="stylesheet" href="__STATIC__/paiming/admin/usercss/ucDialog.css">
    <script src="__STATIC__/paiming/admin/usercss/jquery.dialog.js"></script>
    <script src="__STATIC__/paiming/admin/userjs/iframeTools.js"></script>
    <script src="__STATIC__/paiming/admin/userjs/NY-1.32.5.min.js"></script>
    <script src="__STATIC__/paiming/admin/userjs/ucCommon.js"></script>
    <link href="__STATIC__/plugins/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="__STATIC__/plugins/umeditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" src="__STATIC__/plugins/umeditor/third-party/template.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="__STATIC__/plugins/umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="__STATIC__/plugins/umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="__STATIC__/plugins/umeditor/lang/zh-cn/zh-cn.js"></script>
    <style>
        .userServiceList {
            height: 320px;
            width: 620px;
            background-color: #F7F7F7;
            margin-top: 14px;
            padding: 10px 5px;
            font-size: 12px;
            line-height: 2em;
        }
    </style>
</head>
<body><div class="" style="display: none; position: absolute;"><div class="aui_outer"><table class="aui_border"><tbody><tr><td class="aui_nw"></td><td class="aui_n"></td><td class="aui_ne"></td></tr><tr><td class="aui_w"></td><td class="aui_c"><div class="aui_inner"><table class="aui_dialog"><tbody><tr><td colspan="2" class="aui_header"><div class="aui_titleBar"><div class="aui_title" style="cursor: move;"></div><a class="aui_close" href="javascript:/* www.xiaofuwulala.com */;">×</a></div></td></tr><tr><td class="aui_icon" style="display: none;"><div class="aui_iconBg" style="background: none;"></div></td><td class="aui_main" style="width: auto; height: auto;"><div class="aui_content" style="padding: 20px 25px;"></div></td></tr><tr><td colspan="2" class="aui_footer"><div class="aui_buttons" style="display: none;"></div></td></tr></tbody></table></div></td><td class="aui_e"></td></tr><tr><td class="aui_sw"></td><td class="aui_s"></td><td class="aui_se" style="cursor: se-resize;"></td></tr></tbody></table></div></div>
<!-- header -->
 <div class="ny-header link-undecorated">
    <div class="ny-logo pull-left">
        <a href="http://www.paimingla.com/" class="text-hide" title="返回官网首页" target="_blank">服务啦啦首页</a>
    </div>
    <div class="header-main text-right">
        <div class="menu-control-outer pull-left">
            <a href="#" id="menuControl" class="menu-collapse-control" title="折叠菜单">
            </a>
        </div>
        <span class="hello-user">
				你好，<span id="helloUserName"><?php echo \think\Session::get('admin.name'); ?></span>

           <?php if(session('admin')['type'] == 1): ?>
                【 <font color=yellow><b>运营中心</b></font> 】
                <?php else: ?>
            【 <font color=yellow><b>客户</b></font> 】
            <?php endif; ?>
          
			</span>
        <div class="pull-right">

            <!--<a href="workorder.html" class="header-link header-link-workorder">工单服务</a>-->
            <a href="http://www.paimingla.com/" target="_blank" class="header-link header-link-home">官网首页</a>
            <!--<a href="#a_null" class="header-link header-link-docs">更改资料</a>-->
            <a href="<?php echo url('paiming/index/logout'); ?>" id="chsLoginOut" class="header-link header-link-logout">退出登录</a>
        </div>
    </div>
</div>

<link rel="stylesheet" href="/css/page.css">
<!-- header end-->
<!-- menu -->
 
<META HTTP-EQUIV="pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Cache-Control" CONTENT="no-store, must-revalidate">
<META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:21:57 GMT">
<META HTTP-EQUIV="expires" CONTENT="0">

<div class="sidebar-limit">
    <div class="sidebar-scroll-container">
        <div class="sidebar-main link-undecorated">
            <!-- 手风琴菜单 -->
            <div class="ny-menu default-transition-tree-fast" id="accordion" role="tablist" aria-multiselectable="true">

                <div class="panel">
                    <div class="upper-menu-wrap" role="tab">
                        <a href="" id="chsIndex" data-named="phoenix" class="collapsed upper-menu menu-linkable menu-icon-home">
                            后台总览
                        </a>
                    </div>
                </div>
                
                <!--站点管理-->
                <div class="panel">
                    <?php if($c == media): ?>
                    <div class="upper-menu-wrap" role="tab" id="serviceHeading">
                        <a class="collapsed upper-menu menu-icon-service menu-active" role="button" data-toggle="collapse" data-parent="#accordion" href="#serviceCollapse" aria-expanded="false" aria-controls="serviceCollapse">媒体管理</a>
                    </div>
                    <div id="serviceCollapse" class="collapse" aria-expanded="false" style="height: 0px;" role="tabpanel" aria-labelledby="serviceHeading">
                        <ul class="sub-menu">
                            <li> <a href="<?php echo url('paiming/Media/index'); ?>" data-named="peacock">媒体列表</a> </li>
                       
                        </ul>
                    </div>
                    <?php else: ?>
                        <div class="upper-menu-wrap" role="tab" id="serviceHeading">
                        <a class="collapsed upper-menu menu-icon-service" role="button" data-toggle="collapse" data-parent="#accordion" href="#serviceCollapse" aria-expanded="false" aria-controls="serviceCollapse">媒体管理</a>
                    </div>
                    <div id="serviceCollapse" class="collapse in" aria-expanded="false" role="tabpanel" aria-labelledby="serviceHeading">
                        <ul class="sub-menu">
                            <li> <a href="<?php echo url('paiming/Media/index'); ?>" data-named="peacock">媒体列表</a> </li>
                      
                        </ul>
                    </div>
                    <?php endif; if($c == Manus): ?>
                    <div class="upper-menu-wrap" role="tab" id="serviceHeading">
                        <a class="collapsed upper-menu menu-icon-service" role="button" data-toggle="collapse" data-parent="#accordion" href="#service" aria-expanded="false" aria-controls="serviceCollapse">
                            稿件管理
                        </a>
                    </div>
                    <div id="service" class="collapse" role="tabpanel" aria-labelledby="serviceHeading">
                        <ul class="sub-menu ">
                            <li><a href="<?php echo url('paiming/Manus/add_manus'); ?>" data-named="peacock">发布稿件</a></li>                          
                            <li><a href="<?php echo url('paiming/Manus/index'); ?>" data-named="peacock">全部稿件</a></li>                          
                       
                        </ul>
                    </div>
                    <?php else: ?>
                     <div class="upper-menu-wrap" role="tab" id="serviceHeading">
                        <a class="collapsed upper-menu menu-icon-service" role="button" data-toggle="collapse" data-parent="#accordion" href="#service" aria-expanded="false" aria-controls="serviceCollapse">
                            稿件管理
                        </a>
                    </div>
                    <div id="service" class="collapse" role="tabpanel" aria-labelledby="serviceHeading">
                        <ul class="sub-menu ">

                            <li><a href="<?php echo url('paiming/Manus/add_manus'); ?>" data-named="peacock">发布稿件</a></li>                          
                            <li><a href="<?php echo url('paiming/Manus/index'); ?>" data-named="peacock">全部稿件</a></li>                            
                            <li><a href="<?php echo url('paiming/Manus/tobeannounce'); ?>" data-named="peacock">待发布</a></li>                            
                            <li><a href="<?php echo url('paiming/Manus/published'); ?>" data-named="peacock">已发布</a></li>                            
                            
                        </ul>
                    </div>
                    <?php endif; ?>

                </div>
              
                <!--站点管理-->          
            </div>
        </div>
    </div>
</div>

<script language="javascript">
    //sub-menu-active
    // $(function () {
    //     $('.sub-menu li').on('onlick',function () {
    //         $(this).addClass('sub-menu-active');
    //     });

    //     $('#chsIndex').on('click',function () {
    //         $(this).addClass('menu-active');
    //     })
    // });

</script>
<!-- menu end -->
<div class="ny-main">
    <div class="crumb-container" data-nav="swan" id="crumbNavContainer"><ol class="breadcrumb ny-crumb">
       <!--  <li><a href="/coo.php" class="crumb-home">商户中心</a></li> -->
    </ol></div>
    <div id="contentBox">
    <div class="ny-panel">
        
        <div class="ny-panel-body">

            <!-- 提交站点  begin -->
            <div class="ny-panel-heading">
            <!-- <div class="ny-panel-title">发布稿件</div>
            </div>
            <form id="chs-form" action="" class="form-horizontal ny-form ny-tab-container tab-group-1" method="post">
                <div class="form-group">
                    <div class="ny-control-label ny-label-long">
                        <span class="necessary-mark">*</span>
                        创建客户:
                    </div>
                    <div class="col-xs-8 ny-form-control validate-control">
                         <select name="client" id="" class="ny-input-reset ny-long-input">
                                <option value=""></option>                   
                                <?php if(is_array($user) || $user instanceof \think\Collection || $user instanceof \think\Paginator): if( count($user)==0 ) : echo "" ;else: foreach($user as $key=>$v): ?>                                                                           
                                        <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>                                    
                                <?php endforeach; endif; else: echo "" ;endif; ?>                 
                        </select>
                        <div class="error-reminder"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="ny-control-label ny-label-long">
                        <span class="necessary-mark">*</span>
                        标题:
                    </div>
                    <div class="col-xs-8 ny-form-control validate-control">
                        <input id="name" type="text" class="ny-input-reset ny-long-input" name="title" required="required" placeholder="标题字数建议16-24个字(必填)">
                        <div class="error-reminder"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="ny-control-label ny-label-long">
                        <span class="necessary-mark">*</span>
                        稿件转载链接:
                    </div>
                    <div class="col-xs-8 ny-form-control validate-control">
                        <input id="name" type="text" class="ny-input-reset ny-long-input" name="doc_url" required="required" placeholder="例:http://news.163.com/15/0225/06/14ED.html">
                        <div class="error-reminder"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="ny-control-label ny-label-long">
                        <span class="necessary-mark">*</span>
                        内容：
                    </div>
                    <div class="col-xs-8 ny-form-control validate-control">
                        <script type="text/plain" id="myEditor" style="width:750px;height:320px;">
                            <p>这里是输入提示</p>
                        </script>
                       
                        <div class="error-reminder"></div>
                    </div>
                </div>

                <script type="text/javascript">
                    //实例化编辑器
                    var um = UM.getEditor('myEditor');                   
                </script>

                <div class="form-group">
                    <div class="ny-control-label ny-label-long">
                        <span class="necessary-mark">*</span>
                        备注：
                    </div>
                    <div class="col-xs-8 ny-form-control validate-control">
                        <input id="name" type="text" class="ny-input-reset ny-long-input" name="article_remark" placeholder="例如:关键词" required="required">
                        <div class="error-reminder"></div>
                    </div>
                </div>
                   <input type="hidden" name="media_id" id="media_id">            
                <div class="form-group">
                    <div class="ny-control-label ny-label-long">
                        &nbsp;
                    </div>
                   
                    <div class="col-xs-8 ny-form-control">
                      <!--   <a href="javascript:;" class="ny-btn btn-strong" id="submitWorkorder">添 加</a> -->
                         <!--  <button type="submit" class="ny-btn btn-strong"  >添 加</button>
                    </div>
                </div>
            </form> --> 
        <div class="ny-panel-body">
        <div class="ny-panel-heading">
            <div class="ny-panel-title">媒体列表</div>
        </div>
       <form id="chs-form" action="" class="form-horizontal ny-form ny-tab-container tab-group-1" method="get">
            
            <div class="form-group">                
                <div class="ny-control-label ny-label-long">
                    <span class="necessary-mark">*</span>
                      门户类型：
                </div>
                <div class="col-xs-8 ny-form-control validate-control">
                    <tr>  
                         <td><input type="radio" name="gate_id" value="" >不限</td> &nbsp                                                                                    
                         <?php if(is_array($minfo) || $minfo instanceof \think\Collection || $minfo instanceof \think\Paginator): if( count($minfo)==0 ) : echo "" ;else: foreach($minfo as $key=>$v): ?>
                          <td><input type="radio" name="gate_id" value="<?php echo $v['id']; ?>"><?php echo $v['title']; ?></td> &nbsp &nbsp                             
                         <?php endforeach; endif; else: echo "" ;endif; ?>                                  
                    </tr>
                    <div class="error-reminder"></div>
                </div>              
            </div> 
            <div class="form-group">                
                <div class="ny-control-label ny-label-long">
                    <span class="necessary-mark">*</span>
                     媒体分类：
                </div>
                <div class="col-xs-8 ny-form-control validate-control">
                    <tr>  
                          <td><input type="radio" name="ch_type_id" value="">不限</td> &nbsp &nbsp                                                                                     
                         <?php if(is_array($pinfo) || $pinfo instanceof \think\Collection || $pinfo instanceof \think\Paginator): if( count($pinfo)==0 ) : echo "" ;else: foreach($pinfo as $key=>$v): ?>
                          <td><input type="radio" name="ch_type_id" value="<?php echo $v['id']; ?>"><?php echo $v['title']; ?></td> &nbsp &nbsp                             
                         <?php endforeach; endif; else: echo "" ;endif; ?>                                  
                    </tr>
                    <div class="error-reminder"></div>
                </div>              
            </div> 
            <div class="form-group">                
                <div class="ny-control-label ny-label-long">
                    <span class="necessary-mark">*</span>
                     覆盖区域：
                </div>
                <div class="col-xs-8 ny-form-control validate-control">
                    <tr>
                        <td><input type="radio" name="province" value="">全国</td> &nbsp
                        <?php if(is_array($province) || $province instanceof \think\Collection || $province instanceof \think\Paginator): if( count($province)==0 ) : echo "" ;else: foreach($province as $key=>$v): ?>                       
                             <td><input type="radio" name="province" value="<?php echo $v['id']; ?>" ><?php echo $v['name']; ?></td> &nbsp 
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tr>
                    <div class="error-reminder"></div>
                </div>              
            </div>
            <div class="form-group">                
                <div class="ny-control-label ny-label-long">
                    <span class="necessary-mark">*</span>
                     收录效果：
                </div>
                <div class="col-xs-8 ny-form-control validate-control">
                    <tr> 
                          <td><input type="radio" name="in_type_id" value="">不限</td> &nbsp &nbsp                                                                                      
                         <?php if(is_array($souinfo) || $souinfo instanceof \think\Collection || $souinfo instanceof \think\Paginator): if( count($souinfo)==0 ) : echo "" ;else: foreach($souinfo as $key=>$v): ?>
                          <td><input type="radio" name="in_type_id" value="<?php echo $v['id']; ?>"><?php echo $v['title']; ?></td> &nbsp &nbsp                             
                         <?php endforeach; endif; else: echo "" ;endif; ?>                                  
                    </tr>
                    <div class="error-reminder"></div>
                </div>              
            </div> 
            <div class="form-group" id="order_fix" style="position:fixed;background-color:#e1f4fd;width:100%;line-height: 55px;height: 55px;display: block;z-index: 999;right:0px;bottom: 0px;text-align: center;">
                已选媒体合计<span id="totalmoney" >0</span>元
            </div>
            <!--  <div class="form-group">                
                <div class="ny-control-label ny-label-long">
                    <span class="necessary-mark">*</span>
                      频道类型：
                </div>
                <div class="col-xs-8 ny-form-control validate-control">
                    <tr>
                          <td><input type="radio" name="ch_type_id" value="">不限</td> &nbsp &nbsp                                                                                      
                         <?php if(is_array($pinfo) || $pinfo instanceof \think\Collection || $pinfo instanceof \think\Paginator): if( count($pinfo)==0 ) : echo "" ;else: foreach($pinfo as $key=>$v): ?>
                          <td><input type="radio" name="ch_type_id" value="<?php echo $v['id']; ?>"><?php echo $v['title']; ?></td> &nbsp &nbsp                             
                         <?php endforeach; endif; else: echo "" ;endif; ?>                                  
                    </tr>
                    <div class="error-reminder"></div>
                </div>              
            </div> 
            
            <div class="form-group">                
                <div class="ny-control-label ny-label-long">
                    <span class="necessary-mark">*</span>
                     媒体来源：
                </div>
                <div class="col-xs-8 ny-form-control validate-control">
                    <tr>   
                        <td><input type="radio" name="media_from_id" value="">不限</td> &nbsp &nbsp                                                                                                                
                         <?php if(is_array($mfinfo) || $mfinfo instanceof \think\Collection || $mfinfo instanceof \think\Paginator): if( count($mfinfo)==0 ) : echo "" ;else: foreach($mfinfo as $key=>$v): ?>
                          <td><input type="radio" name="media_from_id" value="<?php echo $v['id']; ?>"><?php echo $v['title']; ?></td> &nbsp &nbsp                             
                         <?php endforeach; endif; else: echo "" ;endif; ?>                                  
                    </tr>
                    <div class="error-reminder"></div>
                </div>              
            </div>  -->
                        
            <!-- <div class="form-group">                
                <div class="ny-control-label ny-label-long">
                    <span class="necessary-mark">*</span>
                     价格排序：
                </div>
                <div class="col-xs-8 ny-form-control validate-control">
                    <tr>       
                             <td><input type="radio" name="prices" value="">不限</td> &nbsp                                     
                             <td><input type="radio" name="prices" value="1">价格从低到高</td> &nbsp
                             <td><input type="radio" name="prices" value="2">价格从高到低</td> &nbsp                        
                    </tr>
                    <div class="error-reminder"></div>
                </div>              
            </div>  -->
               <div class="form-group">                
                <div class="ny-control-label ny-label-long">
                    <span class="necessary-mark">*</span>
                     媒体价格：
                </div>
                <div class="col-xs-8 ny-form-control validate-control">
                    <tr>                                            
                             <td><input type="radio" name="price" value="">不限</td> &nbsp
                             <td><input type="radio" name="price" value="0-20">  0-20</td> &nbsp
                             <td><input type="radio" name="price" value="21-50"> 21-50</td> &nbsp                        
                             <td><input type="radio" name="price" value="51-75"> 51-75</td> &nbsp                        
                             <td><input type="radio" name="price" value="76-100">76-100</td> &nbsp                        
                             <td><input type="radio" name="price" value="100以上">100以上</td> &nbsp                        
                    </tr>
                    <div class="error-reminder"></div>
                </div>              
            </div> 

            <div class="form-group">
                    <div class="ny-control-label ny-label-long">
                        <span class="necessary-mark">*</span>
                        输入媒体名称查找：
                    </div>
                    <div class="col-xs-8 ny-form-control validate-control">
                        <input id="name" type="text" class="ny-input-reset ny-long-input" name="title" >
                        <div class="error-reminder"></div>
                    </div>
            </div> 
            <div style="margin-left:200px">
                <input type="submit" value="搜索"  class="btn btn-primary">  
            </div>
           
            </form>

            </div>

        <div class="ny-panel">
        
        <div class="ny-panel-body">
            <div class="ny-panel-body">        
                <table class="ny-table margin-bottom-20" >
                    <thead>
                    <tr>
                        <th><input type="checkbox" name="" id=""></th>
                        <th>媒体名称</th>
                        <th>价格</th>
                      <!--   <th>收录效果</th> -->
                        <th>媒体分类</th>
                        <th>收录效果</th>
                        <th>案例</th>
                        <th>备注</th>                   
                    </tr>
                    </thead>
                    <tbody>
                <?php if(is_array($datas) || $datas instanceof \think\Collection || $datas instanceof \think\Paginator): if( count($datas)==0 ) : echo "" ;else: foreach($datas as $key=>$v): ?>
                    <tr> 
                        <th><input type="checkbox" name='check' id="mediaprice"  value="<?php echo $v['id']; ?>" price="<?php echo $v['yunying_price']; ?>"></th>                   
                        <td><?php echo $v['title']; ?></td> 
                        <td><?php echo $v['yunying_price']; ?></td>
                        <td><?php echo $v['ch_type_id']; ?></td>
                        <td><?php echo $v['in_type_id']; ?></td>
                        <td><a href="<?php echo $v['case']; ?>" target="_blank"><span class="btn btn-primary">查看</span></a></td>
                        <td><?php echo $v['remark']; ?></td>
                    </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
                <?php echo $datas->render(); ?>
            </div>
                <!-- <div >                       
                    <a  id="nextstep">下一步</a>
                </div> -->
                 
        </div>
        </div>
        <div >
        </div>
        <div class="ny-panel-body" id="gaojian" class="gaojian" >
       
        <div class="ny-panel-title" >发布稿件</div>
            
            <form id="chs-form" action="" class="form-horizontal ny-form ny-tab-container tab-group-1" method="post">
                <div class="form-group">
                    <div class="ny-control-label ny-label-long">
                        <span class="necessary-mark">*</span>
                        创建客户:
                    </div>
                    <div class="col-xs-8 ny-form-control validate-control">
                         <select name="client" id="" class="ny-input-reset ny-long-input">
                                <option value=""></option>                   
                                <?php if(is_array($user) || $user instanceof \think\Collection || $user instanceof \think\Paginator): if( count($user)==0 ) : echo "" ;else: foreach($user as $key=>$v): ?>                                                                           
                                        <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>                                    
                                <?php endforeach; endif; else: echo "" ;endif; ?>                 
                        </select>
                        <div class="error-reminder"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="ny-control-label ny-label-long">
                        <span class="necessary-mark">*</span>
                        标题:
                    </div>
                    <div class="col-xs-8 ny-form-control validate-control">
                        <input id="name" type="text" class="ny-input-reset ny-long-input" name="title" required="required" placeholder="标题字数建议16-24个字(必填)">
                        <div class="error-reminder"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="ny-control-label ny-label-long">
                        <span class="necessary-mark">*</span>
                        稿件转载链接:
                    </div>
                    <div class="col-xs-8 ny-form-control validate-control">
                        <input id="name" type="text" class="ny-input-reset ny-long-input" name="doc_url" required="required" placeholder="例:http://baidu.com">
                        <div class="error-reminder"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="ny-control-label ny-label-long">
                        <span class="necessary-mark">*</span>
                        内容：
                    </div>
                    <div class="col-xs-8 ny-form-control validate-control">
                        <script type="text/plain" id="myEditor" style="width:750px;height:320px;">
                            <p>这里是输入提示</p>
                        </script>
                       
                        <div class="error-reminder"></div>
                    </div>
                </div>

                <script type="text/javascript">
                    //实例化编辑器
                    var um = UM.getEditor('myEditor');                   
                </script>

                <div class="form-group">
                    <div class="ny-control-label ny-label-long">
                        <span class="necessary-mark">*</span>
                        备注：
                    </div>
                    <div class="col-xs-8 ny-form-control validate-control">
                        <input id="name" type="text" class="ny-input-reset ny-long-input" name="article_remark" placeholder="例如:关键词" required="required">
                        <div class="error-reminder"></div>
                    </div>
                </div>
                   <input type="hidden" name="media_id" id="media_id">            
                <div class="form-group">
                    <div class="ny-control-label ny-label-long">
                        &nbsp;
                    </div>
                   
                    <div class="col-xs-8 ny-form-control">
                      <!--   <a href="javascript:;" class="ny-btn btn-strong" id="submitWorkorder">添 加</a> -->
                          <button type="submit" class="ny-btn btn-strong"  >添 加</button>
                    </div>
                </div>

            </form>
           
        </div>
        </div>
    
    
    <script>     
            var s = $("input[name='check']");//console.log(s);
            var arr=[];
            var arr2=[];
            var total=0;
            s.each(function(i) {
            $(this).click(function(){
                if(this.checked==true){
                    var id = this.value;//alert(price);
                    var price = $(this).attr('price');//alert(price);
                    arr.push(id); //console.log(arr);
                    arr2.push(price);// console.log(arr2);
                    total +=parseInt(price);console.log(total);
                }
                if(this.checked==false){
                    var price = $(this).attr('price');
                    arr.pop(id);console.log(arr);
                     // arr2.pop(price);console.log(arr2);
                     total =total-parseInt(price);console.log(total);
                } 
                //alert()
                //console.log(total);
                $('#media_id').val(arr); 
                $('#totalmoney').html(total); 
                //totalmoney              
              
            });

            }); 

        
    </script> 
       <script>
                        $('#nextstep').click(function(){
                            // $('#gaojian').attr('')
                            $('#gaojian').attr('display','line !important');
                        })
                    </script>  
        </div>
    </div>

    </div>

    <!-- <div class="ny-panel">
        <div class="ny-panel-heading">
            <div class="ny-panel-title">媒体列表</div>
        </div>
        <div class="ny-panel-body">
            <div class="ny-panel-body">        
                <table class="ny-table margin-bottom-20" >
                    <thead>
                    <tr>
                        <th>媒体名称</th>
                        <th>价格</th>
                      <!--   <th>收录效果</th> -->
      <!--                   <th>媒体分类</th>
                        <th>收录效果</th>
                        <th>案例</th>
                        <th>备注</th>                   
                    </tr>
                    </thead>
                    <tbody>
                <?php if(is_array($datas) || $datas instanceof \think\Collection || $datas instanceof \think\Paginator): if( count($datas)==0 ) : echo "" ;else: foreach($datas as $key=>$v): ?>
                    <tr>                    
                        <td><?php echo $v['title']; ?></td> 
                        <td><?php echo $v['cost_price']; ?></td>
                        <td><?php echo $v['media_type_id']; ?></td>
                        <td><?php echo $v['case']; ?></td>
                        <td><?php echo $v['case']; ?></td>
                        <td><?php echo $v['remark']; ?></td>
                    </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div> --> 

    </div>







</div>
<!-- footer -->
 <div class="footer">
    <style type="text/css">
        *{ font-family: 'Microsoft YaHei';}
    </style>
</div>

<!-- footer end -->
<!-- 快捷feedback提示框 -->
<div class="ui-feedback-layout" id="nyFeedback">
    <div class="ui-feedback ui-feedback-success">
        <div class="ui-feedback-icon"></div>
        <div class="ui-feedback-text">
            操作成功
        </div>
        <span class="ui-feedback-close">×</span>
    </div>
</div>
<!-- 普通提示框，来自 Bootstrap 的 Small modal -->
<div class="modal fade nytips-modal" tabindex="-1" role="dialog" id="nyTips">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">消息</h4>
            </div>
            <div class="modal-body">
                <!-- 主要内容 -->
            </div>
        </div>
    </div>
</div>
<!-- 面包屑导航模板 -->
<script type="text/html" id="crumbNavTpl">
    <ol class="breadcrumb ny-crumb">
        <li><a href="/user.php" class="crumb-home">商户中心</a></li>
        <!-- 一级目录 -->
        <li><a>{{upperMenuText}}</a></li>
        <?php if(subMenuText): ?>
        <!-- 二级目录（部分模块没有二级目录） -->
        <li>
            <a <?php if(subMenuLink): ?>href="{{subMenuLink}}"<?php endif; ?>>
            {{subMenuText}}
            </a>
        </li>
        <?php endif; if(insideTitle): ?>
        <!-- 详情页面 -->
        <li>
            <a>{{insideTitle}}</a>
        </li>
        <?php endif; ?>
    </ol>
</script>


<script>var nyData = {"pager":{"page":0,"pageSize":10,"total":0},"filter":{"searchType":0,"searchKey":"","orderType":"desc","orderName":"id"},"services":{"list":[]},"common":{"userID":72838,"userName":"\u8D75\u9633","userMobile":"138****5922","sendCountDown":0,"unReadTotal":0,"backUrl":"http:\/\/console.fuwulala.com\/user\/feedback\/","domain":{"main":"http:\/\/www.fuwulala.com","static":"http:\/\/static.fuwulala.com","console":"http:\/\/console.fuwulala.com"}}};</script>


<div style="display: none; position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; cursor: move; opacity: 0; background: rgb(255, 255, 255);"></div></body></html>