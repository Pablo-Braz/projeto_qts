<?php
session_start();

require_once '../controllers/descontos.php';
require_once 'inss.php';
require_once 'IRRF.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $salario = $_POST['salario'];
    $tipo = $_POST['descontos'];

    $calc = new Calculadora($salario, $tipo);
    $_SESSION['salario_bruto'] = $salario;
    $_SESSION['tipo_desconto'] = $tipo;
    $_SESSION['desconto'] = $calc->getDescontoAplicado();
    $_SESSION['salario_liquido'] = $calc->calcularSalarioLiquido();

    header('Location: ../front/folhadepagamento.php');
    exit;
}

class Calculadora {
    private $salarioBruto;
    private $tipoDesconto;
    private $valorDesconto;

    public function __construct($salarioBruto, $tipoDesconto) {
        // Salva o salário bruto já convertido para float
        $this->salarioBruto = VerificaDesconto::salarioInformado($salarioBruto);
        // Salva o tipo de desconto selecionado (ex: 'inss' ou 'irrf')
        $this->tipoDesconto = $tipoDesconto;
        // Calcula o valor do desconto usando a lógica correta
        $this->valorDesconto = $this->calcularDesconto();
    }

    private function calcularDesconto() {
        // Usa a classe VerificaDesconto para saber qual desconto foi selecionado
        $selecionado = VerificaDesconto::verificarSelecionado($this->tipoDesconto);

        switch ($this->tipoDesconto) {
            case 'inss':
                $inss = new INSS($this->salarioBruto);
                return $inss->calcularINSS();
            case 'irrf':
                $irrf = new IRRF($this->salarioBruto);
                return $irrf->calcularIRRF();
            default:
                
                return 0;
        }
    }

    public function calcularSalarioLiquido() {
        return $this->salarioBruto - $this->valorDesconto;
    }

    public function getDescontoAplicado() {
        return $this->valorDesconto;
    }
}


?>