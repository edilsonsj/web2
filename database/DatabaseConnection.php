<?php

class DatabaseConnection
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'market_db';

    protected $connection;

    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
