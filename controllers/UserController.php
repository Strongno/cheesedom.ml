<?php

	class UserController {

		//Регистрация нового пользователя
		public function actionRegister() {

			$name = '';
			$lastName = '';
			$email = '';
			$telephone = '';
			$password = '';
			$passwordConfirm = '';
			$result = false;

			if (isset($_POST['submit'])) {
				$name = $_POST['name'];
				$email = $_POST['email'];
				$lastName = $_POST['lastName'];
				$telephone = $_POST['telephone'];
				$password = $_POST['password'];
				$passwordConfirm = $_POST['passwordConfirm'];
			
				$errors = false;	

				if (User::checkName($name)) {
					echo "";
				} else {
					$errors[] = "Слишком короткое имя";
				}
				
				if (User::checkName($lastName)) {
					echo "";
				} else {
					$errors[] = "Слишком короткая фамилия";
				}
				
				if (User::checkEmail($email)) {
					echo "";
				} else {
					$errors[] = "Неверный формат почты";
				}
				if (User::checkTelephone($telephone)) {
					echo "";
				} else {
					$errors[] = "Неверный формат телефона";
				}

				if (User::checkPassword($password)) {
					echo "";
				} else {
					$errors[] = "Слишком легкий пароль";
				}

				if (User::checkPasswordConfirm($passwordConfirm)) {
					echo "";
				} else {
					$errors[] = "Введите подтверждение пароля";
				}

				if (User::checkPasswordSimilar($password, $passwordConfirm)) {
					echo "";
				} else {
					$errors[] = "Пароли отличаются";
				}

				if (User::checkEmailExists($email)) {
					$errors[] = "Такой Email уже существует";
				}

				if ($errors == false) {
					$errors[] = 'Вы успешно зарегистрированы';
					$result = User::register($name,$lastName, $email, $telephone, $password);
				}

			}

			require_once(ROOT.'/Views/site/register.php');
			return true;
		}

		// Авторизация пользователя
		public function actionSignin() {

			$email = '';
			$password = '';
			

			if (isset($_POST['submit'])) {
				$email = $_POST['email'];
				$password = $_POST['password'];
				$errors = false;


				//Валидаия полей
				if (!User::checkEmail($email)) {
					$errors[] = "Неправильная почта";
				}
				if (!User::checkPassword($password)) {
					$errors[] = "Неправильный пароль";
				}


				//Проверяем существует ли такой пользователь
				$userId = User::checkUserData($email, $password);

				if ($userId == false) {
					$errors[] = 'Такого пользователя не существует';
				}
				else {
					//Если данные правильные запоминаем пользователя и создаем сессию
					User::auth($userId);
					//Перенаправляем в кабинет
					header("Location: ../user/cabinet");
				}
			}

			require_once(ROOT.'/Views/site/signin.php');
			return true;
		}

		// Выход пользователя
		public function actionLogout() {
			unset($_SESSION['user']);
			header("Location: /");
		}

}