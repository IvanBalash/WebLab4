<?php

class ErrorsCollector{
    private $errors = array();

    public function addError($errMessage){
        array_push($this->errors, $errMessage);
    }

    public function getErrors(){
        return $this->errors;
    }

    public function hasErrors(){
        return count($this->errors) !== 0;
    }
}

?>