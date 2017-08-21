<?php
// Se conectando ao banco de dados
$strcon = mysqli_connect('localhost','root','','tcc') or die('Erro ao conectar ao banco de dados');
                  //Recebendo os dados do formulário de agendamentos
                   $data = $_POST['data'];
                   echo $data;
                   $hora= $_POST['hora'];
                    echo $hora;
                  $datat = $_POST['datat'];
                   echo $datat;
                   $horat= $_POST['horat'];
                    echo $horat;
                    $lamp = $_POST['lamp'];
                     echo $lamp;
                   //Guardando no banco as informações  
                   $sql = "INSERT INTO `agendamento` (`id`, `data`, `hora`, `datat`, `horat`, `lamp`) VALUES ";
                   $sql .= "(null, '$data', '$hora', '$datat', '$horat', '$lamp')"; 
                   mysqli_query($strcon,$sql) or die("Erro ao tentar cadastrar registro");
                   //Retornando a pagina de agendamento
                   header("location:agendamento.php");
?>



