<?php

require_once "models/CategorieModel.php";

class CategorieController
{
    private $model;

    public function __construct()
    {
        $this->model = new CategorieModel();
    }

    public function getAllCategories()
    {
        $categories = $this->model->getDBAllCategories();
        echo json_encode($categories);
    }

    public function getCategorieById($idCategorie)
    {
        $lignesCategorie = $this->model->getDBCategorieById($idCategorie);
        echo  json_encode($lignesCategorie);
    }

    public function getArticlesByCategorieById($idCategorie)
    {
        $articles = $this->model->getBDArticlesByCategorieById($idCategorie);
        echo json_encode($articles);    
    }
}
//$categorieController = new CategorieController();
//$categorieController->getAllCategories();