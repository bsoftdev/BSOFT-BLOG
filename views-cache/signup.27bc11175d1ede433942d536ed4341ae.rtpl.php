<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div class="modal modal-sheet position-static d-block bg-body-secondary p-4 mt-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <h1 class="fw-bold mb-0 fs-2">Criar Conta</h1>
       
      </div>


      <div class="modal-body p-5 pt-0">


       <?php if( $loginError != ''  ){ ?>
          <div class="alert alert-danger">
                  <?php echo htmlspecialchars( $loginError, ENT_COMPAT, 'UTF-8', FALSE ); ?>
           </div>
        <?php } ?>


      <form method="post" action="/register" >
      
           <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-3" name="name" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput"> <i class="bi bi-person-fill"></i> Nome Completo</label>
            </div>

       

        
        <div class="form-floating mb-3">
          <input type="text" class="form-control rounded-3" name="phone" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput"> <i class="bi bi-telephone-fill"></i> Número de telefone</label>
        </div>
      

     
        <div class="form-floating mb-3">
          <input type="email" class="form-control rounded-3" name="email" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">  <i class="bi bi-envelope-fill"></i>  Endereço de E-mail</label>
        </div>
    
       
        <div class="form-floating mb-3">
          <input type="password" class="form-control rounded-3" name=senha id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">  <i class="bi bi-lock-fill"></i>  Palavra-passe</label>
       

      </div>


        
        <div class="form-floating mb-3">
          <input type="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">  <i class="bi bi-lock-fill"></i> Confirmar Palavra-passe</label>
        </div>
          

  
       <button type="submit" class="w-100  btn btn-lg rounded-3 btn-primary" >Criar Conta</button>
            <hr>
     

        <div class="m-2 p-2 ">
            <small class="text-body-secondary" >Já tem uma conta? <a href="/login">Fazer Login</a></small> <br>
            <span class="text-body-normal">Ao "Criar conta"você concorda com nossos termos de uso.</span>
       </div>

      </form>
      </div>
    </div>
  </div>
</div>




