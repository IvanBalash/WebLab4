<?php

class ErrorsCollector{
    private array $errors = array();

    public function addError($errMessage): void
    {
        $this->errors[] = $errMessage;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function hasErrors(): bool
    {
        return count($this->errors) !== 0;
    }
}

