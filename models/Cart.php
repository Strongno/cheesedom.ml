<?php

class Cart {

    public static function addProduct($id) {
        $id = intval($id);
        $productsInCart = array();

        if (isset($_SESSION['products'])) {
            $productsInCart = $_SESSION['products'];
        }

        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id]++;
        } else {
            $productsInCart[$id] = 1;
        }

        $_SESSION['products'] = $productsInCart;
        
        return self::countItems();
    }
    
    


    public static function countItems() {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    public static function getProducts() {

        $productsId = array_keys($_SESSION['products']);

        $db = Db::getConnection();

        $idsString = implode(',', $productsId);

        $result = $db->query("SELECT * FROM products WHERE id IN ($idsString)");
        $result->setFetchMode(PDO::FETCH_ASSOC);

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

    public static function getProductPrice($id) {

        $db = Db::getConnection();
        $result = $db->query("SELECT price FROM products WHERE id = $id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $productItem = $result->fetch();
        return $productItem;
    }

}
