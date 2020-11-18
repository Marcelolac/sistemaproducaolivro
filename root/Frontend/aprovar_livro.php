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
                        <span class="glyphicon glyphicon-ok"></span>  Aprovar Livro  </div>
                        <div class="panel-body body-panel">
                          <form action="aprovado_livro_administrador.php" method="POST">
                            <div class="form-group">
                              <label>Disciplina a ser Aprovada:</label>
                              <select  required="required" class="form-control" name='aprovar'>
                                
                              <option value="" selected disabled hidden>Selecione a Disciplina</option>
                                <?php  $resultado = mysqli_query($criar_con, "SELECT * FROM livro where situacao ='Aguardando Aprovação'");
                                  while ($linha=mysqli_fetch_array($resultado)) {
                                    $disciplina  =  $linha["disciplina"];
                                    $pk_livro = $linha["pk_livro"];
                                    
                                    echo "<option value='$pk_livro'>$disciplina</option>";
                                  }
                                ?> 
                              </select>
                            </div>
                          <br>
                          
                            <center>
                              <button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Aprovar</button>
                              <button type="reset" name="reset" class="btn btn-warning"><span class="glyphicon glyphicon-erase"></span> Limpar</button>
                            </center>
                          
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