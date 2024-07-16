<?php if(!class_exists('Rain\Tpl')){exit;}?> <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-3">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Posts</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="/admin/post/create" class="text-white text-decoration-none"> <button class="btn btn-sm btn-primary"> <i class="bi bi-newspaper"></i>  Criar Post</button></a>
           
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
            <svg class="bi"><use xlink:href="#calendar3"/></svg>
            This week
          </button>
        </div>
      </div>

    

     <!-- Conteúdo Principal -->
    <main>
    <div class="container content">
        <div class="row">
            <!-- Artigos Recentes -->
            <div class="col-md-12">
                <h2></h2>
                <div class="row justify-content-center">

                   <?php $counter1=-1;  if( isset($posts) && ( is_array($posts) || $posts instanceof Traversable ) && sizeof($posts) ) foreach( $posts as $key1 => $value1 ){ $counter1++; ?>
                    <div class="col-md-4 article-card mb-2">
                        <div class="card">
                            <img src="../assets/photo1.jpg" class="card-img-top w-100" alt="Artigo 2" style="">
                            <div class="card-body">
                                <div class="d-block border-bottom">
                                <h5 class="card-title text-uppercase text-justify w-100" style="font-size: 12pt; font-weight: bolder;"><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
                                 Data: <span style="color: blue"><?php echo formatDate($value1["dtregister"]); ?></span> <br>
                                  Editado por: <span style="color: blue; cursor: pointer;"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                              </div>

                                <p class="card-text"><?php echo limitText($value1["content"]); ?></p>

                              <div class=" justify-content-center">
                                    
                                <a href="/posts/<?php echo htmlspecialchars( $value1["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary"> Ler mais</a>
                                <a href="/admin/post/<?php echo htmlspecialchars( $value1["idpost"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-warning text-white"><i class="bi bi-pencil-fill"></i></a>
                                <a href="/admin/post/<?php echo htmlspecialchars( $value1["idpost"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja deletar esta publicação?')" class="btn btn-danger" data-target="#deleteModal" ><i class="bi bi-trash-fill"></i></a>


                             </div>

                            </div>
                        </div>
                    </div>
                  <?php } ?>
                   
                </div>
                  
            </div>
        </div>
    </div>
</main>

    </main>
  </div>
</div>

