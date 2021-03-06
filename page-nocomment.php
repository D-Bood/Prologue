<?php
    /**
    * non-comment
    *
    * @package custom
    */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="main">
<section class="one dark cover">
  <div class="container">
        <h2><a itemprop="url" href="<?php $this->permalink() ?>" data-no-instant><?php $this->title() ?></a></h2>
  </div>
</section>
<section class="two">
  <div class="container">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <div class="markdown-body" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
    </article>
</div>
</section>

<!-- end #main-->
<?php $this->need('footer.php'); ?>
