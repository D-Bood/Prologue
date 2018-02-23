<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div id="footer" role="contentinfo">
&copy; 2013-<?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a> with <a href="http://www.typecho.org" target="_blank">Typecho</a><br>Original Design: <a href="https://html5up.net/prologue" target="_blank">HTML5 UP</a> Your IP: <?php echo $_SERVER["REMOTE_ADDR"]; ?><br><?php hitokoto() ?>
</div>

<!-- Scripts -->
<script src="/usr/themes/Prologue/js/skel.min.js" data-no-instant></script>
<script src="/usr/themes/Prologue/js/util.js" data-no-instant></script>
<?php if(!empty($this->options->search_form) && in_array('Pjax', $this->options->search_form)): ?>
<script src="/usr/themes/Prologue/js/instantclick.min.js" data-no-instant></script>
<script data-no-instant>
InstantClick.on('change', function () {
(function($) {

	skel.breakpoints({
		wide: '(min-width: 961px) and (max-width: 1880px)',
		normal: '(min-width: 961px) and (max-width: 1620px)',
		narrow: '(min-width: 961px) and (max-width: 1320px)',
		narrower: '(max-width: 960px)',
		mobile: '(max-width: 736px)'
	});

	$(function() {

		var	$window = $(window),
			$body = $('body');

		// Disable animations/transitions until the page has loaded.
			// $body.addClass('is-loading');

			// $window.on('load', function() {
				// $body.removeClass('is-loading');
			// });

		// CSS polyfills (IE<9).
			if (skel.vars.IEVersion < 9)
				$(':last-child').addClass('last-child');

		// Fix: Placeholder polyfill.
			$('form').placeholder();

		// Prioritize "important" elements on mobile.
			skel.on('+mobile -mobile', function() {
				$.prioritize(
					'.important\\28 mobile\\29',
					skel.breakpoint('mobile').active
				);
			});

		// Scrolly links.
			// $('.scrolly').scrolly();

		// Nav.
			// var $nav_a = $('#nav a');

			// Scrolly-fy links.
				// $nav_a
					// .scrolly()
					// .on('click', function(e) {

						// var t = $(this),
							// href = t.attr('href');

						// if (href[0] != '#')
							// return;

						// e.preventDefault();

						// Clear active and lock scrollzer until scrolling has stopped
							// $nav_a
								// .removeClass('active')
								// .addClass('scrollzer-locked');

						// Set this link to active
							// t.addClass('active');

					// });

			// Initialize scrollzer.
				// var ids = [];

				// $nav_a.each(function() {

					// var href = $(this).attr('href');

					// if (href[0] != '#')
						// return;

					// ids.push(href.substring(1));

				// });

				// $.scrollzer(ids, { pad: 200, lastHack: true });

		// Header (narrower + mobile).

			// Toggle.
				$(
					'<div id="headerToggle">' +
						'<a href="#header" class="toggle"></a>' +
					'</div>'
				)
					.appendTo($body);

			// Header.
				$('#header')
					.panel({
						delay: 200,
						hideOnClick: true,
						hideOnSwipe: true,
						resetScroll: true,
						resetForms: true,
						side: 'left',
						target: $body,
						visibleClass: 'header-visible'
					});

			// Fix: Remove transitions on WP<10 (poor/buggy performance).
				if (skel.vars.os == 'wp' && skel.vars.osVersion < 10)
					$('#headerToggle, #header, #main')
						.css('transition', 'none');

	});

})(jQuery);
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
