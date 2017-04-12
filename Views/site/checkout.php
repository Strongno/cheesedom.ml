<?php include_once(ROOT.'/Views/layout/header.php');?>
		
		<div class="clearfix"></div>
		
		<section id="content" class="grid_12">
		<?php if (isset($productsInCart)) : ?>
			<article id="cart-content">
				<header><span class="h3">Пожалуйста проверте Ваш заказ</span></header>
				<div class="content">
					<form action="/cart" method="post">
						
						<table class="shop_table cart bordered" cellspacing="0">
							<thead>
								<tr>
									<th class="product-info">Название товара</th>
									<th class="product-quantity">Количество, кг</th>
									<th class="product-price">Цена за 1 кг</th>
									<th class="product-subtotal">Стоимость</th>
									<th class="product-subtotal"></th>
								</tr>
							</thead>
							<tbody>
							
							<?php foreach($productsInCart as $product):?>
								<tr class="cart_table_item">

									<td class="product-info">
										<div class="product-thumbnail">
											<a href="#"><img width="200" height="200" src="<?php echo $product['image']; ?>.jpg" alt="elephant" title="elephant"></a>
										</div>
										<div class="product-name">
											<a href="details.html"><span class="h4"><?php echo $product['header']; ?></span></a>
										</div>
									</td>
									<!-- The code -->
									
									<!-- Quantity inputs -->
									<td class="product-quantity">
										<div class="quantity buttons_added">
											<input type="text" name="qty<?php echo $product['id'];?>" data-min="" data-max="0" value="<?php echo $_SESSION['products'][$product['id']]; ?>" size="4" title="Qty" class="qty text" maxlength="12"><br />
										</div>
									</td>
									<!-- Product price -->
									<td class="product-price"><span><?php echo $product['price']; ?> грн</span></td>

									<!-- Product subtotal -->
									<td class="product-subtotal"><span><?php echo $_SESSION['products'][$product['id']]*$product['price']; ?> грн</span></td>
									<td class="product-subtotal"><a href="/cart/delete/<?php echo $product['id'];?>">Delete</a></td>
								</tr>
								<?php endforeach; ?>
								
							</tbody>
						</table>
						
						
						<p style="float:right;margin-top:-30px"> После изменения количества товара, нажмите обновить</p>
						<input type='submit' name='update' value='Обновить содержимое' style="float:right;clear:right;">
					</form>
					
					<div class="cart-collaterals clearfix" style="clear:right;float:right;">
						
						<div class="cart_totals grid_4 omega" >
							
							<table cellspacing="0" cellpadding="0" class="bordered">
								<tbody>
									<tr>
										<th><strong>Сумма к оплате</strong></th>
										<td><strong><span><?php if (isset($_SESSION['products'])) echo CartController::actionCountSum(); else echo '0';?>  грн</span></strong></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</article>
			
			<article class="payments">
					<a href="/checkout" class="button dark shadow float-r">Подтвердить заказ</a>
			</article>
			
			<?php endif; ?>
		<?php if (!isset($productsInCart)) :?>
		<h1 align='center'>В корзине пока нет заказов </h1>
		<a href='/product' align='center' style='display:block'> Продолжить покупки </a>
		<?php endif; ?>
		</section> <!-- #content -->
		
		<div class="clearfix"></div>
<?php include_once(ROOT.'/Views/layout/footer.php');?>			
		
	</div>
	<div class="content-border-bottom container_12">&nbsp;</div>
	<script type="text/javascript">
		function similar_initCallback(carousel)
		{
			// Disable autoscrolling if the user clicks the prev or next button.
			carousel.buttonNext.bind('click', function() {
			    carousel.startAuto(0);
			});
			
			carousel.buttonPrev.bind('click', function() {
			    carousel.startAuto(0);
			});
			
			// Pause autoscrolling if the user moves with the cursor over the clip.
			carousel.clip.hover(function() {
			    carousel.stopAuto();
			}, function() {
			    carousel.startAuto();
			});
		};
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
			
			$('select, input[type="checkbox"], input[type="radio"]').uniform();
			
			$('.items-similar .slides').jcarousel({
				scroll: 1,
				initCallback: similar_initCallback,
				wrap: 'last',
				auto: 2,
			});
		});
	</script>
	
</body>
</html>