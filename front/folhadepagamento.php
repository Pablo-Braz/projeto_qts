<?php
session_start();
$salario_bruto = $_SESSION['salario_bruto'] ?? 0;
$tipo_desconto = $_SESSION['tipo_desconto'] ?? '';
$desconto = $_SESSION['desconto'] ?? 0;
$salario_liquido = $_SESSION['salario_liquido'] ?? 0;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Folha de Pagamento</title>
    <link rel="stylesheet" href="./css/folhaP.css">
</head>
<body>
    <div class="container">
        <h1>Folha de Pagamento</h1>
        <div class="resultado">
            <p><strong>Salário Bruto:</strong> R$ <?= number_format($salario_bruto, 2, ',', '.') ?></p>
            <p><strong>Tipo de Desconto:</strong> <?= htmlspecialchars($tipo_desconto) ?></p>
            <p><strong>Desconto Aplicado:</strong> R$ <?= number_format($desconto, 2, ',', '.') ?></p>
            <p><strong>Salário Líquido:</strong> <span style="color:green;">R$ <?= number_format($salario_liquido, 2, ',', '.') ?></span></p>
        </div>
        <a href="index.php" class="btn">Nova Simulação</a>
    </div>
</body>
</html>