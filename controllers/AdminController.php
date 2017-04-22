<?php

class AdminController {
    
    public function actionIndex() {
        require_once(ROOT . '/Views/site/adminpanel.php');
        return true;
    }
}