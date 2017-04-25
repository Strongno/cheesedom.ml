<?php

class ProductController {

    // Отображение продктов на странице
    public function actionIndex($page = 1) {

        $categoryList = array();
        $categoryList = Product::viewAllCategories();

        $productList = array();
        $productList = Product::getNumberOfProducts($page);
        ;
        //if (isset($_SESSION['sortBy'])) print_r(1);
        $total = Product::getTotalProducts($categoryId = false);
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');



        require_once(ROOT . '/Views/site/products.php');
        return true;
    }

    // Вывод одного продукта
    public function actionView($id) {

        $productOne = array();
        $productOne = Product::getOneProduct($id);

        require_once(ROOT . '/Views/site/details.php');
        return true;
    }

    //Сортировка по категориям
    public function actionCategory($categoryId, $page = 1) {

        $categoryList = array();
        $categoryList = Product::viewAllCategories();

        $productList = array();
        $productList = Product::viewOneCategory($categoryId, $page);

        //Пагинация страниц
        $total = Product::getTotalProducts($categoryId);
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/Views/site/products.php');

        return true;
    }

}
