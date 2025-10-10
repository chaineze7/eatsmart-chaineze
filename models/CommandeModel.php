<?php

class CommandeModel
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=eatsmart_bdd_bruno;charset=utf8", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function getDBAllCommandes()
    {
        $stmt = $this->pdo->query("SELECT * FROM commande");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDBCommandeById ($idCommande)
    {
        $req = "
            SELECT * FROM Commande
            WHERE id_commande= :idCommande
        ";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindValue(":idCommande", $idCommande, PDO::PARAM_INT);
        $stmt->execute();
        $commande = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $commande;
    }

    public function getBDArticlesByCommandeById($idCommande)
    {
        $req = "
            SELECT article.* 
            FROM article, assoc_article_commande
            WHERE article.id_article = assoc_article_commande.id_article 
            AND assoc_article_commande.id_commande = :idCommande
        ";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindValue(":idCommande", $idCommande, PDO::PARAM_INT);
        $stmt->execute();
        $commande = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $commande;
    }
}
//$commandeModel = new CommandeModel();
//print_r($commandeModel->getDBAllCommandes());