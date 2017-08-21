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
  <body style='background:cornflowerblue;'class="text-center">
      <form name='agendamento' action='agenda.php' method ="POST" class="text-center">   
      <div class="row text-center"> 
        <div class="col-lg-4 text-center">
           
            </div> 
       
        <div class="col-lg-4 text-center">
            <img class="img-circle text-center" src="../automacao/icone1.png" alt="Generic placeholder image" width="140" height="140">
               <h1>Agendamento</h1>
            </div> 
        </div>    
           
      
      <div class="container text-center" style='background:cornflowerblue;'>
          <input type="tex" required="required" name="lamp" pater="[0-9}+$"/></br>
          <h4>Ligar:</h4>
          <input type="date" required="required" maxlength="10" name="data" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" min="2017-01-01" max="" />
          <input type="time" required="required" maxlength="8" name="hora" pattern="[0-9]{2}:[0-9]{2} [0-9]{2}$" /></br>
          <h4>Desligar:</h4>
          <input type="date" required="required" maxlength="10" name="datat" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" min="2017-01-01" max="" />
          <input type="time" required="required" maxlength="8" name="horat" pattern="[0-9]{2}:[0-9]{2} [0-9]{2}$" /></br>
        
          <button class="btn btn-lg btn-default" type = "Submit" Name = "agendar">Agendar</button>
          <a class="btn btn-lg btn-default" href="../automacao/index.php" role="button">voltar</a></br></br
          
                 <?php     
                   //$registro = mysqli_fetch_array($resultado);
                 echo'<div class="row center">';
                 echo' <div class="col-md-6 center">';
                
                   echo '<table class="table table-bordered center">';
                   echo' <thead>';
                   echo ' <tr>';
                    echo '  <th>ID</th>';
                    echo '  <th>Saida</th>';
                   echo '  <th>DATA Ligar</th>';
                   echo '  <th>HORA Ligar</th>';
                   echo '  <th>DATA Desligar</th>';
                   echo '  <th>HORA Desligar</th>';
                   //echo '  <th></th>';
                   echo '</tr>';
                    echo'<thead>';
                    echo'<tbody>';
                   $strcon = mysqli_connect('localhost','root','','tcc') or die('Erro ao conectar ao banco de dados');
                    $sql1 = "SELECT * FROM agendamento";
                   $resultado = mysqli_query($strcon,$sql1) or die("Erro ao retornar dados");
                   // Obtendo os dados por meio de um loop while
                   while ($registro = mysqli_fetch_array($resultado))
                   {
                      $id = $registro['id'];
                      $lamp =  $data1 = $registro['lamp'];
                       $data1 = $registro['data'];
                      $hora1 = $registro['hora'];
                      $datat = $registro['datat'];
                      $horat = $registro['horat'];
                      
                     
                      echo '<tr>';
                       echo '<td>'.$id.'</td>';
                        echo '<td>'.$lamp.'</td>';
                      echo '<td>'.date('d/m/Y',strtotime($data1)).'</td>';
                      echo '<td>'.date('H:i',strtotime($hora1)).'</td>';
                      echo '<td>'.date('d/m/Y',strtotime($datat)).'</td>';
                      echo '<td>'.date('H:i',strtotime($horat)).'</td>';
                
                     // echo '<td><a class="btn btn-xs btn-default" href="../tcc/excluiagenda.php?$id">Excluir</a></td>';
                      echo '</tr>';
                      
                    }
                    
                     echo'</tbody>';
          echo'</table>';
        echo'</div>';
           echo'</div>';

                    
                   
                   
                 ?>
             
      </form>
       
       
           </div> <!-- /container -->
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
