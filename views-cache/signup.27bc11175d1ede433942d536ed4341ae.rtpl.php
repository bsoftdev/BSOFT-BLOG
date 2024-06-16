<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div class="modal modal-sheet position-static d-block bg-body-secondary p-4 my-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <h1 class="fw-bold mb-0 fs-2">Criar Conta</h1>
       
      </div>

      <div class="modal-body p-5 pt-0">
        <form class="">
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Nome Completo</label>
          </div>

          <div class="form-floating mb-3">
           
             <select class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                  <option>---Selecione o seu sexo---</option>
                  <option>Masculino</option>
                  <option>Femenino</option>
                  <option>Outro</option>
             </select>
          </div>

           <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Número de telefone</label>
          </div>


          <div class="form-floating mb-3">
            <input type="email" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Endereço de E-mail</label>
          </div>


          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Palavra-passe</label>
          </div>

          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Confirmar Palavra-passe</label>
          </div>

          <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Criar Conta</button>

          <small class="text-body-secondary">Já tem uma conta? <strong> <a href="login.html">Fazer Login</a></small> <br>
          <small class="text-body-secondary">Ao  <strong> "Criar conta"</strong> você concorda com nossos termos de uso.</small>
          <hr class="my-4">
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




