<?php

require_once '../controllers/descontos.php'; // caminho corrigido
$salario = VerificaDesconto::salarioInformado($salario);

class INSS {
    private $salario;
    private const desconto = 0.11;

    public function __construct($salario) {
        $this->salario = floatval($salario);
    }

    public function calcularINSS() {
        return $this->salario * self::desconto;
    }

    public function getSalario() {
        return $this->salario;
    }
}