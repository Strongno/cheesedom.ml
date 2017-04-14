<?php

class CheckoutController {

    // Перенаправление на заказ, если пользователь вошел.
    public function actionIndex() {

        if (Checkout::checkLogged()) {
            $user = $_SESSION['user'];

            header("Location: ../booking");
        }
    }

    //Быстрый заказ без регистрации
    public function actionfastOrder() {

        $email = '';
        $password = '';
        $tepephone = '';
        $name = '';

        // Входим как пользователь
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $errors = false;

            //Проверяем существует ли такой пользователь
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                $errors[] = 'Такого пользователя не существует';
            } else {
                //Если данные правильные запоминаем пользователя и создаем сессию
                User::auth($userId);
                //Перенаправляем на заказ
                header("Location: /booking");
            }
        }
        // Покупаем без регистрации
        $productsInCart = Cart::getProducts();
        $result = false;
        if (isset($_POST['submit_order'])) {
            $name = $_POST['name'];
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $comment = $_POST['comment'];
            $user_id = 'none';

            $errors = '';
            if (User::checkName($name)) {
                echo "";
            } else {
                $errors[] = "Слишком короткое имя";
            }

            if (User::checkEmail($email)) {
                echo "";
            } else {
                $errors[] = "Неверный формал Email";
            }

            if (User::checkTelephone($telephone)) {
                echo "";
            } else {
                $errors[] = "Неверный формал телефона";
            }


            $prod = "";
            $date = date("G:i--d-m-Y");
            foreach ($productsInCart as $key) {
                $prod = $prod . '__' . $key['header'] . '(' . $_SESSION['products'][$key['id']] . ')';
            }
            $prod = strval($prod);

            if ($errors == false) {
                $result = Checkout::makeOrder($name, $email, $comment, $telephone, $user_id, $date, $prod);
                Checkout::clear();
            }
        }

        require_once(ROOT . '/Views/site/fastorder.php');
        return true;
    }

    //Покупка после входа пользователя
    public function actionBooking() {

        $user = User::getUserById($_SESSION['user']);
        $productsInCart = Cart::getProducts();
        $result = false;
        if (isset($_POST['submit'])) {

            $prod = "";
            $date = date("G:i--d-m-Y");
            $comment = $_POST['comment'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];

            $errors = '';
            if (User::checkName($name)) {
                echo "";
            } else {
                $errors[] = "Слишком короткое имя";
            }

            if (User::checkEmail($email)) {
                echo "";
            } else {
                $errors[] = "Неверный формал Email";
            }

            if (User::checkTelephone($telephone)) {
                echo "";
            } else {
                $errors[] = "Неверный формал телефона";
            }

            foreach ($productsInCart as $key) {
                $prod = $prod . '__' . $key['header'] . '(' . $_SESSION['products'][$key['id']] . ')';
            }

            $prod = strval($prod);

            if ($errors == false) {
                $result = Checkout::makeOrder($name, $email, $comment, $telephone, $user['id'], $date, $prod);
                Checkout::clear();
            }
        }

        require_once(ROOT . '/Views/site/booking.php');
        return true;
    }

}
