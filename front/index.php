<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Folha de Pagamento</title>
  <link rel="stylesheet" href="./css/home.css">
</head>
<body>
    <div class="container">
        <h2>Folha de Pagamento</h2>
        <form id="folhaForm" class="folha-form" action="/aplicacoes/calculadora.php" method="POST">
            <label for="nome">Nome do Funcionário</label>
            <input type="text" id="nome" name="nome" required>

            <label for="cargo">Cargo</label>
            <input type="text" id="cargo" name="cargo" required>

            <label for="salario">Salário Bruto (R$)</label>
            <input type="number" id="salario" name="salario" step="0.01" min="0" required>

            <label for="descontos">Descontos</label>
            <select id="descontos" name="descontos" required>
                <option value="">Selecione um desconto</option>
                <option value="inss">INSS</option>
                <option value="irrf">IRRF</option>
            </select>
            <button type="submit">Gerar Folha</button>
        </form>
    </div>
</body>
</html>