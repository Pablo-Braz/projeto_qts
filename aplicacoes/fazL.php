<?php

require_once '../controllers/descontos.php';

class fazL implements DescontoStrategy {
    private $salariobruto;
    private const DESCONTO = 1;

    public function __construct($salariobruto) {
        $this->salariobruto = floatval($salariobruto);
    }

    public function calcularDesconto() {
        return $this->salariobruto - self::DESCONTO;
    }

    public function getSalario() {
        return $this->salariobruto;
    }
}