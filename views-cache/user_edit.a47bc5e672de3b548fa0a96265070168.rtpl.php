<?php if(!class_exists('Rain\Tpl')){exit;}?> <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar Usuarios</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
            <svg class="bi"><use xlink:href="#calendar3"/></svg>
            This week
          </button>
        </div>
      </div>

    

  <div>

    <form method="post" action="/admin/users/<?php echo htmlspecialchars( $user["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  class="mx-auto" style="max-width: 660px;"  enctype="multipart/form-data">

     <div class="text-center" >
        <div class="form-group">
              <label for="file" style="cursor: pointer;">
              <input type="file" class="form-control" id="file" name="photo" style="visibility: hidden;">
              <div class="box box-widget">
                <div class="box-body">
                  <img class="img-responsive rounded-circle" id="image-preview" src="<?php echo htmlspecialchars( $user["photo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo" width="200px" height="200px" style="object-fit: cover;">
                </div>
              </div>
               </label>
            </div>
     </div>

       <?php if( $updateError != ''  ){ ?>
      <div class="alert alert-danger">
              <?php echo htmlspecialchars( $updateError, ENT_COMPAT, 'UTF-8', FALSE ); ?>
       </div>
      <?php } ?>

       <?php if( $updateSuccess != ''  ){ ?>
      <div class="alert alert-success">
              <?php echo htmlspecialchars( $updateSuccess, ENT_COMPAT, 'UTF-8', FALSE ); ?>
       </div>
      <?php } ?>
   
    <h1 class="h3 mb-3 fw-normal"></h1>

    <div class="form-floating mb-3">
      <input type="text" class="form-control" name="name" id="floatingInput" value="<?php echo htmlspecialchars( $user["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="name@example.com">
      <label for="floatingInput"><i class="bi bi-person-fill"></i>Nome completo</label>
    </div>

    <div class="form-floating mb-3">
      <input type="email" class="form-control" name="email" id="floatingInput" value="<?php echo htmlspecialchars( $user["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="name@example.com">
      <label for="floatingInput"> <i class="bi bi-envelope-fill"></i>  Endereço de email</label>
    </div>

    <div class="form-floating mb-3">
      <input type="tel" class="form-control" name="phone" id="floatingInput" value="<?php echo htmlspecialchars( $user["phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="name@example.com">
      <label for="floatingInput"> <i class="bi bi-telephone-fill"></i> Telefone</label>
    </div>

    

     <div class="mb-3">
     
      <input type="checkbox" name="inadmin" placeholder="Password" value="1" <?php if( $user["inadmin"]==1 ){ ?>checked<?php } ?>>
      <label>Acesso Administrativo</label>

    </div>

  <div class="mb-3">
    <button class="btn btn-primary  py-2" type="submit"> <i class="bi bi-send-fill"></i>Atualizar</button>
    <a href="/admin/users" class=" btn btn-success "> <i class="bi bi-people-fill"></i> Usuários</a>
    </div>
  </form>
  </div>
     

    </main>
  </div>
</div>


<script>
document.querySelector('#file').addEventListener('change', function(){
  
  var file = new FileReader();

  file.onload = function() {
    
    document.querySelector('#image-preview').src = file.result;

  }

  file.readAsDataURL(this.files[0]);

});
</script>