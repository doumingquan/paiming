<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:82:"D:\phpStudy\WWW\paimingla\news\public/../application/paiming\view\manus\index.html";i:1509499360;s:83:"D:\phpStudy\WWW\paimingla\news\public/../application/paiming\view\layout\cssjs.html";i:1508912602;s:81:"D:\phpStudy\WWW\paimingla\news\public/../application/paiming\view\layout\top.html";i:1509081588;s:82:"D:\phpStudy\WWW\paimingla\news\public/../application/paiming\view\layout\left.html";i:1509356846;s:82:"D:\phpStudy\WWW\paimingla\news\public/../application/paiming\view\layout\foot.html";i:1508897612;}*/ ?>
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
    <div class="crumb-container" data-nav="peacock" id="crumbNavContainer"><ol class="breadcrumb ny-crumb">
        <li><a href="/coo.php" class="crumb-home">商户中心</a></li>
        <!-- 一级目录 -->
        <li><a>服务市场</a></li>

        <!-- 二级目录（部分模块没有二级目录） -->
        <li>
            <a>
                服务订单
            </a>
        </li>


    </ol></div>
    <div id="contentBox"><div class="ny-panel">
        <div class="ny-panel-heading">
            <div class="ny-panel-title">全部列表</div>
        </div>

        <form method="post" >
            <div class="effectkeyfind">
              
                稿件标题:
                        <input type="text" name="title"  id="demo-inline-inputmail" class="ny-btn btn-primary btn-reverse secretary-feedback">
               <!--  <input name="title" type="text" class="ny-btn btn-primary btn-reverse secretary-feedback" placeholder="项目名/网址" value="<?php echo \think\Request::instance()->get('title'); ?>"> -->
                         &nbsp &nbsp &nbsp
                媒体名称:
                        <input type="text" name="media_name"  id="demo-inline-inputmail" class="ny-btn btn-primary btn-reverse secretary-feedback">
                         &nbsp &nbsp &nbsp
                客户名称:
                        <input type="text" name="client" id="demo-inline-inputmail" class="ny-btn btn-primary btn-reverse secretary-feedback">
                         &nbsp &nbsp &nbsp
                销售名称:
                        <input type="text" name="sales" id="demo-inline-inputmail" class="ny-btn btn-primary btn-reverse secretary-feedback">
                         &nbsp &nbsp &nbsp
                会员名称:
                        <input type="text" name="" id="demo-inline-inputmail" class="ny-btn btn-primary btn-reverse secretary-feedback"><br /><p></p>
                结算状态:
                        <select name="pay_status" id="demo-inline-inputmail3" class="ny-btn btn-primary btn-reverse secretary-feedback">
                            <option value="">全部</option>
                            <option value="1">未结算</option>
                            <option value="2">已结算</option>
                        </select>
                        &nbsp &nbsp &nbsp
               
               <!--  创建时间:
                        <input type="text" name="title" placeholder="" id="demo-inline-inputmail" class="ny-btn btn-primary btn-reverse secretary-feedback"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp -->
                
                    <input type="submit" value="搜索"  class="btn btn-primary"> &nbsp &nbsp 
                    <span onclick="daochu()" class="btn btn-primary">导出稿件</span>
            </div>
        </form>
                <script>
                    function daochu(){
                        var title = $("input[name=title]").val();//alert(title);
                        var media = $("input[name=media_name]").val();//alert(title);
                        var client = $("input[name=client]").val();//alert(title);                  
                        var pay_status = $('#demo-inline-inputmail3 option:selected').val(); //alert(gate_id)       //门户类型                                                             
                        window.location.href="<?php echo url('Manus/export');?>"+'?title='+title+'&media_name='+media+'&client='+client+'&pay_status='+pay_status;
                   }                                       
                </script>

        <div class="ny-panel-body">
         
            <table class="ny-table margin-bottom-20" data-nonedata_text="您的订单列表为空">
                <thead>
                <tr>
                    <th>文章id</th>
                    <th>订单id</th>
                  <!--   <th>收录效果</th> -->
                    <th>客户名称</th>
                    <th>稿件标题</th>
                    <th>媒体名称</th>
                    <th>成本价</th>
                    <th>销售价</th>
                    <th>结算状态</th>
                    <th>回链</th>
                    <th>销售</th>
                    <th>稿件状态</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
         <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): if( count($info)==0 ) : echo "" ;else: foreach($info as $key=>$v): ?>
                <tr>                    
                    <td><?php echo $v['id']; ?></td>
                    <td><?php echo $v['order_id']; ?></td>
                    <td><?php echo $v['client']; ?></td>
                    <td><?php echo $v['title']; ?></td>
                    <td><?php echo $v['titles']; ?></td>
                    <td><?php echo $v['cost_price']; ?></td>
                    <td><?php echo $v['yunying_price']; ?></td>
                    <td><?php switch($v['pay_status']): case "1": ?>未结算<?php break; case "2": ?>已结算<?php break; endswitch; ?>
                    </td>
                    <td></td>
                    <td><?php echo $v['sales_id']; ?></td>
                    <td><?php switch($v['article_status']): case "-3": ?>失败<?php break; ?>
                           <!--  <?php case "-2": ?>待审核<?php break; ?> -->
                            <?php case "-1": ?>待发布<?php break; case "1": ?>正常<?php break; case "2": ?>申请退稿<?php break; case "3": ?>禁言<?php break; case "4": ?>删除<?php break; endswitch; ?>
                    </td>
                    <td><?php echo date('Y-m-d H:i:s',$v['add_time']); ?> </td>                                    
                    <td>
                    <?php if(($v['pay_status'] == 1) AND ($v['article_status'] == -1)): ?>
                            <a href="javascript:;" manusId="<?php echo $v['id']; ?>" media_price="<?php echo $v['yunying_price']; ?>" pay_status="<?php echo $v['pay_status']; ?>"  onclick="edit(this)"><button class="btn btn-primary">退稿/改稿</button></a>
                            <a href="javascript:" onclick="confirms(<?php echo $v['id']; ?>)"><button class="btn btn-danger">确认收款</button></a>
                          <!--   退稿/改稿   确认收款 -->
                    <?php elseif(($v['pay_status'] == 1) AND ($v['article_status'] == 1)): ?>
                            <a href="javascript:;" manusId="<?php echo $v['id']; ?>" media_price="<?php echo $v['yunying_price']; ?>" pay_status="<?php echo $v['pay_status']; ?>" onclick="add(this)" ><button class="btn btn-primary">申请退稿&nbsp&nbsp</button></a>
                            <a href="javascript:" onclick="confirms(<?php echo $v['id']; ?>)"><button class="btn btn-danger">确认收款</button></a>
                    <?php elseif(($v['pay_status'] == 1) AND ($v['article_status'] == 2)): ?>
                            <a href="javascript:" ><button class="btn btn-danger">退稿确认中</button></a>
                    <?php elseif(($v['pay_status'] == 1) AND ($v['article_status'] == -2)): ?>
                            <a href="javascript:" ><button class="btn btn-danger">审核中</button></a>
                    <?php elseif(($v['pay_status'] == 2) AND ($v['article_status'] == 1)): ?>
                            <a href="javascript:;" manusId="<?php echo $v['id']; ?>" media_price="<?php echo $v['yunying_price']; ?>" pay_status="<?php echo $v['pay_status']; ?>" onclick="add(this)" ><button class="btn btn-primary">申请退稿&nbsp&nbsp</button></a>
                             <a href="javascript:" ><button class="btn btn-danger">已收款</button></a>
                    <?php elseif(($v['pay_status'] == 2) AND ($v['article_status'] == 2)): ?>
                             <a href="javascript:;" manusId="<?php echo $v['id']; ?>" media_price="<?php echo $v['yunying_price']; ?>" pay_status="<?php echo $v['pay_status']; ?>" onclick="add(this)" ><button class="btn btn-primary">申请退稿&nbsp&nbsp</button></a>
                    <?php elseif(($v['pay_status'] == 2) AND ($v['article_status'] == 5)): ?>
                             <a href="javascript:;" manusId="<?php echo $v['id']; ?>" media_price="<?php echo $v['yunying_price']; ?>" pay_status="<?php echo $v['pay_status']; ?>"  ><button class="btn btn-primary">已退稿&nbsp&nbsp</button></a>     
                    <?php else: endif; ?>
                      
                     <!--    <a href="javascript:" onclick="confirms(<?php echo $v['id']; ?>)"><button class="btn btn-danger">确认收款</button></a> -->
                       
                       
                        
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <script>
                function  confirms(id){
                    if(confirm('确定收款')){

                       $.ajax({
                            url:"<?php echo url('Manus/postchangestatus');?>",
                            data:{'id':id},
                            type:'post',
                            dataType:'json',
                            success:function(msg){
                                if(msg.status==1000){
                                    alert('操作成功!');
                                    location=location;
                                }else{
                                    alert('操作失败!'); 
                                }
                            }

                       });
                    }else{
                       
                    }
                   
                }
            </script>

        </div>
         <?php echo $info->render(); ?>
    </div></div>

</div>
<div class="modal fade" id="thinkright-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    提交待确认
                </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo url('paiming/manus/change'); ?>" method="post">
                <input type="hidden" name="id" >
                <input type="hidden" name="price" >
                <input type="hidden" name="pstatus" >
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">问题名称</label>
                            <div class="col-sm-9"> 
                                <select name="question_name" id="" class="form-control" required="required">
                                    <option value="">请选择</option>
                                    <option value="2">退稿</option>
                                    <option value="2">改稿</option>
                                </select>                            
                                <!-- <input type="text" id="demo-hor-inputemail" class="form-control" name="question_name"
                                     required="required" > -->
                              </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">问题描述</label>
                            <div class="col-sm-9">                             
                                <input type="text" id="demo-hor-inputemail" placeholder="不超过30个字" maxlength="30" class="form-control" name="question_description"
                                       required="required">
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        <button class="btn btn-success" type="submit">修改</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 

 <div class="modal fade" id="thinkright-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    退稿
                </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo url('paiming/manus/rejection'); ?>" method="post">
                <input type="hidden" name="id" >
                <input type="hidden" name="price" >
                <input type="hidden" name="pstatus" >
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">退稿理由</label>
                            <div class="col-sm-9"> 
                                <select name="reason" id="demo-hor-inputemail" class="form-control" required="required">
                                     <option value=""></option>
                                    <option value="1">没有达到预期效果</option>
                                    <option value="2">文章内容出错</option>
                                    <option value="3"> 稿件不想要了</option>

                                </select>                            
                              <!--  <input type="text" id="demo-hor-inputemail" class="form-control" name="question_name"
                                       required="required" > -->
                  </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">其他理由</label>
                            <div class="col-sm-9">                             
                                <input type="text" id="demo-hor-inputemail" class="form-control" name="remark" >
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        <button class="btn btn-success" type="submit">确定</button>
                    </div>
                </form>
            </div>
        </div>
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
        <li><a href="" class="crumb-home">商户中心</a></li>
        <!-- 一级目录 -->
        <li><a>{{upperMenuText}}</a></li>
        <?php if(subMenuText): ?>
        <!-- 二级目录（部分模块没有二级目录） -->
        <li>
            <a {<?php if(subMenuLink): ?>}href="{{subMenuLink}}"{<?php endif; ?>}>
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
<script type="text/javascript">

    // 修改子菜单
    function add(obj) {
        var manusId = $(obj).attr('manusId');//alert(manusId);
        var price = $(obj).attr('media_price');//alert(price);
        var pay_status = $(obj).attr('pay_status');//alert(price);       
        $("input[name='id']").val(manusId);
        $("input[name='price']").val(price);
        $("input[name='pstatus']").val(pay_status);
        $('#thinkright-add').modal('show');
    }

    // 修改退稿菜单
    function edit(obj) {
        var manusId = $(obj).attr('manusId');//alert(manusId);
        var price = $(obj).attr('media_price');//alert(price);
        var pay_status = $(obj).attr('pay_status');//alert(price);       
        $("input[name='id']").val(manusId);
        $("input[name='price']").val(price);
        $("input[name='pstatus']").val(pay_status);

    //     $("input:radio[name='show']").val(ruleshow);
        $('#thinkright-edit').modal('show');
    }
</script>


<script>var nyData = {"pager":{"page":0,"pageSize":10,"total":0},"filter":{"searchType":0,"searchKey":"","orderType":"desc","orderName":"id"},"services":{"list":[]},"common":{"userID":72838,"userName":"\u8D75\u9633","userMobile":"138****5922","sendCountDown":0,"unReadTotal":0,"backUrl":"http:\/\/console.fuwulala.com\/user\/feedback\/","domain":{"main":"http:\/\/www.fuwulala.com","static":"http:\/\/static.fuwulala.com","console":"http:\/\/console.fuwulala.com"}}};</script>


<div style="display: none; position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; cursor: move; opacity: 0; background: rgb(255, 255, 255);"></div></body></html>