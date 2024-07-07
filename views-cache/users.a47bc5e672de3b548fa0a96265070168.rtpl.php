<?php if(!class_exists('Rain\Tpl')){exit;}?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Usuários</h1>


        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
             <a href="/admin/users/create" class="btn btn-primary btn-sm"> <i class="bi bi-person-fill-add"></i>Cadastrar Usuario</a>
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
                      <th>Nome</th>
                     
                      
                      <th>Admin</th>
                      <th> Ações </th>
                  </thead>

                   <tbody>

                    <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
                       <tr>
                         <td><?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                         <td><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        
                         <td><?php if( $value1["inadmin"]==1 ){ ?>Sim<?php }else{ ?>Não<?php } ?></td>
                         <td>
                             <a href="/admin/users/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><button class="btn btn-warning text-white btn-sm"><i class="bi bi-pencil-fill"></i> </button></a>
                             <a href="/admin/users/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete"><button class="btn btn-danger text-white btn-sm" onclick="return confirm('Deseja mesmo deletar o usuário <?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?> !??')"><i class="bi bi-trash-fill"></i> </button></a>
                             
                         </td>
                       <?php } ?>


                   </tbody>
                 </table>


               </div>
             
          </div>
     



    </main>
  </div>
</div>
