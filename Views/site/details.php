<?php include_once(ROOT.'/Views/layout/header.php');?>
		<div class="clearfix"></div>
		
		
		
		<section id="content" class="grid_12">
			<article class="details">
				<div class="post-media grid_8 alpha">
					<div class="thumbnails-show grid_6 omega">
						<?php if ($productOne['image'] == true) : ?>
						<img src="<?php echo $productOne['image']; ?>.jpg" data-zoom-image="<?php echo $productOne['image'];?>.jpg" />
						<?php endif; ?>
						<?php if ($productOne['image'] == false): ?>
							<img src="../../template/images/no_image.png" width="220" heigth="220" style="width:100%;" alt="" />
						<? endif; ?>	
					</div>
				</div>
				<div class="post-content grid_4 omega">
					<form action="/cart/add/<?php echo $productOne['id']; ?>" method='POST'>
					<span class="post-title"><?php echo $productOne['header']; ?></span><br />
					<p class="item-row">
					<?php echo $productOne['body']; ?>
					</p>
					<p class="item-row">
						<span class="item-title">Количество</span>
						<input type="text" name="quantity"  class="qty" placeholder="500 грамм" />
						<strong class="stock-status float-r">В наличии</strong><span class="float-r">Товар:</span>
					</p>
					<hr class="item-row" />
					<p class="item-row item-price">
						<span class="price">Цена - <?php echo $productOne['price'] ?> Грн/кг;</span>
					</p>
					<p class="item-row item-controls">
						<a href="#" class="button dark shadow">В список желаний</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="/cart/add/<?php echo $productOne['id']; ?>"><input type='submit'class="button dark shadow" style="height:37px;" value='В корзину'></a>
					</p>
				
				</div>
				
				<div class="post-info grid_8 alpha">
					<div class="tabbed-box">  
						<ul class="tabs clearfix" style="background: #ebf7f2;">
							<li class="active"><a href="#tab-1">Описание</a></li>
							<li><a href="#tab-2">Ингридиенты</a></li>
							<li><a href="#tab-3">Сочетания</a></li>
						</ul>
						<div class="panel current" id="tab-1">
							<p>
								The inspiration for the Byam Rug (2011) came from "the seemingly effortless play of form and proportion exemplified by 
								the great architecture of Louis Kahn," says British designer Christopher Farr, 
								"particularly in the design of the Kimbell Art Museum in Fort Worth, Texas.
								" Farr was educated at the Slade School in England, studied textiles in villages in Peru and Turkey, 
								and taught fine art at the Byam Shaw Art School in London (thus the name of the rug). 
							</p>
							<p>
								As a rug designer, he approaches the floor as the fifth wall, blending geometric sophistication with ancient rug weaving 
								tech¬niques to create abstract canvases for the floor (which is why Byam is available in one size and one colorway – like a work of art.)
							</p>
						</div>
						<div class="panel" id="tab-2" style="display: none;">
							<p>
								As a rug designer, he approaches the floor as the fifth wall, blending geometric sophistication with ancient rug weaving 
								tech¬niques to create abstract canvases for the floor (which is why Byam is available in one size and one colorway – like a work of art.)
							</p>
						</div>
						<div class="panel" id="tab-3" style="display: none;">
							<p>
								The Byam Rug is hand spun and hand tufted of fine wool and manually dyed in small batches to create rich tonal nuances in the strands.
							</p>
						</div>
					</div>
				</div>
			</article>
		</section>
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
			
			$('select').uniform();
			
			$('.thumbnails .slides').jcarousel({
				vertical: true,
				scroll: 3,
			});
			
			var zoom_config = {zoomWindowFadeIn: 500,
				zoomWindowFadeOut: 500,
				lensFadeIn: 500,
				lensFadeOut: 500,
				tint:true,
				tintColour:'#ebebeb',
				tintOpacity:0.5,
				borderSize: 0,
				zoomWindowWidth:300,
        		zoomWindowHeight:390,
        		lensBorderSize: 3,
        		lensBorderColour: '#66bdc2', };
        		
			$('.thumbnails-show img').elevateZoom(zoom_config);
				
			$('.thumbnails a').click(function(){
				var img = $('img', $(this)).clone();
				img.attr('data-zoom-image', $(this).attr('href'));
				
				img.elevateZoom(zoom_config);
				
				$('.thumbnails-show').html(img);
				return false;
			});
			
			$('.items-similar .slides').jcarousel({
				scroll: 1,
				initCallback: similar_initCallback,
				wrap: 'last',
				auto: 2,
			});
			
			$('.tabbed-box').upttabs();
			
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