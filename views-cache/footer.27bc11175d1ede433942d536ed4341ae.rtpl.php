<?php if(!class_exists('Rain\Tpl')){exit;}?> <!-- Rodapé -->
    

<div class="container border-top">
  <footer class="py-5">
    <div class="row">



      <div class="col-6 col-md-2 mb-3">
        <h4>Link Uteis</h4>

        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Privacidade</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Termo de Uso</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Ajuda</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
        </ul>
      </div>

        <div class="col-md-3 col-sm-4">
            <div class="footer-menu">
                <h4 class="footer-wid-title">Categorias</h4>
                <ul style="">
                    <?php require $this->checkTemplate("categories-menu");?>
                </ul>                        
            </div>
        </div>

      <div class="col-6 col-md-3 mb-3">
        <h4>Contactos</h4>

        <ul class="nav flex-column">
          <li class="nav-item mb-2"> <a href="#" class="nav-link p-0 text-body-secondary"> <i class="bi bi-telephone-fill"></i> (+244) 932314957 </a></li>
          <li class="nav-item mb-2"><i class="bi bi-envelope-fill"></i> bsoft411@gmail.com </a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary"><i class="bi bi-geo-alt-fill"></i>Luanda, Benfica, Mundial </a></a></li>

          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary"><i class="bi bi-house-fill"></i>Casa Nº 12, Rua Praça Nova </a></a></li>
          
        </ul>
      </div>


    
       

      

      <div class="col-md-4  mb-3">
        <form>
          <h4>Subscribe to our newsletter</h4>
          <p>Monthly digest of what's new and exciting from us.</p>
          <div class="d-flex flex-column flex-sm-row w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
            <button class="btn btn-primary" type="button">Subscribe</button>
          </div>
        </form>
      </div>
    </div>

    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
      <p>&copy; 2024 BSOFT, Todos direitos reservados.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
      </ul>
    </div>
  </footer>
</div>
 
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
