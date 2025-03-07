<?php

    class ManagerPlayer extends ModelPlayer{
        //Attribut

        //getter & setter


        //methode

        public function addPlayer(): string{

            if(isset($_POST["submit"])){

                if(empty($_POST["email"]) || empty($_POST["pseudo"]) || empty($_POST["number"]) || empty($_POST["password"])  ){
                    return "remplissez tout les champs";
                }
                $this->setPseudo(sanitize($_POST["pseudo"]));
                $this->setEmail(sanitize($_POST["email"]));
                $this->setScore($_POST["score"]);
                $this->setPassword(password_hash(sanitize($_POST["password"]), PASSWORD_BCRYPT));

                $pseudo =$this->getPseudo($_POST["pseudo"]);
                $email =$this->getEmail($_POST["email"]);
                $password = $this->getPassword($_POST["password"]);
                $score = $this->getScore($_POST["number"]);
                

                try{

                    // méthode prepare()
                    $req = $this->getBdd()->prepare("INSERT INTO players (pseudo, email, score, psswrd) VALUES (?,?,?,?)");
                    
                    //  remplace les ? avec le binding 
                    $req->bindParam(1, $pseudo, PDO::PARAM_STR);
                    $req->bindParam(2, $email, PDO::PARAM_STR);
                    $req->bindParam(3, $score, PDO::PARAM_INT);
                    $req->bindParam(4, $password, PDO::PARAM_STR);

                    //   exécuter la requête avec execute()
                    $req->execute();
                    
                    //message:
                    return "Ajout de l'utilisateur!";

                }catch(PDOException $e) {
                    return "Erreur de connexion à la BDD (base de donnée) :" .$e->getMessage() ;
                }

                
            }

        }   
           
        
        public function getAllPlayers(): string | array{
            try {
                $req = $this->getBdd()->prepare('SELECT id, pseudo, email, score, psswrd FROM players');
            
                $req->execute();
                
                $data = $req->fetchAll(PDO::FETCH_ASSOC);
        
                return $data;

            } catch (EXCEPTION $e) {
                return $e->getMessage();
            }
        }
    }