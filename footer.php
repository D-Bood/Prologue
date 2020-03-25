<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div id="footer" role="contentinfo">
Original Design: <a href="https://html5up.net/prologue" target="_blank">HTML5 UP</a> Your IP: <?php echo $_SERVER['REMOTE_ADDR']; ?><br>&copy; 2013-<?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a> with <a href="http://www.typecho.org" target="_blank">Typecho</a><br><?php echo $this->options->footerMessage; ?></div>
   </div>

<!-- Scripts -->
<script src="/usr/themes/Prologue/js/skel.min.js" data-no-instant></script>
<script src="/usr/themes/Prologue/js/util.js" data-no-instant></script>
<script src="/usr/themes/Prologue/js/main.js" data-no-instant></script>
<?php if(!empty($this->options->search_form) && in_array('Pjax', $this->options->search_form)): ?>
<script src="/usr/themes/Prologue/js/instantclick.min.js" data-no-instant></script>
<script data-no-instant>
InstantClick.on('change', function () {
$('#recaptcha').prepend("<script src=\"https:\/\/recaptcha.net\/recaptcha\/api.js\" async defer data-no-instant><\/script>");
});
InstantClick.init();
</script>
<style>#instantclick-bar {height: 3px; box-shadow: #000 0px 0px 1em;background: #e60000; transition: all 0.30s ease-in-out;}</style>
<?php endif; ?>
<!-- end #footer -->

<?php $this->footer(); ?>
</body>
</html>
