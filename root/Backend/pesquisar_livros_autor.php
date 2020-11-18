<!DOCTYPE html>
<html lang="pt-br">
<body>
<!-- Menu inicio -->       
<div class="row">
        <br>
        <div class="row">
            <div class="col-lg-8">
                <div class="col-lg">
                     <div class="panel panel-primary">
                        <div class="panel-heading">
                        <i class="fa fa-search"></i>  Pesquisar Livros
                        </div>
                        <div class="panel-body">
                        
                        <form action="../Frontend/pesquisa_de_livro_autor.php" method="POST">
                          <div class="col-lg">
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
                            <br>
                          </div>
                          
                          <div class="col-lg">
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
                        <div class="col-lg">
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

                          <div class="col-lg">
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
                          
                          <br>
                          <div class="col-lg">
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
