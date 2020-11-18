<!DOCTYPE html>
<html lang="pt-br">
<body>
<!-- Menu inicio -->       
<div class="row">
                <br>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="col-lg-8">
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                        <span class="glyphicon glyphicon glyphicon-user"></span>  Envio de Mensagem  
                        </div>
                        <div class="panel-body body-panel">
                        <form action="../Backend/email.php" method="POST">
                          <div class="form-group">
                            <label>De:</label>
                            
                            <?php      
                              $resultado = mysqli_query($criar_con, "SELECT * FROM usuario WHERE email='$usuario'");
                                while ($linha=mysqli_fetch_array($resultado)) { 
                                  $cod = $linha["pk_usuario"];
                                  $nome  =  $linha["nome_usuario"];
                                  $email = $linha["email"];
                                  
                              }
                            ?> 

                            <br> 
                            <input required="required" type="text" class="form-control" name="nome" value="<?php echo $nome;?>">
                            <br>
                            <input required="required" type="text" class="form-control" name="email" value="<?php echo $email;?>">
                           
                          </div>
                          
                          <div class="form-group">
                            <label>Para:</label>
                            <select class="form-control" name='email2'>
                              
                            <option name="email2" value="" selected disabled hidden>Selecione o Destinatario</option>
                              <?php  $resultado = mysqli_query($criar_con, "SELECT * FROM usuario WHERE (fk_perfil_usuario = 1 OR fk_perfil_usuario = 2 OR fk_perfil_usuario = 3) ORDER BY nome_usuario");

                              while ($linha=mysqli_fetch_array($resultado)) {
                                $nome_usuario  =  $linha["nome_usuario"];
                                $pk_usuario = $linha["pk_usuario"];
                                $email2 = $linha["email"]; 
                                echo "<option value=$email2>$nome_usuario</option>";
                              }
                            ?> 
                            </select>
                          </div>

                          <div class="form-group">
                            <label>Assunto:</label>
                            <input required="required" type="text" class="form-control" placeholder="Digite o Assunto" name="assunto">
                          </div>

                          <div class="form-group">
                            <label>Mensagem:</label>
                            
                           <textarea required="required" class="form-control" rows="6" name="mensagem"></textarea>
                         </div>
                        
                         <center><button type="submit" name="submit" class="btn btn-success">Enviar Mensagem</button>
					            	 <button type="reset" name="reset" class="btn btn-warning">Limpar</button></center>
                         
                         </form>
                          </div>
						
                       </div> 
                       </div> 

                       <!-- formulario de cadastro -->
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
<!-- Menu fim -->
</body>
</html>