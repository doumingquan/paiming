<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:82:"D:\phpStudy\WWW\paimingla\news\public/../application/paiming\view\index\index.html";i:1508916265;s:81:"D:\phpStudy\WWW\paimingla\news\public/../application/paiming\view\layout\top.html";i:1509081588;s:82:"D:\phpStudy\WWW\paimingla\news\public/../application/paiming\view\layout\left.html";i:1509356846;}*/ ?>
<!DOCTYPE html>

<html><head lang="en"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <title>用户中心 - 排名啦</title>
    <link rel="stylesheet" href="__STATIC__/paiming/admin/usercss/bootstrap.min.css" charset="utf-8">
    <link rel="stylesheet" href="__STATIC__/paiming/admin/usercss/bootstrap-theme-ny.css">
    <link rel="stylesheet" href="__STATIC__/paiming/admin/usercss/ucCommon.css">
    <link rel="stylesheet" href="__STATIC__/paiming/admin/usercss/ucComponent.css">

    <script src="__STATIC__/paiming/admin/userjs/jquery-1.12.2.min.js" charset="utf-8"></script>
    <script src="__STATIC__/paiming/admin/userjs/bootstrap.min.js" charset="utf-8"></script>
    <script src="__STATIC__/paiming/admin/userjs/template.js" charset="utf-8"></script>
    <script src="__STATIC__/paiming/admin/userjs/jquery.cookie.js" charset="utf-8"></script>
    <link rel="stylesheet" href="uesercss/ucDialog.css">
    <script src="__STATIC__/paiming/admin/userjs/jquery.dialog.js"></script>
    <script src="__STATIC__/paiming/admin/userjs/iframeTools.js"></script>
    <script src="__STATIC__/paiming/admin/userjs/NY-1.32.5.min.js"></script>
    <script src="__STATIC__/paiming/admin/userjs/ucCommon.js"></script>
    <link rel="stylesheet" href="__STATIC__/paiming/admin/usercss/home.css">

    <META HTTP-EQUIV="pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Cache-Control" CONTENT="no-store, must-revalidate">
    <META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:21:57 GMT">
    <META HTTP-EQUIV="expires" CONTENT="0">
    <script src="js/Chart.js"></script>

</head>
<body>

<div class="" style="display: none; position: absolute;">

    <div class="aui_outer">

        <table class="aui_border">
            <tbody>
            <tr>
                <td class="aui_nw"></td>
                <td class="aui_n"></td>
                <td class="aui_ne"></td>
            </tr>
            <tr>
                <td class="aui_w"></td>
                <td class="aui_c">
                    <div class="aui_inner">

                        <table class="aui_dialog">
                            <tbody>
                            <tr>
                                <td colspan="2" class="aui_header">
                                    <div class="aui_titleBar">
                                        <div class="aui_title" style="cursor: move;"></div>
                                        <a class="aui_close" href="javascript:/* www.xiaofuwulala.com */;">×</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="aui_icon" style="display: none;">
                                    <div class="aui_iconBg" style="background: none;"></div>
                                </td>
                                <td class="aui_main" style="width: auto; height: auto;">
                                    <div class="aui_content" style="padding: 20px 25px;"></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="aui_footer">
                                    <div class="aui_buttons" style="display: none;"></div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
                <td class="aui_e"></td>
            </tr>
            <tr>
                <td class="aui_sw"></td>
                <td class="aui_s"></td>
                <td class="aui_se" style="cursor: se-resize;"></td>
            </tr>
            </tbody>
        </table>

    </div>

</div>


<!-- header -->
<!-- <include file="Index/top" /> -->
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
<!-- <include file="Index/left"/> -->

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
<div class="ny-main home-page">
    <div class="crumb-container hide" id="crumbNavContainer" data-nav="phoenix"><ol class="breadcrumb ny-crumb">
        <li><a href="/coo.php" class="crumb-home">用户中心</a></li>
        <!-- 一级目录 -->
        <li><a>
            后台总览
        </a></li>


    </ol></div>
    <div id="contentBox"><div class="container-fluid">
        <div class="home-tier-1">
            <div class="tier-1-block">
             
                <div class="ny-panel home-tier-1 user-general">
                    <div class="personal-detail user-detail-container clearfix">
                        <div class="user-avatar pull-left text-center">
                            <img src="__STATIC__/paiming/admin/images/avatar_user.png" alt="">
                        </div>
                        <div class="pull-left user-detail">
                            <div class="user-detail-greetings margin-bottom-20">
                                <span class="username-outer text-overflow" title="<?php echo \think\Session::get('chsUser.realname'); ?>">你好，*********</span>

                            </div>
                            <div>
                                会员ID：**********
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="clearfix user-connect">
                            <span class="text-muted connect-icon connect-icon-mobile">手机号码</span>
                            <a class="pull-right" href="javascript:;">**********</a>
                        </div>
                        <div class="clearfix user-connect">
                            <span class="text-muted connect-icon connect-icon-email">电子邮箱</span>
                            <a class="pull-right" href="javascript:;">***********</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tier-1-block">
                <div class="ny-panel home-tier-1 secretary-panel">
                    <div class="personal-detail secretary-detail">
                        <img src="__STATIC__/paiming/admin/images/avatar_secretary.png" alt="">
                    </div>
                    <div class="secretary-operate font-size-14">
                        <div class="text-center">
                            专席客服
                            <span class="text-primary"><?php echo \think\Config::get('SERVICE_PERSON'); ?></span>
                            <div class="service-info-trigger service-qq">
                                <a href="http://console.fuwulala.com/user/#a_null"></a>
                                <span class="service-info-pop service-pop-qq default-transition">
										QQ: <?php echo \think\Config::get('SERVICE_QQ'); ?>
									</span>
                            </div>
                            <div class="service-info-trigger service-tel">
                                <a href="http://console.fuwulala.com/user/#a_null"></a>
                                <span class="service-info-pop service-pop-tel default-transition">
										电话: <?php echo \think\Config::get('SERVICE_PHONE'); ?>
									</span>
                            </div>
                        </div>
                        <div class="text-center secretary-operate-buttons">
                            <a href="tencent://message/?uin=<?php echo \think\Config::get('SERVICE_QQ'); ?>" class="ny-btn btn-primary connect-secretary">
                                联系秘书
                            </a>
                            <a href="tencent://message/?uin=<?php echo \think\Config::get('SERVICE_QQ_TOUSU'); ?>" class="ny-btn btn-primary btn-reverse secretary-feedback">
                                投诉建议
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tier-1-block">
                <div class="ny-panel home-tier-1">

                        <div class="home-panel-heading notice-panel-heading clearfix">
								<span class="notice-title text-center pull-left">
									排名啦公告
								</span>
                            <a class="pull-right font-size-12 line-height-1" href="" target="_blank"></a>
                        </div>
                        <div class="notice-list-panel">
                            <ul class="text-link">
							
                            </ul>
                        </div>
                </div>
            </div>
        </div>

        <div style="clear:both"></div>


        <div class="home-tier-2">
            <!--begin-->
            <div class="usindexw100">

      
                <div class="usindexw">
                    <!--userinicon begin-->
                    <div class="usicon1">
                        <h3>站点数量</h3>
                        <p>3</p>

                    </div>

                    <!--userinicon end-->
                    <!--userinicon begin-->
                    <div class="usicon2">
                        <h3>合作关键词数</h3>
                        <p>5</p>

                    </div>

                    <!--userinicon end-->
                    <!--userinicon begin-->
                    <div class="usicon3">
                        <h3>昨日扣费</h3>
                        <p>123</p>

                    </div>

                    <!--userinicon end-->
                    <!--userinicon begin-->
                    <div class="usicon4">
                        <h3>账户余额</h3>
                        <p>0元</p>

                    </div>

                    <!--userinicon end-->

                </div>
            </div>
            <!--end-->

        </div>

        <div class="home-tier-3">
            <div class="clearfix">
                <div class="pull-left home-tier-3-left" style="width: 100%;">
                  
                        <div class="ny-panel">
                            <div class="home-panel-heading">2017年10月经纪人销售统计</div>
                            <div class="clearfix products-detail-panel clearfix">

                                <canvas id="canvass" height="260" width="1000"></canvas>

                                <script>

                                </script>

                            </div>
                        </div>
               
                </div>
               
            </div>
        </div>
    </div></div>
  
    <script>var nyData = {"user":{"id":72838,"name":"\u8D75\u9633","mobile":"138****5922","email":"17****6@qq.com","money":0,"cashCouponTotal":0,"cashCoupon7":0,"cashCouponAmount":0,"verifyType":0,"verifyStatus":0},"service":{"id":10040,"name":"\u6C64\u5C0F\u7434","qq":"2850317599","tel":"0755-26651092"},"count":{"serverCount":0,"serverCount7":0,"hostCount":0,"hostCount7":0,"idcCount":0,"idcCount7":0,"servicesCount":0,"workorderAllCount":0,"workorderWaitCount":0,"workorderIngCount":0,"workorderDoneCount":0,"orderAllCount":0,"orderPayCount":0,"icpCodeCount":0,"pushCount":0,"credit":0},"noticeList":[{"noticeID":94,"noticeClass":"industry","noticeTitle":"\u5C0F\u9E1F\u4E91\u751F\u6001\uFF1A\u4EA7\u54C1\u670D\u52A1\u8054\u52A8\u4E3A\u7528\u6237\u521B\u9020\u4EF7\u503C","noticeTime":"08-11"},{"noticeID":93,"noticeClass":"action","noticeTitle":"\u5468\u5E74\u72C2\u6B22  \u8C6A\u793C\u9001\u4E0D\u505C","noticeTime":"08-01"},{"noticeID":92,"noticeClass":"notice","noticeTitle":"\u5173\u4E8E\u5192\u5145\u5B98\u65B9\u5DE5\u4F5C\u4EBA\u5458\u7684\u516C\u544A","noticeTime":"07-02"},{"noticeID":91,"noticeClass":"notice","noticeTitle":"\u5173\u4E8E\u5C0F\u9E1F\u4E91\u8FBD\u5B81\u8282\u70B9\u7F51\u7EDC\u6269\u5BB9\u7684\u901A\u77E5","noticeTime":"06-28"},{"noticeID":90,"noticeClass":"notice","noticeTitle":"\u5173\u4E8E\u5C0F\u9E1F\u4E91\u6C5F\u82CF\u8282\u70B9\u7F51\u7EDC\u7EF4\u62A4\u7684\u901A\u77E5","noticeTime":"06-28"},{"noticeID":89,"noticeClass":"notice","noticeTitle":"\u5173\u4E8E\u5C0F\u9E1F\u4E91\u9999\u6E2F\u56FD\u9645\uFF08CTG\uFF09\u51FA\u53E3\u7EF4\u62A4\u7684\u901A\u77E5","noticeTime":"06-23"}],"common":{"userID":72838,"userName":"\u8D75\u9633","userMobile":"138****5922","sendCountDown":0,"unReadTotal":0,"backUrl":"http:\/\/console.fuwulala.com\/user\/payment\/","domain":{"main":"http:\/\/www.fuwulala.com","static":"http:\/\/static.fuwulala.com","console":"http:\/\/console.fuwulala.com"}}};</script>

<style type="text/css">*{ font-family: "Microsoft Yahei", Tahoma, Arial;}</style>
    <div style="display: none; position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; cursor: move; opacity: 0; background: rgb(255, 255, 255);"></div></body></html>