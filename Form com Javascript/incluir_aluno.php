<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $matricula = $_GET["matricula"];
    $nome = $_GET["nome"];
    $email = $_GET["email"];

//  Vou escrever os dados do formulário em um arquivo de dados já existente
    if (!file_exists("alunosNovos.txt")) {
        $cabecalho = "nome;matricula;email\n";
        file_put_contents("alunosNovos.txt", $cabecalho);
    }
    $txt = $nome . ";" . $matricula . ";" . $email . "\n";
    file_put_contents("alunosNovos.txt", $txt, FILE_APPEND);
    echo "Aluno inserido com sucesso!";
}

?>