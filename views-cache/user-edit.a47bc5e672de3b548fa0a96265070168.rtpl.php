<?php if(!class_exists('Rain\Tpl')){exit;}?> <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cadastrar Usuarios</h1>
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

    <form class="mx-auto" style="max-width: 700px;" action="/admin/users/<?php echo htmlspecialchars( $user["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="POST">
       <?php if( $registerError != ''  ){ ?>
      <div class="alert alert-danger">
              <?php echo htmlspecialchars( $registerError, ENT_COMPAT, 'UTF-8', FALSE ); ?>
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

    <div class="form-floating mb-3">
      <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword"> <i class="bi bi-lock-fill"></i> Senha</label>
    </div>


   <div class="form-floating mb-3">
      <input type="password" class="form-control" name="confirm_password" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword"> <i class="bi bi-lock-fill"></i> Confirmar Senha</label>
    </div>

     <div class="mb-3">
      <input type="checkbox" name="inadmin" placeholder="Password" value="1">
      <label>Acesso Administrativo</label>
    </div>


    <button class="btn btn-primary  py-2" type="submit"> <i class="bi bi-send-fill"></i>Cadastrar</button>
    <a href="/admin/users" class=" btn btn-success "> <i class="bi bi-people-fill"></i> Usuários</a>
    
  </form>
  </div>
     

    </main>
  </div>
</div>