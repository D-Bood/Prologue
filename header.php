<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<!--
      y++++++++++++++++++dN        さマかキ　ぼぼあク
      s::::::::::::::::::yN        さグわハ　くくしロ
      y++++++++++++++++++hN        るロらダ　ららたマ
      o/dyyyyyyyyyyyyyhd-yN        とのをが　はをのグ
      o/d//++//////++/od-yN        　　　　　　　　ロ
      o/d//sh//////do/od-yN        ではつこ　こめおが
      o/d//sh//////do/od-yN        きりきこ　ろがひ　　
      o/d//sh//////do/od-yN        しにやま　さけると
      o/d//os//////y+/od-yN        すはぶで　れてすん
     d+/hyyyyyyyyyyyyyyh-ss        る　っ　　る　ぎで
   No:/ooooooooooooo:/ooo:/sN      　どてと　んふにく
   y---::+++++++++++:oddd/-:yN     　く　ん　だっ　る
 Ny------+++++++++++::+++:---dN    　がとで　　てと
Ndo--ydy-ddo/dd/-/dd/oddd/---y N   　あんく　　くん
 s:--/+/-//::++:-/hh/:///:---:yN   　るでる　　るで
Nho:-+osooosssss/--------yo--:yN   　　く　　　　く
 Nh+--:+dsssyss/:-------h+:--+hN   　　る　　　　る
   Nyyyyd++/:-sssss:-/ssd+:::dN    　　ん　　　　ん
      o-----+d`````osyddsh         　　だ　　　　だ
      o-----/hss/---ohdh/hN
      o---------/ooooo+--yN
      o--------s+--------yN
      s:------:yo:------:yN
      s:----::dNNy:-----:yN
      s///////dNNh///////hN
      NNNNNNNNN NNNNNNNNNNN
-->
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
    <script src="<?php $this->options->themeUrl('js/jquery.min.js'); ?>"></script>

    <!--[if lt IE 9]>
    <script src="//cdnjscn.b0.upaiyun.com/libs/html5shiv/r29/html5.min.js"></script>
    <script src="//cdnjscn.b0.upaiyun.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header('keywords=&generator=&template=&pingback=&xmlrpc=&wlw=&description=そんな事あるか…'); ?>
</head>

<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->
<body class="noSelect">


      <div id="header">
        <div class="top">

          <!-- Logo -->
            <div id="logo">
              <span class="image avatar48"><img src="/usr/themes/Prologue/images/avatar.png" alt="" /></span>
              <h1 id="title">D-Bood</h1>
              <p>を</p>
            </div>

          <!-- Nav -->
            <nav id="nav">
              <ul>
                <li id="li_index"><a href="/" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">首页</span></a></li>
                <li id="li_arch"><a href="/archiver" id="archive-link" class="skel-layers-ignoreHref"><span class="icon fa-th">归档</span></a></li>
                <li id="li_music"><a href="/music" id="music-link" class="skel-layers-ignoreHref"><span class="icon fa-music">音乐</span></a></li>
                <li id="li_about"><a href="/about" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-user">关于</span></a></li>
              </ul>
            </nav>

        </div>

        <div class="bottom">

          <!-- Social Icons -->
            <ul class="icons">
              <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
              <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
              <li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
              <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
              <li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
            </ul>

        </div>

      </div>

<!-- end #header -->