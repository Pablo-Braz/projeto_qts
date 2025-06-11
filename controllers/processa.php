<?php
foreach (glob('../aplicacoes/*.php') as $arquivo) {
    require_once $arquivo;
}
foreach (glob('../controllers/*.php') as $arquivo) {
    require_once $arquivo;
}

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