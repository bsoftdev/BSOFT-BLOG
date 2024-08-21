<?php if(!class_exists('Rain\Tpl')){exit;}?>

    <!-- Slideshow -->
    
    <!-- Conteúdo Principal -->
    
  <main id="main" class="my-5">

    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider mb-0">
      <div class="" data-aos="fade-in">
        <div class="row">
          <div class="col-lg-12">
            <div class="swiper sliderFeaturedPosts">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url('assets/img/post-slide-1.jpg');">
                    <div class="img-bg-inner">
                      <h2>The Best Homemade Masks for Face (keep the Pimples Away)</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                    </div>
                  </a>
                </div>

                <div class="swiper-slide">
                  <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url('assets/img/post-slide-2.jpg');">
                    <div class="img-bg-inner">
                      <h2>17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                    </div>
                  </a>
                </div>

                <div class="swiper-slide">
                  <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url('assets/img/post-slide-3.jpg');">
                    <div class="img-bg-inner">
                      <h2>13 Amazing Poems from Shel Silverstein with Valuable Life Lessons</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                    </div>
                  </a>
                </div>

                <div class="swiper-slide">
                  <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url('assets/img/post-slide-4.jpg');">
                    <div class="img-bg-inner">
                      <h2>9 Half-up/half-down Hairstyles for Long and Medium Hair</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="custom-swiper-button-next">
                <span class="bi-chevron-right"></span>
              </div>
              <div class="custom-swiper-button-prev">
                <span class="bi-chevron-left"></span>
              </div>

              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Hero Slider Section -->

   
   
  

    <!-- ======= Lifestyle Category Section ======= -->
    <section class="category-section">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">
          <div class="col-lg-4">
            <div class="post-entry-1 lg">

              <?php if( $asidePost !=''  ){ ?>
              <a href="/posts/<?php echo htmlspecialchars( $asidePost["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <img src="assets/img/post-landscape-8.jpg" alt="" class="img-fluid">
              </a>

              <div class="post-meta">
                <span class="date">BSOFT</span>
                <span class="mx-1">&bullet;</span>
                <span><?php echo formatDate($asidePost["dtregister"]); ?></span>
              </div>

              <h2 class="text-uppercase">
                <a href="single-post.html">
                   <?php echo htmlspecialchars( $asidePost["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </a>
              </h2>

              <p class="mb-4 d-block" style="text-align: justify;">
                <?php echo countWords($asidePost["content"]); ?>
              </p>

              <div class="d-flex align-items-center author">
                <div class="photo">
                  <img src="assets/img/person-7.jpg" alt="" class="img-fluid"></div>
                <div class="name">
                  <h3 class="m-0 p-0"><?php echo htmlspecialchars( $asidePost["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                </div>
              </div>

              <?php } ?>
            </div>

          
          </div>

          <div class="col-lg-8">
            <div class="row g-5">
              <div class="col-lg-4 border-start custom-border">
               

                <?php $counter1=-1;  if( isset($posts) && ( is_array($posts) || $posts instanceof Traversable ) && sizeof($posts) ) foreach( $posts as $key1 => $value1 ){ $counter1++; ?>
                <div class="post-entry-1">
                  <a href="/posts/<?php echo htmlspecialchars( $value1["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid">
                  </a>
                  <div class="post-meta">

                    <span class="date"> BSOFT</span> 
                    <span class="mx-1">&bullet;</span>
                     <span><?php echo formatDate($value1["dtregister"]); ?></span>
                  </div>

                  <h2>
                    <a href="/posts/<?php echo htmlspecialchars( $value1["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpost"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                      <?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </a>
                  </h2>
                </div>
                <?php } ?>

                
              </div>

              <div class="col-lg-4 border-start custom-border">
                
               <?php $counter1=-1;  if( isset($recentPostsColum2) && ( is_array($recentPostsColum2) || $recentPostsColum2 instanceof Traversable ) && sizeof($recentPostsColum2) ) foreach( $recentPostsColum2 as $key1 => $value1 ){ $counter1++; ?>
                <div class="post-entry-1">
                  <a href="/posts/<?php echo htmlspecialchars( $value1["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <img src="assets/img/post-landscape-1.jpg" alt="" class="img-fluid">
                  </a>
                  <div class="post-meta">
                    <span class="date">BSOFT</span> 
                    <span class="mx-1">&bullet;</span> 
                    <span><?php echo formatDate($value1["dtregister"]); ?></span></div>
                  <h2><a href="single-post.html"><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                  </a>
                </h2>
                </div>
                <?php } ?>
              </div>

              <div class="col-lg-4">

                <?php $counter1=-1;  if( isset($featured) && ( is_array($featured) || $featured instanceof Traversable ) && sizeof($featured) ) foreach( $featured as $key1 => $value1 ){ $counter1++; ?>
                <div class="post-entry-1 border-bottom">
                  <div class="post-meta">

                    <span class="date">BSOFT</span>
                     <span class="mx-1">&bullet;</span> 
                     <span><?php echo formatDate($value1["dtregister"]); ?></span>
                   </div>

                  <h2 class="mb-2"><a href="/posts/<?php echo htmlspecialchars( $value1["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo limitText($value1["content"]); ?></a></h2>
                  <span class="author mb-3 d-block"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                </div>
                <?php } ?>

              </div>
            </div>
          </div>

        </div> <!-- End .row -->
      </div>
    </section><!-- End Lifestyle Category Section -->


     <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts mt-0 border-top">
      <div class="container-fluid" data-aos="">
        
         <video autoplay loop style="object-fit: cover;" class="w-100">
             <source src="/assets/blogvideo.mp4" type="">
         </video>
      </div>
    </section> <!-- End Post Grid Section -->


  </main><!-- End #main -->


