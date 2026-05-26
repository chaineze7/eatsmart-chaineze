<?php

require_once "models/CommandeModel.php";

// Controleur des commandes
class CommandeController
{
    private $model;

    public function __construct()
    {
        $this->model = new CommandeModel();
    }

    // Récupère toutes les commandes
    public function getAllCommandes()
    {
        $commandes = $this->model->getDBAllCommandes();
        echo json_encode($commandes);
    }

    // Récupère une commande pas son ID
    public function getCommandeById($idCommande)
    {
        $lignesCommande = $this->model->getDBCommandeById($idCommande);
        echo  json_encode($lignesCommande);
    }

    // Récupère les articles d'une commande
    public function getArticlesByCommandeById($idCommande)
    {
        $articles = $this->model->getBDArticlesByCommandeById($idCommande);
        echo  json_encode($articles);
    }

    // Création d'une commande
    public function createCommande($data) {
        $ligneCommande = $this->model->createDBCommande($data);
        http_response_code(201);
        echo json_encode($ligneCommande);
    }
}
//$commandeController = new CommandeController();
//$commandeController->getAllCommandes();