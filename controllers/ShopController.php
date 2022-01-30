<?php
require_once 'PageController.php';
require_once 'models/WebshopModel.php';

class ShopController extends PageController
{
    private $model;

    public function __construct($model)
    {
        $this->model = new WebshopModel($model);
    }

    public function getProductList()
    {
        $this->model->getProductList();
    }
    
    public function showWebshop()
    {   
        $this->model->handleCartActions(); //TODO: write method to handle cart actions
        require_once 'views/Webshop_Doc.php';
        $view = new WebshopDoc($this->model);
        $view->show();
    }

    public function showProductPage()
    {
        $this->model->handleCartActions(); //TODO: write method to handle cart actions
        require_once 'views/Product_Page_Doc.php';
        $this->model->getProduct();
        $view = new ProductPageDoc($this->model);
        $view->show();
    }
}