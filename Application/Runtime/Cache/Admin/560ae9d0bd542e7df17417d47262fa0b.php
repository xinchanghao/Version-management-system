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
            <li class="active">App add</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button class="btn btn-primary" onclick="javascript:document.getElementById('appinfo').submit();"><i class="icon-save"></i> 提交</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">应用信息</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <form id="appinfo" method="post" action="<?php echo U('App/add')?>" enctype="multipart/form-data">
        <label>应用名</label>
        <input type="text" value="" name="AppName" class="input-xlarge">
        <label>内部名</label>
        <input type="text" value="" name="SymbolName" class="input-xlarge">

        <label>类目</label>
        <select name="CategoryID" id="categoryid" class="input-xlarge">
          <option value="12.0" selected="selected">聊天</option>
          <option value="11.0">视频</option>
          <option value="10.0">浏览器</option>
          <option value="9.0">游戏</option>
          <option value="8.0">音乐</option>
          <option value="7.0">图像</option>
          <option value="6.0">办公</option>
          <option value="5.0">插件</option>
          <option value="4.0">编程</option>
          <option value="13">输入法</option>
          <option value="3.0">安全杀毒</option>
          <option value="2.0">系统工具</option>
          <option value="1.0">其他</option>
        </select>
        <hr>
        <label>图标</label>
        <input type="file" value="" name="Pic" class="input-xlarge">
        <hr>
        <label>状态</label>
        <cite><input name="AppStatus" style="margin: 0 0" id="AppStatus" type="radio" value="1"/>&nbsp;正常&nbsp;&nbsp;&nbsp;&nbsp;<input name="AppStatus" style="margin: 0 0" type="radio" value="0" />&nbsp;未审核&nbsp;&nbsp;&nbsp;&nbsp;<input name="AppStatus" style="margin: 0 0" type="radio" value="2" />&nbsp;下架</cite>
        <hr>
         <label>详情</label>
        <textarea name="AppDetail" value="" rows="3" class="input-xlarge"></textarea>
    </form>
      </div>
  </div>

</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Confirmation</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger" data-dismiss="modal">Delete</button>
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