<?php
class Cart {
    public static function addProduct($id, $quant) {
        $quant = intval($quant);
        $id = intval($id);
        $productsInCart = array();

        if (isset($_SESSION['products'])) {
            $productsInCart = $_SESSION['products'];
        }

        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id] = $productsInCart[$id] + $quant;
        } else {
            $productsInCart[$id] = $quant;
        }

        $_SESSION['products'] = $productsInCart;
        $_SESSION['quant'] = self::countQuantity();
        $_SESSION['items'] = self::countItems();
        $arr_i_q = array("quant"   => self::countQuantity(), 
                         "items"   => self::countItems());
        return $arr_i_q;
    }
    
    


    public static function countQuantity() {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count/1000;
        } else {
            return 0;
        }
    }
     public static function countItems() {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $key) {
                $count++;
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
