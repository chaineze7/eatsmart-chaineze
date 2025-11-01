<?php

require_once "./controllers/ArticleController.php";
require_once "./controllers/CategorieController.php";
require_once "./controllers/CommandeController.php";

$articleController = new ArticleController();
$categorieController = new CategorieController();
$commandeController = new CommandeController();


// Vérifie si le paramètre "page" est vide ou non présent dans l'URL
if (empty($_GET["page"])) {
    // Si le paramètre est vide, on affiche un message d'erreur
    echo "La page n'existe pas";
} else {
    // Sinon, on récupère la valeur du paramètre "page"
    // Par exemple, si l’URL est : index.php?page=chauffeurs/3
    // Alors $_GET["page"] vaut "chauffeurs/3"
    
    // On découpe cette chaîne en segments, en séparant sur le caractère "/"
    // Cela donne un tableau, ex : ["chauffeurs", "3"]
    $url = explode("/", $_GET['page']);
    $method = $_SERVER["REQUEST_METHOD"];
    
    // Affiche le contenu du tableau pour vérifier comment l’URL est interprétée
    //print_r($url);

    // On teste le premier segment pour déterminer la ressource demandée
    switch($url[0]) {
        case "articles" :
            switch ($method) {
                case "GET":
                    if (isset($url[1])) {
                        if (isset($url[2]) && $url[2]=="commandes") {
                            $articleController->getCommandesByArticleById($url[1]);
                        } else {
                            $articleController->getArticleById($url[1]);
                        }
                    } else {
                        // Sinon, on affiche tous les articles
                        echo  $articleController->getAllArticles();
                    }
                    break;  
                case "POST":
                    $data = json_decode(file_get_contents("php://input"),true);
                    $articleController->createArticle($data);
                    break;
                case "DELETE":
                    if (isset($url[1])) {
                    $articleController->deleteArticle($url[1]);
                    } else {
                        http_response_code(400);
                        echo json_encode(["message"=> "ID de l'article manquant dans l'URL"]);
                    }
                    break;
                case "PUT":
                    if (isset($url[1])) {
                    $data = json_decode(file_get_contents("php://input"),true);
                    $articleController->updateArticle($url[1],$data);
                    echo json_encode($data);
                    } else {
                        http_response_code(400);
                        echo json_encode(["message"=> "ID de l'article manquant dans l'URL"]);
                    }
                    break;

            } 
            break;
            
        case "categories":
            switch ($method) {
                case "GET":
                    if (isset($url[0])) {
                        if (isset($url[2]) && $url[2]=="articles") {
                            $categorieController->getArticlesByCategorieById($url[1]);
                        } elseif (isset($url[1])) {
                            $categorieController->getCategorieById($url[1]);
                        } else {
                        echo $categorieController->getAllCategories();
                        }
                    }
                    break;
                case "POST":
                    $data = json_decode(file_get_contents("php://input"),true);
                    $categorieController->createCategorie($data);
                    break;
                case "PUT":
                    if (isset($url[1])) {
                        $data = json_decode(file_get_contents("php://input"),true);
                        $categorieController->updateCategorie($url[1],$data);
                        echo json_encode($data);
                    } else {
                        http_response_code(400);
                        echo json_encode(["message"=> "ID de la categorie manquant dans l'URL"]);
                    }
                    break;
                case "DELETE":
                    if (isset($url[1])) {
                    $categorieController->deleteCategorie($url[1]);
                } else {
                    http_response_code(400);
                    echo json_encode(["message"=> "ID de la categorie manquant dans l'URL"]);
                }
                break;

                
            }
            break;

        case "commandes":
            switch ($method) {
                case "GET":
                    if (isset($url[0])) {
                        if (isset($url[2]) && $url[2]=="articles") {
                            $commandeController->getArticlesByCommandeById($url[1]);
                        } elseif (isset($url[1])) {
                            $commandeController->getCommandeById($url[1]);
                        } else {
                            echo $commandeController->getAllCommandes();
                        }
                    }
                    break;
                case "POST":
                    $data = json_decode(file_get_contents("php://input"),true);
                    $commandeController->createCommande($data);
                    break;
            }
            break;
            
        
        // Si la ressource n'existe pas, on renvoie un message d’erreur
        default :
            echo "La page n'existe pas";
    }
}