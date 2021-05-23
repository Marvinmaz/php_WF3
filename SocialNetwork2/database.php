<?php

class Database {
    // Attributs
    private static $dbName = 'SocialNetwork'; // Nom de la BDD
    private static $dbHost = 'localhost'; // Nom de l'hôte
    private static $port = '3306'; // ou '8889' 
    private static $dbUsername = 'root'; // Nom d'utilisateur MySQL
    private static $dbUserPassword = 'root'; // Mot de passe MySQL
    private static $cont = null;

    // Méthodes
    public static function connect() { // Connecte le site web à la BDD
        if ( null == self::$cont ) {
            try {
                // On créé un objet PDO à l'aide des identifiants de connexion à la BDD
                self::$cont = new PDO(
                    "mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName, //. ";port=" . self::$port,
                    self::$dbUsername, self::$dbUserPassword
                );
            } catch(PDOException $e) {
                die($e->getMessage());
            }
       }
       return self::$cont; // Renvoie un objet issue de la connection PDO à la BDD
    }

    public static function disconnect() { // Déconnecte le site web de la BDD
        self::$cont = null;
    }
}