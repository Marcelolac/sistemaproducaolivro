<!DOCTYPE html>
<html lang="pt-br">
<body>
<!-- Menu inicio -->       
<div class="row">
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg">
                    
                     <div class="panel panel-primary">
                        <div class="panel-heading">
                        <i class="fa fa-search"></i>  Pesquisar Livros
                        </div>
                        <div class="panel-body">
                        
                        <form id="form" action="../Frontend/pesquisa_de_livro.php" method="POST">
                        <div class="col-lg-6">
                          <label>Código do Livro:</label>
                            <select class="form-control" name='codigo'>
                              <option value='todos'>Todos</option>
                              <?php  $resultado = mysqli_query($criar_con, "Select distinct codigo from livro");
                                while ($linha=mysqli_fetch_array($resultado)) {
                                  $codigo  =  $linha["codigo"];
                                  $pk_livro = $linha["pk_livro"];
                                  
                                  echo "<option value='$codigo'>$codigo</option>";
                                }
                              ?>
                            </select>
                          <br>
                        </div>

                        <div class="col-lg-6">
                          <label>Semestre:</label>
                            <select class="form-control" name='semestre'>
                              <option value='todos'>Todos</option>
                              <?php  $resultado = mysqli_query($criar_con, "Select distinct semestre from livro");
                                while ($linha=mysqli_fetch_array($resultado)) {
                                  $pk_livro = $linha["pk_livro"];
                                  $semestre  =  $linha["semestre"];
                                  echo "<option value='$semestre'>$semestre</option>";
                                }
                              ?>
                            </select>
                          <br>
                          </div>

                          <div class="col-lg-6">
                            <label>Curso:</label>
                            <select class="form-control" name='curso'>
                              <option value='todos'>Todos</option>
                              <?php  $resultado = mysqli_query($criar_con, "Select distinct curso from livro");
                                while ($linha=mysqli_fetch_array($resultado)) {
                                  $pk_livro = $linha["pk_livro"];
                                  $curso  =  $linha["curso"];
                                  echo "<option value='$curso'>$curso</option>";
                                }
                              ?>
                            </select>
                          <br>
                          </div>
                          
                          <div class="col-lg-6">
                            <label>Disciplina:</label>
                            <select class="form-control" name='disciplina'>
                              <option value='todas'>Todas</option>
                              <?php  $resultado = mysqli_query($criar_con, "Select distinct disciplina from livro");
                                while ($linha=mysqli_fetch_array($resultado)) {
                                  $pk_livro = $linha["pk_livro"];
                                  $disciplina  =  $linha["disciplina"];
                                  echo "<option value='$disciplina'>$disciplina</option>";
                                }
                              ?>
                            </select>
                            <br>
                          </div>

                          <div class="col-lg-6">
                          
                              <label>Autor(a) Responsável:</label>
                              <select class="form-control" name='autor'>
                                <option value='todos'>Todos(as)</option>
                              <?php  $resultado = mysqli_query($criar_con, "Select distinct autor from livro");

                              while ($linha=mysqli_fetch_array($resultado)) {
                                $autor  =  $linha["autor"];
                                $pk_livro = $linha["pk_livro"];
                                echo "<option value='$autor'>$autor</option>";
                              }
                              ?> 
                            </select>
                          </div>

                          <div class="col-lg-6">
                            <label>Revisor:</label>
                            <select class="form-control" name='revisor'>
                              <option value='todos'>Todo(as)</option>
                              <?php  $resultado = mysqli_query($criar_con, "Select distinct revisor from livro");
                                while ($linha=mysqli_fetch_array($resultado)) {
                                  $pk_livro = $linha["pk_livro"];
                                  $revisor  =  $linha["revisor"];
                                  if ($revisor == ""){
                                  }else{
                                    echo "<option value='$revisor'>$revisor</option>";
                                  }
                                }
                              ?>
                            </select>
                            <br>
                          </div>

                          <div class="col-lg-6">
                            <label>Ilustrador:</label>
                            <select class="form-control" name='ilustrador'>
                              <option value='todos' >Todo(as)</option>
                              <?php  $resultado = mysqli_query($criar_con, "Select distinct ilustrador from livro");
                                while ($linha=mysqli_fetch_array($resultado)) {
                                  $pk_livro = $linha["pk_livro"];
                                  $ilustrador  =  $linha["ilustrador"];
                                  if ($ilustrador == ""){
                                  }else{
                                    echo "<option value='$ilustrador'>$ilustrador</option>";
                                  }
                                }
                              ?>
                            </select>
                            <br>
                          </div>
                          
                          <div class="col-lg-6">
                            <label>Diagramador:</label>
                            <select class="form-control" name='diagramador'>
                              <option value="todos">Todo(as)</option>
                              <?php  $resultado = mysqli_query($criar_con, "Select distinct diagramador from livro");
                                while ($linha=mysqli_fetch_array($resultado)) {
                                  $pk_livro = $linha["pk_livro"];
                                  $diagramador  =  $linha["diagramador"];
                                  if ($diagramador == ""){
                                  }else{
                                    echo "<option value='$diagramador'>$diagramador</option>";
                                  }
                                }
                              ?>
                            </select>
                            <br>
                          </div>
                          <div class="col-lg-6">
                            <label>Situação:</label>
                            <select class="form-control" name='situacao'>
                              <option value="todas">Todas</option>
                              <?php  $resultado = mysqli_query($criar_con, "Select distinct situacao from livro");
                                while ($linha=mysqli_fetch_array($resultado)) {
                                  $pk_livro = $linha["pk_livro"];
                                  $situacao  =  $linha["situacao"];
                                  echo "<option value='$situacao'>$situacao</option>";
                                }
                              ?>
                            </select>
                            <br>
                          </div>
                         
                          <br>
                          <div class="col-lg-12">
                            <center>
                              <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-search"></i> Pesquisar </button>
                              <button type="reset" name="reset" class="btn btn-warning">Limpar</button>
                            </center>
                          </div>  
                         </form>
                              </div>
						            </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
<!-- Menu fim -->
</body>
</html>