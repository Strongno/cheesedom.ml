<?php

class Checkout {
	
	public static function checkLogged() 
		{

			if (isset($_SESSION['user'])) {
				return $_SESSION['user'];
			}

			header("Location: /fastorder");
		}

	public static function makeOrder($name, $email, $comments, $telephone = 'none', $id = 'none', $dates, $products) {
		
		$db = Db::getConnection();
		$sql=("INSERT INTO orders (user_name, user_email, user_comment, user_telephone, user_id, dates, products)VALUES(:user_name, :user_email, :user_comment, :user_telephone, :user_id, :dates, :products)");
		
		$result = $db->prepare($sql);
		$result->bindParam(':user_name', $name, PDO::PARAM_STR);
		$result->bindParam(':user_email', $email, PDO::PARAM_STR);
		$result->bindParam(':user_comment', $comments, PDO::PARAM_STR);
		$result->bindParam(':user_telephone', $telephone, PDO::PARAM_STR);
		$result->bindParam(':user_id', $id, PDO::PARAM_STR);
		$result->bindParam(':dates', $dates, PDO::PARAM_STR);
		$result->bindParam(':products', $products, PDO::PARAM_STR);
		return $result->execute();
	}

	public static function clear() {
		unset($_SESSION['products']);
                unset($_SESSION['items']);
                unset($_SESSION['quant']);
	}
}