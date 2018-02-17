<?php
/**
 * 移植自 https://html5up.net/prologue
 * 
 * @package Prologue
 * @author D-Bood
 * @version 1.0
 * @link https://html5up.net/prologue
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<body>
  <!-- Main -->
   <div id="main">

    <!-- Intro -->
     <section id="top" class="one dark cover">
      <div class="container">

       <header>
       <h2 class="alt"><p>D-Bood in Tsuchi</p></h2>
       </header>

      </div>
     </section>

    <!-- Portfolio -->
     <section id="portfolio" class="two">
      <div class="container">
        <div class="row">
       <?php while($this->next()): ?>

        <div class="4u 12u$(mobile)">
         <article class="item">
          <a href="<?php $this->permalink() ?>" class="image fit" style="background: url(<?php if (array_key_exists('img',unserialize($this->___fields()))): ?><?php $this->fields->img(); ?><?php else: ?><?php
preg_match_all("/\<img.*?src\=(\'|\")(.*?)(\'|\")[^>]*>/i", $this->content, $matches);
$imgCount = count($matches[0]);
if($imgCount >= 1){
$img = $matches[2][0];
}else{
$img = "https://s1.ax1x.com/2017/11/08/BrC4I.jpg";
}
echo <<<Html
{$img}
Html;
?><?php endif; ?>); background-size: cover; height: 286px" alt="">
          <header
           <h3 class="post-title"><?php $this->title() ?></h3>
          </header>
         </a></article>
        </div>

       <?php endwhile; ?>
       </div>
      </div>
     </section>

     <section class="three navi">
      <div class="container"><div class="page-navi">
        <?php $this->pageLink('上一页','prev');?><?php $this->pageLink('下一页','next');?>
      </div></div>
     </section>
   </div>

<!-- end #main-->

<?php $this->need('footer.php'); ?>

