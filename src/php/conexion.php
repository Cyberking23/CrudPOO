<?php

namespace Crud;

use PDO;
use PDOException;


class Database
{
    private $host = 'db';
    private $dbName = 'proyectopoo';
    private $username = 'root';
    private $password = 'root';
    private $connection;

    public function connect()
    {
        $attempts = 5;
        while ($attempts > 0) {
            try {
                $this->connection = new PDO(
                    "mysql:host={$this->host};dbname={$this->dbName}",
                    $this->username,
                    $this->password
                );
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->connection;
            } catch (PDOException $e) {
                $attempts--;
                if ($attempts == 0) {
                    die("Database connection failed: " . $e->getMessage());
                }
                sleep(2); // Espera 2 segundos antes de reintentar
            }
        }
    }
}