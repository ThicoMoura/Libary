<?php if ($_SESSION['user_nivel'] == "usuario" || $_SESSION['user_nivel'] == "aluno"){

          echo "<table class='striped centered responsive-table'>
                <h5 class='center-align'>Livros locado</h5>
                  <thead>
                    <tr>
                        <th>Nome do Livro</th>
                        <th>Previsão de entrega</th>
                        <th>Renovar</th>
                      </tr>
                  </thead>";
				
				  $sql = "SELECT li.titulo, a.tempoentrega, a.acervoid FROM livro_acervo l, usuarios u, locacao a, livro li WHERE a.acervoid = l.acervoid and l.livroid = li.livroid and a.userid = ".$_SESSION['user_id'];
				  $stmt = DB::prepare($sql);
				  $stmt ->execute();
				  foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){
				  echo "
          						<tr>
            							<td>".$value['titulo']."</td>
            							<td>".$value['tempoentrega']."</td>
            							<td><a class='waves-effect waves-light btn' href='renovar.php?id=".$value['acervoid']."'>Renovar</a></td>
          						</tr>
                    </table>
                  </div>
                </div>";}