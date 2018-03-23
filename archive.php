<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="main">
<section class="one dark cover">
  <div class="container">
        <h3 class="archive-title"><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?></h3>
  </div>
</section>

<section class="two">
  <div class="container">
    <div class="row">
        <?php if ($this->have()): ?>
    	<?php while($this->next()): ?>
        <div class="4u 12u$(mobile)">
         <article class="item">
          <a href="<?php $this->permalink() ?>">
          <div class="image fit" src="<?php index_pic($this); ?>" style="background: url(<?php index_pic($this); ?>); background-size: cover; background-position: center; height: 12em; background-color: #000" alt=""></div>
          <header>
           <h3 class="post-title"><?php $this->title() ?></h3>
          </header>
         </article></a>
        </div>
    	<?php endwhile; ?>
        <?php else: ?>
            <article>
                <h2 class="post-title"><?php _e('抱歉，没有找到内容'); ?></h2>
            </article>
        <?php endif; ?>
    </div>
  </div>
</section>

<section class="three navi">
  <div class="container"><div class="page-navi">
    <?php $this->pageLink('上一页','prev');?><?php $this->pageLink('下一页','next');?>
      </div>
    </div>
</section>
<!-- end #main -->

<?php $this->need('footer.php'); ?>