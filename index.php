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
     <section class="one dark cover">
      <div class="container">

       <header>
       <h2 class="alt"><p style="font-size: 2em; color: #fff; letter-spacing:2px">其他的危险</p></h2>
       </header>

      </div>
     </section>

    <!-- Portfolio -->
     <section class="two">
      <div class="container">
        <div class="row">
       <?php while($this->next()): ?>

        <div class="4u 12u$(mobile)">
         <article class="item">
          <a href="<?php $this->permalink() ?>" class="image fit" style="background: url(<?php index_pic($this); ?>); background-size: cover; height: 286px" alt="">
          <header>
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


<!-- end #main-->

<?php $this->need('footer.php'); ?>

