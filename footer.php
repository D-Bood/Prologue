<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div id="footer" role="contentinfo">
&copy; 2013-<?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a> with <a href="http://www.typecho.org" target="_blank">Typecho</a><br>Original Author: <a href="https://html5up.net/prologue" target="_blank">HTML5 UP</a> Your IP: <?php echo $_SERVER["REMOTE_ADDR"]; ?>
</div>

<!-- Scripts -->
<script src="/usr/themes/Prologue/js/skel.min.js"></script>
<script src="/usr/themes/Prologue/js/util.js"></script>
<?php if(!empty($this->options->search_form) && in_array('Pjax', $this->options->search_form)): ?>
<script src="/usr/themes/Prologue/js/instantclick.min.js" data-no-instant></script>
<script data-no-instant>
//main.js
!function(e){skel.breakpoints({wide:"(min-width: 961px) and (max-width: 1880px)",normal:"(min-width: 961px) and (max-width: 1620px)",narrow:"(min-width: 961px) and (max-width: 1320px)",narrower:"(max-width: 960px)",mobile:"(max-width: 736px)"}),e(function(){var i=e(window),a=e("body");a.addClass("is-loading"),i.on("load",function(){a.removeClass("is-loading")}),skel.vars.IEVersion<9&&e(":last-child").addClass("last-child"),e("form").placeholder(),skel.on("+mobile -mobile",function(){e.prioritize(".important\\28 mobile\\29",skel.breakpoint("mobile").active)}),e('<div id="headerToggle"><a href="#header" class="toggle"></a></div>').appendTo(a),e("#header").panel({delay:200,hideOnClick:!0,hideOnSwipe:!0,resetScroll:!0,resetForms:!0,side:"left",target:a,visibleClass:"header-visible"}),"wp"==skel.vars.os&&skel.vars.osVersion<10&&e("#headerToggle, #header, #main").css("transition","none")})}(jQuery);
//End main.js
InstantClick.on('change', function () {
$('#recaptcha').prepend("<script src=\"https:\/\/recaptcha.net\/recaptcha\/api.js\" async defer data-no-instant><\/script>");
});
InstantClick.init();
</script>
<?php else: ?>
<script src="/usr/themes/Prologue/js/main.js"></script>
<?php endif; ?>
<!-- end #footer -->

<?php $this->footer(); ?>
</body>
</html>
