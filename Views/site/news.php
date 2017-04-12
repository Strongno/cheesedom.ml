<?php include_once(ROOT.'/Views/layout/header.php');?>
			<div id="lcnt">

				<!-- Post -->
				<?php foreach($newsList as $one) : ?>
				<div class="post">

					<!-- Post Details -->
					<div class="post_inf">

						<span><?php News::getDate($one['date']); ?></span><br />
						<span class="posn"><?php echo $one['author']; ?></span><br />
						<?php $countSum = News::countCommentsArticle($one['id']); ?>
						<a class="posc" href="/news/<?php echo $one['id']; ?>"><?php if ($countSum['count(*)'] == 0) echo '0'; else  echo $countSum['count(*)']; ?> Комментарий(ев)</a>
					
					</div>

					<!-- Post Title - Permalink -->
					<h1>
						<a href="/news/<?php echo $one['id']; ?>"><?php echo $one['title']; ?></a>
					</h1>

					<!-- Post Content -->
					<a class="pic_lnk" href="/news/<?php echo $one['id']; ?>"><img src="../../template/images/<?php echo $one['image']; ?>.jpg" alt="post_pic1" /></a>

					<p><?php echo $one['body']; ?></p>

				</div>
				<?php endforeach; ?>
					
		
				<!-- Pagination -->	
				<?php echo $pagination->get(); ?>
			</div>
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
					b.fadeOut(10000);
					return;
				}
				
				b.fadeIn().show();
				basketTimeout = window.setTimeout(function(){
					b.fadeOut();
				}, 10000);
			});
			
			$('.basket-dropdown').mouseenter(function(){
				if(basketTimeout) 
					window.clearTimeout(basketTimeout);
			}).mouseleave(function(){
				var $this = $(this);
				basketTimeout = window.setTimeout(function(){
					$this.fadeOut(5000);
				}, 10000);
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
			
			$('.home-slide .flexslider').flexslider({
				directionNav: false,
				start: function(o){
					$('body').removeClass('loading');
				}
			});
			
			$('.news-slide .slides').jcarousel({
				scroll: 1,
				initCallback: similar_initCallback,
				wrap: 'last',
				auto: 2,
			});
			
		});
	</script>

<?php include_once(ROOT.'/Views/layout/footer.php');?>