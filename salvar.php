<?php
  //Variáveis
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $numero = $_POST['numero'];
  $mensagem = $_POST['mensagem'];
  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');

  //Compo E-mail
  $arquivo = "
    <html>
      <p><b>Nome: </b>$nome</p>
      <p><b>E-mail: </b>$email</p>
      <p><b>Telefone: </b>$numero</p>
      <p><b>Mensagem: </b>$mensagem</p>
      <p>Este e-mail foi enviado no dia <b>$data_envio</b></p>
    </html>
  ";
  
  //Emails para quem será enviado o formulário
  $destino = "lucasmartinsgabriel@gmail.com";
  $assunto = "Contato pelo Site";

  //Este sempre deverá existir para garantir a exibição correta dos caracteres
  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers .= "From: $nome <$email>";

  //Enviar
  mail($destino, $assunto, $arquivo, $headers);
  
  echo "<meta http-equiv='refresh' content='2;URL=../contact.html'>";

  // Inicialize a sessão cURL
  $ch = curl_init();

  // Defina a URL e outras opções
  curl_setopt($ch, CURLOPT_URL, "https://api.callmebot.com/whatsapp.php?phone=556193738770&text=Tem+um+novo+email&apikey=9217660");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  // Execute a solicitação e armazene a resposta em uma variável
  $resposta = curl_exec($ch);

  // Encerre a sessão cURL
  curl_close($ch);


?>