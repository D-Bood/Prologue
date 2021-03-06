<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="main">
<section class="one dark cover">
  <div class="container">
        <h2><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
        <ul class="post-meta">
<i class="iconfont icon-person icon-1.5x"></i> <a itemprop="name" class="meta-name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a>　
<i class="iconfont icon-date icon-1.5x"></i> <time datetime="<?php $this->date('c'); ?>" class="meta-name" itemprop="datePublished"><?php $this->date(); ?></time>　
<i class="iconfont icon-category icon-1.5x"></i> <?php $this->category(','); ?>
        </ul>
  </div>
</section>
<section class="two">
  <div class="container">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <div class="markdown-body">
            <?php $this->content(); ?>
        </div><br>
        <p itemprop="keywords" class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></p>
    </article>
  </div>
</section>

<section class="three navi">
<div class="container">
<nav class="page-navi"><span class="prev"><?php $this->thePrev('&laquo; %s', ''); ?></span> <span class="next"><?php $this->theNext('%s &raquo;', ''); ?></span></nav></div>
</section>
<?php $this->need('comments.php'); ?>
<!-- end #main-->

<?php $this->need('footer.php'); ?>
