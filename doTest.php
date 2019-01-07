<?php
$tempo = null;
function execucao(){
    $sec = explode(" ",microtime());
    $tempo = $sec[1] + $sec[0];
    return $tempo;

}

$inicio = execucao();

     $host = $_POST["host"];
     $login = $_POST["login"];
     $senha = $_POST["senha"];

     if(isset($_POST["listaTabela"])) {
               $listaTabela =1;
          }  else  {
               $listaTabela = 0;
          }

     if(isset($_POST["nomeTabelaVerdadeiro"])) {
               $nomeTabelaVerdadeiro =1;
          }  else  {
               $nomeTabelaVerdadeiro = 0;
          }

     if(isset($_POST["listaCampo"])) {
               $listaCampo =1;
          }  else  {
               $listaCampo = 0;
          }

     if(isset($_POST["nomeCampoVerdadeiro"])) {
               $nomeCampoVerdadeiro =1;
          }  else  {
               $nomeCampoVerdadeiro = 0;
          }

     $repetir = $_POST["repetir"];


     $repeticao = 0;
    while ($repeticao < $repetir) {
          $link = null;
          $result = null;
          $tabelas = null;
          $result1 = null;
          $row = null;
          $dbname = "php_classes";

          $link = mysqli_connect($host, $login, $senha)or die("Falha ao se conectar ao banco. Verifique se os dados de conexão estão corretos.");;
          if (!$link) {
               echo 'Can\'t connect : '. mysql_error() . '<br>';
               exit;
          } else {
               echo 'Connected data base '. $dbname. ' on server '.$host. ' <br>';
          }


          mysqli_select_db($link,$dbname);

          $sql = "SHOW TABLES FROM $dbname";
          $result = mysqli_query($link, $sql);

          if (!$result) {
               echo "DB Error, could not list tables\n";
               echo 'MySQL Error: ' . mysql_error();
               exit;
          }
          $contar = 0;
          while ($tabelas = mysqli_fetch_row($result)) {
               //echo "Tabela: {$tabelas[0]}\n <br>";
               $contar++;
               if ($listaTabela == 1) {
                    if ($nomeTabelaVerdadeiro == 0) {
                         echo "Table: ".$contar."<br>";
                         } else {
                         echo "Table: {$tabelas[0]} <br>";
                         }
               }

               $result1 = mysqli_query($link, 'SHOW COLUMNS FROM `'.$tabelas[0].'`');
               if (mysqli_num_rows($result1) > 0) {
                    $contar1 = 0;
                         while ($row = mysqli_fetch_assoc($result1)) {
                              //print '<span>'.$row['Field'].'</span><br />';
                              $contar1++;
                         if ($listaCampo == 1) {
                              if ($nomeCampoVerdadeiro == 0) {
                                   print '<span>Field: '.$contar1.'</span><br />';
                              } else {
                                   print '<span>'.$row['Field'].'</span><br />';
                              }
                         }
                    }
               if ($listaTabela || $listaCampo) {
                    echo "<br>";
                    }
               }
          }
          mysqli_close($link);
          $repeticao++;
          echo "Execution number: ". $repeticao;
          echo "<br>";
     }


$fim = execucao();
$tempo = number_format(($fim-$inicio),6);
print "Time elapsed: <b>".$tempo."</b> seconds";

?>
