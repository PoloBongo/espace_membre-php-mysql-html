<?php
        if($_POST){

            $servname = 'localhost';
            $user = 'root';
            $pass = 'root';
            $dbname = 'membre';
                
            // creer la bdd dans phpmyadmin
            try{
                $dbco = new PDO("mysql:host=$servname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                $sql = "CREATE DATABASE IF NOT EXISTS membre";
                $dbco->exec($sql);
                    
                echo '';
            }
                
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
            
            $servname = 'localhost';
            $dbname = 'membre';
            $user = 'root';
            $pass = 'root';
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // créer la table contacts avec des données dedans ( que si elle n'existe pas )
               $sql = "CREATE TABLE IF NOT EXISTS inscription(
                        id_i INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        nom_i VARCHAR(50) NOT NULL,
                        prenom_i VARCHAR(50) NOT NULL,
                        email_i VARCHAR(200) NOT NULL,
                        password_i VARCHAR(100) NOT NULL,
                        check_password_i VARCHAR(100) NOT NULL,
                        DateInscription TIMESTAMP,
                        UNIQUE(email_i))";
            
                $dbco->exec($sql);
            }
            
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            } 
            
        
            // PERMET D INSERER LES DONNEES DANS LA TABLE CONTACTS
            $servname = 'localhost';
            $dbname = 'membre';
            $user = 'root';
            $pass = 'root';
                
            // Créer une conexion
            $conn = new mysqli($servname, $user, $pass, $dbname);
            // verifier la connexion
            if ($conn->connect_error) {
            die("La connexion a échouée: " . $conn->connect_error);
            }

            $mdp_crypter = password_hash("$_POST[password]", PASSWORD_BCRYPT);
            
            // insérer dans la table contacts les données que l'utilisateur à remplis dans le formulaire
            $sql = "INSERT INTO inscription(nom_i, prenom_i, email_i, password_i, check_password_i)
            VALUES('$_POST[nom]', '$_POST[prenom]', '$_POST[email]', '$mdp_crypter', '$mdp_crypter')";
                
            if ("$_POST[password]" == "$_POST[check_password]" && $conn->query($sql) === TRUE ) {
                echo "Votre inscription à bien été enregistré, merci à vous.";
            } else {
                echo "Vos mot de passe ne correspondent pas !";
            }
        };
    ?>