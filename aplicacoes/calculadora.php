<?php


class Calculadora {
    private $salarioBruto;
    private $descontoStrategy;

    public function __construct($salarioBruto, DescontoStrategy $descontoStrategy) {
        $this->salarioBruto = $salarioBruto;
        $this->descontoStrategy = $descontoStrategy;
    }

    public function calcularSalarioLiquido() {
        $desconto = $this->descontoStrategy->calcularDesconto($this->salarioBruto);
        $salarioLiquido = $this->salarioBruto - $desconto;

        // Redireciona para a página de folha de pagamento com os resultados
        redirecionar('../front/folhadepagamento.php', [
            'salario_bruto' => $this->salarioBruto,
            'tipo_desconto' => get_class($this->descontoStrategy),
            'desconto' => $desconto,
            'salario_liquido' => $salarioLiquido,
        ]);
    }
}
