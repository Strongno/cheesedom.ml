<?php

	class User {
		public static function register($name, $lastName, $email, $telephone, $password) {
		
		$db = Db::getConnection();
		
		$sql = ("INSERT INTO  users (name, lastName, email, telephone, password)
					VALUES (:name, :lastName, :email, :telephone, :password)");
					
		$result = $db->prepare($sql);
		$result->bindParam(':name', $name, PDO::PARAM_STR);
		$result->bindParam(':lastName', $lastName, PDO::PARAM_STR);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->bindParam(':telephone', $telephone, PDO::PARAM_STR);
		$result->bindParam(':password', $password, PDO::PARAM_STR);
	
		
		
		return $result->execute();
	}
	
		public static function checkName($name) {
			if(strlen($name) >= 2) {
				return true;
			}
			return false;
		}

		public static function checkPassword($password) {
			if (strlen($password) >= 6) {
				return true;
			}
		return false;
		}

		public static function checkPasswordConfirm($passwordConfirm) {
			if (strlen($passwordConfirm) >= 6) {
				return true;
				 }
		return false;
		}

		public static function checkPasswordSimilar($password, $passwordConfirm) {
				if ($password == $passwordConfirm) {
					return true;
				}
		return false;
		}
	
		public static function checkEmail($email) {
			if (filter_var ($email, FILTER_VALIDATE_EMAIL))
			{
				return true;
			}
			return false;
			}

		public static function checkText($text) {
			if (strlen($text) > 6)
			{
				return true;
			}
			return false;
			}

		public static function checkTelephone($telephone) {
			if (strlen($telephone) > 6)
			{
				return true;
			}
			return false;
			}

		public static function checkEmailExists($email) {
			
			$db = Db::getConnection();
			
			$sql = "SELECT COUNT(*) FROM users WHERE email = :email";
			
			$result = $db->prepare($sql);
			$result->bindParam(':email', $email, PDO::PARAM_STR);
			$result->execute();
			
			if($result->fetchColumn())
				return true;
			return false;
		}

		public static function checkUserData($email, $password) {
			$db = Db::getConnection();

			$sql = "SELECT * FROM users WHERE email=:email AND password=:password";
			$result = $db->prepare($sql);
			$result->bindParam(':email', $email, PDO::PARAM_INT);
			$result->bindParam(':password', $password, PDO::PARAM_INT);

			$result->execute();

			$user = $result->fetch();
			if($user) {
				return $user['id'];  
			}
			return false;
		}

		public static function auth($userId) {
			$_SESSION['user'] = $userId;
		}


		//Проверка на прохождение регистраии на сайте
		public static function checkLogged() 
		{

			if (isset($_SESSION['user'])) {
				return $_SESSION['user'];
			}

			header("Location: ../user/signin");
		}

		//Получаем зарегистрированного пользователя
		public static function getUserById($userId)  {
			$db = Db::getConnection();
			$result = $db->query("SELECT * FROM users WHERE  id= $userId");
			//Выводит только ассоциативные ключи
			$result->setFetchMode(PDO::FETCH_ASSOC);
			//$result->setFetchMode(PDO::FETCH_NUM);
			$userName = $result ->fetch();
			return $userName;
		}

		public static function Edit($id, $name, $email, $password) {
			$db = Db::getConnection();

			$sql = "UPDATE users SET name = :name, email= :email, password=:password";
			$result = $db->prepare($sql);
			$result->bindParam(':name', $name, PDO::PARAM_STR);
			$result->bindParam(':email', $email, PDO::PARAM_STR);
			$result->bindParam(':password', $password, PDO::PARAM_INT);

			$result->execute();

			$user = $result->fetch();
		}

	}