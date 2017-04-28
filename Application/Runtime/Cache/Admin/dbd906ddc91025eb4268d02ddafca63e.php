<?php if (!defined('THINK_PATH')) exit();?><!--包含头部模版header-->
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
    



<script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>



<div class="content">
        
        <div class="header">
            
            <h1 class="page-title">App管理</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li class="active">App list</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
            

            <div class="btn-toolbar pull-left" style="margin-left: 20px;margin-top: 16px;">
                <a class="btn btn-primary" href="<?php echo U('App/add')?>"><i class="icon-plus"></i> &nbsp;新增 </a>
                <a class="btn btn-warning"><i class="icon-minus"></i>  &nbsp;删除 </a>
                <a class="btn btn-info"><i class="icon-edit"></i> &nbsp;修改 </a>
              <div class="btn-group">
              </div>
            </div>

              <div class="search-well pull-right" style="margin-right: 100px;margin-top: 6px;">
                  <form class="form-inline" method="post" action="<?php echo U('App/search')?>" id="sear">
                      <input class="input-xlarge" placeholder="输入您想查找的App..." id="search" name="search" type="text">
                      <button class="btn" type="button" onclick="document.getElementById('sear').submit()"><i class="icon-search"></i> 搜索</button>
                  </form>
              </div>

<div class="well">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>应用ID</th>
          <th>分类</th>
          <?php if($isAdmin): ?><th>开发者</th><?php endif; ?>
          <th>应用名</th>
          <th>内部名</th>
          <th>目前版本</th>
          <th>状态</th>
          <th style="width: 36px;">操作</th>
        </tr>
      </thead>
      <tbody>
      <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
              <td><input type="checkbox" name="" value=""></input></td>
              <td><a href="<?php echo U('App/detail',array('AppID'=>$vo['AppID']))?>"> <?php echo ($vo["AppID"]); ?></a></td>
              <td><?php echo ($vo["CategoryID"]); ?></td>
              <?php if($isAdmin): ?><td><?php echo ($vo["Username"]); ?></td><?php endif; ?>
              <td><?php echo ($vo["AppName"]); ?></td>
              <td><?php echo ($vo["SymbolName"]); ?></td>
              <td><?php echo ($vo["VersionID"]); ?></td>
              <td><?php echo ($vo["AppStatus"]); ?></td>
              <td>
                  <a href="<?php echo U('App/modify',array('AppID'=>$vo['AppID']))?>"><i class="icon-pencil"></i></a>
                  <a href="#myModal" id="test" role="button" data-toggle="modal" data-AppID="<?php echo ($vo['AppID']); ?>" onClick="$('#DeleteBtn').data('appid',$(this).data('appid'));"><i class="icon-remove"></i></a>
              </td>
            </tr>
          <script>
              function jump(pn){
                  location.href = "<?php echo U('App/delete')?>?AppID="+pn+"";//location.href实现客户端页面的跳转
              }
          </script><?php endforeach; endif; else: echo "" ;endif; ?>

      </tbody>
    </table>
</div>
                <div class="pagination">
                    <ul style="width: 100%;">
                        　　<?php echo ($page); ?>
                    </ul>
                </div>

                <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel">删除警告</h3>
                    </div>
                    <div class="modal-body">
                        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>您确认要删除该应用</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        <a class="btn btn-danger" id="DeleteBtn" onclick="jump($(this).data('appid'))" data-dismiss="modal">Delete</a>
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