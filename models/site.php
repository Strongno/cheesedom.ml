<?php 

class Site {

	public static function getSliderImages() {
		$db = Db::getConnection();
		$result = $db->query("SELECT * FROM slider_image");

		$i = 0;
			while ($row = $result->fetch()) {
					$images[$i] = $row ['image'];
					$i++;
				}
		return $images;
	}

	public static function getNewsForSlider() {
		$db = Db::getConnection();
		$result = $db->query("SELECT * FROM news WHERE for_slider = 1");
		$i = 0;
		while ($row = $result->fetch()) {
				$newsSlider[$i]['image'] = $row ['image'];
				$newsSlider[$i]['title'] = $row ['title'];
				$newsSlider[$i]['id'] = $row ['id'];
				$i++;
			}
		return $newsSlider;
	}
}