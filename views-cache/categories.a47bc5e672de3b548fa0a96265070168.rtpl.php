<?php if(!class_exists('Rain\Tpl')){exit;}?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Categorias</h1>


        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
             <a href="/admin/categories/create" class="btn btn-primary btn-sm"> <i class="bi bi-tags-fill"></i> Criar Categorias</a>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
            <svg class="bi"><use xlink:href="#calendar3"/></svg>
            This week
          </button>
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
                             <a href="/admin/categories/<?php echo htmlspecialchars( $value1["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><button class="btn btn-warning text-white btn-sm"><i class="bi bi-search"></i> </button></a>

                             <a href="/admin/categories/<?php echo htmlspecialchars( $value1["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><button class="btn btn-warning text-white btn-sm"><i class="bi bi-pencil-fill"></i> </button></a>

                             <a href="/admin/categories/<?php echo htmlspecialchars( $value1["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete"><button class="btn btn-danger text-white btn-sm" onclick="return confirm('Deseja mesmo deletar o usuário <?php echo htmlspecialchars( $value1["category"], ENT_COMPAT, 'UTF-8', FALSE ); ?> !??')"><i class="bi bi-trash-fill"></i> </button></a>
                             
                         </td>
                       <?php } ?>


                   </tbody>
                 </table>


               </div>
             
          </div>
     



    </main>
  </div>
</div>
