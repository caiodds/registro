<?php
class Venda {
    private $nomeProduto;
    private $quantidade;
    private $precoUnitario;

    public function __construct($nomeProduto, $quantidade, $precoUnitario) {
        $this->nomeProduto = $nomeProduto;
        $this->quantidade = $quantidade;
        $this->precoUnitario = $precoUnitario;
    }

    public function calcularTotal() {
        return $this->quantidade * $this->precoUnitario;
    }

    public function exibirRegistro() {
        echo "Produto: " . $this->nomeProduto . "<br>";
        echo "Quantidade: " . $this->quantidade . "<br>";
        echo "Preço unitário: " . $this->precoUnitario . "<br>";
        echo "Total: " . $this->calcularTotal() . "<br>";
    }
}
// Criar um registro de venda
$venda = new Venda("Produto A", 5, 10.99);

// Exibir informações do registro de venda
$venda->exibirRegistro();
?>
