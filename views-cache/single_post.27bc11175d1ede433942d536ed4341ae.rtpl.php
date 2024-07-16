<?php if(!class_exists('Rain\Tpl')){exit;}?><main class="container my-5 py-5">
  <div class="row g-5">
    <div class="col-md-8">


  <div class="card text-bg-dark my-2">
  <img src="/assets/photo1.jpg" class="card-img" alt="...">
  <div class="card-img-overlay">
    <h5 class="card-title">Card title</h5>
    
    <p class="card-text"><small>Last updated 3 mins ago</small></p>
  </div>
</div>
    

      <article class="blog-post">
        <h2 class="display-5 mt-4 mb-4" style="text-transform: uppercase; font-size:25pt;font-weight:bold; "><?php echo htmlspecialchars( $post["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
         <span class="blog-post-meta mr-2 ">Editado por :  <a href="#" class="text-decoration-none"><?php echo htmlspecialchars( $post["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></span>, 
        <span class="blog-post-meta"><?php echo formatDate($post["dtregister"]); ?></span>
       
        <hr>
        
        <div style="text-align: justify;">
           <?php echo clean($post["content"]); ?>
        </div>


      <form class="mb-3 float-right">
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Deixe o seu comentário</label>
            <textarea rows="2" class="form-control border-primary" id="exampleFormControlTextarea1" rows="3" placeholder="Escrever..."></textarea>
          </div>

          <input type="button" name="" class="btn btn-primary" value="Comentar">
      </form>
       


      <nav class="blog-pagination" aria-label="Pagination">
        <a class="btn btn-outline-primary rounded-pill" href="#">Older</a>
        <a class="btn btn-outline-secondary rounded-pill disabled" aria-disabled="true">Newer</a>
      </nav>

    </div>

</article>



    <div class="col-md-3">
      <div class="position-sticky" style="top: 2rem;">
        
          <!-- Posts Recentes -->
            
                <div class="fixed-sidebar">
                    <h3>Posts Recentes</h3>
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
                </div>
           
      </div>
    </div>
  </div>

</main>



