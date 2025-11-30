<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caixa de Seleção de Produtos</title>

    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .caixa { margin-top: 15px; }
        .info { margin-top: 20px; padding: 10px; border: 1px solid #ccc; width: 300px; }
    </style>
</head>
<body>

<h2>🛍️ Escolha um produto</h2>

<?php
// ----------------------
// 1️⃣ LISTA DE PRODUTOS (simulando um banco de dados)
// ----------------------
$produtos = [
    "camisa"   => ["nome" => "Camisa Rosa", "preco" => 49.90, "estoque" => 10],
    "broche"   => ["nome" => "Broche Laço Rosa", "preco" => 9.90, "estoque" => 30],
    "garrafa"  => ["nome" => "Garrafa Outubro Rosa", "preco" => 29.90, "estoque" => 20]
];
?>

<!-- 2️⃣ FORMULÁRIO COM A CAIXA DE SELEÇÃO -->
<form method="post">
    <label for="produto">Selecione um produto:</label><br>
    <select name="produto" id="produto" class="caixa" required>
        <option value="">-- Escolha --</option>
        <?php
        // Criar as opções da lista com base no array de produtos
        foreach ($produtos as $id => $dados) {
            echo "<option value='$id'>{$dados['nome']}</option>";
        }
        ?>
    </select>
    <br><br>
    <input type="submit" value="Mostrar detalhes">
</form>

<?php
// ----------------------
// 3️⃣ MOSTRAR INFORMAÇÕES QUANDO O USUÁRIO CLICA EM "ENVIAR"
// ----------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idSelecionado = $_POST["produto"]; // recebe o valor escolhido
    $produto = $produtos[$idSelecionado]; // pega os dados do produto

    echo "<div class='info'>";
    echo "<strong>Produto:</strong> {$produto['nome']}<br>";
    echo "<strong>Preço:</strong> R$ " . number_format($produto['preco'], 2, ',', '.') . "<br>";
    echo "<strong>Estoque:</strong> {$produto['estoque']} unidades";
    echo "</div>";
}
?>

</body>
</html>