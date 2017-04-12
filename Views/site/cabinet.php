<?php include_once(ROOT.'/Views/layout/header.php');?>
<div align="center">
<p>
<h1>Кабинет пользователя</h1>
<h3><?php echo $user['name']; ?></h3>
</p>
<p>
<a href='/user/info'> Данные пользователя </a>
</p>
<p>
<a href='/cart'> Товары в корзине </a>
</p>
</div>

<?php include_once(ROOT.'/Views/layout/footer.php');?>
<script type="text/javascript">
		// initialise plugins
		jQuery(document).ready(function($) {
			$("ul.sf-menu").supersubs({
				minWidth:    10,   // minimum width of sub-menus in em units
				maxWidth:    15,   // maximum width of sub-menus in em units
				extraWidth:  1     // extra width can ensure lines don't sometimes turn over
			}).superfish({autoArrows: false,
				disableHI: false,
				dropShadows: false,
				onShow: function(){
					$('ul.sf-menu ul ul').show().css({'visibility':'visible', width: '100%'});
				},
				onHide: function(){
					$('ul.sf-menu ul ul').show().css({'visibility':'visible', width: '100%'});
				}
			});
			
			var basketTimeout;
			
			$('.basket .basket-button, .basket .basket-text').click(function(){
				var b = $('.basket-dropdown');
				
				if(basketTimeout) 
					window.clearTimeout(basketTimeout);
					
				if(b.is(":visible")) {
					b.fadeOut();
					return;
				}
				
				b.fadeIn().show();
				basketTimeout = window.setTimeout(function(){
					b.fadeOut();
				}, 2000);
			});
			
			$('.basket-dropdown').mouseenter(function(){
				if(basketTimeout) 
					window.clearTimeout(basketTimeout);
			}).mouseleave(function(){
				var $this = $(this);
				basketTimeout = window.setTimeout(function(){
					$this.fadeOut();
				}, 1000);
			});
			
			$('[placeholder]').focus(function() {
				var input = $(this);
				if (input.val() == input.attr('placeholder')) {
					input.val('');
					input.removeClass('placeholder');
				}
			}).blur(function() {
				var input = $(this);
				if (input.val() == '' || input.val() == input.attr('placeholder')) {
					input.addClass('placeholder');
					input.val(input.attr('placeholder'));
				}
			}).blur();
			
			$('select').uniform();
			
			$('.captcha-refresh').on('click', function(e) {
				var $f = $(this).closest('form'), $img = $('.captcha-field img', $f);
				$img.attr('src', 'php/captcha.php?w=80&amp;h=38&amp;rnd=' + Math.random());
				e.preventDefault();
			});
			// The Ajax Contact form
			$('#button-contact').on('click', function(e) {
				$.post('php/contact.php', $(this).closest('form').serialize(), function(res) {
					alert(res);
				});
				e.preventDefault();
			});
			
		});
	</script>
</body>
</html>
