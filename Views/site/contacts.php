<?php include_once(ROOT.'/Views/layout/header.php');?>
		
		<div class="clearfix"></div>
		
		
		
		<section id="content" class="contact-page grid_12">
			<article>
				<span class="h1">Контактная информация</span>
				<div class="content">
					<div class="contact contact-desc">
						<h4>Мы вас приветствуем</h4>
						<p>
							Claritas est etiam processus dynamicus, sequitur mutationem consuetudium lectorum. 
							Mirum est notare quam littera gothica. Litterarum formas humanitatis per seacula quarta 
							decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes 
							in futurum. Plusieurs variations de Lorem Ipsum peuvent être trouvées ici ou là, mais la majeure 
							partie d'entre elles a été altérée par l'addition.
						</p>
						<ul class="social-icon clearfix">
							<li class="facebook"><a href="#">&nbsp;</a></li>
							<li class="twitter"><a href="#">&nbsp;</a></li>
						</ul>
						<span class="tel">Горячая линия <strong> 066-287-40-81</strong></span>
					</div>
					<div class="contact contact-info">
						<h4>Contact Info</h4>
						<p class="address">
							<span class="icon">&nbsp;</span>
							РуМиНа<br />
							Вокзальная 24<br />
							Кировоград, Украина
						</p>
						<p class="tel">
							<span class="icon">&nbsp;</span>
							(0522) 02.900.1234 <br />
							(0522) 06.333.4441
						</p>
						<p class="email">
							<span class="icon">&nbsp;</span>
							rostme@mail.ru
						</p>
					</div>
				</div>
			</article>
			
			<article>
				<span class="h3">Напишите нам</span>
				<div class="content">
				<?php if (isset($errors) && is_array($errors)) : ?>
						<ul>
					<?php foreach ($errors as $error) : ?>
						<li class="<?php if($error == 'Сообщение отправлено!') echo 'no-errors'; else {echo 'errors';}?>"><?php echo $error; ?></li>
					<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<div class="contact-form">
					<form method="post" action="contacts">
						<div class="form-row">
							<input type="text" name="name" placeholder="Имя" class="widefat float-l" />
							<input type="text" name="userEmail" placeholder="E-mail (обязателен)" value = "<?php echo $userEmail ?>" class="widefat float-r" />
						</div>
						<div class="form-row">
							<textarea cols="60" rows="10" name="userText"></textarea>
						</div>
							<div class="form-row">
										<input type="submit" name='submit' value="Отправить">
							</div>
					</form>
					</div>
					<div class="contact-thank">
						<div class="logo-small ">
							<img src="../../template/images/thank-you.png" alt="">
						</div>
					</div>
				</div>
			</article>
			
		</section> <!-- #content -->
		<article>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2642.8655236177865!2d32.24908141578054!3d48.516642532661905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d042c9dfdca18f%3A0x90c4e110ccad8ede!2z0LLRg9C7LiDQktC-0LrQt9Cw0LvRjNC90LAsIDI0LCDQmtGW0YDQvtCy0L7Qs9GA0LDQtCwg0JrRltGA0L7QstC-0LPRgNCw0LTRgdGM0LrQsCDQvtCx0LvQsNGB0YLRjA!5e0!3m2!1sru!2sua!4v1460658082406" width="1040" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
			</article>
<?php include_once(ROOT.'/Views/layout/footer.php');?>			
	</div>
	<div class="content-border-bottom container_12">&nbsp;</div>
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