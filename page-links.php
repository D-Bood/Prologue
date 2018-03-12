<?php
    /**
    * links
    *
    * @package custom
    */
    $this->need('header.php'); ?>

<div id="main">
<section class="one dark cover">
  <div class="container">
        <h2><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
  </div>
</section>
<section class="two">
  <div class="container">
				<article class="post post-archives">
					<div class="entry-content">	
                            <div id="linkwrapper">
                            <span>部署了 HTTPS 的小伙伴们会按照申请顺序优先放在前排！<span><span style="background: #5d686f">オフ会：0人</span><br>
                            <?php Links_Plugin::output('SHOW_HTTPS', 0, 'https'); ?>
                            <?php Links_Plugin::output('SHOW_MIX', 0, 'http'); ?>
                            <p>欢迎各位在本页面留言申请！</p>
                            </div>                       
					</div>
				</article>
</div>
</section>
            <?php $this->need('comments.php'); ?>

<?php $this->need('footer.php'); ?>