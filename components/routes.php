<?php 
	return array(
			'category/([0-9]+)/page-([0-9]+)' => 'product/category/$1/$2',
			'category/([0-9]+)'								=> 'product/category/$1',
			'category'												=> 'product/index',
			'product/page-([0-9]+)' 					=> 'product/index/$1',	
			'product/([0-9]+)' 								=> 'product/view/$1',
			'product'										 			=> 'product/index',
			'cart/add/([0-9]+)'								=> 'cart/add/$1',
			'cart/delete/([0-9]+)'						=> 'cart/delete/$1',
			'booking'													=> 'checkout/booking',
			'fastorder'												=> 'checkout/fastOrder',
			'checkout'												=> 'checkout/index',
			'cart'														=> 'cart/index',
			'user/register'										=> 'user/register',
			'user/signin'											=> 'user/signin',
			'user/logout'											=> 'user/logout',
			'user/info'												=> 'cabinet/info',
			'user/cabinet'										=> 'cabinet/index',
			'user/account'										=> 'cabinet/index',
			'news/page-([0-9]+)'							=> 'news/index/$1',
			'news/([0-9]+)'										=> 'news/article/$1',
			'news'														=> 'news/index',
			'contacts'												=> 'site/contacts',
			'deliver'													=>  'site/404',
			''													 			=>  'site/index',


		);