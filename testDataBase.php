<?php
//This example is based on https://ajuda.locaweb.com.br/wiki/principais-mensagens-de-erro-mysql/
?>
<html>
     <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <title>[PHP] Test data base</title>
          <style>
          .x {font-family:Verdana, Arial, Helvetica, sans-serif; font-size:smaller;}
          .y {font-family:Verdana, Arial, Helvetica, sans-serif; font-size:xx-small;}
          </style>
     </head>
     <body>
          <script language="Javascript">
              function validaForm(){
                      d = document.testemysql;
                      //validar host
                      if (d.host.value == ""){
                                  alert("O campo " + d.host.name + " deve ser preenchido!");
                                  d.host.focus();
                                  return false;
                        }
                      //validar login
                      if (d.login.value == ""){
                                  alert("O campo " + d.login.name + " deve ser preenchido!");
                                  d.login.focus();
                                  return false;
                        }
                      //validar senha
                      if (d.senha.value == ""){
                                  alert("O campo " + d.host.senha + " deve ser preenchido!");
                                  d.senha.focus();
                                  return false;
                        }
                      //validar repetir
                      if (d.repetir.value == ""){
                                  alert("O campo Numero de Execu��es de Teste deve ser preenchido!");
                                  d.repetir.focus();
                                  return false;
                        }
              }

          </script>
          <h2>Test data base MySQL</h2>
          <form class="x" name="testemysql" action="doTest.php" method="post" onSubmit="return validaForm()">
               <p class="x">Server parameters<br>
               <table border="0">
                    <tr>
                         <td class="x">Server: </td>
                         <td><input class="x" type="text" name="host" id="host" value="localhost"></td>
                    </tr>
                    <tr>
                         <td class="x">User: </td>
                         <td><input class="x" type="text" name="login" id="login" value="seconduser"></td>
                    </tr>
                    <tr>
                         <td class="x">Password: </td>
                         <td><input class="x" type="password" name="senha" id="senha"></td>
                    </tr>
                    <tr>
                         <td class="y">Show Tables?: </td>
                         <td><input class="x" type="checkbox" size="20" name="listaTabela" id="listaTabela"></td>
                         <td class="y">Show real name Tables?: </td>
                         <td><input class="x" type="checkbox" name="nomeTabelaVerdadeiro" id="nomeTabelaVerdadeiro"></td>
                    </tr>
                    <tr>
                         <td class="y">Show Fields?: </td>
                         <td><input class="x" type="checkbox" name="listaCampo" id="listaCampo"></td>
                         <td class="y">Show real name Fields?: </td>
                         <td><input class="x" type="checkbox" name="nomeCampoVerdadeiro" id="nomeCampoVerdadeiro"></td>
                    </tr>
                    <tr>
                         <td class="x">How many tests do you want: </td>
                         <td><input class="x" type="text" name="repetir" id="repetir"></td>
                    </tr>
               </table>
               <div class="x">
                    <input class="x" type="submit" value="Send">
               </div>
          </form>
     </body>
</html>
