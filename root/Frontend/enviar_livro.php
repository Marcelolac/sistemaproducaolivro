<!DOCTYPE html>
<html lang="pt-br">
<body>
<!-- Menu inicio -->       
<div class="row">
                <br>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="col-lg-6">
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                        <span class="glyphicon glyphicon glyphicon-user"></span>  Envio de Livro para Aprovação  
                        </div>
                        <div class="panel-body body-panel">
                  
                        <form action="email.php" method="POST">
                            
                          
                          <div class="form-group">
                            <label>Autor:</label>
                            <select class="form-control" name='autor'>
                              
                            <option value="" selected disabled hidden>Selecione um Autor</option>
                              <?php  $resultado = mysqli_query($criar_con, "SELECT * FROM usuario WHERE fk_perfil_usuario= 3 ORDER BY nome_usuario");

                              while ($linha=mysqli_fetch_array($resultado)) {
                                $nome_usuario  =  $linha["nome_usuario"];
                                $pk_usuario = $linha["pk_usuario"];
                                
                                echo "<option>$nome_usuario</option>";
                              }
                            ?> 
                            </select>
                          </div>

                          <div class="form-group">
                            <label>Disciplina:</label>
                            <select class="form-control" name='autor'>
                              
                            <option value="" selected disabled hidden>Selecione a Disciplina</option>
                              <?php  $resultado = mysqli_query($criar_con, "SELECT disciplina FROM livro");

                              while ($linha=mysqli_fetch_array($resultado)) {
                                $disciplina  =  $linha["disciplina"];
                                $pk_livro = $linha["pk_livro"];
                                
                                echo "<option>$disciplina</option>";
                              }
                            ?> 
                            </select>
                          </div>

                          <div class="form-group">
                            <label>Endereço para acesso:</label>
                            <input type="text"  class="form-control" placeholder="Digite o link"name="link">
                          </div>
                          
                          <div class="form-group"> 
                            <label>Anexar PDF do Livro:</label>
                            <input type="file" name="arquivo" class="upload">
                          </div>

                            <br>
                            <button type="submit" name="submit" class="btn btn-success">Enviar Disciplina</button>
					            	    <button type="reset" name="reset" class="btn btn-warning">Limpar</button>
                         
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