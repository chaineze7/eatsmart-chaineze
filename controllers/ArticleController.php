<?php

require_once "models/ArticleModel.php";

// Controleur des articles : fait le lien entre l'API et la base de données
class ArticleController
{
    private $model;

    public function __construct()
    {
        $this->model = new ArticleModel();
    }

    // Récupère tous les articles 
    public function getAllArticles()
    {
        $articles = $this->model->getDBAllArticles();
        echo json_encode($articles);
    }

    // Récupère un article par son ID
    public function getArticleById($idArticle)
    {
        $lignesArticle = $this->model->getDBArticleById($idArticle);
        echo  json_encode($lignesArticle);
    }

    // Récupère les commandes liées à un article
    public function getCommandesByArticleById ($idArticle)
    {
        $commandes = $this->model->getDBCommandesByArticleById($idArticle);
        echo  json_encode($commandes);
    }

    // Création d'un article
    public function createArticle($data) {
        $ligneArticle = $this->model->createDBArticle($data);
        // Code HTTP 201 = crée
        http_response_code(201);
        echo json_encode($ligneArticle);
    }

    // Suppression d'un article
    public function deleteArticle($id) {
      $success=$this->model->deleteDBArticle($id);
       if ($success) {
            // 204 = suppression réussie
            http_response_code(204);
        } else {
            http_response_code(404);
            echo json_encode(["messge" => "Article introuvable"]);
        }  
    }

    // Modification d'un article
    public function updateArticle($id,$data) {
        $success=$this->model->updateDBArticle($id, $data);
        if ($success) {
            http_response_code(204);
        } else {
            http_response_code(404);
            echo json_encode(["messge" => "Article non trouvé ou non modifié"]);
        }

    
    }

}
//$articleController = new ArticleController();
//$articleController->getAllArticles();