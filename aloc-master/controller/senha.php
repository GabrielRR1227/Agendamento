<?php
 
require_once '../models/conexao.php';
 
// resgata os valores do formulário
$usuario = isset($_POST['nome']) ? $_POST['nome'] : null;
$senha = isset($_POST['email']) ? $_POST['email'] : null;


// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE colaborador SET senha = :senha WHERE usuario = :usuario";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':usuario', $nome);
$stmt->bindParam(':email', $email);
 
if ($stmt->execute())
{
    echo '<script> alert ("Senha alterada com sucesso!"); location.href=("../index.php")</script>';
    exit;
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}