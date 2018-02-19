<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="main">
<section class="one dark cover">
  <div class="container">
        <h2><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
        <ul class="post-meta">
<i class="fa fa-user"></i> <a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a>　
<i class="fa fa-clock-o"></i> <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>　
<i class="fa fa-th"></i> <?php $this->category(','); ?>
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
</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
