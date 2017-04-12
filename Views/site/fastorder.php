<?php include_once(ROOT.'/Views/layout/header.php');?>
		
		<div class="clearfix"></div>
		
		
		<section id="content" class="grid_12">
		<?php if ($result == false) : ?>
			<article>	
				<div class="content login-form">
					<div class="grid_5 alpha">
					<header><span class="h3">Вход для пользователей</span></header>
						<p>
							Для входа в аккаунт введите Вашу почту и пароль.
						</p>
						<div class="box-overlay">
						<?php if (isset($errors) && is_array($errors)) : ?>
							<ul>
								<?php foreach ($errors as $error) : ?>
									<li><?php echo $error; ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
							<form action="fastorder" method="post" class="clearfix">
								<div class="form-row clearfix">
									<label>Email</label>
									<input type="email" name="email" value="<?php echo $email; ?>" class="wide" />
								</div>
								<div class="form-row clearfix">
									<label>Пароль</label>
									<input type="password" name="password" value="" class="wide" />
								</div>
								<div class="form-row clearfix">
									<span>Forgot password? <a href="#">Click here</a></span>
									<input type="submit" value="Submit" name='submit' class="float-r shadow" />
								</div>
							</form>
						</div>
					</div>
					<div class="grid_2"><div class="horizontal"><div class="icon-container"><div class="circle-icon"><span>&nbsp;</span></div></div></div>&nbsp;</div>
					<div class="grid_5 alpha">
					<header><span class="h3">Оформить заказ без регистрации</span></header>
					<p class="label">Укажите ваши контакты</p>
						<form action="fastorder" method="post" class="clearfix">
								<div class="form-row clearfix">
									<label>Email</label>
									<input type="email" name="email" value="" class="wide" />
								</div>
								<div class="form-row clearfix">
									<label>Имя</label>
									<input type="text" name="name" value="" class="wide" />
								</div>
								<div class="form-row clearfix">
									<label>Телефон</label>
									<input type="text" name="telephone" value="" placeholder="(066) 999-21-55" class="wide" />
								</div>
								<div class="form-row clearfix">
									<label>Комментарии</label>
									<input type="text" name="comment" value="" placeholder="Your comments" class="wide" />
								</div>
								<div class="form-row clearfix">
									<input type="submit" value="Book It" name='submit_order' class="float-r shadow" />
								</div>
							</form>
					</div>
			</article>
		<?php endif; ?>
		<?php if($result == true) echo "<p align='center'>Ваш заказ оформлен. Наш менеджер свяжется в Вами</p>"; ?>
		</section> <!-- #content!!! -->
		
		<div class="clearfix"></div>

<?php include_once(ROOT.'/Views/layout/footer.php');?>		
		</div>
	
	
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
			
		});
	</script>
	
</body>
</html>