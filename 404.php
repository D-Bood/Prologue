<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="main">
<section class="one dark cover" style="background: #a9362d">
  <div class="container">
            <h2 class="post-title">404 - <?php _e('页面没找到'); ?></h2>
            <p><?php _e('你想查看的页面已被转移或删除了, 要不要搜索看看: '); ?></p>
            <form method="post">
                <p><input type="text" name="s" class="text" style="margin: 1em 0 1em 0" autofocus /></p>
                <p><button type="submit" class="submit" style="font-size: 1em"><i class="iconfont icon-search"></i></button></p>
            </form>
  </div>
</section>
<!-- end #content-->
<?php $this->need('footer.php'); ?>
