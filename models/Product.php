<?php

class Product {

    const SHOW_BY_DEFAULT = 6;

    //Выводит определенное количество продуктов
    public static function getNumberOfProducts($page = 1) {
        // Сортировка продуктов по по умолчанию
        if (isset($_SESSION['sortBy'])) {
            $sortValue = $_SESSION['sortBy'];
        } else {
            $sortValue = 'id';
        }

        if (isset($_POST['sortBy'])) {
            $sortValue = $_POST['sortBy'];
            $_SESSION['sortBy'] = $sortValue;
        }
        $count = self::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * $count;
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM products ORDER BY $sortValue LIMIT $count OFFSET $offset");

        $i = 0;
        while ($row = $result->fetch()) {
            $allProducts[$i]['id'] = $row ['id'];
            $allProducts[$i]['header'] = $row ['header'];
            $allProducts[$i]['image'] = $row ['image'];
            $allProducts[$i]['body'] = $row ['body'];
            $allProducts[$i]['price'] = $row ['price'];
            $allProducts[$i]['description'] = $row ['description'];
            $i++;
        }
        return $allProducts;
    }

    //Выводит один продукт
    public static function getOneProduct($id) {
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM products WHERE id = $id");
        //Выводит только ассоциативные ключи
        $result->setFetchMode(PDO::FETCH_ASSOC);
        //$result->setFetchMode(PDO::FETCH_NUM);
        $productItem = $result->fetch();
        return $productItem;
    }

    public static function viewAllCategories() {
        $db = Db::getConnection();
        $result = $db->query("SELECT name,id FROM categories");

        $i = 0;
        while ($row = $result->fetch()) {
            $allCategories[$i]['id'] = $row['id'];
            $allCategories[$i]['name'] = $row['name'];
            $i++;
        }
        return $allCategories;
    }

    public static function viewOneCategory($categoryId = false, $page = 1) {
        if ($categoryId) {
            $sortValue = 'id';
            if (isset($_SESSION['sortBy'])) {
                $sortValue = $_SESSION['sortBy'];
            }

            $page = intval($page);
            $count = self::SHOW_BY_DEFAULT;
            $offset = ($page - 1) * $count;
            $db = Db::getConnection();
            //var_dump($sortValue);
            $result = $db->query("SELECT * FROM products WHERE category_id = $categoryId ORDER BY $sortValue LIMIT $count OFFSET $offset");
            $i = 0;
            while ($row = $result->fetch()) {
                $allProductsBycategory[$i]['id'] = $row ['id'];
                $allProductsBycategory[$i]['header'] = $row ['header'];
                $allProductsBycategory[$i]['image'] = $row ['image'];
                $allProductsBycategory[$i]['body'] = $row ['body'];
                $allProductsBycategory[$i]['price'] = $row ['price'];
                $allProductsBycategory[$i]['description'] = $row ['description'];
                $i++;
            }
            return $allProductsBycategory;
        }
    }
    
    public static function getCategoryById($categoryId) {
        $db = Db::getConnection();
        $result = $db->query("SELECT name FROM categories WHERE id = $categoryId");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row;
    }

    public static function getTotalProducts($categoryId) {
        $db = Db::getConnection();
        if ($categoryId) {
            $result = $db->query("SELECT count(id) AS count FROM products WHERE category_id = $categoryId");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row = $result->fetch();
            return $row['count'];
        } else {
            $result = $db->query("SELECT count(id) AS count FROM products");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row = $result->fetch();
            return $row['count'];
        }
    }
    
    public static function getProductsList() {
       $db = Db::getConnection();
       
       $result = $db->query("SELECT * FROM products");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $allProducts[$i]['id'] = $row ['id'];
            $allProducts[$i]['header'] = $row ['header'];
            $allProducts[$i]['image'] = $row ['image'];
            $allProducts[$i]['body'] = $row ['body'];
            $allProducts[$i]['stock'] = $row ['stock'];
            $allProducts[$i]['category_id'] = $row ['category_id'];
            $allProducts[$i]['materials'] = $row ['materials'];           
            $allProducts[$i]['price'] = $row ['price'];
            $allProducts[$i]['description'] = $row ['description'];
            $i++;
        }
        return $allProducts;
    }
    
    /**
     * 
     * @param type $id of product
     * Deletes selected id from DB
     */
    public static function deleteProductById($id) {
        $db = Db::getConnection();
       $db->exec("DELETE FROM cheesedom.products WHERE products.id =$id");
    }

}
