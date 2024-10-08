<?php if(!class_exists('Rain\Tpl')){exit;}?> <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-3">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Nova Publicação</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
           <a href="/admin/posts" class="text-white text-decoration-none">  <button class="btn btn-sm btn-primary"> <i class="bi bi-newspaper"></i>  Publicações</button></a>
           
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
            <svg class="bi"><use xlink:href="#calendar3"/></svg>
            This week
          </button>
        </div>
      </div>

    

  <div>
    
    <link rel="stylesheet" type="text/css" href="/assets/summernote/summernote-lite.min.css">
    <form class="mx-auto" style="" action ="/admin/post/create" method="POST" enctype="multipart/form-data">
      

        <div class="text-center" >
        <div class="form-group">
              <label for="file" style="cursor: pointer;">
              <input type="file" class="form-control" id="file" name="photo" style="visibility: hidden;">
              <div class="box box-widget">
                <div class="box-body">
                  <img src="/assets/logo.png" class="img-responsive rounded-circle" id="image-preview" src="" alt="Photo" width="200px" height="200px" style="object-fit: cover;">
                </div>
              </div>
               </label>
            </div>
     </div>
 

      <?php if( $postError != ''  ){ ?>
      <div class="alert alert-danger">
              <?php echo htmlspecialchars( $postError, ENT_COMPAT, 'UTF-8', FALSE ); ?>
       </div>
      <?php } ?>


   
    <h1 class="h3 mb-3 fw-normal"></h1>

    <div class="form-floating mb-3">
      <input type="text" class="form-control" name="title" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Titulo</label>
    </div>

    <div class="form-floating mb-3">

      <textarea class="summernote" name="content" class="w-100"></textarea>
   
    </div>

    <div class="form-floating mb-3">
      <input type="text" class="form-control" name="url" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">URL</label>
    </div>


   
    <button class="btn btn-primary  py-2" type="submit"> <i class="bi bi-send-fill"></i>Publicar</button>
    <a href="/admin/posts" class=" btn btn-success "> <i class="bi bi-newspaper"></i> Publicações</a>
    
  </form>
  </div>

  <script src="/assets/jquery.js"></script>
  <script src="/assets/summernote/summernote-lite.min.js"></script>

  <script>
      $('.summernote').summernote({
        placeholder: 'Escreva o seu post...',
        tabsize: 2,
        height: 200
      });
    </script>
    


    </main>
  </div>
</div>

<script>
document.querySelector('#file').addEventListener('change', function(){
  
  var file = new FileReader();

  file.onload = function() {
    
    document.querySelector('#image-preview').src = file.result;

  }

  file.readAsDataURL(this.files[0]);

});
</script>