<?php if(!class_exists('Rain\Tpl')){exit;}?>


<div class="modal modal-sheet position-static d-block bg-body-secondary p-4 mt-4  py-md-5" tabindex="-1" role="dialog" id="modalSignin">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <h1 class="fw-bold mb-0 fs-2">Entrar na sua conta</h1>
       
      </div>

      <div class="modal-body p-5 pt-0"> 

        <?php if( $loginError != ''  ){ ?>
            <div class="alert alert-danger">
                    <?php echo htmlspecialchars( $loginError, ENT_COMPAT, 'UTF-8', FALSE ); ?>
             </div>
          <?php } ?>

        <form class="" action="/login" method="post">

        
          <div class="form-floating mb-3">
            <input type="tel" class="form-control rounded-3" name="phone" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput"> <i class="bi bi-person-fill"></i>E-mail ou nº de telefone</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-3" name="senha" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword"> <i class="bi bi-lock-fill"></i>Palavra-passe</label>
          </div>


          <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Entrar</button>
          <small class="text-body-secondary">Ainda não tem uma conta?  <a href="/signup">Criar conta</a></small> 
         
          <hr class="my-3">
          <h2 class="fs-5 fw-bold mb-3"></h2>
           <button class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-3" type="submit">
            <svg class="bi me-1" width="16" height="16"><use xlink:href="#twitter"/></svg>
            Entrar com Google
          </button>
          <button class="w-100 py-2 mb-2 btn btn-outline-primary rounded-3" type="submit">
            <svg class="bi me-1" width="16" height="16"><use xlink:href="#facebook"/></svg>
            Entrar com Facebook
          </button>
          
        </form>
      </div>
    </div>
  </div>
</div>





