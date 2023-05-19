<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Registro de Vendas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 300px;
            margin: 20px auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form input[type="text"],
        form input[type="number"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }

        .registro {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .registro p {
            margin: 0;
        }

        .delete-button {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    <script>
        function excluirRegistro(element) {
            if (confirm("Tem certeza que deseja excluir este registro?")) {
                element.parentNode.remove();
            }
        }
    </script>
</head>
<body>
    <h1>Sistema de Registro de Vendas</h1>

    <form method="post">
        <div id="produtos">
            <div class="produto">
                <input type="text" name="nome_produto[]" placeholder="Nome do Produto" required>
                <input type="number" name="quantidade[]" placeholder="Quantidade" required>
                <input type="number" step="0.01" name="preco_unitario[]" placeholder="Preço Unitário" required>
                <button type="button" class="delete-button" onclick="excluirProduto(this)">Excluir</button>
            </div>
        </div>
        <button type="button" onclick="adicionarProduto()">Adicionar Produto</button>
        <input type="submit" value="Registrar Venda">
    </form>

    <h2>Registros de Vendas</h2>

    <?php
    // Exibir os registros de vendas
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["nome_produto"])) {
        // Verificar se os dados do formulário foram enviados
        $nomesProdutos = $_POST["nome_produto"];
        $quantidades = $_POST["quantidade"];
        $precosUnitarios = $_POST["preco_unitario"];

        // Exibir os dados dos registros de venda
        for ($i = 0; $i < count($nomesProdutos); $i++) {
            echo "<div class='registro'>";
            echo "<p>Produto: " . $nomesProdutos[$i] . "</p>";
            echo "<p>Quantidade: " . $quantidades[$i] . "</p>";
            echo "<p>Preço unitário: " . $precosUnitarios[$i] . "</p>";
            echo "<button class='delete-button' onclick='excluirRegistro(this)'>Excluir</button>";
            echo "</div>";
        }
    }
    ?>

    <script>
        function adicionarProduto() {
            var produtosContainer = document.getElementById("produtos");
            var novoProduto = document.createElement("div");
            novoProduto.classList.add("produto");
            novoProduto.innerHTML = `
                <input type="text" name="nome_produto[]" placeholder="Nome do Produto" required>
                <input type="number" name="quantidade[]" placeholder="Quantidade" required>
                <input type="number" step="0.01" name="preco_unitario[]" placeholder="Preço Unitário" required>
                <button type="button" class="delete-button" onclick="excluirProduto(this)">Excluir</button>
            `;
            produtosContainer.appendChild(novoProduto);
        }

        function excluirProduto(element) {
            if (confirm("Tem certeza que deseja excluir este produto?")) {
                element.parentNode.remove();
            }
        }
    </script>
</body>
</html>
