<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"D:\phpStudy\WWW\paimingla\news\public/../application/admin\view\index\index.html";i:1508461766;s:82:"D:\phpStudy\WWW\paimingla\news\public/../application/admin\view\layout\header.html";i:1508461597;s:80:"D:\phpStudy\WWW\paimingla\news\public/../application/admin\view\layout\left.html";i:1509444277;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新闻系统</title>

    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="__STATIC__/css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="__STATIC__/css/nifty.min.css" rel="stylesheet">
    <link href="__STATIC__/css/theme-light.min.css" rel="stylesheet">

    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="__STATIC__/css/demo/nifty-demo-icons.min.css" rel="stylesheet">


    <!--Demo [ DEMONSTRATION ]-->
    <link href="__STATIC__/css/demo/nifty-demo.min.css" rel="stylesheet">

    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="__STATIC__/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="__STATIC__/plugins/pace/pace.min.js"></script>


    <!--jQuery [ REQUIRED ]-->
    <script src="__STATIC__/js/jquery-2.2.4.min.js"></script>
    <script src="__STATIC__/js/echarts.common.min.js"></script>

    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="__STATIC__/js/bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="__STATIC__/js/nifty.min.js"></script>

    <!--Demo script [ DEMONSTRATION ]-->
    <script src="__STATIC__/js/demo/nifty-demo.min.js"></script>
    <link rel="shortcut icon" href="__STATIC__/img/favicon.ico" type="image/x-icon"/>

</head>
<style>


</style>
<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">

    <header id="navbar">
    <div id="navbar-container" class="boxed">

        <!--Brand logo & name-->
        <!--================================-->
        <div class="navbar-header">
            <a href="index.html" class="navbar-brand">
                <img src="__STATIC__/img/logo.png" alt="新闻后台管理" class="brand-icon">
                <div class="brand-title">
                    <span class="brand-text">新闻后台管理</span>
                </div>
            </a>
        </div>
        <!--================================-->
        <!--End brand logo & name-->


        <!--Navbar Dropdown-->
        <!--================================-->
        <div class="navbar-content clearfix">
            <ul class="nav navbar-top-links pull-left">

                <!--Navigation toogle button-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li class="tgl-menu-btn">
                    <a class="mainnav-toggle" href="#">
                        <i class="demo-pli-view-list"></i>
                    </a>
                </li>

            </ul>
            <ul class="nav navbar-top-links pull-right">


                <li id="dropdown-user" class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="pull-right">
                                    <!--<img class="img-circle img-user media-object" src="images/profile-photos/1.png" alt="Profile Picture">-->
                                    <i class="demo-pli-male ic-user"></i>
                                </span>
                        <div class="username hidden-xs"><?php echo \think\Session::get('admin.name'); ?></div>
                    </a>


                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">

                        <!-- Dropdown heading  -->
                        <div class="pad-all bord-btm">
                            <p class="text-main mar-btm"><span
                                    class="text-bold">欢迎回来！<?php echo \think\Session::get('admin.name'); ?>!</span></p>
                            <div class="pad-all bord-btm">
                                奋斗的青春最美丽！
                            </div>
                        </div>

                        <div class="pad-all text-right">
                            <a href="<?php echo url('Admin/Index/logout'); ?>" class="btn btn-primary">
                                <i class="demo-pli-unlock"></i> 退出登录
                            </a>
                        </div>
                    </div>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End user dropdown-->
            </ul>
        </div>
        <!--================================-->
        <!--End Navbar Dropdown-->

    </div>
</header>

    <div class="boxed">
        <div id="content-container">

            <div id="page-content">

                <div class="fixed-fluid">

                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <!--Sparkline Area Chart-->
                                <!--Placeholder-->
                                <div class="panel panel-info ">
                                    <div id="main" style="width: 400px;height:300px;"></div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">

                                <!--Sparkline Line Chart-->
                                <div class="panel panel-info">
                                    <div id="main2" style="width: 450px;height:300px;"></div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-xs-12">
                        <?php if(!(empty($data) || (($data instanceof \think\Collection || $data instanceof \think\Paginator ) && $data->isEmpty()))): ?>
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">项目流水统计</h3>
                            </div>
                            <!--Data Table-->
                            <!--===================================================-->

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>所属公司</th>
                                        <th>项目编号</th>
                                        <th>项目名称</th>
                                        <th>开始时间</th>
                                        <th>项目周期</th>
                                        <th>项目状态</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <tr>
                                        <td><a class="btn-link"><?php echo $vo['company']; ?></a></td>
                                        <td><a href="#" class="btn-link"><?php echo $vo['id']; ?></a></td>
                                        <td><?php echo $vo['pro']; ?></td>
                                        <td><span class="text-muted"><i class="fa fa-clock-o"></i> <?php echo date('Y-m-d',$vo['createtime']); ?></span>
                                        </td>
                                        <td><?php echo $vo['cycle']; ?>天</td>
                                        <td>
                                            <?php if($vo['status'] == 2): ?>
                                            <div class="label label-table label-info">
                                                完成
                                            </div>
                                            <?php elseif($vo['status'] == 1): ?>
                                            <div class="label label-table label-danger">未完成</div>
                                            <?php else: ?>
                                            <div class="label label-table label-warning">正在进行</div>
                                            <?php endif; ?>
                                        </td>

                                    </tr>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>


                                    </tbody>
                                </table>
                            </div>


                            <div class="pull-right">
                                <?php echo $data->render(); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <!--===================================================-->
                        <!--End Data Table-->

                    </div>
                </div>

            </div>

        </div>
        <!--===================================================-->
        <!--End page content-->


    </div>


    <style>
    body,button, input, select,nav,ul,li,a,span,strong,textarea,h1 ,h2, h3, h4, h5, h6 ,ul,li,a{ font-family: Microsoft YaHei, "\5b8b\4f53", sans-serif !important;}

</style>
<nav id="mainnav-container">
    <div id="mainnav">

        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">

                    <!--Profile Widget-->
                    <!--================================-->

                    <div id="mainnav-profile" class="mainnav-profile">
                        <div class="profile-wrap">
                            <div class="pad-btm">
                               <!--  <?php if(\think\Session::get('admin_cate.headpic') == ''): ?>
                                <img alt="Avatar" class="img-lg img-circle img-border mar-btm" src="__STATIC__/img/profile-photos/1.png">

                                <?php else: ?>
                                <img class="img-circle img-sm img-border" src="\<?php echo \think\Session::get('admin_cate.headpic'); ?>"alt="Profile Picture">
                                <?php endif; ?> -->
                            </div>
                            <a href="#profile-nav" class="box-block collapsed" data-toggle="collapse"
                               aria-expanded="false">

                                <p class="mnp-name"><?php echo \think\Session::get('admin.name'); ?></p>
                                <span class="mnp-desc"><?php echo \think\Session::get('admin_cate.email'); ?></span>
                            </a>
                        </div>
                    </div>

                    <?php if(session('admin')['id'] == 1): ?>

                    <ul id="mainnav-menu" class="list-group">

                        <?php if($c == 'Staff'): ?>
                        <li class="active">
                            <a href="#" aria-expanded="true">
                                <i class="demo-psi-bar-chart"></i>
                                <span class="menu-title">
                                                <strong>个人中心</strong>
                                            </span>
                                <i class="arrow"></i>
                            </a>

                            <ul class="collapse in" aria-expanded="true">
                                <li><a href="<?php echo url('/staff_index'); ?>">我的资料</a></li>
                                <li><a href="<?php echo url('/my_center'); ?>">资料修改</a></li>
                                <li><a href="<?php echo url('/my_salary'); ?>">我的薪资</a></li>
                            </ul>
                        </li>
                        <?php else: ?>
                        <li>
                            <a href="#">
                                <i class="demo-psi-bar-chart"></i>
                                <span class="menu-title">
                                                <strong>个人中心</strong>
                                            </span>
                                <i class="arrow"></i>
                            </a>


                            <ul class="collapse">
                                <li><a href="<?php echo url('/staff_index'); ?>">我的资料</a></li>
                                <li><a href="<?php echo url('/my_center'); ?>">资料修改</a></li>
                                <li><a href="<?php echo url('/my_salary'); ?>">我的薪资</a></li>
                            </ul>
                        </li>
                        <?php endif; if($c == 'Media'): ?>
                        <li class="active">
                            <a href="#" aria-expanded="true">
                                <i class="demo-psi-receipt-4"></i>
                                <span class="">
                                        <strong>媒体管理</strong>
                                            </span>
                                <i class="arrow"></i>
                            </a>

                            <ul class="collapse in" aria-expanded="true">
                                <li><a href="<?php echo url('Admin/Media/index'); ?>" data-original-title>媒体列表</a></li>                          
                                <li><a href="<?php echo url('Admin/Media/add_media'); ?>">添加媒体</a></li>

                            </ul>
                        </li>
                        <?php else: ?>
                        <li>
                            <a href="#">
                                <i class="demo-psi-receipt-4"></i>
                                <span class="">
                                                <strong>媒体管理</strong>
                                            </span>
                                <i class="arrow"></i>
                            </a>

                            <ul class="collapse ">
                                <li><a href="<?php echo url('Admin/Media/index'); ?>" data-original-title>媒体列表</a></li>                          
                                <li><a href="<?php echo url('Admin/Media/add_media'); ?>">添加媒体</a></li>

                            </ul>
                        </li>
                        <?php endif; if($c == 'Mediatype'): ?>
                        <li class="active">
                            <a href="#" aria-expanded="true">
                                <i class="demo-psi-receipt-4"></i>
                                <span class="">
                                                <strong>媒体类型</strong>
                                            </span>
                                <i class="arrow"></i>
                            </a>

                            <ul class="collapse in" aria-expanded="true">
                                <li><a href="<?php echo url('Admin/Mediatype/index'); ?>" data-original-title>媒体类型列表</a></li>                          
                                 <li><a href="<?php echo url('Admin/Mediatype/add_media_type'); ?>">添加媒体类型</a></li>
                            </ul>
                        </li>
                        <?php else: ?>
                        <li>
                            <a href="#">
                                <i class="demo-psi-receipt-4"></i>
                                <span class="">
                                                <strong>媒体类型</strong>
                                            </span>
                                <i class="arrow"></i>
                            </a>

                            <ul class="collapse ">
                                   <li><a href="<?php echo url('Admin/Mediatype/index'); ?>" data-original-title>媒体类型列表</a></li>                          
                                <li><a href="<?php echo url('Admin/Mediatype/add_media_type'); ?>">添加媒体类型</a></li>

                            </ul>
                        </li>
                        <?php endif; ?>

                     <!--    <?php if($c == 'Manus'): ?>
                        <li class="active">
                            <a href="#" aria-expanded="true">
                                <i class="demo-psi-pen-5"></i>
                                <span class="menu-title">
                                                <strong>稿件管理</strong>
                                            </span>
                                <i class="arrow"></i>
                            </a>

                            <ul class="collapse in" aria-expanded="true">
                                <li><a href="<?php echo url('Admin/Manus/add_manus'); ?>">发布稿件</a></li>
                                <li><a href="<?php echo url('Admin/Manus/index'); ?>">全部稿件</a></li>
                                <li><a href="<?php echo url('Admin/Manus/index'); ?>">待发布</a></li>
                                <li><a href="<?php echo url('Admin/Manus/index'); ?>">已发布</a></li>
                                <li><a href="<?php echo url('Admin/Manus/index'); ?>">待确认</a></li>

                            </ul>
                        </li>
                        <?php else: ?>
                        <li>
                            <a href="#">
                                <i class="demo-psi-pen-5"></i>
                                <span class="menu-title">
                                                <strong>稿件管理</strong>
                                            </span>
                                <i class="arrow"></i>
                            </a>
                            <ul class="collapse ">
                                <li><a href="<?php echo url('Admin/Manus/add_manus'); ?>">发布稿件</a></li>
                                <li><a href="<?php echo url('Admin/Manus/index'); ?>">全部稿件</a></li>
                                <li><a href="<?php echo url('Admin/Manus/index'); ?>">待发布</a></li>
                                <li><a href="<?php echo url('Admin/Manus/index'); ?>">已发布</a></li>
                                <li><a href="<?php echo url('Admin/Manus/index'); ?>">待确认</a></li>
                            </ul>
                        </li>
                        <?php endif; ?> -->

                        <?php if($c == 'Rule'): ?>

                        <li class="active">
                            <a href="#" aria-expanded="true">
                                <i class="demo-psi-gear-2"></i>
                                <span class="menu-title">
                                                <strong>权限控制</strong>

                                            </span>
                                <i class="arrow"></i>
                            </a>

                            <ul class="collapse in" aria-expanded="true">
                                <li><a href="<?php echo url('/rule_list'); ?>">权限管理</a></li>
                                <li><a href="<?php echo url('/rule_group'); ?>">角色管理</a></li>
                               <!--  <li><a href="<?php echo url('/user_index'); ?>">用户管理</a></li> -->
                            </ul>
                        </li>
                        <?php else: ?>
                        <li>
                            <a href="#">
                                <i class="demo-psi-gear-2"></i>
                                <span class="menu-title">
                                                <strong>权限控制</strong>

                                            </span>
                                <i class="arrow"></i>
                            </a>

                            <ul class="collapse">
                                <li><a href="<?php echo url('/rule_list'); ?>">权限管理</a></li>
                                <li><a href="<?php echo url('/rule_group'); ?>">角色管理</a></li>
                              <!--   <li><a href="<?php echo url('/user_index'); ?>">用户管理</a></li> -->
                            </ul>
                        </li>
                        <?php endif; if($c == 'User'): ?>

                        <li class="active">
                            <a href="#" aria-expanded="true">
                                <i class="demo-psi-gear-2"></i>
                                <span class="menu-title">
                                                <strong>用户管理</strong>

                                            </span>
                                <i class="arrow"></i>
                            </a>

                            <ul class="collapse in" aria-expanded="true">
                                <li><a href="<?php echo url('Admin/User/index'); ?>">管理员列表</a></li>
                                <li><a href="<?php echo url('Admin/User/add_user'); ?>">添加管理员</a></li>
                               <!--  <li><a href="<?php echo url('/user_index'); ?>">用户管理</a></li> -->
                            </ul>
                        </li>
                        <?php else: ?>
                        <li>
                            <a href="#">
                                <i class="demo-psi-gear-2"></i>
                                <span class="menu-title">
                                                <strong>用户管理</strong>

                                            </span>
                                <i class="arrow"></i>
                            </a>

                            <ul class="collapse">
                               <li><a href="<?php echo url('Admin/User/index'); ?>">管理员列表</a></li>
                                <li><a href="<?php echo url('Admin/User/add_user'); ?>">添加管理员</a></li>
                            </ul>
                        </li>
                        <?php endif; if($c == 'Manus'): ?>

                        <li class="active">
                            <a href="#" aria-expanded="true">
                                <i class="demo-psi-gear-2"></i>
                                <span class="menu-title">
                                                <strong>稿件管理</strong>

                                            </span>
                                <i class="arrow"></i>
                            </a>

                            <ul class="collapse in" aria-expanded="true">
                                <li><a href="<?php echo url('Admin/Manus/checkarticle'); ?>">待审核列表</a></li>
                                <li><a href="<?php echo url('Admin/Manus/add_user'); ?>">待发布列表</a></li>
                               <!--  <li><a href="<?php echo url('/user_index'); ?>">用户管理</a></li> -->
                            </ul>
                        </li>
                        <?php else: ?>
                        <li>
                            <a href="#">
                                <i class="demo-psi-gear-2"></i>
                                <span class="menu-title">
                                                <strong>稿件管理</strong>

                                            </span>
                                <i class="arrow"></i>
                            </a>

                            <ul class="collapse">
                                <li><a href="<?php echo url('Admin/Manus/checkarticle'); ?>">待审核列表</a></li>
                                <li><a href="<?php echo url('Admin/Manus/add_user'); ?>">待发布列表</a></li>
                            </ul>
                        </li>
                        <?php endif; ?>
                       <!--   <li >
                            <a href="#" aria-expanded="true">
                                <i class="demo-psi-gear-2"></i>
                                <span class="menu-title">
                                                <strong>基本设置</strong>

                                            </span>
                                <i class="arrow"></i>
                            </a>

                             <ul class="collapse " aria-expanded="true">
                                <li><a href="<?php echo url('Admin/Company/index'); ?>">公司架构管理</a></li>
                                <li><a href="<?php echo url('Admin/Depart/depart_list'); ?>">部门管理</a></li>
                                <li><a href="<?php echo url('Admin/Position/position_list'); ?>">职位管理</a></li>
                                <li><a href="<?php echo url('Admin/Ptype/ptype_list'); ?>">项目类型管理</a></li>
                            </ul>
                        </li> -->


                        <?php else: ?>
                        <ul id="mainnav-menu" class="list-group">
                            <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): if( count($menu)==0 ) : echo "" ;else: foreach($menu as $key=>$vo): ?>

                            <li <?php $arr=explode('/',$vo['name']);$pcon=$arr[1];if($pcon==$c){echo 'class="active"';}?>>
                            <a href="#" <?php $arr=explode('/',$vo['name']);$pcon=$arr[1];if($pcon==$c){echo 'aria-expanded="true"';}?> >
                                <i class="demo-psi-split-vertical-2"></i>
                                <span class="menu-title">
                                            <strong><?php echo $vo['title']; ?></strong>
                                            </span>
                                <i class="arrow"></i>
                            </a>


                            <ul>
                          
                            <?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): if( count($vo['children'])==0 ) : echo "" ;else: foreach($vo['children'] as $key=>$vo2): ?>
                            <li
                            <?php if($name==$vo2['name']){echo 'class="active"';}?>>
                            <a href="<?php echo url($vo2['name']); ?>"> <?php echo $vo2['title']; ?>
                            </a>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>

                    <div class="mainnav-widget">

                        <!-- Show the button on collapsed navigation -->
               <!--          <div class="show-small">
                            <a href="#" data-toggle="menu-widget" data-target="#demo-wg-server">
                                <i class="demo-pli-monitor-2"></i>
                            </a>
                        </div> -->
                        <!-- Hide the content on collapsed navigation -->
              <!--       </div> -->
                    <!--================================-->
                    <!--End widget-->
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>


</div>


<!--===================================================-->
<button class="scroll-top btn">
    <i class="pci-chevron chevron-up"></i>
</button>
<!--===================================================-->


</div>
<!--===================================================-->
<!-- END OF CONTAINER -->


<!-- SETTINGS - DEMO PURPOSE ONLY -->
<!--===================================================-->

<!--===================================================-->
<!-- END SETTINGS -->
<script type="text/javascript">
    // 初始化两个数组，盛装从数据库中获取到的数据

    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('main'));
    option = {
        title: {
            text: '入职总工作完成统计',
            subtext: '选取入职来总共数据',
            x: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient: 'vertical',
            left: 'left',
            data: ['待办工作', '完成工作', '正在进行']
        },
        series: [
            {
                name: '访问来源',
                type: 'pie',
                radius: '55%',
                center: ['50%', '60%'],
                data: [
                    {value: '<?php echo $date2; ?>', name: '未完成数量'},
                    {value: '<?php echo $date; ?>', name: '完成数量'},
                    {value: 0, name: '正在进行'},

                ],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };


    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);


</script>

<script type="text/javascript">


    var myChart = echarts.init(document.getElementById('main2'));
    option = {
        title: {
            text: '本月工作完成统计',
            subtext: '总共数据',
            x: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient: 'vertical',
            left: 'left',
            data: ['待办工作', '完成工作', '正在进行']
        },
        series: [
            {
                name: '访问来源',
                type: 'pie',
                radius: '55%',
                center: ['50%', '60%'],
                data: [
                    {value: '<?php echo $total1; ?>', name: '未完成数量'},
                    {value: '<?php echo $total2; ?>', name: '完成数量'},
                    {value: '<?php echo $total3; ?>', name: '正在进行'},

                ],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>


</body>
</html>

