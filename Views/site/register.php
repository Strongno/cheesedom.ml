<?php include_once(ROOT.'/Views/layout/header.php');?>
		
		<div class="clearfix"></div>

		
		<section id="content" class="grid_12">
			<article>
				<header><span class="h3" style='display:block; width:400px;margin:0 auto; margin-bottom:20px;margin-top:20px; padding-left:50px'>Регистрация нового пользователя</span>
					<?php if (isset($errors) && is_array($errors)) : ?>
						<ul>
					<?php foreach ($errors as $error) : ?>
						<li class="<?php if($error == 'Вы успешно зарегистрированы') echo 'no-errors'; else {echo 'errors';}?>" style='margin-left:400px'><?php echo $error; ?></li>
					<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</header>
				<div class="content register-form register-form">
					<form action="register" method="post" class="clearfix">
							<div class="box-overlay clearfix">
								<div class="form-row">
									<span class="label3">Персональные данные</span>
									<a class="step">
										<span class="text"></span>
									</a>
								</div>
								<div class="form-row">
									<label>Имя *</label>
									<input type="text" name="name" value="<?php echo $name; ?>" class="widefat" />
								</div>
								<div class="form-row">
									<label>Фамилия *</label>
									<input type="text" name="lastName" value="<?php echo $lastName; ?>" class="widefat" />
								</div>
								<div class="form-row">
									<label>Email *</label>
									<input type="text" name="email" value='<?php echo $email; ?>' class="widefat" />
								</div>
								<div class="form-row">
									<label>Телефон(моб) *</label>
									<input type="text" name="telephone" value='<?php echo $telephone; ?>' class="widefat" />
								</div>
								<div class="form-row">
										<span class="label3">Ваш пароль</span>
								</div>
								<div class="form-row">
										<label>Пароль *</label>
										<input type="text" name="password" class="widefat" />
								</div>
								<div class="form-row">
										<label>Подствердите пароль *</label>
										<input type="text" name="passwordConfirm" class="widefat" />
								</div>
								<div class="" style="float:right">
										<input type="submit" name='submit' value="Зарегистрироваться" >
								</div>
							</div>
					</form>
				</div>
			</article>
		</section> <!-- #content -->
		<div class="clearfix">
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
			
			$('select, input[type="checkbox"], input[type="radio"]').uniform({radioClass: 'checker'});
			
			$('.register-form input[type="text"], .register-form select, .register-form input[type="checkbox"]').focus(function(){
				var p = $(this).closest('.box-overlay');
				$('a.step', p).addClass('focus');
			}).focusout(function(){
				var p = $(this).closest('.box-overlay');
				$('a.step', p).removeClass('focus');
			});
			
		});
	</script>
	
</body>
</html>