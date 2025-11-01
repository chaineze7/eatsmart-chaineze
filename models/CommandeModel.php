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

    public function createDBCommande($data) {

        // commande
        $req1 = "INSERT INTO commande (id_commande, date_commande, prix_total, etat)
            VALUES (:id_commande, :date_commande, :prix_total, :etat)";

        
        $stmtCommande = $this->pdo->prepare($req1);

        $stmtCommande->bindParam(":id_commande", $data['id_commande'], PDO::PARAM_INT);
        $stmtCommande->bindParam(":date_commande", $data['date_commande'], PDO::PARAM_STR);
        $stmtCommande->bindParam(":prix_total", $data['prix_total'], PDO::PARAM_INT);
        $stmtCommande->bindParam(":etat", $data['etat'], PDO::PARAM_STR);
        
        $stmtCommande->execute();

        //article

        $req2 = "INSERT INTO assoc_article_commande (id_article, id_commande, quantite_article)
            VALUES (:id_article, :id_commande, :quantite_article)";

        $stmtArticle = $this->pdo->prepare($req2);

        foreach ($data['articles'] as $article) {
            $stmtArticle->bindParam(":id_article", $article['id_article'], PDO::PARAM_INT);
            $stmtArticle->bindParam(":id_commande", $data['id_commande'], PDO::PARAM_INT);
            $stmtArticle->bindParam(":quantite_article", $article['quantite_article'], PDO::PARAM_STR);
            $stmtArticle->execute();
        }
        

        

        $commande = $this->getDBCommandeById($data['id_commande']);



        return $commande;
    }
}
//$commandeModel = new CommandeModel();
//print_r($commandeModel->getDBAllCommandes());