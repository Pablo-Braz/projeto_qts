<?php

require_once '../controllers/descontos.php';

class impostoLeo implements DescontoStrategy {
    private $salariobruto;
    private const DESCONTO = 0.45;

    public function __construct($salariobruto) {
        $this->salariobruto = floatval($salariobruto);
    }

    public function calcularDesconto() {
        return $this->salariobruto * self::DESCONTO;
    }

    public function getSalario() {
        return $this->salariobruto;
    }
}