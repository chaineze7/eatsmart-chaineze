<?php

require_once "models/ArticleModel.php";

class ArticleController
{
    private $model;

    public function __construct()
    {
        $this->model = new ArticleModel();
    }

    public function getAllArticles()
    {
        $articles = $this->model->getDBAllArticles();
        echo json_encode($articles);
    }

    public function getArticleById($idArticle)
    {
        $lignesArticle = $this->model->getDBArticleById($idArticle);
        echo  json_encode($lignesArticle);
    }

    public function getCommandesByArticleById ($idArticle)
    {
        $commandes = $this->model->getDBCommandesByArticleById($idArticle);
        echo  json_encode($commandes);
    }
}
//$articleController = new ArticleController();
//$articleController->getAllArticles();