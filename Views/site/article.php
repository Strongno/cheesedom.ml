<?php include_once(ROOT.'/Views/layout/header.php');?>
			<!-- Left Container -->
			<div id="lcnt">

				<!-- Post -->
				<div class="post">

					<!-- Post Details -->
					<div class="post_inf">

						<span><?php News::getDate($newsArticle['date']); ?></span><br />
						<span class="posn"><?php echo $newsArticle['author']; ?></span><br />

					</div>

					<!-- Post Title - Permalink -->
					<h1>
						<?php echo $newsArticle['title']; ?>
					</h1>

					<!-- Post Content -->
					<img src="../../template/images/<?php echo $newsArticle['image']; ?>.jpg" alt="art_pic1" />

					<p><?php echo $newsArticle['body']; ?></p>

				</div>

				<h2>
					<?php if (isset($comments)) :?>
					<?php $countSum = News::countCommentsArticle($newsArticle['id']); ?>
					<?php if ($countSum['count(*)'] == 0) echo '0'; else  echo $countSum['count(*)']; ?> Комментарий(ев)
					
				</h2>

				<!-- Comments -->
				<div class="comments">
				
					<?php foreach ($comments as $comment) : ?>
					<!-- Comment -->
					<div class="comment">

						<div class="comm_hdr">
							<p><?php echo $comment['name']; ?> <span> | <?php echo $comment['date']; ?></span></p>
						</div>

						<div class="avat">
							<img src="../../template/images/avatar.jpg" alt="avatar" />
							<img src="../../template/images/avatar_frame.png" alt="avatar_frame" class="avatar_frame" />
						</div>
					
						<p>
							<?php echo $comment['comment']; ?>
						</p>

					</div>
				<?php endforeach; ?>
			<?php endif; ?>
					
				</div>

				<h2>Напишите комментарий</h2>

				<!-- Comment Form -->			
				<form id="cmnt_frm" method="post" action="/news/<?php echo $newsArticle['id']; ?> ">
				<?php if(isset($errors)) : ?>
				<?php foreach ($errors as $err) : ?>
				<?php echo "<p>$err</p>"; ?>
				<?php endforeach; ?>
				<?php endif; ?>
                                        <p><input type="text" name="name" size="22" tabindex="1" id="author" value="<?php if (News::checkLogged()) { $user = User::getUserById($_SESSION['user']); print_r ($user['name']); } else {echo ''; } ?>"/><label>Имя <span>(необходим)</span></label></p>
                                        <p><input type="email" name="email" size="22" tabindex="2" id="email"/><label>Mail <span>(необходим)</span></label></p>
                                        <p>
                                                <textarea name="comment" cols="65" rows="10" tabindex="4" id="comment"></textarea>
                                        </p>
                                        <p>
                                                <input type="submit" name="submit" value="Отправить" tabindex="5" id="submit" style="background-color:#434343;"/>
                                        </p>

				</form>

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
