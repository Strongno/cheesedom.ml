<?php

class AdminProductController extends AdminBase {
    
    public function actionIndex() {
        self::checkAdmin();
        
        $productList = Product::getProductsList();
        require_once(ROOT . '/Views/site/admin_product/admin_productslist.php');
        return true;
    }
    
    public function actionDelete($id) {
        
       $newId = Product::deleteProductById($id);
       return true;
    }
}      