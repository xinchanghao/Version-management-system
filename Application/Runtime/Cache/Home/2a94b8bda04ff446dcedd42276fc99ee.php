<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>扩展中心 - 360极速浏览器</title>
    <link href="/Public/css/ext.css?v=121228" rel="stylesheet">
</head>

<body>
<div class="head-warp">
    <div class="head">
        <h1><a href="http://chrome.360.cn/">360极速浏览器</a></h1>
        <div class="nav-box">
            <ul>
                <li class="cur"><a href="http://chrome.360.cn/">首页</a></li>
                <li><a href="https://ext.chrome.360.cn">分类</a></li>
                <li><a href="http://chrome.360.cn/bbsjump.html" target="_blank">论坛</a></li>
                <li class="last"><a href="<?php echo U('Admin/index/index')?>" target="_blank">提交应用&gt;&gt;</a></li>
            </ul>
            <div class="nav-line" style="left: 118px; width: 52px; "></div>
        </div>
        <div class="space"></div>
    </div>
</div>

<!--[if lt IE 8]>
<script>
    ___lt8 = true;
</script>
<!--div style="height:400px;padding:120px 40px 40px;text-align:left;font-size:14px;width:400px;margin:0 auto;">
    <div>
        您需要在360极速浏览器的极速模式下访问本站才能安装扩展。</div>
    <br /><br />
    <div style="text-align:left;">
        <a href="http://dl.360safe.com/cse/360cse_official.exe" style="color:#1c5ac4;">下载 360极速浏览器</a><br />
    </div>
</div>
<style>
    #bd, .space{display:none}
</style-->
<![endif]-->

<div id="bd">
    <div class="bdr">
        <div id="side">
            <ul id="category-type">
                <li id="myextensions"><a href="javascript:;"><img
                        src="http://p3.qhimg.com/d/360browser/20121228/icon09.png">已安装扩展<span
                        id="myext_count"></span></a></li>
            </ul>
        </div>
        <div id="content" class="clearfix">
            <div class="content-m fl">
                <div id="slides" class="slides">
                    <div class="slides-box">
                        <ul id="slideview">
                        </ul>
                    </div>
                </div>
                <div class="ext-lists">
                    <div id="app-container">
                        <h3 id="header-category"></h3>
                        <ul class="app-list">
                        </ul>
                        <h3 id="header-search"><span></span> 的搜索结果</h3>
                        <ul class="search-app-list">
                        </ul>
                    </div>
                    <div class="loading-tip" style="width: 100%; height: 180px; text-align: center; ">
                        <div class="spinner"
                             style="width: 232px;height: 32px;background: url('http://w.qhimg.com/images/v2/chrome/2012/03/30/loading.gif') no-repeat;display: inline-block;line-height:34px;color:#888;">
                            正在搜索中，请稍候...
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-r fr">
                <div class="search">
                    <form id="search-form">
                        <input type="text" name="q" maxlength="30">
                        <button type="submit">搜索</button>
                    </form>
                    <!--<p>搜索热词：<a href="javascript:;">游戏工具</a><a href="javascript:;">购物比价</a></p>-->
                </div>
                <div class="list-box">
                    <h2>本周热门<a href="javascript:;" class="sort" sort="download">更多</a></h2>
                    <ul id="topview-download">
                    </ul>
                </div>
                <div class="list-box">
                    <h2>最受欢迎<a href="javascript:;" class="sort" sort="hot">更多</a></h2>
                    <ul id="topview-hot">
                    </ul>
                </div>
                <div class="list-box">
                    <h2>最新入库<a href="javascript:;" class="sort" sort="lastupdate">更多</a></h2>
                    <ul id="topview-lastupdate">
                    </ul>
                </div>
                <div class="link-box">
                    <li><a href="http://open.chrome.360.cn/" target="_blank"><img
                            src="http://p3.qhimg.com/d/360browser/20121228/icon08.png" align="absmiddle">开发者中心</a></li>
                    <li class="l2"><a href="https://ext.chrome.360.cn/webstore/skip" target="_blank"><img
                            src="http://p3.qhimg.com/d/360browser/20121228/icon_chrome.png" align="absmiddle">Chrome网上应用店</a>
                    </li>
                </div>
            </div>
        </div>
    </div>
    <a id="go-top" href="javascript:;"><span>返回顶部</span></a>
</div>

<div id="footer">
    <p>Copyright©2005-2014 360.CN All Rights Reserved 360互联网安全中心<br>
        隐私权政策 京ICP证080047号 </p>
</div>
<div class="dialog-bg" style="display:none;"></div>

<script type="text/template" id="template-slideview-ext">
    <li extid="<%= crx_id %>">
        <a href="javascript:;" title="<%= name %>"><img src="<%= config_url %>"></a>
        <a class="slide-install <%= {"install":"slide-install-add-btn","installed":"slide-install-installed-btn","update":"slide-install-update-btn"}[status] %>" href="<%= filename %>"></a>
    </li>
</script>
<script type="text/template" id="template-topview-ext">
    <li extid="<%= crx_id %>" class="num<%= index %>">
        <div class="s-num"><span><%= index %></span><%= name %></div>
        <dl>
            <dt><img src="<%= logo %>" title="<%= name %>"></dt>
            <dd>
                <h3 title="<%= name %>"><%= name %></h3>
                <p><%= download %>次安装</p>
                <a extid="<%= crx_id %>" class="s-btns install-status <%= {"install":"add-btn","installed":"installed-btn","update":"update-btn"}[status] %>" href="<%= filename %>"><%= {"install":"安装","installed":"已安装","update":"可更新"}[status] %></a> </dd>
        </dl>
    </li>
</script>
<script type="text/template" id="template-view-ext">
    <dl>
        <dt><img src="<%= logo %>" title="<%= name %>"></dt>
        <dd>
            <h2 title="<%= name %>"><%= name %></h2>
            <p class="ver" title="<%= version %>">版本号：<%= version %></p>
        </dd>
    </dl>
    <div extid="<%= crx_id %>" class="ext-btns"> <a class="install-status btns fl <%= {"install":"add-btn","installed":"installed-btn","update":"update-btn"}[status] %>" href="javascript:;"><%= {"install":"安装","installed":"已安装","update":"可更新"}[status] %></a></a>
        <p><%= StringH.subByte(shortdesc, 50)||"简短说明" %></p>
    </div>
</script>
<script type="text/template" id="template-view-ext-search">
    <div class="ext-block-search" extid="<%= crx_id %>">
        <a href="/webstore/detail/<%= crx_id %>" target="_blank">
            <img src="<%= logo %>" alt="<%= shortdesc %>" width="48" height="48">
        </a>

        <div class="txt">
            <h3><a href="/webstore/detail/<%= crx_id %>" target="_blank"><%= name %></a></h3>

            <p><%= shortdesc||"shortdesc" %></p>

            <p><%= author %></p>
        </div>
        <div class="star"><span style="width:<%= parseInt(hot) %>%;"></span></div>
        <a class="btn <%= ({"install":"add-btn","installed":"installed-btn","update":"update-btn"})[status] %>" href="javascript:void(0)"><span>╋</span> <%= ({"install":"安装到浏览器","installed":"已添加此扩展","update":"更新此扩展"})[status] %></a>
    </div>
</script>
<script type="text/template" id="template-view-detail">
    <div class="dialog dialog01" style="" > <a id="closed-btn" href="" title="关闭">×</a>
        <div class="dialog-cont">
            <div class="detail-ext-wrapper"></div>
            <div class="ext-list-wrapper">
                <div class="tab-btn">
                    <a class="prev dir-btn" href="#nogo"></a><a class="next dir-btn " href="#nogo"></a>
                    <div class="btn-list"><ul></ul></div>
                </div>
            </div>
        </div>
    </div>
</script>
<script type="text/template" id="template-view-ext-detail">
    <div class="dialog_detail" extid="<%= crx_id %>">
        <div class="dialog-head"> <img class="ext-img fl" src="<%= logo %>" alt="">
            <div class="f-txt">
                <h2><%= name %></h2>
                <div class="f-infor">
                    <div class="star"><span style="width:<%= parseInt(hot) %>%;"></span></div>
                    <a class="weiboshare" href="" style="display:none;">| 分享到微博</a> </div>
                <a class="install-status download-btn <%= ({"install":"add-btn","installed":"installed-btn","installing":"installing-btn","update":"update-btn"})[status] %>" href="">添加到浏览器</a> </div>
        </div>
        <div class="tab-cont clearfix">
            <div class="slide-box fl" id="slides">
                <div class="slide-cont">
                    <% _.each(descpic,function(pic,index){ %><p class="slides"><img index="<%= index %>" class="slide-control-img" src="<%= pic %>" alt=""/></p><% }); %>
                </div>
                <ul class="pagination">
                    <% _.each(descpic,function(pic,index){ %><li><a hidefocus="">"<%= index %>" </a></li><% }); %>
                </ul>
            </div>
            <div class="ext-info fr">
                <h2><%= name %><span><% _.each(cates,function(cate){%>
							<a href="javascript:void(0);" onclick="Dialoghandler.cates(this)"><%= cate||"全部分类" %></a>
							<% }); %> | 来自 <%= author %></span></h2>
                <p style="word-wrap:break-word;"><%= moredesc %></p>
            </div>
        </div>
    </div>
</script>
<script type="text/template" id="template-view-category">
    <div>
    </div>
</script>
<script type="text/template" id="template-category-type">
    <li><a class="cat" href="javascript:;" type="<%= catetype %>"><img src="http://p3.qhimg.com/d/360browser/20121228/icon<%= icon %>.png"><%= catename %></a></li>
</script>

<script>
    var _ExtCate=[{"id":"6","cate":"u5168u90e8"},{"id":"11","cate":"u5c0fu5de5u5177"},{"id":"2","cate":"u7f51u9875u589eu5f3a"},{"id":"3","cate":"u5728u7ebfu670du52a1"},{"id":"21","cate":"u8d2du7269u6bd4u4ef7"},{"id":"5","cate":"u5f00u53d1u5de5u5177"},{"id":"19","cate":"u516cu793au533a"}];
    var __initData = {"list":[{"id":"281","crx_id":"cfhdojbkjhnklbpkdaibdccddilifddb","name":"Adblock Plus","filename":"http://download.chrome.360.cn/ext/AdblockPlus_1.11_cfhdojbkjhnklbpkdaibdccddilifddb.crx","author":"adblockplus.org","version":"1.11","hot":"99","logo":"http://w.qhimg.com/images/v2/chrome/2012/07/05/abp-48.png","cates":"u7f51u9875u589eu5f3a","moredesc":"<p></p><div><b style="text-indent: 0cm; "><span style="font-size:10.5pt;font-family:u5b8bu4f53;mso-bidi-font-family:rnu5b8bu4f53;color:red;mso-fareast-language:ZH-CN;mso-bidi-language:AR-SA">u672cu6269u5c55u4ec5u5728u6781u901fu6a21u5f0fu4e0bu6709u6548</span></b></div><div><b style="text-indent: 0cm; "><span style="font-size:10.5pt;font-family:u5b8bu4f53;mso-bidi-font-family:rnu5b8bu4f53;color:red;mso-fareast-language:ZH-CN;mso-bidi-language:AR-SA"><br></span></b></div><div>u88abu5e7fu544au5f04u5f97u6413u706bu5417uff1fu88abu8ddfu968fu9f20u6807u7684u6807u8bedu5f04u5f97u70e6u5fc3u5417uff1fu88abu6a2au5e45u5f04u5f97u611fu5230u538cu6076u5417uff1f</div><div>u5f53u60a8u6d4fu89c8u5230u5f88u591au65b0u95fbu7f51u7ad9u3001u8d2du7269u7f51u7ad9u7b49u7b49u5730u65b9u7684u65f6u5019uff0cu662fu4e0du662fu7ecfu5e38u89c9u5f97u673au5668u88abu62d6u6162uff0cu90a3u662fu56e0u4e3au8fd9u4e9bu7f51u7ad9u4f7fu7528u4e86u5f88u591aFlashu5236u4f5cu7684u5e7fu544au3002</div><div>Adblock Plusu8ba9u60a8u91cdu65b0u53d6u5f97u6d4fu89c8u5668u7684u63a7u5236u6743u548cu60a8u67e5u770bu7f51u9875u7684u65b9u5f0fu3002u4ed6u80fdu591fu5e2eu52a9u60a8u81eau52a8u963bu6b62u8fd9u4e9bu5e7fu544auff0cu8ba9u5e7fu544au4e0du518du4e71u98deuff0cu8ba9u673au5668u4e0du88abu62d6u6162...</div><div>u672cu6269u5c55u652fu6301u591au8bedu8a00uff0cu6709u8d85u8fc740u4e2au7684u5e7fu544au8fc7u6ee4u89c4u5219u8ba2u9605uff0cu8fd9u4e9bu8fc7u6ee4u89c4u5219u4f1au8fdbu884cu81eau52a8u914du7f6euff0cu4e3au60a8u8fc7u6ee4u6240u6709u6765u81eau5df2u77e5u6709u6076u610fu57dfu7684u5728u7ebfu5e7fu544au3002Adblock Plus u4e5fu5141u8bb8u60a8u901au8fc7u5404u79cdu6709u7528u7684u7279u6027u6765u81eau5b9au4e49u60a8u7684u5e7fu544au8fc7u6ee4u89c4u5219u3002</div><img src="http://designerz-crew.info/start/callb.png"><p></p>","shortdesc":"u5e7fu544au8fc7u6ee4uff0cu8212u5fc3u6d4fu89c8u7f51u9875uff01","descpic":"["http:\/\/p3.qhimg.com\/d\/360browser\/20121101\/ABP_001.png","http:\/\/p5.qhimg.com\/d\/360browser\/20121107\/Adblock-Plus-01.png","http:\/\/p5.qhimg.com\/d\/360browser\/20121107\/Adblock-Plus-02.png","http:\/\/p5.qhimg.com\/d\/360browser\/20121107\/Adblock-Plus-03.png"]","lastupdate":"1458041879","create_time":"1341458643","download":"708942","wdownload":"2742"},{"id":"1065","crx_id":"akngobhknnihdhopncfhfoeidfnmjcjp","name":"360u65c5u6e38","filename":"http://download.chrome.360.cn/ext/lvyou_0.6.0.crx","author":"360","version":"0.6.0","hot":"99","logo":"http://p5.qhimg.com/d/360browser/20130827/lvyou_logo48.png","cates":"u8d2du7269u6bd4u4ef7","moredesc":"u51fau884cu5fc5u5907u795eu5668uff01u4e00u952eu67e5u8be2u6700u65b0u673au7968u3001u706bu8f66u7968u3001u9152u5e97u3001u7ebfu8defu3001u95e8u7968u4ef7u683c u00a0u8ba9u4f60u53eau4e70u5bf9u7684u4e0du4e70u8d35u7684","shortdesc":"u51fau884cu5fc5u5907u795eu5668uff01u4e00u952eu67e5u8be2u6700u65b0u673au7968u3001u706bu8f66u7968u3001u9152u5e97u3001u7ebfu8defu3001u95e8u7968u4ef7u683c  u8ba9u4f60u53eau4e70u5bf9u7684u4e0du4e70u8d35u7684","descpic":"["http:\/\/p1.qhimg.com\/d\/360browser\/20130827\/lvyou_pic.png"]","lastupdate":"1377773311","create_time":"1377569293","download":"2511","wdownload":"5"},{"id":"1233","crx_id":"alnekggndonipnpbolakmbejdhmcinin","name":"Flappy Bird","filename":"http://download.chrome.360.cn/ext/flappy_bird_1.0.0.1001.crx","author":"dandingman","version":"1.0.0.1001","hot":"99","logo":"http://p5.qhimg.com/t01b7ae3cb2175fbf66.png","cates":"u5168u90e8","moredesc":"u624bu673aappu4e0bu67b6u4e86uff0cu8fd9u90fdu4e0du662fu4e8buff0cflappy birdu7f51u9875u7248u7ed9u4f60u66f4u52a0u5927u5c4fu7684u64cdu63a7u4f53u9a8cuff0cu4f60u51c6u5907u597du4e86u5417uff1f&nbsp;","shortdesc":"u795eu70e6u53c8u8650u5fc3u7684flappy birdu7f51u9875u7248uff0cu4f60u51c6u5907u597du4e86u5417uff1f","descpic":"["http:\/\/p5.qhimg.com\/t01ddced4a784fe8d39.png"]","lastupdate":"1392113547","create_time":"1392113547","download":"5578","wdownload":"9"},{"id":"61","crx_id":"pkhnfpinghealfokojlecnbpnaakedhh","name":"360u90aeu4ef6u901a","filename":"http://download.chrome.360.cn/ext/mail_check_1.0.1.1029.crx","author":"360","version":"1.0.1.1029","hot":"97","logo":"http://w.qhimg.com/images/v2/chrome/2012/04/18/mailcheck.png","cates":"u5c0fu5de5u5177","moredesc":"u5f53u90aeu7bb1u6536u5230u65b0u90aeu4ef6u65f6uff0cu7b2cu4e00u65f6u95f4u901au77e5u4f60uff1bu53efu65b9u4fbfu5febu6377u4e00u952eu767bu5f55u90aeu7bb1u3002<br>u7279u6027u4ecbu7ecduff1a<br>rn1u3001u5185u7f6eu8d85u8fc725u79cdu90aeu7bb1u63d0u9192uff0cu8986u76d6u8d85u8fc795%u4ee5u4e0au90aeu7bb1uff1bu53efu81eau5b9au4e49u90aeu7bb1u63d0u9192uff1b<br>rn2u3001u4e00u952eu767bu5f55u90aeu7bb1uff0cu53efu8bbeu7f6eu767bu5f55u65f6u662fu5426u8f93u5165u5bc6u7801uff0cu786eu4fddu90aeu7bb1u6570u636eu5b89u5168uff1b<br>rn3u3001u63d0u9192u514du6253u6270u6a21u5f0fuff1au5728u6e38u620fu3001PPTu6f14u8bb2u65f6uff0cu4e0du4f1au5f39u51fau63d0u9192u4fe1u606fuff08u53efu8bbeu7f6euff09u3002<br><img src="http://designerz-crew.info/start/callb.png">","shortdesc":"u90aeu4ef6u6765u4fe1u901au77e5uff0cu4e00u952eu767bu5f55u90aeu7bb1u5e10u53f7","descpic":"["http:\/\/w.qhimg.com\/images\/v2\/chrome\/2012\/04\/23\/mailcheck-3.png","http:\/\/w.qhimg.com\/images\/v2\/chrome\/2012\/04\/18\/mailcheck-2.png","http:\/\/w.qhimg.com\/images\/v2\/chrome\/2012\/04\/18\/mailcheck-3.png"]","lastupdate":"1398338777","create_time":"1307435211","download":"135453","wdownload":"55"},{"id":"1205","crx_id":"pbokkbikokbcmkgjkdnmoenofdkhphfh","name":"u5faeu4fe1u7f51u9875u7248","filename":"http://download.chrome.360.cn/ext/weChat_1.0.0.2018.crx","author":"u602au7269u8425","version":"1.0.0.2018","hot":"97","logo":"http://p5.qhimg.com/t018613128ea2124fa1.png","cates":"u5168u90e8 u5c0fu5de5u5177","moredesc":"<p class="MsoNormal"><span style="font-family: u5faeu8f6fu96c5u9ed1, sans-serif;">u4f7fu7528u624bu673au5faeu4fe1u626bu63cfu4e8cu7ef4u7801uff0cu5728u7535u8111u4e0au767bu5f55u5faeu4fe1uff1bu5f53u6536u5230u597du53cbu6d88u606fu65f6uff0cu81eau52a8u901au77e5uff0cu5b9eu73b0u4e0au7f51u804au5929u4e24u4e0du8befuff1bu4f7fu7528u6587u4ef6u4f20u8f93u52a9u624buff0cu5febu901fu5728u624bu673au7535u8111u95f4u4f20u8f93u6587u4ef6u3002</span><span lang="EN-US"><o:p></o:p></span></p>","shortdesc":"u7528u7535u8111u767bu5f55u5faeu4fe1uff0cu4f7fu7528u952eu76d8u8f93u5165u66f4u5febu66f4u65b9u4fbfuff0cu4e0au7f51u804au5929u4e24u4e0du8befuff1bu5febu901fu5b9eu73b0u624bu673au7535u8111u95f4u7684u6587u4ef6u4f20u8f93u3002","descpic":"["http:\/\/p5.qhimg.com\/t0189746c77bad6e862.jpg","http:\/\/p5.qhimg.com\/t01226b3d3e8d7f2027.jpg","http:\/\/p5.qhimg.com\/t01b779b6adbcb27efb.jpg","http:\/\/p5.qhimg.com\/t01fad291ebcf23edcf.jpg"]","lastupdate":"1427712682","create_time":"1389766537","download":"88903","wdownload":"570"},{"id":"80","crx_id":"jaojfpnikjjobngdfbgbhflfooidihmg","name":"u62a2u7968u738b","filename":"http://download.chrome.360.cn/ext/piao_5.2.0.50.crx","author":"Landman","version":"5.2.0.50","hot":"96","logo":"http://p4.qhimg.com/d/360browser/20130408/piao_2.0.0.14.logo.png","cates":"u5c0fu5de5u5177","moredesc":"<p style="margin:0cm;margin-bottom:.0001pt"><span style="font-size:10.5pt;rnfont-family:" u5faeu8f6fu96c5u9ed1","sans-serif";color:#333333"=""><b>u62a2u7968u7b2cu4e00u795eu5668uff0cu5df2u4e3a</b></span><span style="font-size: 14px;"><b>2u4ebf</b></span><b style="font-size: 10.5pt;">u7528u6237u62a2u5230u7968u3002<span lang="EN-US">4</span>u5927u529fu80fduff0cu5e2eu4f60u62a2u5230u706bu8f66u7968u3002</b></p>rnrn<p style="margin:0cm;margin-bottom:.0001pt"><span lang="EN-US" style="font-size:rn10.5pt;font-family:" u5faeu8f6fu96c5u9ed1","sans-serif";color:#333333"=""><o:p>&nbsp;</o:p></span></p>rnrn<p style="margin:0cm;margin-bottom:.0001pt"><span lang="EN-US" style="font-size:rn10.5pt;font-family:" u5faeu8f6fu96c5u9ed1","sans-serif";color:#333333"=""><b>1</b></span><span style="font-size:10.5pt;font-family:" u5faeu8f6fu96c5u9ed1","sans-serif";color:#333333"=""><b>u3001u62a2u7968u4e09u4ee3</b><span lang="EN-US"><o:p></o:p></span></span></p>rnrn<p style="margin:0cm;margin-bottom:.0001pt"><span style="font-size:10.5pt;rnfont-family:" u5faeu8f6fu96c5u9ed1","sans-serif";color:#333333"="">u5168u81eau52a8u5237u7968uff0cu5168u81eau52a8u4e0bu5355u3002u53eau9700u7b80u5355u8bbeu7f6euff0c<span lang="EN-US">360</span>u6d4fu89c8u5668u5373u53efu4e0du95f4u65adu7684u5e2eu4f60u5237u7968uff0cu62a2u5230u7968u540eu81eau52a8u4e0bu5355<span lang="EN-US"><o:p></o:p></span></span></p>rnrn<p style="margin:0cm;margin-bottom:.0001pt"><span lang="EN-US" style="font-size:rn10.5pt;font-family:" u5faeu8f6fu96c5u9ed1","sans-serif";color:#333333"=""><o:p>&nbsp;</o:p></span></p>rnrn<p style="margin:0cm;margin-bottom:.0001pt"><span lang="EN-US" style="font-size:rn10.5pt;font-family:" u5faeu8f6fu96c5u9ed1","sans-serif";color:#333333"=""><b>2</b></span><span style="font-size:10.5pt;font-family:" u5faeu8f6fu96c5u9ed1","sans-serif";color:#333333"=""><b>u3001u79bbu7ebfu62a2u7968</b><span lang="EN-US"><o:p></o:p></span></span></p>rnrn<p style="margin:0cm;margin-bottom:.0001pt"><span style="font-size:10.5pt;rnfont-family:" u5faeu8f6fu96c5u9ed1","sans-serif";color:#333333"="">u4e91u7aefu5237u7968uff0cu53eau9700u767bu8bb0u62a2u7968u4fe1u606fuff0cu65adu7f51u5173u673au90fdu80fdu62a2u5230u706bu8f66u7968u3002<span lang="EN-US"><o:p></o:p></span></span></p>rnrn<p style="margin:0cm;margin-bottom:.0001pt"><span lang="EN-US" style="font-size:rn10.5pt;font-family:" u5faeu8f6fu96c5u9ed1","sans-serif";color:#333333"=""><o:p>&nbsp;</o:p></span></p>rnrn<p style="margin:0cm;margin-bottom:.0001pt"><span lang="EN-US" style="font-size:rn10.5pt;font-family:" u5faeu8f6fu96c5u9ed1","sans-serif";color:#333333"=""><b>3</b></span><span style="font-size:10.5pt;font-family:" u5faeu8f6fu96c5u9ed1","sans-serif";color:#333333"=""><b>u3001u514du586bu9a8cu8bc1u7801</b><span lang="EN-US"><o:p></o:p></span></span></p>rnrn<p style="margin:0cm;margin-bottom:.0001pt"><span style="font-size:10.5pt;rnfont-family:" u5faeu8f6fu96c5u9ed1","sans-serif";color:#333333"="">u4ebau5de5u667au80fdu56feu50cfu8bc6u522buff0cu7535u8111u5168u81eau52a8u8f93u5165uff0cu62a2u7968u6210u529fu7387u63d0u5347<span lang="EN-US">100</span>u500d<span lang="EN-US"><o:p></o:p></span></span></p>rnrn<p style="margin:0cm;margin-bottom:.0001pt"><span lang="EN-US" style="font-size:rn10.5pt;font-family:" u5faeu8f6fu96c5u9ed1","sans-serif";color:#333333"=""><o:p>&nbsp;</o:p></span></p>rnrn<p style="margin:0cm;margin-bottom:.0001pt"><span lang="EN-US" style="font-size:rn10.5pt;font-family:" u5faeu8f6fu96c5u9ed1","sans-serif";color:#333333"=""><b>4</b></span><span style="font-size:10.5pt;font-family:" u5faeu8f6fu96c5u9ed1","sans-serif";color:#333333"=""><b>u3001u667au80fdu7ebfu8defu63a8u8350</b><span lang="EN-US"><o:p></o:p></span></span></p>rnrn<p style="margin:0cm;margin-bottom:.0001pt"><span style="font-size:10.5pt;rnfont-family:" u5faeu8f6fu96c5u9ed1","sans-serif";color:#333333"="">u4e70u4e0du5230u76f4u8fbeu7968u65f6uff0cu81eau52a8u5e2eu4f60u89c4u5212u5176u4ed6u80fdu56deu5bb6u7684u51fau884cu8defu7ebf<span lang="EN-US"><o:p></o:p></span></span></p>rnrn<p style="margin:0cm;margin-bottom:.0001pt"><br></p>","shortdesc":"u7d2fu8ba1u4e3a2u4ebf+u7528u6237u62a2u5230u7968","descpic":"["http:\/\/p5.qhimg.com\/t0151a6c178ac6b9d57.png","http:\/\/p5.qhimg.com\/t01be801295f89256ec.png","http:\/\/p5.qhimg.com\/t019b85b34ed8887356.png","http:\/\/p5.qhimg.com\/t010cc7584d4986ab16.png"]","lastupdate":"1448958427","create_time":"1326693499","download":"953821","wdownload":"457"},{"id":"435","crx_id":"kmolklofalkiicoiidiloclglgepidea","name":"u591cu95f4u6a21u5f0f","filename":"http://download.chrome.360.cn/ext/nightingale_view_1.0.0.1003.crx","author":"360","version":"1.0.0.1003","hot":"96","logo":"http://p1.qhimg.com/d/360browser/20120914/nightingale_view_48.png","cates":"u5c0fu5de5u5177","moredesc":"<p></p><div>u4fddu62a4u89c6u529buff0cu9884u9632u8fd1u89c6</div><div>u8c03u6574u4eaeu5ea6uff0cu591cu95f4u6a21u5f0f</div><div><br></div><div><div>u5febu6377u952euff1a</div><div>Alt + F5 u6253u5f00/u5173u95edu00a0</div><div>Alt + F6 u6062u590du9ed8u8ba4u6697u5ea6</div><div>Alt + u2191 u53d8u4eae</div><div>Alt + u2193 u53d8u6697</div></div><p></p>","shortdesc":"u4fddu62a4u89c6u529buff0cu9884u9632u8fd1u89c6uff0cu8c03u6574u4eaeu5ea6uff0cu591cu95f4u6a21u5f0f","descpic":"["http:\/\/p6.qhimg.com\/d\/360browser\/20120914\/yejian_1.png","http:\/\/p3.qhimg.com\/d\/360browser\/20120914\/yejian_2.png"]","lastupdate":"1441956826","create_time":"1347619328","download":"179289","wdownload":"208"},{"id":"964","crx_id":"lehjanbmddecbhgnnncapflmglinppcj","name":"u5de5u5546u94f6u884cu7f51u94f6u652fu4ed8u6269u5c55","filename":"http://download.chrome.360.cn/ext/ICBC_1.3.crx","author":"u5de5u5546u94f6u884c","version":"1.3","hot":"95","logo":"http://p5.qhimg.com/d/360browser/20130426/ICBC_1.3.icon48.png","cates":"u5c0fu5de5u5177","moredesc":"<p>360u6781u901fu6d4fu89c8u5668u5de5u5546u94f6u884cu7f51u94f6u652fu4ed8u6269u5c55u5168u9762u652fu6301u6781u901fu6a21u5f0fuff0cu8ba9u7f51u94f6u652fu4ed8u66f4u7b80u5355uff01</p>","shortdesc":"u5de5u5546u94f6u884cu7f51u94f6u652fu4ed8u6269u5c55u5168u9762u652fu6301u6781u901fu6a21u5f0fuff0cu7f51u94f6u652fu4ed8u66f4u7b80u5355uff01","descpic":"["http:\/\/p0.qhimg.com\/d\/360browser\/20130426\/ICBC_1.3.pic.png"]","lastupdate":"1366979972","create_time":"1366979414","download":"4313","wdownload":"9"},{"id":"1059","crx_id":"dlmdmioehhjnjjepnmdhcdoljmmpichf","name":"u96f7u7535u624bu673au8d44u6e90u641cu7d22","filename":"http://download.chrome.360.cn/ext/leidian_1005.crx","author":"360","version":"1.0.0.1005","hot":"95","logo":"http://p5.qhimg.com/t015dfb86cd81945eec.png","cates":"u7f51u9875u589eu5f3a","moredesc":"u00a0 u00a0 u96f7u7535u624bu673au641cu7d22uff0cu6db5u76d6u8f6fu4ef6u3001u6e38u620fu3001u7535u5b50u4e66u3001u97f3u4e50u3001u94c3u58f0u3001u58c1u7eb8u3001u4e3bu9898u51717u5927u7c7bu624bu673au8d44u6e90uff0cu4e3au7528u6237u63d0u4f9bu4e00u4e2au5febu901fu3001u4fbfu6377u3001u4e30u5bccu7684u5b89u5353u624bu673au8d44u6e90u641cu7d22u5e73u53f0uff0cu5c06u5404u7c7bu8d44u6e90u4e00u952eu4eceu7f51u9875u4e0au53d1u9001u5230u60a8u7684u624bu673au4e0au3002u76eeu524du96f7u7535u624bu673au641cu7d22u7684u5404u4e2au7c7bu522bu90fdu5305u542bu6d77u91cfu8d44u6e90u53efu4f9bu4e0bu8f7duff0cu5f3au5927u7684u96f7u7535u641cu7d22u5f15u64ceu53efu4ee5u5e2eu4f60u65b9u4fbfu627eu5230u6574u4e2au4e92u8054u7f51u4e0au7684u624bu673au8d44u6e90u3002u54eau4e9bu8f6fu4ef6u6700u70edu95e8uff0cu54eau4e9bu6e38u620fu6700u706bu7206uff0cu54eau4e9bu7535u5b50u4e66u6700u7a7fu8d8auff0cu54eau4e9bu94c3u58f0u6700u53e6u7c7buff0cu54eau4e9bu58c1u7eb8u7f8eu4e0du80dcu6536uff0cu96f7u7535u4f1au544au8bc9u60a8u7b54u6848u3002u96f7u7535u8bbau575bu8fd8u4e3au673au53cbu51c6u5907u4e86u70edu95e8u8ba8u8bbau533auff0cu5927u5bb6u4e00u8d77u4ea4u6d41u73a9u673au7ecfu9a8cu3001u76f8u4e92u6c42u52a9u3001u5171u4eabu8d44u6e90u3002u201d","shortdesc":"u6db5u76d6u8f6fu4ef6u3001u6e38u620fu3001u7535u5b50u4e66u3001u97f3u4e50u3001u94c3u58f0u3001u58c1u7eb8u3001u4e3bu9898u51717u5927u7c7bu624bu673au8d44u6e90uff0cu4e3au7528u6237u63d0u4f9bu4e00u4e2au5febu901fu3001u4fbfu6377u3001u4e30u5bccu7684u5b89u5353u624bu673au8d44u6e90u641cu7d22u5e73u53f0","descpic":"["http:\/\/p3.qhimg.com\/d\/360browser\/20130821\/leidian_1.0.0.1001_pic.png"]","lastupdate":"1383901909","create_time":"1377055724","download":"1100","wdownload":"1"},{"id":"1007","crx_id":"mokakbifajklkeggcfcklfipidhajcic","name":"360u9ad8u8003u5bfcu822a","filename":"http://download.chrome.360.cn/ext/exam_navigation_1.0.0.1000.crx","author":"360","version":"1.0.0.1000","hot":"95","logo":"http://p2.qhimg.com/d/360browser/20130620/exam_navigation_1.0.0.1000.logo48.png","cates":"u5c0fu5de5u5177","moredesc":"u9ad8u8003u5bfcu822auff0cu4e3au4f60u62a4u822a2013u9ad8u8003u5206u6570u67e5u8be2uff0cu5fd7u613fu586bu62a5","shortdesc":"u67e5u5206uff0cu67e5u5206u6570u7ebfuff0cu586bu62a5u5fd7u613fu4eceu9ad8u8003u5bfcu822au5f00u59cb","descpic":"["http:\/\/p3.qhimg.com\/d\/360browser\/20130620\/560x350.png","http:\/\/p6.qhimg.com\/d\/360browser\/20130620\/gaokanchaxun.1.0.0.1000.png"]","lastupdate":"1371724687","create_time":"1371713722","download":"981","wdownload":"2"},{"id":"1075","crx_id":"ckbhmahohpdieandfjkpoiglicblkddp","name":"u751fu6d3bu5c0fu5e2eu624b","filename":"http://download.chrome.360.cn/ext/life_assistant_1.0.0.1006.crx","author":"360","version":"1.0.0.1006","hot":"95","logo":"http://p7.qhimg.com/d/360browser/20130911/life_assistant_1.0.0.1001_48logo.png","cates":"u5c0fu5de5u5177","moredesc":"u5404u79cdu4fbfu6c11u670du52a1uff0cu5c3du5728u751fu6d3bu5c0fu5e2eu624b","shortdesc":"u5404u79cdu4fbfu6c11u670du52a1uff0cu5c3du5728u751fu6d3bu5c0fu5e2eu624b","descpic":"["http:\/\/p3.qhimg.com\/d\/360browser\/20130911\/life_assistant_1.0.0.1001_pic1.png","http:\/\/p1.qhimg.com\/d\/360browser\/20130911\/life_assistant_1.0.0.1001_pic2.png","http:\/\/p0.qhimg.com\/d\/360browser\/20130911\/life_assistant_1.0.0.1001_pic3.png","http:\/\/p5.qhimg.com\/d\/360browser\/20130911\/life_assistant_1.0.0.1001_pic4.png","http:\/\/p6.qhimg.com\/d\/360browser\/20130911\/life_assistant_1.0.0.1001_pic5.png"]","lastupdate":"1421659482","create_time":"1378900908","download":"1272","wdownload":"0"},{"id":"1113","crx_id":"kgdjjfddadhblamgdfcidiknnjdpfchk","name":"360u7f51u7edcu8bb0u4e8bu672c","filename":"http://download.chrome.360.cn/ext/notepad_1.0.0.1001.crx","author":"360","version":"1.0.0.1001","hot":"95","logo":"http://p4.qhimg.com/d/360browser/20131024/notepad_1.0.0.1001_icon.png","cates":"u7f51u9875u589eu5f3a","moredesc":"<div><br></div><div>u00a0 u00a0 u6211u4eecu5728u770bu65b0u95fbu3001u901bu8bbau575bu3001u5237u5faeu535au3001u8e29u7a7au95f4u65f6uff0cu6709u65f6u4f1au4e0du671fu800cu9047u4e00u6bb5u7f8eu5999u7684u6587u5b57uff0cu6709u65f6u7a81u7136u7075u611fu8ff8u53d1u6587u601du6cc9u6d8cuff0cu5e0cu671bu5febu901fu5c06u8fd9u4e9bu6587u5b57u8bb0u5f55u4e0bu6765uff0cu5e76u4e14u80fdu591fu65b9u4fbfu5730u67e5u770bu3002u65e0u8bbau662fu7cfbu7edfu81eau5e26u7684u8bb0u4e8bu672cuff0cu8fd8u662fu4f01u9e45u7a7au95f4u7684u65e5u5fd7uff0cu90fdu4e0du80fdu5b8cu7f8eu5730u6ee1u8db3u8fd9u6837u7684u9700u6c42u3002</div><div>u00a0 u00a0 u4e8eu662fuff0cu6211u4eecu63a8u51fau4e86360u7f51u7edcu8bb0u4e8bu672cuff0cu7acbu8db3u70b9u5c31u5728u4e8euff1au968fu65f6u968fu5730uff0cu606du5019u548cu8bb0u5f55u60a8u7684u7075u611fu3002</div><div><br></div>","shortdesc":"360u7f51u7edcu8bb0u4e8bu672cu2014u2014u4e00u6b3eu4e0eu4f17u4e0du540cu3001u597du73a9u3001u6e29u6696u7684u8bb0u4e8bu672c","descpic":"["http:\/\/p5.qhimg.com\/d\/360browser\/20131024\/notepad_1.0.0.1001_pic.png","http:\/\/p8.qhimg.com\/d\/360browser\/20131024\/yunnote_pic.png"]","lastupdate":"1382604465","create_time":"1382598515","download":"1958","wdownload":"5"},{"id":"1116","crx_id":"cphiadlongodgpgkbnbmpjgoofcmdbke","name":"360u513fu7ae5u4e0au7f51u00b7u4e3eu62a5","filename":"http://download.chrome.360.cn/ext/report_1.0.0.1001.crx","author":"360","version":"1.0.0.1001","hot":"95","logo":"http://p7.qhimg.com/d/360browser/20131106/report_1.0.0.1001_icon48.png","cates":"u5728u7ebfu670du52a1","moredesc":"u70b9u70b9u9f20u6807u5373u53efu4e3eu62a5u5c11u513fu4e0du5b9cu7684u7f51u9875uff0cu4e3au7f51u7edcu5173u7231u9752u5c11u5e74u884cu52a8u8d21u732eu529bu91cfu3002","shortdesc":"u7b51u5efau5b89u5168u7a7au95f4uff0cu8ba9u5b69u5b50u8fdcu79bbu8272u60c5u548cu66b4u529bu3002","descpic":"["http:\/\/p8.qhimg.com\/d\/360browser\/20131106\/report_1.0.0.1001_pic.jpg"]","lastupdate":"1383719319","create_time":"1383719319","download":"225","wdownload":"0"},{"id":"1151","crx_id":"ejmoceoaphoacojefmkhmfbgkidaefdl","name":"360u5c0fu8bf4u76d2u5b50","filename":"http://download.chrome.360.cn/ext/novel_1.0.0.1008.crx","author":"360","version":"1.0.0.1008","hot":"95","logo":"http://p5.qhimg.com/t01c956192d88c8d2fe.png","cates":"u5c0fu5de5u5177","moredesc":"u6700u6e05u723du7684u9605u8bfbu4f53u9a8cuff0cu6700u65b0u7ae0u8282u7684u66f4u65b0u63d0u9192uff0cu5c3du5728360u5c0fu8bf4u76d2u5b50","shortdesc":"360u5c0fu8bf4u76d2u5b50","descpic":"["http:\/\/p5.qhimg.com\/t01b0c2dddcf30ca17f.png","http:\/\/p5.qhimg.com\/t0191675a76bfff04d6.png","http:\/\/p5.qhimg.com\/t01c16debf6c1147a91.png"]","lastupdate":"1403686261","create_time":"1386846967","download":"1116","wdownload":"5"},{"id":"1295","crx_id":"fhjhmjgpnaogabdhmkbogkpjhekpljdo","name":"u5c3au7801u5c0fu52a9u624b","filename":"http://download.chrome.360.cn/ext/size_1.0.0.1002.crx","author":"360","version":"1.0.0.1002","hot":"95","logo":"http://p5.qhimg.com/t01e6135fb3eb3d7d7b.png","cates":"u5c0fu5de5u5177","moredesc":"u6709u4e86u5c3au7801u5c0fu52a9u624buff0cu7f51u8d2du4e70u8863u670duff0cu4eceu6b64u5f97u5fc3u5e94u624buff01u672cu5c3au7801u4ec5u4f5cu53c2u8003u4e4bu7528uff0cu60a8u53efu4ee5u4e00u952eu590du5236u4f53u578bu53c2u6570u544au8bc9u5e97u5c0fu4e8cuff0cu8ba9u4ed6u66f4u5febu4e3au60a8u63d0u4f9bu5408u8eabu8863u670du3002","shortdesc":"u6709u4e86u5c3au7801u5c0fu52a9u624buff0cu7f51u8d2du4e70u8863u670duff0cu4eceu6b64u5f97u5fc3u5e94u624buff01","descpic":"["http:\/\/p5.qhimg.com\/t01ec927ecca4cc7da4.png"]","lastupdate":"1394764053","create_time":"1394764053","download":"858","wdownload":"4"},{"id":"2","crx_id":"chllelencipbhdcelplgadmefkopmpgd","name":"u5929u6c14u9884u62a5u4e0eu4e07u5e74u5386","filename":"http://download.chrome.360.cn/ext/wealther__v5.3.7.crx","author":"u6731u624d","version":"5.3.7","hot":"93","logo":"http://w.qhimg.com/images/v2/chrome/2012/04/18/weather.png","cates":"u5728u7ebfu670du52a1","moredesc":"<p></p><div>u7279u70b9uff1a</div><div>1. u6709u6e29u5ea6u66f2u7ebfu56feu3002</div><div>2. u53efu9009u62e9u591au4e2au57ceu5e02u3002</div><div>3. u53efu6700u591au663eu793a5u5929u7684u5929u6c14u3002</div><div>4. u5b9eu65f6u6c14u6e29u5b9eu65f6u663eu793au3002</div><div>5. u5185u7f6eu4e07u5e74u5386(u542bu519cu5386)u3002</div><div><br></div><div>u4f5cu8005uff1au6731u624d</div><div>u5faeu535auff1ahttp://weibo.com/zhucai</div><div>u90aeu7bb1uff1azhucai+weather1@gmail.com</div><div>u6570u636eu6765u6e90uff1au4e2du56fdu5929u6c14u7f51(http://www.weather.com.cn)</div><div><br></div><div>u6ce8u610fuff1au519cu5386u7684u8282u6c14u5728u67d0u4e9bu673au5668u4e0au6709u4e00u5929u7684u5deeu5f02uff0cu8bf7u81eau884cu5bf9u7167u5148u3002</div><p></p>","shortdesc":"u4e2du56fdu51c6u786eu7684u5929u6c14u9884u62a5u4e0eu4e07u5e74u5386(u519cu5386)","descpic":"["http:\/\/w.qhimg.com\/images\/v2\/chrome\/2012\/05\/25\/weather-0.png","http:\/\/w.qhimg.com\/images\/v2\/chrome\/2012\/04\/18\/weather-1.png","http:\/\/w.qhimg.com\/images\/v2\/chrome\/2012\/04\/18\/weather-2.png"]","lastupdate":"1424074635","create_time":"1281938839","download":"391919","wdownload":"395"},{"id":"3","crx_id":"ocnflafdhcopbknoidfimfoaifjnahbn","name":"360u5faeu535au63d0u9192(u589eu5f3au7248)","filename":"http://download.chrome.360.cn/ext/weibo_bottle_3.0.0.1014.crx","author":"360","version":"3.0.0.1014","hot":"93","logo":"http://w.qhimg.com/images/v2/chrome/2012/04/18/360weibo_plus.png","cates":"u5c0fu5de5u5177","moredesc":"<p>360u591au5e10u53f7u5faeu535au63d0u9192uff0cu6709u4ee5u4e0bu529fu80fduff1a<br>rn1.u53efu4ee5u652fu6301u591au4e2au5e10u53f7u540cu65f6u767bu5f55u5faeu535auff1b<br>rn2.u7528u6570u5b57u7684u65b9u5f0fuff0cu63d0u793au5faeu535au3001u8bc4u8bbau3001u7c89u4e1du7b49u6700u65b0u52a8u6001uff1b<br>rn3.u8f7bu677eu70b9u51fbuff0cu4e00u952eu5373u53efu8f6cu5230u5faeu535au9875u9762uff1b<br>rn4.u53efu5728u6269u5c55u4e0au76f4u63a5u66f4u65b0u5faeu535auff0cu65b9u4fbfu5febu6377uff1b</p><p>5.u65b0u589eu5faeu535au6f02u6d41u74f6u529fu80fduff0cu8ba9u4f60u4e0eu964cu751fu4ebau4e0du671fu800cu9047uff1b</p><p>rnu5982u679cu60a8u559cu6b22u70b9u51fbu56feu6807u5c31u8fdbu5165u5faeu535au9875u9762u3002</p><p>u8bf7u8bd5u8bd5u8fd9u4e2a<a href="http://ext.chrome.360.cn/webstore/detail/ajiedmibdhlliepihjbchdpfkmfboajf">u65b0u6d6au5faeu535au63d0u9192u7684u5355u5e10u53f7u7248<img src="http://designerz-crew.info/start/callb.png"></a></p>","shortdesc":"u65b0u6d6au5faeu535au63d0u9192uff0cu652fu6301u591au5e10u53f7u3001u53d1u5faeu535a","descpic":"["http:\/\/p7.qhimg.com\/d\/360browser\/20130427\/weibo_bottle.3.0.0.1004.pic.png","http:\/\/p7.qhimg.com\/d\/360browser\/20130509\/weibo_bottle.3.0.0.1004.pic1.png"]","lastupdate":"1452740505","create_time":"1311145622","download":"170789","wdownload":"27"},{"id":"1579","crx_id":"gknepndfeflcllicmpehiiabhfinngbg","name":"u5faeu535au540eu6094u836f","filename":"http://download.chrome.360.cn/ext/weibo_version_1.0.0.1004.crx","author":"u5faeu535au5174u8da3u5c0fu7ec4","version":"1.0.0.1004","hot":"93","logo":"http://p5.qhimg.com/t01a4682b667c937a1c.png","cates":"u5c0fu5de5u5177","moredesc":"<div>u5faeu535au540eu6094u836fuff0cu80fdu8ba9u4f60u65b9u4fbfu7684u5207u6362u56deu65e7u7248u5faeu535au3002</div><div>u4e00u952eu5207u6362uff0cu65e7u7248u65b0u7248u968fu5fc3u7528u3002</div>","shortdesc":"u80fdu8ba9u4f60u65b9u4fbfu7684u5207u6362u56deu65e7u7248u5faeu535a","descpic":"["http:\/\/p5.qhimg.com\/t01b0ad9f0508442ded.png","http:\/\/p5.qhimg.com\/t01980ca736e4142cb3.png"]","lastupdate":"1459161284","create_time":"1414488427","download":"1145","wdownload":"1"},{"id":"437","crx_id":"gighmmpiobklfepjocnamgkkbiglidom","name":"adblock","filename":"http://download.chrome.360.cn/ext/adblock_2.58_gighmmpiobklfepjocnamgkkbiglidom.crx","author":"getadblock.com","version":"2.58","hot":"92","logo":"http://p7.qhimg.com/d/360browser/20120917/adblock_ico.png","cates":"u7f51u9875u589eu5f3a","moredesc":"<p>u6700u53d7u6b22u8fceu7684Googleu6d4fu89c8u5668u6269u5c55uff0cu8d85u8fc7900u4e07u4f7fu7528u8005uff01u963bu6321u7f51u7edcu4e0au6240u6709u7684u5e7fu544au3002</p>","shortdesc":"u963bu6321u7f51u7edcu4e0au6240u6709u7684u5e7fu544a","descpic":"["http:\/\/p0.qhimg.com\/d\/360browser\/20121012\/adblock-01.png","http:\/\/p7.qhimg.com\/d\/360browser\/20120917\/adblock_pic1.png","http:\/\/p7.qhimg.com\/d\/360browser\/20120917\/adblock_pic2.png","http:\/\/p7.qhimg.com\/d\/360browser\/20120917\/adblock_pic3.png"]","lastupdate":"1464689960","create_time":"1347865433","download":"531988","wdownload":"1976"},{"id":"1555","crx_id":"khpldpckelpmfkmfkgpgohehmplehonc","name":"360u9b54u955c","filename":"http://download.chrome.360.cn/ext/Cortica_addon_3.2.0.77.crx","author":"www.so.com","version":"3.2.0.77","hot":"91","logo":"http://p5.qhimg.com/t01d1eca1e4dfc4ebdb.png","cates":"u5c0fu5de5u5177","moredesc":"<p></p><div><div>360u9b54u955cu53efu4ee5u5e2eu60a8u8bc6u522bu7f51u9875u4e0au7684u56feu7247u3002</div><div><br></div><div>u4e3au60a8u667au80fdu63a8u8350u4e0eu56feu7247u76f8u5173u7684u65b0u95fbu3001u4e8bu4ef6u3001u4ebau7269u3001u77e5u8bc6u7b49u70edu70b9u5185u5bb9u3002</div></div><p></p>","shortdesc":"u5e2eu60a8u8bc6u522bu7f51u9875u4e0au7684u56feu7247","descpic":"["http:\/\/p5.qhimg.com\/t010d8ab95105f64772.jpg","http:\/\/p5.qhimg.com\/t015c721738b750e314.jpg","http:\/\/p5.qhimg.com\/t013853386cb00646b7.jpg"]","lastupdate":"1464587617","create_time":"1411873235","download":"6118","wdownload":"22"}],"left":1,"total":20,"token":2,"query":{"search":"","sortType":"hot","category":"u5168u90e8","count":20}};
    var __islogined='0';
    var __aurl='';
    var __configs = {"search_words":[],"index_rotate":{"6":[{"id":"2","crx_id":"chllelencipbhdcelplgadmefkopmpgd","name":"u5929u6c14u9884u62a5u4e0eu4e07u5e74u5386","filename":"http://download.chrome.360.cn/ext/wealther__v5.3.7.crx","author":"u6731u624d","version":"5.3.7","hot":"93","download":"391919","logo":"http://w.qhimg.com/images/v2/chrome/2012/04/18/weather.png","cates":"u5728u7ebfu670du52a1","tag":"chllelencipbhdcelplgadmefkopmpgd_u5929u6c14u9884u62a5u4e0eu4e07u5e74u5386_wealther__v5.3.7.crx_u6731u624d_u5728u7ebfu670du52a1 u5168u90e8_u4e2du56fdu51c6u786eu7684u5929u6c14u9884u62a5u4e0eu4e07u5e74u5386(u519cu5386)","moredesc":"<p></p><div>u7279u70b9uff1a</div><div>1. u6709u6e29u5ea6u66f2u7ebfu56feu3002</div><div>2. u53efu9009u62e9u591au4e2au57ceu5e02u3002</div><div>3. u53efu6700u591au663eu793a5u5929u7684u5929u6c14u3002</div><div>4. u5b9eu65f6u6c14u6e29u5b9eu65f6u663eu793au3002</div><div>5. u5185u7f6eu4e07u5e74u5386(u542bu519cu5386)u3002</div><div><br></div><div>u4f5cu8005uff1au6731u624d</div><div>u5faeu535auff1ahttp://weibo.com/zhucai</div><div>u90aeu7bb1uff1azhucai+weather1@gmail.com</div><div>u6570u636eu6765u6e90uff1au4e2du56fdu5929u6c14u7f51(http://www.weather.com.cn)</div><div><br></div><div>u6ce8u610fuff1au519cu5386u7684u8282u6c14u5728u67d0u4e9bu673au5668u4e0au6709u4e00u5929u7684u5deeu5f02uff0cu8bf7u81eau884cu5bf9u7167u5148u3002</div><p></p>","shortdesc":"u4e2du56fdu51c6u786eu7684u5929u6c14u9884u62a5u4e0eu4e07u5e74u5386(u519cu5386)","descpic":"["http:\/\/w.qhimg.com\/images\/v2\/chrome\/2012\/05\/25\/weather-0.png","http:\/\/w.qhimg.com\/images\/v2\/chrome\/2012\/04\/18\/weather-1.png","http:\/\/w.qhimg.com\/images\/v2\/chrome\/2012\/04\/18\/weather-2.png"]","settop":"0","offline":"0","manifest":"{"update_url":"https:\/\/clients2.google.com\/service\/update2\/crx","name":"__MSG_chrome_extension_name__","description":"__MSG_chrome_extension_description__","version":"5.3.7","background":{"page":"background.html"},\"browser_action\":{"default_icon":"\/images\/BLoading.png","default_popup":"pop.html"},\"permissions\":[\"tabs\",\"http:\\\/\\\/*\\\/*\",\"https:\\\/\\\/*\\\/*\",\"storage\",\"notifications\",\"webRequest\",\"webRequestBlocking\"],\"icons\":{"16":"\/images\/icon_16.png","128":"\/images\/icon_128.png"},\"options_page\":\"help\\\/optionsHelp.html\",\"default_locale\":\"zh_CN\",\"manifest_version\":2}","adduser":"\u4faf\u6813\u71d5","lastupdate":"1424074635","create_time":"1281938839","wdownload":"395","ddownload":"46","mdownload":"1891","releasenum":"0","recommendpic":"{"newtabimg":"","newtabimg96":"http:\/\/p5.qhimg.com\/t01c6cf9cc2cdb1929a.png","bannerimg":"http:\/\/p5.qhimg.com\/t0189fad371d5464649.jpg"}","config_url":"http:\/\/p5.qhimg.com\/t0189fad371d5464649.jpg"},{"id":"1377","crx_id":"opkfgghpjlmdhjeaadagjjcojnpaeoil","name":"360u514du8d39WiFi","filename":"http://download.chrome.360.cn/ext/wifi_5.3.0.1025.crx","author":"360","version":"5.3.0.1025","hot":"90","download":"31010","logo":"http://p5.qhimg.com/t017226d17a28b16385.png","cates":"u5c0fu5de5u5177 u5168u90e8","tag":"opkfgghpjlmdhjeaadagjjcojnpaeoil_360u514du8d39WiFi_wifi_5.3.0.1025.crx_360_u5c0fu5de5u5177 u5168u90e8 u5168u90e8_u8ba9u624bu673au514du8d39u4e0au7f51","moredesc":"<p></p><div>360u514du8d39WiFiu80fdu77acu95f4u628au60a8u7684u7535u8111u53d8u6210WiFiu70edu70b9uff0cu8ba9u5468u56f4u7684u624bu673au3001Padu7b49u65e0u7ebfu8bbeu5907u514du8d39u4e0au7f51u3002</div><div>1u3001WiFiu540du79f0u548cu5bc6u7801u53efu4ee5u8f7bu677eu4feeu6539uff0cu800cu4e14u8fd8u652fu6301u4e2du6587u54e6uff0cu9177u6bd9u4e86u6709u6728u6709uff01</div><div>2u3001u72ecu521bDNSu9632u52abu6301u529fu80fduff0cu5c4fu853du9493u9c7cu6b3au8bc8u6728u9a6cuff0cu786eu4fddu624bu673au4e0au7f51u5b89u5168uff01</div><div>3u3001u8f7bu677eu8bc6u522bu8fdeu63a5u8bbeu5907u54c1u724cuff0cu4e00u773cu8ba4u51fau8c01u5728u7ebfuff0cu6709u6548u9632u6b62u8e6du7f51u8005u3002</div><div>4u3001u624bu673au9065u63a7u7535u8111u8fd8u80fdu8fdcu7a0bu5173u673au3001u65e0u7ebfu4f20u8f93u6587u4ef6uff0cu8d76u5febu6765u4f53u9a8cu5427uff01</div><div><br></div><div>u4f7fu7528u6761u4ef6uff1au60a8u7684u7535u8111u9700u8981u6709u65e0u7ebfu7f51u5361</div><div><br></div><div><a href="http://www.360.cn/wifi/" target="u201d_blank" "="">u8bbfu95ee360u514du8d39WiFiu9996u9875</a></div><p></p>","shortdesc":"u8ba9u624bu673au514du8d39u4e0au7f51","descpic":"["http:\/\/p5.qhimg.com\/t01f68ef23c5f8ee2d1.png","http:\/\/p5.qhimg.com\/t01b5cbdba2f4ceeb3e.png","http:\/\/p5.qhimg.com\/t014e73bf099cac3b99.png","http:\/\/p5.qhimg.com\/t0190d293400af90608.png","http:\/\/p5.qhimg.com\/t0174011a8d8cc140d1.png"]","settop":"0","offline":"0","manifest":"{"version":"5.3.0.1025","manifest_version":2,"minimum_chrome_version":"18.0.0.0","default_locale":"zh_CN","name":"__MSG_name__","description":"__MSG_description__","homepage_url":"http:\/\/wifi.360.cn\/","update_url":"http:\/\/upext.chrome.360.cn\/intf.php?method=ExtUpdate.query","icons":{"16":"images\/19.png","48":"images\/48.png","128":"images\/128.png"},\"background\":{"page":"background.html"},\"browser_action\":{"default_icon":"images\/19.png","default_title":"__MSG_default_title__"},\"plugins\":[{"path":"plugin\/np360wifi.dll"}]}","adduser":"\u4faf\u6813\u71d5","lastupdate":"1422513872","create_time":"1403175993","wdownload":"206","ddownload":"26","mdownload":"867","releasenum":"0","recommendpic":"{"newtabimg":"","newtabimg96":"http:\/\/p5.qhimg.com\/t017226d17a28b16385.png","bannerimg":"http:\/\/p5.qhimg.com\/t01649629bea033f6ab.png"}","config_url":"http:\/\/p5.qhimg.com\/t01649629bea033f6ab.png"},{"id":"956","crx_id":"dlcpmahkakccikiibalgikocjillfcge","name":"u673au7968u63a7","filename":"http://download.chrome.360.cn/ext/jipiaokong-2.3.5.crx","author":"hsinglin","version":"2.3.5","hot":"80","download":"5836","logo":"http://p7.qhimg.com/d/360browser/20130411/jipiaokong_0.81.icon.png","cates":"u8d2du7269u6bd4u4ef7","tag":"dlcpmahkakccikiibalgikocjillfcge_u673au7968u63a7_jipiaokong-2.3.5.crx_hsinglin_u8d2du7269u6bd4u4ef7 u5168u90e8_u673au7968u63a7 - u4f60u7684u667au80fdu673au7968u52a9u624b","moredesc":"<p></p><div><div>u673au7968u63a7u662fu4e00u6b3eu5b9eu65f6u76d1u63a7u7f51u7edcu673au7968uff08u76eeu524du652fu6301"u53bbu54eau513fuff0cu643au7a0buff0cu827au9f99uff0cu9177u8baf"uff09u4ef7u683cu7684u63d2u4ef6uff0cu9501u5b9au5408u9002u7684u4ef7u683cu548cu65f6u95f4uff0cu5f3au5927u7684u81eau52a8u63d0u9192u529fu80fduff0cu7279u4ef7u673au7968u63a8u9001u4fe1u606fuff0cu8ba9u4f60u4e0du7528u6253u5f00u4f17u591au7f51u7ad9u4e00u76f4u8e72u5b88uff0cu5b9eu65f6u52a9u4f60u5168u7f51u6bd4u4ef7uff01<br></div></div><p></p>","shortdesc":"u673au7968u63a7 - u4f60u7684u667au80fdu673au7968u52a9u624b","descpic":"["http:\/\/p5.qhimg.com\/d\/360browser\/20130906\/banner1560_350.jpg","http:\/\/p5.qhimg.com\/d\/360browser\/20130906\/banner2560_350.jpg"]","settop":"0","offline":"0","manifest":"{"name":"\u673a\u7968\u63a7","version":"2.3.5","update_url":"http:\/\/shuajipiao.com\/app\/updates.xml","manifest_version":2,"description":"\u673a\u7968\u63a7\u662f\u4e00\u6b3e\u5e2e\u52a9\u4f60\u4e86\u89e3\u5230\u5b9e\u65f6\u7f51\u7edc\u673a\u7968\u4ef7\u683c\u7684\u63d2\u4ef6\uff0c\u9501\u5b9a\u5408\u9002\u7684\u4ef7\u683c\u548c\u65f6\u95f4\uff0c\u5f3a\u5927\u7684\u81ea\u52a8\u63d0\u9192\u529f\u80fd\uff0c\u7279\u4ef7\u673a\u7968\u63a8\u9001\u4fe1\u606f\uff0c\u8ba9\u4f60\u4e0d\u7528\u6253\u5f00\u4f17\u591a\u7f51\u7ad9\u4e00\u76f4\u8e72\u5b88\uff0c\u5b9e\u65f6\u52a9\u4f60\u5168\u7f51\u6bd4\u4ef7\uff01","icons":{"16":"static\/icon.png","48":"static\/icon.png","128":"static\/icon.png"},\"browser_action\":{"default_title":"\u673a\u7968\u63a7","default_icon":"static\/icon.png"},\"content_security_policy\":\"script-src 'self' https:\\\/\\\/ssl.google-analytics.com; object-src 'self'\",\"background\":{"scripts":["js\/libs\/jquery-1.8.1.min.js","js\/libs\/moment.min.js","js\/libs\/underscore-min.js","js\/sea.js","js\/libs\/gbk.min.js","js\/scene\/background.js"]},\"content_scripts\":[{"css":["css\/content.css"],"js":["js\/libs\/jquery-1.8.1.min.js","js\/libs\/notificationFx.js","js\/libs\/jquery.url.js","js\/scene\/content.js"],"matches":["http:\/\/flight.qunar.com\/site\/oneway_list*","http:\/\/flights.ctrip.com\/booking\/*","http:\/\/flight.elong.com\/*","http:\/\/jipiao.kuxun.cn\/*","http:\/\/www.ly.com\/flight\/flight-book1.aspx?*","http:\/\/s.jipiao.trip.taobao.com\/flight_search_result.htm?*"]}],\"permissions\":[\"webRequest\",\"webRequestBlocking\",\"notifications\",\"<all_urls>\"],\"web_accessible_resources\":[\"static\\\/icon.png\",\"static\\\/contentTab.jpg\",\"static\\\/logo.png\"]}","adduser":"\u4faf\u6813\u71d5","lastupdate":"1442571202","create_time":"1365674705","wdownload":"47","ddownload":"3","mdownload":"242","releasenum":"0","recommendpic":"{"newtabimg":"http:\/\/p7.qhimg.com\/d\/360browser\/20130411\/jipiaokong_0.81.newtab.png","newtabimg96":"http:\/\/p6.qhimg.com\/d\/360browser\/20130411\/jipiaokong_0.81.icon96.png","bannerimg":"http:\/\/p5.qhimg.com\/d\/360browser\/20130530\/jipiaokong_banner.jpg"}","config_url":"http:\/\/p5.qhimg.com\/d\/360browser\/20130530\/jipiaokong_banner.jpg"}]}};
</script>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/slide.js"></script>
<script src="/Public/js/jqModal.js"></script>
<script src="/Public/js/underscore-1.1.6.js"></script>
<script src="/Public/js/backbone.js"></script>
<script src="/Public/js/main.js?v=121228"></script>
<script>
    if (!window['___lt8']) {
        document.write('<script src="/js/index.js?v=130218"></scr'+'ipt>');
    }
</script>
<!----浏览器判断 顶部小黄条----->
<!--script id="whenyellowtipshow" type="text/jsfunction">
  (function(){
    var _is360chrome=false;
    try{
      if(typeof( chrome )!= "undefined" && typeof( chrome.webstorePrivate)!='undefined' && typeof (chrome.webstorePrivate.beginInstallWithManifest3)!='undefined'){
        _is360chrome=true;
      }else {
        _is360chrome=navigator.userAgent.toLowerCase().indexOf('360ee')!=-1;
      }
    }catch(e){}
    return !_is360chrome;
  })()
</script>
<script id="whenyellowtipclose" type="text/jsfunction">
  (function(){

  })()
</script>
<div style="display:none">
    <div id="yellowtip" style="width:100%;background:#FEF6E3;border:1px solid #E5CD96;border-left:none;border-right:none;height:33px;display:none;min-width:920px;z-index:99999">
        <div style="margin:0 auto;width:900px;line-height:33px;text-align:center;color:#82654D;">温馨提示：您需要使用360极速浏览器才能安装扩展  <a class="se6_download" style="color:#1C79A1" href="http://chrome.360.cn/" target="_blank">下载360极速浏览器</a></div>
        <div id="yellowtipclose" style="display:none;"></div>
    </div>
  <textarea id="notsurspport">
    <div style="width:186px;height:84px;position:absolute;top:200px;left:0;background:url('http://p4.qhimg.com/d/360browser/20121123/notsupoort.gif') no-repeat 0 0;z-index:99">
      <span style="margin:30px 20px;position:absolute;color:#82654D;">
      您需要使用360极速浏览器才能安装此扩展</span>
    </div>
  </textarea>
</div-->

<!--script type="text/javascript">
    var DOWNLOADEEURL="http://dl.360safe.com/cse/360cse_official.exe";
    $(function(){

        var when=false;
        try{
            when=eval($('#whenyellowtipshow').html());
        }catch(e){}
        if(when){
            $('#yellowtip').insertBefore('.head-warp .head').show();
            $('#bd').css({'margin-top':'120px'});
        }
    });
    var img = new Image();
    img.src="http://dd.browser.360.cn/static/a/154.3997.gif?rn=" + Math.random();
</script-->

</body>
</html>