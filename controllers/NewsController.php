<?php 

class NewsController {

	//Вывод всех новостей + постраничная навигация
	public function actionIndex($page = 1) {

		$newsList = array();
		$newsList = News::getAllNews($page);

		$total = News::getTotalNews();

		$pagination = new Pagination ($total, $page, News::SHOW_BY_DEFAULT_NEWS, 'page-');

		require_once(ROOT.'/Views/site/news.php');
		return true;
	}
	
	//Отображение одной новости
	public function actionArticle($id) {
		$name = '';
		$email = '';
		$comment = '';

		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$comment = $_POST['comment'];

			$errors = false;

			if (!News::CheckName($name)) {
				$errors[] = 'Введите имя длиннее 2 символов';
			}
			if (!News::CheckComment($comment)) {
				$errors[] = 'Ваш комментарий слишком короткий';
			}

			if ($errors == false) {
				$errors[] = 'Ваш комментарий отправлен';
				News::addComment($name, $email, $comment, $id);
			}
			
		}
		//Получение комментариев для одной новости
		$comments = array();
		$comments = News::getComments($id);
		//Получение страници новости
		$newsArticle = array();
		$newsArticle = News::getOneArticle($id);

		require_once(ROOT.'/Views/site/article.php');
		return true;
	}
}