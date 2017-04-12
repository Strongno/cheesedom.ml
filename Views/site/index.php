<?php include_once(ROOT.'/Views/layout/header.php');?>

		
		<div class="clearfix"></div>
		
		<section id="content" class="grid_12">
			<article id="body">
				<div class="home-slide pull overlay">
					<div class="flexslider grid_12">
						<ul class="slides">
							<?php foreach($image as $key) : ?>
							<li>
								<div class="slide-media">
									<img src="../../template/images/<?php echo $key; ?>.jpg" />
								</div>
							</li>
							<?php endforeach; ?>
							<!-- <li>
								<div class="slide-content">
									<div class="content-inner">
										<span class="slide-title">Seminannial</span>
										<span class="slide-text">Sale</span>
										<hr class="slide-hr">
										<span class="mini-text">save hundreds of thousand dollars!</span><br>
										<a href="details.html" class="button dark shadow">Read more</a>
									</div>
								</div>
							</li> -->
							
						</ul>
					</div>
				</div>
			</article>
			
			<article>
				<header>
					<p class="text4">THINGS THAT HAVE A SOUL</p>
					<div class="news-title clearfix">
						<label class="label2 float-l">Новости</label>
						<label class="label uppercase float-r"><a href="/news">Все новости</a></label>
					</div>
				</header>
				<div class="news-slide pull overlay clearfix">
					<div class="grid_12">
						<ul class="slides jcarousel-skin-default">
						<?php foreach ($newsSliders as $slider) : ?>
							<li>
								<a href="news/<?php echo $slider['id']; ?>">
									<div class="slide-content">
										<strong class="slide-title"><?php echo $slider['title']; ?></strong><br />
									</div>
									<img src="../../template/images/<?php echo $slider['image']; ?>.jpg" />
								</a>
							</li>
							
						<?php endforeach; ?>
			  	    	
						</ul>
					</div>
				</div>
			</article>
			<article>
				<div class="grid_4 alpha">
					<h2>PHILOSOPHI</h2>
					<p>
						On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, 
						et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte. Du texte. 
						Du texte.' est qu'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard.
					</p>
				</div>
				<div class="grid_4">
					<h2>CLASS OF QUALITY</h2>
					<p>
						Plusieurs variations de Lorem Ipsum peuvent être trouvées ici ou là, mais la majeure partie 
						d'entre elles a été altérée par l'addition d'humour ou de mots aléatoires qui ne ressemblent pas.
					</p>
					<p>
						Si vous voulez utiliser un passage du Lorem Ipsum, vous devez être sûr qu'il n'y a rien d'embarrassant caché dans le texte.
					</p>
				</div>
				<div class="grid_4 omega">
					<h2>WHY UPTAKE?</h2>
					<ul class="qa-list list-style square">
						<li><a href="#">Le Aorem Ipsum ainsi obtenu ne contient</a></li>
						<li><a href="#">Contrairement à une opinion répandue</a></li>
						<li><a href="#">On sait depuis longtemps que travailler avec</a></li>
						<li><a href="#">Al contrario di quanto si pensi, Lorem Ipsum</a></li>
						<li><a href="#">Sopravvissuto non solo a più di cinque secoli</a></li>
						<li><a href="#">Sait depuis longtemps que travailler avec</a></li>
					</ul>
					<a href="details.html" class="button dark shadow float-r">Read more about Uptake</a>
				</div>
			</article>
			<article class="quote text-r">
				<p><span class="text4">Good design is as little design as possible.</span><br />
					– Dieter Rams
				</p>
			</article>
		</section> <!-- #content -->
		
		<div class="clearfix"></div>
		
<?php include_once(ROOT.'/Views/layout/footer.php');?>		
	
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
</body>
</html>
