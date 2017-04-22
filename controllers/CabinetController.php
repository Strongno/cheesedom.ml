<?php

class CabinetController {

    public function actionIndex() {

        $userId = User::checkLogged();

        $user = User::getUserById($userId);
        require_once(ROOT . '/Views/site/cabinet.php');
        return true;
    }

    // Редактирование данных пользователя
    public function actionInfo() {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);

        $name = $user['name'];
        $email = $user['email'];
        $password = $user['password'];

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $user['email'];
            $password = $_POST['password'];
            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Вы ввели неверное имя';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Вы ввели неверный email';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Вы ввели неверный пароль';
            }

            if ($errors == false) {
                $errors[] = 'Ваши данные изменены';
                $result = User::edit($userId, $name, $email, $password);
                header("Location: ../user/info");
            }
        }

        require_once(ROOT . '/Views/site/cabinetInfo.php');
        return true;
    }

}
