<div class="row">
                <br>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="col-lg-6">
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                          <span class="glyphicon glyphicon-ok"></span> Enviar Disciplina para Produção
                        </div>
                        <div class="panel-body body-panel">
                      <script type="text/javascript">
                        $ ( ": Arquivo" ) .filestyle ({input: false });
                      </script>
                      <form  method="post" action="confirmar_envio_livro_producao.php" enctype="multipart/form-data">
                        <div class="form-group">
                              <label>Disciplina a ser Enviada:</label>
                              <select  required="required" class="form-control" name='disciplina'>
                                <?php
                                  $resultado = mysqli_query($criar_con, "SELECT * FROM usuario WHERE email='$usuario'");
                                    while ($linha=mysqli_fetch_array($resultado)) {
                                       $cod = $linha["pk_usuario"];
                                       $nome  =  $linha["nome_usuario"];
                                       $cargo = $linha["cargo"];
                                    }
                                ?>
                              <option value="" selected disabled hidden>Selecione a Disciplina</option>
                                <?php  $resultado = mysqli_query($criar_con, "SELECT * FROM livro where situacao = 'Aguardando Professor(a)'");
                                  while ($linha=mysqli_fetch_array($resultado)) {
                                    $disciplina  =  $linha["disciplina"];
                                    $autor = $linha["autor"];
                                    $pk_livro = $linha["pk_livro"];
                                    $situacao = "Aguardando Revisão";
                                    if($autor == $nome){
                                      echo "<option>$disciplina</option>";
                                    }
                                  }
                                ?> 
                              </select>
                        </div>
                            <br> 
                            <div class="form-group">
                              <Input required="required" type = "file" name="arquivo" class = "filestyle" data-size = "sm" data-buttonName = "btn-success"/><br>
                            </div>
                          <center>
                            <button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Enviar </button>
                            <button type="reset" name="reset" class="btn btn-warning"><span class="glyphicon glyphicon-erase"></span> Limpar </button>
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