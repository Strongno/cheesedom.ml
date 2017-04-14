<?php
class CartController {
    
    // Корзина пользователя
    public function actionIndex() {

        if (isset($_SESSION['products'])) {
            //Обновлнение количества продуктов в корзине(пользователем)
            if (isset($_POST['update'])) {
                foreach ($_SESSION['products'] as $key => $value) {
                    $_SESSION['products'][$key] = $_POST["qty$key"];
                }
            }
            $productsInCart = array();
            $productsInCart = Cart::getProducts();
        }

        require_once(ROOT . '/Views/site/checkout.php');
        return true;
    }

     //Быстрое добавление в корзину
    public function actionAdd($id) {

        Cart::addProduct($id);

        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }
    
    public function actionAddAjax($id) {
        $quant = $_POST['find'];
        echo json_encode(Cart::addProduct($id, $quant));
        return true;
    }

    // Сумма всех продуктов в корзине(грн)
    public function actionCountSum() {

        if (isset($_SESSION['products'])) {
            $product = $_SESSION['products'];

            $sum = 0;
            foreach ($product as $key => $value) {
                $productPrice = Cart::getProductPrice($key);
                $sum = $sum + ($productPrice['price']/1000 * $value);
            }
        }
        return $sum;
    }

    // Удаление товара из корзины(по id)
    public function actionDelete($id) {

        if (isset($_SESSION['products'])) {
            unset($_SESSION['products'][$id]);
            if (count($_SESSION['products']) == 0) {
                unset($_SESSION['products']);
            }
        }
    }

}
