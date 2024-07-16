<?php if(!class_exists('Rain\Tpl')){exit;}?>

    <!-- Slideshow -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" > <img class="img-responsive" src="assets/slide1.png"></div>
            <div class="carousel-item" > <img  class="img-responsive" src="assets/slide2.png"></div>
            <div class="carousel-item"><img class="img-responsive" src="assets/slide3.png"></div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Conteúdo Principal -->
    <main class=" ">
    <div class="container-fluid content border-bottom">
        <div class="row">
            <!-- Artigos Recentes -->
            <div class="col-md-9">
                <h2>Posts em Destaque</h2>
                <div class="row justify-content-center">

                 

                   <?php $counter1=-1;  if( isset($featured) && ( is_array($featured) || $featured instanceof Traversable ) && sizeof($featured) ) foreach( $featured as $key1 => $value1 ){ $counter1++; ?>
                    <div class="col-md-4 article-card">
                        <div class="card">
                            <img src="assets/photo1.jpg" class="card-img-top" alt="Artigo 2">
                            <div class="card-body">
                               <h5 class="card-title text-uppercase text-justify w-100" style="font-size: 12pt; font-weight: bolder;"><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
                                  
                                 Data:  <span style="color: blue"><?php echo formatDate($value1["dtregister"]); ?></span> <br>
                               

                                <p class="card-text border-top"><?php echo limitText($value1["content"]); ?></p>
                                <a href="/posts/<?php echo htmlspecialchars( $value1["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary w-100">Leia mais</a>
                            </div>


                        </div>
                    </div>
                    <?php } ?>


                   <video loop  autoplay style="object-fit: cover; width: 100%;" class="my-4">
                        <source src="assets/blogvideo.mp4" type="">
                    </video>


                        <!-------MODAL FOR REGISTERING--->
                     
                    <!-----------------------------------MODAL FOR LOGING------------------------>
                         <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">


                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>

                              <div class="modal-body">
                                <form method="post" action="/login">
                                  <div class="mb-3">
                                     <div class="form-floating mb-3">
                                        <input type="tel" class="form-control rounded-3" name="phone" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput"> <i class="bi bi-person-fill"></i>E-mail ou nº de telefone</label>
                                      </div>
                                  </div>
                                  <div class="mb-3">
                                    
                                    <div class="form-floating mb-3">
                                    <input type="password" class="form-control rounded-3" name="password" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword"> <i class="bi bi-lock-fill"></i>Palavra-passe</label>
                                  </div>

                                  </div>


                              <div class="modal-footer">
                               
                                <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Entrar</button>
                                 <small class="text-body-secondary">Ainda não tem uma conta?  <a href="signup.html" data-bs-toggle="modal" data-bs-target="#modalRegiter">Criar conta</a></small> 
                              </div>
                                </form>
                              </div>
                             
                            </div>
                          </div>
                        </div>    


                       
      
        <!-- Testimonial End -->  
                </div>
            </div>




            <!----------------- Posts Recentes ----------------------->
            <div class="col-md-3">
                <div class="fixed-sidebar">
                    <h3>Posts Recentes</h3>
                     <ul class="list-unstyled">

                    <?php $counter1=-1;  if( isset($posts) && ( is_array($posts) || $posts instanceof Traversable ) && sizeof($posts) ) foreach( $posts as $key1 => $value1 ){ $counter1++; ?>
                        <li>
                          <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="/posts/<?php echo htmlspecialchars( $value1["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                           <img src="assets/cleep.jpg" style="width: 100px; height: 100px;">
                            <div class="col-lg-8">
                              <h6 class="mb-0"><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h6>
                              <small class="text-body-secondary"><?php echo formatDate($value1["dtregister"]); ?></small>
                            </div>
                          </a>
                        </li>

                  <?php } ?>
                
                      </ul>
                </div>
            </div>
        </div>
    </div>
</main>

