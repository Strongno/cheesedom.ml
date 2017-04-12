<?php include_once(ROOT.'/Views/layout/header.php');?>
		
		<div class="clearfix"></div>
		
		<section id="content" class="grid_12">
			<article>
				<header><span class="h3">Войдите как пользователь</span>
				</header>
				<div class="content login-form">
					<div class="grid_5 alpha">
						<p>
							Введите ваши почту и пароль.
						</p>
						<div class="box-overlay">
						<?php if (isset($errors) && is_array($errors)) : ?>
							<ul>
								<?php foreach ($errors as $error) : ?>
									<li style="color:red; margin-left:15px;padding:5px;"><?php echo $error; ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
							<form action="signin" method="post" class="clearfix">
								<div class="form-row clearfix">
									<label>Email</label>
									<input type="email" name="email" value="<?php echo $email; ?>" class="wide" />
								</div>
								<div class="form-row clearfix">
									<label>Пароль</label>
									<input type="password" name="password" value="<?php echo $password; ?>" class="wide" />
								</div>
								<div class="form-row clearfix">
									<span>Forgot password? <a href="#">Click here</a></span>
									<input type="submit" value="Подтвердить" name='submit' class="float-r shadow" />
								</div>
							</form>
						</div>
					</div>
					<div class="grid_2"><div class="horizontal"><div class="icon-container"><div class="circle-icon"><span>&nbsp;</span></div></div></div>&nbsp;
					</div>
					<div class="grid_5 omega">
						<p class="label">Регистрация нового пользователя</p>
						<p>
							После регистарции Вам будет доступно:
						</p>
						<p>
							<span class="label">Персональная информация</span><br />
							Подробная информация о предыдущих заказах.
						</p>
						<p>
							<span class="label">Список желаний</span><br />
							Возможность создать список желаний.
						</p>
						<p>
							<span class="label">Автозаполнение форм</span><br />
							Вы экономите свое время на заполнении формы заказов.
						</p>
						<p>
							<span class="label">Статистика</span><br />
							Мы совершенствуемя благодаря вашим отзывам.
						</p>
					</div>
				</div>
			</article>
		</section> <!-- #content!!! -->
		
		<div class="clearfix"></div>
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
			
		});
	</script>
	
</body>
</html>