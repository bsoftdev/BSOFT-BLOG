<?php if(!class_exists('Rain\Tpl')){exit;}?>
 <main id="main">
    <section class="single-post-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-9 post-content" data-aos="fade-up">

            <!-- ======= Single Post Content ======= -->
             <div class="post-title text-center">
               <h2 class="display-5 mt-4 mb-4" style="text-transform: uppercase; font-size:25pt;font-weight:bold; "><?php echo htmlspecialchars( $post["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
               <span class="blog-post-meta mr-2 ">
                Editado por :<a href="#" class="text-decoration-none" style="color:red;"> <?php echo htmlspecialchars( $post["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
               </span>, 
              <span class="blog-post-meta"><?php echo formatDate($post["dtregister"]); ?></span>
             
            <hr>
             </div>


            <div class="single-post">
              <figure class="my-4">
                <img src="/assets/img/post-landscape-1.jpg" alt="" class="img-fluid">
                
              </figure>


      <article class="blog-post">
        
        <div style="text-align: justify;">
           <?php echo clean($post["content"]); ?>
        </div>


        <?php $counter1=-1;  if( isset($comments) && ( is_array($comments) || $comments instanceof Traversable ) && sizeof($comments) ) foreach( $comments as $key1 => $value1 ){ $counter1++; ?>
        <div class="card shadow my-5">
        <div class="card-header d-flex justify-content-between">
          <p class=""><a class="page-link" href=""><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></p>
          <p><?php echo htmlspecialchars( $value1["dtregister"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
        </div>

        <div class="card-body">
         
          <p class="card-text"><?php echo htmlspecialchars( $value1["content"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
         
        </div>
      </div>
      <?php } ?>
    </article>

  </div><!-- End Single Post Content -->


            <!-- ======= Comments Form ======= -->
     <form class="mb-3 float-right" action="/post/comments/<?php echo htmlspecialchars( $post["idpost"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="POST">

  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Deixe o seu comentário</label>
    <textarea rows="2"  name="content" class="form-control border-primary" id="exampleFormControlTextarea1" rows="3" placeholder="Escrever..."></textarea>
  </div>

  <input type="submit" class="btn btn-primary" value="Comentar">
</form>
          </div>
          <div class="col-md-3">
            <!-- ======= Sidebar ======= -->
            <div class="aside-block">

              <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Popular</button>
                </li>
              </ul>

              <div class="tab-content" id="pills-tabContent">

                <!-- Popular -->
                <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                  
                 <ul class="list-unstyled">
                        <?php $counter1=-1;  if( isset($posts) && ( is_array($posts) || $posts instanceof Traversable ) && sizeof($posts) ) foreach( $posts as $key1 => $value1 ){ $counter1++; ?>
                        <li>
                          <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="/posts/<?php echo htmlspecialchars( $value1["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                           <img src="../assets/cleep.jpg" style="width: 100px; height: 100px;">
                            <div class="col-lg-8">
                              <h6 class="mb-0"><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h6>
                              <small class="text-body-secondary"><?php echo formatDate($value1["dtregister"]); ?></small>
                            </div>
                          </a>
                        </li>

                  <?php } ?>
                </ul>

                  
                </div> <!-- End Popular -->

              </div>
            </div>

            <div class="aside-block">
              <h3 class="aside-title">Video</h3>
              <div class="video-post">
                <a href="https://www.youtube.com/watch?v=AiFfDjmd0jU" class="glightbox link-video">
                  <span class="bi-play-fill"></span>
                  <img src="/assets/img/post-landscape-5.jpg" alt="" class="img-fluid">
                </a>
              </div>
            </div><!-- End Video -->

            <div class="aside-block">
              <h3 class="aside-title">Categories</h3>
              <ul class="aside-links list-unstyled">
                
                  <?php require $this->checkTemplate("categories-menu");?>
              </ul>
            </div><!-- End Categories -->

            
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->





