# **Projet : Eat-Smart**

**Etudiants :** Chaineze

---

### **1. Description du projet**

EatSmart est une application qui sert à gérer la restauration d'une pizzeria. Elle prend en charge les commandes du client et l'historique des commandes ainsi que le processus de la commande. De plus, une fois que la commande est prête, celle-ci alerte le client.

<img src="./assets/img/Schema architecture eatsmart.png">

---

### **3. Fonctionnalités principales**

#### **3.1 Frontend (eatSmartFront)**

- **Fonctionnalité 1 :**  
 
  Consultation et recherche des plats proposés par la pizerria pour les clients. Chaque plats est accompagné de sa description, du prix ainsi que des ingrédients utiliser.
  
- **Fonctionnalité 2 :**  

  - Personnalisation de la commandes, le clients peut choisir les plats qui veut commander.                                                                                                                                                  
  
#### **3.2 Backend (eatSmartBack)**

- **Fonctionnalité 1 :**  
  
  - Gestion des commandes des clients (commandes en préparation , commande à livrer et des commandes deja livrés).                                                 
  
- **Fonctionnalité 2 :**  
 

  - Analyse des données(historique,etc...)

---

### **4. Technologies utilisées**

- **Frontend :** HTML/CSS/JS
- **Backend :** API
- **Base de données :** MySQL


### **5. MCD/MLD/MPD**

<img src="./assets/img/MCD_MLD_MPD.png">



## Endpoints de l'API

Adresse de l'API (en local) : http://localhost/eatsmart-chaineze

Voici les différents endpoints de l'API : 
- `GET /articles` → Afficher la liste des articles
- `GET /articles/{id}` → Afficher l'article avec l'id égal à {id}
- `GET /categories` → Afficher la liste des catégories
- `GET /categories/{id}` → Afficher la catégorie avec l'id égal à {id}
- `GET /commandes` → Afficher la liste des commandes
- `GET /commandes/{id}` → Afficher la commande avec l'id égal à {id}







---
