<!DOCTYPE html>
<html dir="ltr" lang="ru" class="no-js">
<head>
	<meta charset="utf-8" />
	<title>РуМиНа</title>
	<meta name="viewport" content="width=device-width" />
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!-- scripts at bottom of page -->
	<script type="text/javascript" src="../../template/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="../../template/js/modernizr.js"></script>
	<script type="text/javascript" src="../../template/js/hoverIntent.js"></script>
	<script type="text/javascript" src="../../template/js/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="../../template/js/superfish.js"></script>
	<script type="text/javascript" src="../../template/js/supersubs.js"></script>
	<script type="text/javascript" src="../../template/js/jquery.jcarousel.min.js"></script>
	<script type="text/javascript" src="../../template/js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="../../template/js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="../../template/js/jquery.elevatezoom.min.js"></script>
	<script type="text/javascript" src="../../template/js/uptake.js"></script>
	
	<link rel="stylesheet" type="text/css" href="../../template/styles/stylenews.css"   />
	<link rel="stylesheet" type="text/css" href="../../template/styles/superfish.css" media="screen">
	<link rel="stylesheet" type="text/css" href="../../template/styles/superfish.css" media="screen">
	<link rel="stylesheet" type="text/css" href="../../template/styles/flexslider.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../../template/styles/skin.css" />
	<link rel="stylesheet" type="text/css" href="../../template/styles/960.css" />
	<link rel="stylesheet" type="text/css" href="../../template/styles/style.css" media="all" />
	
	<link rel="shortcut icon" href="../../template/images/favicon.png"> 
</head>

<body>
<?php include_once(ROOT.'/Controllers/CartController.php'); ?>
	<div id="wrapper" class="container_12">
		<header id="header" class="grid_12">
			<div class="header-top pull clearfix">
				<div class="grid_12">
					<div class="float-l">
					</div>
					<div class="float-r">
						<nav>
							<ul class="main-nav">

							<li class="basket">
							<div class="textbox basket-text float-r">
								<?php //Вывод суммы в корзине ?>
								<label>Корзина - <?php if (isset($_SESSION['products'])) echo  CartController::actionCountSum().'грн'; else echo 'пуста'; ?></label>
							</div>
							<div class="clearfix"></div>
							
							<ul class="basket-dropdown" style="">
								<?php if (isset($_SESSION['products'])) : ?>
								<li class="dropdown-header overlay">
									<label class="item"><strong>Название товара</strong></label>
									<label class="price-each"><strong>Цена за кг</strong></label>
									<label class="price"><strong>Цена</strong></label>
								</li>
								
								<?php $productsInSmallCart = Cart::getProducts(); ?>
								<?php foreach($productsInSmallCart as $key): ?>
								<li class="dropdown-line clearfix">
								
									<div>
									<img src="<?php echo $key['image'];?>.jpg" alt="" />
									
									<div class="first">
										<strong><a href="details.html"><?php echo $key['header']; ?></a></strong><br />
										Количество:<br/> <?php echo $_SESSION['products'][$key['id']]; ?> кг
									</div>
									<div class="price-one"><?php echo $key['price']; ?>грн</div>
									
									<div class="price-two"><?php echo $_SESSION['products'][$key['id']]*$key['price']; ?>грн</div>
									<div class="remove"><a href="/cart/delete/<?php echo $key['id'];?>">Удалить</a>
									</div>
									</div>
							
								</li>
								<?php endforeach; ?>
								

								<li class="" style="float:right; margin-right:20px">
									<strong>Сумма</strong>: <span class="hl-text"><?php if (isset($_SESSION['products'])) echo CartController::actionCountSum(); else echo '0';?> грн</span>
								</li>
								
								<li class="dropdown-footer clearfix">
									<a href="/checkout" class="button dark shadow">Оформить заказ</a>
									<a href="/cart" class="button dark shadow">Корзина</a>
								</li>
								<?php endif; ?>
							</ul>
						
						</li>
							<?php if (isset($_SESSION['user'])) :?>
								<li>
									<a href="/user/cabinet">Кабинет <span><?php $user = User::getUserById($_SESSION['user']); echo $user['name']; ?>(а)</span></a>
								</li>
							<?php endif; ?>
							<?php //Проверка являетмя ли пользователь заригестрированным
								 if(!isset($_SESSION['user'])) { echo "<li><a href='../user/signin'>Вход</a></li>  <li><a href='../user/register'>Регистрация</a></li>";} else { echo "<a href='../user/logout'>Выход</a>"; } ?>
								
							
							</ul>
							<div class="nav-right">

								
							</div>
						</nav>
					</div>
				</div>
			</div>
			<div class="header-center clearfix">
				<div class="logo grid_5 alpha" style="width:940px;">
					<a href="/index" style="padding:0;"><img src="../../template/images/logo.png" alt="logo" style="margin-left:315px; width:280px; height:170px;position:relative; z-index:10; top:15px"/></a>
				</div>
				<div class="top-components grid_7 omega">
					<div class="grid_4 alpha">
					</div>
					<div class="grid_3 omega">
						
					</div>
				</div>
			</div>
			<nav id="main-menu" class="header-bottom pull clearfix">
				<ul class="sf-menu grid_12" style=" margin-left:0px; width:1040px;">
					<li>
						<a href="/index">Главная</a>
					</li>
					<li>
						<a href="/news">Новости</a>
					</li>
					<li>
						<a href="/product">Наша продукция</a>
					</li>
					<li>
						<a href="/deliver">Доставка</a>
					</li>
					<li>
						<a href="/contacts">О нас</a>
					</li>
				</ul>
			</nav>
		</header> <!-- #header -->