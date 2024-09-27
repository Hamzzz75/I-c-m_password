<?php

class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        
        $this->connection = new mysqli('localhost', 'root', '', 'inscriptions');

        if ($this->connection->connect_error) {
            die("Échec de la connexion à la base de données : " . $this->connection->connect_error);
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    // Assurez-vous que la méthode __wakeup() est publique
    public function __wakeup() {
        throw new Exception("Cannot unserialize a singleton.");
    }

    private function __clone() {
        
    }
}

?>
