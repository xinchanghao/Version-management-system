<?php if (!defined('THINK_PATH')) exit();?>

<!--包含头部模版header-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>AppStore</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="/Public/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/Public/stylesheets/theme.css">
    <link rel="stylesheet" href="/Public/lib/font-awesome/css/font-awesome.css">
    <script src="/Public/lib/jquery-1.7.2.min.js" type="text/javascript"></script>
    <!-- Demo page code -->
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>



    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->
    
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    <li><a href="#" class="hidden-phone visible-tablet visible-desktop" role="button">设置</a></li>
                    <?php if(isset($_SESSION['loginid'])){ ?>
                            <li id="fat-menu" class="dropdown">
                                <a role="button" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-user"></i> <?php echo ($Username); ?>
                                    <i class="icon-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="#">我的账户</a></li>
                                    <li class="divider"></li>
                                    <li><a tabindex="-1" class="visible-phone" href="#">设置</a></li>
                                    <li class="divider visible-phone"></li>
                                    <li><a tabindex="-1" href="<?php echo U('Public/logout')?>">退出</a></li>
                                </ul>
                            </li>
                    <?php }else{ ?>
                            <li id="fat-menu2">
                                <a href="<?php echo U('Public/login')?>">
                                    <i class="icon-user"></i> 请登录
                                </a>
                            </li>
                    <?php }?>
                    
                </ul>
                <a class="brand" href="index.html"><span class="first">AppStore</span> <span class="second">admin</span></a>
        </div>
    </div>




<!--包含左侧菜单模版header-->

    <div class="sidebar-nav">
        <form class="search form-inline">
            <input type="text" placeholder="搜索...">
        </form>

        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>仪表盘</a>
        <ul id="dashboard-menu" class="nav nav-list collapse<?php if(CONTROLLER_NAME=='Index') echo ' in';?>">
            <li><a href="<?php echo U('Index/index')?>">首页</a></li>
            <li ><a href="help.html">公司政策</a></li>
            <li ><a href="help.html">关于我们</a></li>
        </ul>
        <a href="#error-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-exclamation-sign"></i>App管理<i class="icon-chevron-up"></i></a>
        <ul id="error-menu" class="nav nav-list collapse<?php if(CONTROLLER_NAME=='App') echo ' in';?>">
            <?php if($isAdmin): ?><li ><a href="<?php echo U('App/all')?>">所有App列表</a></li><?php endif; ?>
            <li ><a href="<?php echo U('App/index')?>">我的App列表</a></li>
            <li ><a href="<?php echo U('App/add')?>">App添加</a></li>
            <?php if($isAdmin): ?><li ><a href="<?php echo U('App/review')?>">App审核</a></li><?php endif; ?>
        </ul>
        <?php if($isAdmin): ?><a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>用户管理<span class="label label-info">+3</span></a>
            <ul id="accounts-menu" class="nav nav-list collapse<?php if(CONTROLLER_NAME=='User') echo ' in';?>">
                <li ><a href="<?php echo U('User/index')?>">用户列表</a></li>
            </ul><?php endif; ?>
        <a href="#legal-menu" class="nav-header" data-toggle="collapse"><i class="icon-legal"></i>我的账户</a>
        <ul id="legal-menu" class="nav nav-list collapse<?php if(CONTROLLER_NAME=='User') echo ' in';?>">
            <!--<li ><a href="<?php echo U('Public/login')?>">登录</a></li>
            <li ><a href="sign-up.html">注册</a></li>-->
            <!--<li><a href="<?php echo U('User/index')?>">我的资料</a></li>-->
            <li><a href="<?php echo U('User/info')?>">我的资料</a></li>
            <li ><a href="<?php echo U('User/modify')?>">修改信息</a></li>

        </ul>
        <a href="email.html" class="nav-header" ><i class="icon-comment"></i>联系我们</a>
        <a href="help.html" class="nav-header" ><i class="icon-question-sign"></i>帮助</a>

    </div>
    



    

    
    <div class="content">
        
        <div class="header">
            <div class="stats">
    <p class="stat"><span class="number">53</span>tickets</p>
    <p class="stat"><span class="number">27</span>tasks</p>
    <p class="stat"><span class="number">15</span>waiting</p>
</div>

            <h1 class="page-title">系统仪表盘</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li class="active">仪表盘</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>您有一条新的通知:</strong> 欢迎您来到本系统!
    </div>

    <div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">最新数据</a>
        <div id="page-stats" class="block-body collapse in">

            <div class="stat-widget-container">
                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php echo ($down['count']); ?></p>
                        <p class="detail">用户量</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php echo ($down['max']); ?></p>
                        <p class="detail">最大量</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php echo ($down['avg']); ?></p>
                        <p class="detail">均值</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php echo ($down['sum']); ?></p>
                        <p class="detail">下载量</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="block span6">
        <div class="block-heading">
            <span class="block-icon pull-right">
                <a href="#" class="demo-cancel-click" rel="tooltip" title="Click to refresh"><i class="icon-refresh"></i></a>
            </span>

            <a href="#widget2container" data-toggle="collapse">下载榜</a>
        </div>
        <div id="widget2container" class="block-body collapse in">
            <table class="table list table-striped table-hover">
              <tbody>
                  <thead>
                  <tr>
                      <th>AppName</th>
                      <th>Download</th>
                      <th>Time</th>
                  </tr>
                </thead>
                <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                        <td>
                            <p><i class="icon-check"></i> <a href="appdetail">&nbsp;<?php echo ($vo['AppName']); ?></a></p>
                        </td>
                        <td>
                            <p><i class="icon-save"></i> &nbsp;<?php echo ($vo['DownloadCount']); ?></p>
                        </td>
                        <td>
                            <p><i class="icon-calendar"></i> &nbsp; <?php echo ($vo['Time']); ?></p>
                        </td>
                    </tr><?php endforeach; endif; ?>
              </tbody>

            </table>
            <p><a href="#">More...</a></p>

        </div>
    </div>
    <div class="block span6">
        <a href="#tablewidget" class="block-heading" data-toggle="collapse">浏览榜<span class="label label-warning">+10</span></a>
        <div id="tablewidget" class="block-body collapse in">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>AppID</th>
                    <th>AppName</th>
                    <th>Username</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>QQ</td>
                    <td>1111</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>qq</td>
                    <td>222</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>qq</td>
                    <td>123</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>qq</td>
                    <td>1234</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>qq</td>
                    <td>1212</td>
                </tr>

                </tbody>
            </table>
            <p><a href="#">More...</a></p>
        </div>
    </div>



</div>


                    
                    <footer>
                        <hr>
                        
                        <p class="pull-right">Collect from <a href="#" target="_blank">AppStore</a></p>
                        

                        <p>&copy; 2016 <a href="#" target="_blank">Xinhao</a></p>
                    </footer>
                    
            </div>
        </div>
    </div>
    


    <script src="/Public/lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>