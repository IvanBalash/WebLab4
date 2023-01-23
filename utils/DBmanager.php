<?php

class DBmanager{
    private string $server='localhost';
    private string $login = 'root';
    private string $password = '123';
    private string $dbname = 'phpmyadmin';
    private $conection;

    public function conect(): void{
        $this->conection = new mysqli($this->server, $this->login, $this->password, $this->dbname);

    }

    public function query($query){
        return $this->conection->query($query);
    }

}
