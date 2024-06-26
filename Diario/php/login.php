<?php
include 'config.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

// Prepara a declaração SQL
$stmt = $conn->prepare("SELECT * FROM usuario WHERE email = ? AND senha = ?");
$stmt->bind_param("ss", $email, $senha);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    header('Location: ../Home.html');
    exit();
} else {
    echo "<script>alert('Usuário ou senha incorretos!'); window.location='../index.html';</script>";
}

$stmt->close();
$conn->close();
?>
