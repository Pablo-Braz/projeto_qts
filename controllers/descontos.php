<?php

interface DescontoStrategy
{
    public function calcularDesconto();
}

class VerificaDesconto
{
    private static $salariobruto;
    private static $tipo;

    public static function processarDados($dados)
    {
        // Extrai os dados enviados pelo formulário
        $salariobruto = $dados['salariobruto'] ?? 0;
        $tipoDesconto = $dados['descontos'] ?? '';

        // Valida o salário bruto
        $salariobruto = self::salarioInformado($salariobruto);

        // Seleciona a estratégia de desconto
        $descontoStrategy = self::verificarSelecionado($tipoDesconto, $salariobruto);

        // Inicializa a calculadora com os dados processados
        return new Calculadora($salariobruto, $descontoStrategy);
    }

    public static function verificarSelecionado($tipo, $salariobruto)
    {
        self::$tipo = $tipo;

        $mapaDescontos = [
            'inss' => INSS::class,
            'irrf' => IRRF::class,
        ];

        if (!isset($mapaDescontos[$tipo])) {
            throw new InvalidArgumentException("Tipo de desconto inválido.");
        }

        return new $mapaDescontos[$tipo]($salariobruto);
    }

    public static function salarioInformado($salariobruto)
    {
        if ($salariobruto <= 0) {
            throw new InvalidArgumentException("O salário deve ser maior que zero.");
        }
        return floatval($salariobruto);
    }
}
