<?php include_once(ROOT.'/Views/layout/header.php');?>
	<?php if ($result == false): ?>
	<div align="center">	
					<div class="grid_5 alpha" style='margin-left:300px;'>
					<header><span class="h3">Исправте контактные данные если необходимо</span></header>
					<p class="label">Please enter your </p>
					<p class="label">contacts here: </p>
					
						<form action="booking" method="post" class="clearfix">
						<?php if (isset($errors) && is_array($errors)) : ?>
						<ul>
					<?php foreach ($errors as $error) : ?>
						<li class="<?php echo 'errors'; ?>"><?php echo $error; ?></li>
					<?php endforeach; ?>
						</ul>
					<?php endif; ?>
								<div class="form-row clearfix">
									<label>Email</label>
									<input type="email" name="email" value="<?php echo $user['email'] ?>" class="wide" />
								</div>
								<div class="form-row clearfix">
									<label>Name</label>
									<input type="text" name="name" value="<?php echo $user['name'] ?>" class="wide" />
								</div>
								<div class="form-row clearfix">
									<label>Telephone</label>
									<input type="text" name="telephone" value="<?php echo $user['telephone'] ?>" class="wide" />
								</div>
								<div class="form-row clearfix">
									<label>Comments</label>
									<input type="text" name="comment" value="" placeholder="Your comments" class="wide" />
								</div>
								<div class="form-row clearfix">
									<input type="submit" value="Book It" name='submit' class="float-r shadow" />
								</div>
							</form>
					</div>
	</div>
	<?php endif; ?>
	<?php if($result == true) echo "<p align='center'>You have ordered some cheese {$user['name']}</p>"; ?>
<?php include_once(ROOT.'/Views/layout/footer.php');?>