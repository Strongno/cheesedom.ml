<?php
class AdminCategoryController extends AdminBase{
    
    public function actionIndex() {
        self::checkAdmin();
        
        require_once(ROOT . '/Views/site/admin_category/admin_categorylist.php');
        return true;
    }
}