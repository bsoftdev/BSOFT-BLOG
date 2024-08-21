<?php if(!class_exists('Rain\Tpl')){exit;}?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Categorias</h1>


        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
             <a href="/admin/categories/create" class="btn btn-primary btn-sm"> <i class="bi bi-tags-fill"></i> Criar Categorias</a>
          </div>

          <form class="d-flex" role="search" action="/admin/categories">
            <input class="form-control me-2" name="search" type="search" placeholder="Pesquisar" aria-label="Search" autofocus value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            <button class="btn btn-success" type="submit">Pesquisar</button>
          </form>
        </div>

      
      </div>

    

     <div class="mt-4 w-100">
             
               <div class="table">
                 <table class="table table-striped ">
                  <thead>
                      <th>#</th>
                      <th>Nome da categoria</th>
                     
                      
                      
                      <th> Ações </th>
                  </thead>

                   <tbody>

                    <?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?>
                       <tr>
                         <td><?php echo htmlspecialchars( $value1["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                         <td><?php echo htmlspecialchars( $value1["category"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        
                         
                         <td>
                             <a href="/admin/categories/<?php echo htmlspecialchars( $value1["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/posts"><button class="btn btn-warning text-white btn-sm"><i class="bi bi-search"></i> </button></a>

                             <a href="/admin/categories/<?php echo htmlspecialchars( $value1["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><button class="btn btn-warning text-white btn-sm"><i class="bi bi-pencil-fill"></i> </button></a>

                             <a href="/admin/categories/<?php echo htmlspecialchars( $value1["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete"><button class="btn btn-danger text-white btn-sm" onclick="return confirm('Deseja mesmo deletar o usuário <?php echo htmlspecialchars( $value1["category"], ENT_COMPAT, 'UTF-8', FALSE ); ?> !??')"><i class="bi bi-trash-fill"></i> </button></a>
                             
                         </td>
                       <?php } ?>


                   </tbody>
                 </table>


               </div>
             
          </div>
     


<!-----PAGINATION--------->
     <nav class="my-2" aria-label="Page navigation example">
      <ul class="pagination my-2 justify-content-center">
        <li class="page-item disabled">
          <a class="page-link">Anterior</a>
        </li>
        <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
        <li class="page-item"><a class="page-link" href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
        <?php } ?>
        <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
      </ul>
    </nav>
    </main>
  </div>
</div>
