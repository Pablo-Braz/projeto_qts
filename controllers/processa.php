<?php
require_once '../controllers/descontos.php';
require_once '../controllers/redireciona.php';
require_once '../aplicacoes/inss.php';
require_once '../aplicacoes/IRRF.php';
require_once '../aplicacoes/calculadora.php';

// Processa os dados enviados pelo formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Processa os dados e inicializa a calculadora
        $calculadora = VerificaDesconto::processarDados($_POST);

        // Calcula o salário líquido
        $calculadora->calcularSalarioLiquido();
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
        exit;
    }
} else {
    echo "Nenhum dado foi enviado.";
    exit;
}