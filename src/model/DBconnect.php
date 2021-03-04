<?php


namespace App\model;

use PDO;
class DBconnect extends PDO
{
    protected $username;
    protected $password;
    protected $dsn;

    public function __construct()
    {
        $this->username = 'root';
        $this->password = '1@TrinhVan1';
        $this->dsn = 'mysql:host=localhost;dbname=studentManager';
    }
    public function connect(){
        $connect = new PDO($this->dsn,$this->username,$this->password);
        return $connect;
    }
}