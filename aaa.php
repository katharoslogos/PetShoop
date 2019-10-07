<?php
  include 'conexao.php';
	   session_start();              
     if(empty($_POST['InputEmail']) || empty($_POST['InputPassword'])){
        header('Location: UserLogin.php');
        exit();
    }

   $email = mysqli_real_escape_string($conn, $_POST['InputEmail']);
   $senha = mysqli_real_escape_string($conn, $_POST['InputPassword']);

   $sql = "SELECT pes_id,pes_nome FROM pessoa WHERE pes_email = '{$email}' and pes_senha = '{$senha}' ";

   $result = mysqli_query($conn, $sql);

   while($row = $result->fetch_assoc()){
          $_SESSION['user'] = $row['pes_nome'];
          header('Location: ComprasSalgados.php');     
     }
?>
