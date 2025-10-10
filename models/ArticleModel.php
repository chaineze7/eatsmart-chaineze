<?php

class ArticleModel
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

    public function getDBAllArticles()
    {
        $stmt = $this->pdo->query("SELECT * FROM article");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDBArticleById ($idArticle)
    {
        $req = "
            SELECT * FROM Article
            WHERE id_article = :idArticle
        ";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindValue(":idArticle", $idArticle, PDO::PARAM_INT);
        $stmt->execute();
        $article = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $article;
    }
}
//$articleModel = new ArticleModel();
//print_r($articleModel->getDBAllArticles());