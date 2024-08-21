<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="col-md-9 content-wrapper">
<!-- Content Header (Page header) -->
<section class=" my-3 content-header">
  <h2>
    Posts da categoria <strong><?php echo htmlspecialchars( $category["category"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong> 
  </h2>
  
</section>

<!-- Main content -->
<section class="content my-5">

    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                <h4 class="box-title">Todos posts</h4>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body border-top">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th style="width: 10px">#</th>
                            <th>Nome do Produto</th>
                            <th style="width: 240px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter1=-1;  if( isset($noReletedPosts) && ( is_array($noReletedPosts) || $noReletedPosts instanceof Traversable ) && sizeof($noReletedPosts) ) foreach( $noReletedPosts as $key1 => $value1 ){ $counter1++; ?>
                            <tr>
                            <td><?php echo htmlspecialchars( $value1["idpost"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td class="">
                                <a href="/admin/categories/<?php echo htmlspecialchars( $category["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/post/<?php echo htmlspecialchars( $value1["idpost"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add" class="btn-sm btn btn-primary"><i class="bi bi-arrow-right"></i> Adicionar</a>
                            </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                <h4 class="box-title">Posts na Categoria <strong><?php echo htmlspecialchars( $category["category"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong> </h4>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body border-top">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th style="width: 10px">#</th>
                            <th>Nome do Produto</th>
                            <th style="width: 240px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter1=-1;  if( isset($reletedPosts) && ( is_array($reletedPosts) || $reletedPosts instanceof Traversable ) && sizeof($reletedPosts) ) foreach( $reletedPosts as $key1 => $value1 ){ $counter1++; ?>
                            <tr>
                            <td><?php echo htmlspecialchars( $value1["idpost"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td>
                                <a href="/admin/categories/<?php echo htmlspecialchars( $category["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/post/<?php echo htmlspecialchars( $value1["idpost"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/remove" class="btn-sm btn btn-danger btn-xs pull-right"><i class="bi bi-arrow-left"></i> Remover</a>
                            </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->