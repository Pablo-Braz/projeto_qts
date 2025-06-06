<?php
// Classe para aplicar o desconto selecionado
class VerificaDesconto {
    public static function verificarSelecionado($tipo) {
        switch ($tipo) {
            case 'inss':
                return 'INSS selecionado';
            case 'irrf':
                return 'IRRF selecionado';
            default:
                return 'Nenhum desconto selecionado';
        }
    }

    // Função para verificar e retornar o salário informado, convertido para float
    public static function salarioInformado($salario) {
        return floatval($salario);
    }
}

// Exemplo de uso:
// $tipo = $_POST['descontos'];
// $mensagem = VerificaDesconto::verificarSelecionado($tipo);
// $salario = VerificaDesconto::salarioInformado($_POST['salario']);


