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
            
            <h1 class="page-title">系统仪表盘</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">帮助</a> <span class="divider">/</span></li>
            <li class="active">help center</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
         如果您有疑问，请认真阅读用户帮助.
    </div>

<div class="faq-content">
    <h2>热门问题</h2>
    <ol>
        <li><a href="#q1">What if I have a question?</a></li>
        <li><a href="#q2">Where can I get support?</a></li>
        <li><a href="#q3">How long does it take to fix a problem?</a></li>
        <li><a href="#q4">Who can help me out?</a></li>
        <li><a href="#q5">Where are you located?</a></li>
    </ol>

    <h2>客户服务</h2>
    <ol>
        <li><a href="#q11">How much does it cost?</a></li>
        <li><a href="#q12">Am I billed monthly or yearly?</a></li>
        <li><a href="#q13">What level of service do you have?</a></li>
        <li><a href="#q14">How do you secure your data?</a></li>
        <li><a href="#q15">Who can I contact for advertising?</a></li>
        <li><a href="#q16">Can I install custom fonts?</a></li>
        <li><a href="#q17">When does my service end?</a></li>
        <li><a href="#q18">Where can I find a custom design?</a></li>
    </ol>

    <hr>

    <h2>疑难解答</h2>

    <a href="#" style="float: right; line-height: 1.25em; display: inline-block; padding: .75em 0em;"><i class="icon-circle-arrow-up"></i> Top</a>
    <h3 id="q15">Who can I contact for advertising?</h3>
    <p>Sweet pepper quandong cucumber caulie eggplant water spinach. Azuki bean lentil aubergine sweet pepper komatsuna brussels sprout soybean tomato spring onion. Zucchini squash potato fennel bunya nuts broccoli rabe swiss chard. Brussels sprout gourd onion komatsuna fava bean mung bean earthnut pea seakale chard asparagus tomato scallion catsear.</p>
    <a href="#" style="float: right; line-height: 1.25em; display: inline-block; padding: .75em 0em;"><i class="icon-circle-arrow-up"></i> Top</a>
    <h3 id="q16">Can I install custom fonts?</h3>
    <p>Salsify ricebean yarrow broccoli tomato mustard rock melon carrot garlic chicory spring onion prairie turnip azuki bean peanut gumbo welsh onion squash burdock. Fava bean black-eyed pea water chestnut celery soybean cress nori. Desert raisin horseradish carrot black-eyed pea spinach soybean silver beet.</p>
    <a href="#" style="float: right; line-height: 1.25em; display: inline-block; padding: .75em 0em;"><i class="icon-circle-arrow-up"></i> Top</a>
    <h3 id="q17">When does my service end?</h3>
    <p>Onion cabbage quandong seakale welsh onion mung bean pea sprouts scallion tatsoi bush tomato napa cabbage ricebean coriander parsnip beet greens chicory. Pea chard wattle seed black-eyed pea parsnip asparagus burdock chickweed jícama tomatillo radicchio plantain carrot tatsoi nori sorrel yarrow. Peanut avocado parsley celtuce salad jícama. Garbanzo winter purslane salsify bunya nuts kale onion. Squash kombu artichoke soko swiss chard water spinach.</p>
    <a href="#" style="float: right; line-height: 1.25em; display: inline-block; padding: .75em 0em;"><i class="icon-circle-arrow-up"></i> Top</a>
    <h3 id="q18">Where can I find a custom design?</h3>
    <p>Parsnip napa cabbage wakame sorrel lentil silver beet tatsoi bitterleaf pea sprouts zucchini bush tomato gumbo. Fennel desert raisin grape amaranth soko earthnut pea corn plantain celtuce taro komatsuna bunya nuts. Desert raisin tigernut komatsuna tomato bok choy gram plantain black-eyed pea potato chard parsnip beet greens lentil.</p>
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