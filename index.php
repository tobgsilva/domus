<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../bootstrap-3.3.7/docs/favicon.ico">

    <title>TCC</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-3.3.7/docs/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="../bootstrap-3.3.7/docs/dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../bootstrap-3.3.7/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <meta http-equiv="refresh" content="45;url=script.php?msg=".$msg. /> 
  <body style='background:cornflowerblue;' class="text-center">
            <div class="row text-center"> 
        <div class="col-lg-4 text-center">
           
            </div> 
       
        <div class="col-lg-4 text-center">
            <img class="img-circle text-center" src="../automacao/icone1.png" alt="Generic placeholder image" width="140" height="140">
               <h1>Painel</h1>
            </div> 
        </div>    
      
      <div class="container text-center" style='background:cornflowerblue;'>
        
<?php

$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
// Se conecta ao IP e Porta:
socket_connect($sock,"192.168.0.22", 8081);
 
// Executa a ação correspondente ao botão apertado.
if(isset($_POST['bits'])) {
  $msg = $_POST['bits'];
 if(isset($_POST['saida1'   ])){ if($msg[0]=='1') { $msg[0]='0'; } else { $msg[0]='1'; }}
  if(isset($_POST['saida2'])){ if($msg[1]=='1') { $msg[1]='0'; } else { $msg[1]='1'; }}
  if(isset($_POST['tomada'])){ if($msg[2]=='1') { $msg[2]='0'; } else { $msg[2]='1'; }}
    socket_write($sock,$msg,strlen($msg));
}
 //Requisita o status do sistema.
socket_write($sock,'R#',2);
// Espera e lê o status e define a cor dos botões de acordo.
$status = socket_read($sock,6);
if (($status[4]=='L')&&($status[5]=='#')) {
 if ($status[0] === '0') {
            $cor1 = '"btn btn-lg btn-danger"'; 
          } else {
             $cor1 = '"btn btn-lg btn-success"';
          }
          if  ($status[1]=='0') {
              $cor2 = '"btn btn-lg btn-danger"';
          } else {
              $cor2 = '"btn btn-lg btn-success"';
              
          }        
  if  ($status[2]=='0') {
              $cor3 = '"btn btn-lg btn-danger"';   
          } else {
              $cor3 = '"btn btn-lg btn-success"'; 
          }
  
  echo "<form method =\"post\" action=\"index.php\">";
  echo "<input type=\"hidden\" name=\"bits\" value=\"$status\">";
  echo "<button class= $cor1 type = \"Submit\" Name = \"saida1\">Lampada (1)</button></br></br>";
  echo "<button class= $cor2 type = \"Submit\" Name = \"saida2\">Lampada (2)</button></br></br>";
  echo "<button class= $cor3 type = \"Submit\" Name = \"tomada\">Tomada (3)</button></br></br>";
  echo '<a class="btn btn-lg btn-default" href="../automacao/agendamento.php" role="button">Agendamento</a></br></br>';
  echo "</form>";
}
     // Caso ele não receba o status corretamente, avisa erro.
    else { 
        echo "Falha ao receber status da casa."; 
       }
socket_close($sock);
?>
          
      </div>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../bootstrap-3.3.7/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../bootstrap-3.3.7/docs/dist/js/bootstrap.min.js"></script>
    <script src="../bootstrap-3.3.7/docs/assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
