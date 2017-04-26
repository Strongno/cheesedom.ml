<?php
class AdminController extends AdminBase{
    
    public function actionIndex() {
        self::checkAdmin();
        
        require_once(ROOT . '/Views/site/adminpanel.php');
        return true;
    }
    
    public function actionProduct() {
        
    }
}