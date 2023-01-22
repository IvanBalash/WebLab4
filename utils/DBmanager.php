<?php

class DBmanager{
    private $server='localhost';
    private $login = 'root';
    private $password = '123';
    private $dbname = 'phpmyadmin';
    private $conection;

    public function conect(){
        $this->conection = new mysqli($this->server, $this->login, $this->password, $this->dbname);

    }

    public function query($query){
        return $this->conection->query($query);
    }
    public function disconect(){
        $this->conection->clouse();
    }

}
?>