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

    public function createArticle($data) {
        $ligneArticle = $this->model->createDBArticle($data);
        http_response_code(201);
        echo json_encode($ligneArticle);
    }

}
//$articleController = new ArticleController();
//$articleController->getAllArticles();