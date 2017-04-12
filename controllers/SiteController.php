<?php 
require_once (ROOT . '/models/site.php');
class SiteController {
		
		public function actionIndex() {
		// Картинки для слайдов на главной
			$image = Site::GetSliderImages();

			$newsSliders = array();
			$newsSliders = Site::getNewsForSlider();
			require_once(ROOT.'/Views/site/index.php');
			return true;
		}

		// Отправка вопросов администрации сайта
		public function actionContacts() {
			$name = '';
			$userEmail = '';
			$userText = '';
			$result = false;

			if (isset($_POST['submit'])) {
				$userEmail = $_POST['userEmail'];
				$userText = $_POST['userText'];
				$name = $_POST['name'];

				$errors = false;

				if (!User::checkEmail($userEmail)) {
					$errors[] = "Неправильная почта";
				}
				if (!User::checkName($name)) {
					$errors[] = "Сшилком короткое имя";
				}
				if (!User::checkText($userText)) {
					$errors[] = "Слишком короткое сообщение";
				}

				if ($errors == false) {
					$errors[] = 'Сообщение отправлено!';
					$adminMail = 'rostme@mail.ru';
					$subject = "Тема письма";
					$message = "{$userText} от {$userEmail}";
					$result = mail($adminMail, $subject, $message);
					$result = true;
				}
			}
			
		
			require_once(ROOT.'/Views/site/contacts.php');
			return true;
		}

		public function action404() {
			require_once(ROOT.'/Views/site/404.php');
			return true;
		}
	}