<?php

require_once "models/CommandeModel.php";

class CommandeController
{
    private $model;

    public function __construct()
    {
        $this->model = new CommandeModel();
    }

    public function getAllCommandes()
    {
        $commandes = $this->model->getDBAllCommandes();
        echo json_encode($commandes);
    }

    public function getCommandeById($idCommande)
    {
        $lignesCommande = $this->model->getDBCommandeById($idCommande);
        echo  json_encode($lignesCommande);
    }

    public function getArticlesByCommandeById($idCommande)
    {
        $articles = $this->model->getBDArticlesByCommandeById($idCommande);
        echo  json_encode($articles);
    }

    public function createCommande($data) {
        $ligneCommande = $this->model->createDBCommande($data);
        http_response_code(201);
        echo json_encode($ligneCommande);
    }
}
//$commandeController = new CommandeController();
//$commandeController->getAllCommandes();