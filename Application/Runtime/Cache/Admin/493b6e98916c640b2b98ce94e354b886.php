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
            
            <h1 class="page-title">App管理</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li class="active">应用详情</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="faq-content">
    <a href="<?php echo U('App/modify',array('AppID'=>$data['AppID']))?>" class="btn btn-primary">编辑应用</a>
    <div class="row-fluid">
        <div class="span9">
            <div class="block">
                <p class="block-heading">应用详情</p>
                <div class="block-body">
                <div class="row-fluid" style="text-align: left;">
                    <div class="pull-left span4 unstyled">
                        <p><b>应用ID:</b><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($data["AppID"]); ?></a></p>
                        <p><b>内部名:</b><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($data["SymbolName"]); ?></a></p>
                        <p><b>分类:</b><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($data["CategoryID"]); ?></a></p>
                        <p><b>版本:</b><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($data["VersionID"]); ?></a></p>
                        <p><b>状态:</b><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($data["AppStatus"]); ?></a></p>
                        <p><b>详情:</b><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($data["AppDetail"]); ?></a></p>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="block">
                <p class="block-heading">版本管理</p>
                <div class="well">
                        <form class="form-inline" style="width: 100%">
                            <select name="" id="" class="input-xlarge">
                                <option value="1" selected="selected">正常</option>
                                <option value="2">下架</option>
                                <option value="0">待审核</option>
                            </select>
                            <a href="#" class="btn btn-default">提交</a>
                            <a href="<?php echo U('Version/add',array('AppID'=>$data['AppID']));?>" class="btn btn-primary pull-right">新增版本</a>
                        </form>
                    <table class="table table-striped table-hover table-condensed table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>版本ID</th>
                            <th>版本号</th>
                            <th>下载量</th>
                            <th>状态</th>
                            <th>更新时间</th>
                            <th style="width: 36px;">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($vdata)): $i = 0; $__LIST__ = $vdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td><input type="checkbox" name="" value=""></input></td>
                                <td><?php echo ($vo['VersionID']); ?></td>
                                <td><?php echo ($vo['VersionName']); ?></td>
                                <td><?php echo ($vo['DownloadCount']); ?></td>
                                <td><?php echo ($vo['VersionStatus']); ?></td>
                                <td><?php echo ($vo['Time']); ?></td>
                                <td>
                                    <a href="<?php echo U('Version/modify',array('AppID'=>$data['AppID'],'VersionID'=>$vo['VersionID']))?>"><i class="icon-pencil"></i></a>
                                    <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="span3">
            <div class="toc">
                <h3>表格内容</h3>
                <ol>
                    <li><a href="help.html">内部名</a></li>
                    <li><a href="help.html">应用名</a></li>
                    <li><a href="help.html">版本</a></li>
                    <li><a href="help.html">分类</a></li>
                    <li><a href="help.html">状态</a></li>
                </ol>
            </div>
            <div class="toc">
                <h3>联系我们</h3>
                <h4>By Phone</h4>
                <p>+1-123-333-4321</p>
                <h4>By Email</h4>
                <p><a href="#">hao@163.com</a></p>
                <h4>Address</h4>
                <address>
<br>
Apt 314<br>
San Jose, CA 95101
</address>
                <div>
                    <button class="btn"><i class="icon-facebook"></i></button>
                    <button class="btn"><i class="icon-twitter"></i></button>
                    <button class="btn"><i class="icon-linkedin"></i></button>
                </div>
            </div>
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