<?php
require_once '../controllers/descontos.php'; // ajuste o caminho conforme necessário
$salario = VerificaDesconto::salarioInformado($salario);
class IRRF {
    private $salario;
    private const desconto = 0.15;

    public function __construct($salario) {
        $this->salario = floatval($salario);
    }

    public function calcularIRRF() {
        return $this->salario * self::desconto;
    }

    public function getSalario() {
        return $this->salario;
    }
}