<?php 

class News {
	const SHOW_BY_DEFAULT_NEWS = 2;
        
	// Получение всех новостей (не более 6 на странице)
	public function getAllNews($page = 1) {
		$count = self::SHOW_BY_DEFAULT_NEWS;

		$offset = ($page - 1) * $count;
		$db = Db::getConnection();
		$result = $db->query("SELECT * FROM news LIMIT $count OFFSET $offset");
		

		$i = 0;
		while ($row = $result->fetch()) {
				$news[$i]['id'] = $row['id'];
				$news[$i]['title'] = $row['title'];
				$news[$i]['body'] = $row['body'];
				$news[$i]['image'] = $row['image'];
				$news[$i]['additional'] = $row['additional'];
				$news[$i]['date'] = $row['date'];
				$news[$i]['author'] = $row['author'];
				$i++;
			}
		return $news;
	}

	public function getTotalNews() {
			$db = Db::getConnection();
			$result = $db->query("SELECT count(id) AS count FROM news");
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$row = $result->fetch();
			return $row['count'];
	}

	// Получение даты в нужном формате
	public function getDate($date) {

		$date = date('d F', time($date));
		echo $date;
	}


	public function getOneArticle($id) {
		$db = Db::getConnection();
		$result = $db->query("SELECT * FROM news WHERE id = $id");
		//Выводит только ассоциативные ключи
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$oneArticle = $result ->fetch();
		return $oneArticle;
	}

	public function addComment($name, $email, $comment, $id) {

			$db = Db::getConnection();
			$sql = ("INSERT INTO  comments (name, email, comment, article_id)
					VALUES (:name, :email, :comment, :id)");
			$result = $db->prepare($sql);

			$result->bindParam(':name', $name, PDO::PARAM_STR);
			$result->bindParam(':email', $email, PDO::PARAM_STR);
			$result->bindParam(':comment', $comment, PDO::PARAM_STR);
			$result->bindParam(':id', $id, PDO::PARAM_STR);
			return $result->execute();
	}

	public function getComments($id) {

			$db = Db::getConnection();
			$result = $db->query("SELECT * FROM comments WHERE article_id = $id");
			$oneComment = array();
			$i = 0;
			while ($row = $result->fetch()) {
				$oneComment[$i]['name'] = $row['name'];
				$oneComment[$i]['date'] = $row['date'];
				$oneComment[$i]['comment'] = $row['comment'];
				$i++;
			}
		return $oneComment;
	}

	public function countCommentsArticle($id) {
			$db = Db::getConnection();
			$result = $db->query("SELECT count(*) FROM comments WHERE article_id = $id");
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$count = $result->fetch();
			return $count;
		
	}

	public function CheckName($name) {
			if (strlen($name) > 2) {
				return true;
			}
			else return false;
	}

	public function CheckComment($comment) {
			if (strlen($comment) > 2 && strlen($comment < 255)) {
				return true;
			}
			else return false;
	}

	public static function checkLogged() {

			if (isset($_SESSION['user'])) {
				return $_SESSION['user'];
			}
		}
}