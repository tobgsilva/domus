<?php
 
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
$data= date("d/m/Y");
$hora= date("H:i");
// se conecta ao arduino 
$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
// Se conecta ao IP e Porta:
socket_connect($sock,"192.168.0.22", 8081);
// conectando ao banco
$strcon = mysqli_connect('localhost','root','','tcc') or die('Erro ao conectar ao banco de dados');
//lendo os dados e conparando
   $sql1 = "SELECT * FROM agendamento";
                   $resultado = mysqli_query($strcon,$sql1) or die("Erro ao retornar dados");
                   // Obtendo os dados por meio de um loop while
                   while ($registro = mysqli_fetch_array($resultado))
                   {
                      $id = $registro['id'];
                      $data1 = $registro['data'];
                      $hora1 = $registro['hora'];
                      $datat = $registro['datat'];
                      $horat = $registro['horat'];
                      $lamp=$registro['lamp'];
                      $dataaux1 = date('d/m/Y',strtotime($data1));
                      $dataauxt = date('d/m/Y',strtotime($datat));
                      $horaux1 = date('H:i',strtotime($hora1));
                      $horauxt = date('H:i',strtotime($horat));
                      // Espera e lê o status e define a cor dos botões de acordo.
                      $status = socket_read($sock,6);
                      //ligar
                      if ($lamp=='1' && $data == $dataaux1 && $hora == $horaux1 ){
                          
                          $status[0]=1;
                          socket_write($sock,$status);
                          } 
                      //desligar
                      if ($lamp=='1' && $data == $dataauxt && $hora == $horauxt ){
                           $status[0]=0;
                           socket_write($sock,$status);
                      }
                      
                      //ligar 2
                      if ($lamp=='2' && $data == $dataaux1 && $hora == $horaux1 ){
                          
                           $status[1]=1;
                         
                         
                            socket_write($sock,$status);
                          }
                          
                      
                      //desligar 2
                      if ($lamp=='2' && $data == $dataauxt && $hora == $horauxt ){
                            $status[1]=0;
                         
                         
                            socket_write($sock,$status);
                      }
                      //ligar3
                      if ($lamp=='3' && $data == $dataaux1 && $hora == $horaux1 ){
                          
                           $status[2]=1;
                         
                         
                            socket_write($sock,$status);
                          }
                          
                      
                      //desligar3
                      if ($lamp=='3' && $data == $dataauxt && $hora == $horauxt ){
                           
                           $status[2]=0;
                         
                         
                            socket_write($sock,$status);
                      }
                      
                      
                      
                   }

socket_close($sock);
 header("location:index.php");
?>