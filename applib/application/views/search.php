<header class="blue-header fixed">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            
            <div class="page-header-title">
                <h2 style="color:white">مولانا مفتی محمد ایاز کتب </h2>
            </div>
            
        </div>
    </div>
</header>
        <table class="table table-striped" style="margin-top: 40px">
            <tr><td></td><td></td></tr>
        <?php  if(count($products)) {foreach ($products as $row): ?>
           
            <tr><td width="30%"><a href="<?= site_url() . "assets/books_pdf/" . $row->productId . '.pdf' ?>"><img class="img-responsive img-thumbnail" src="<?= site_url() . "assets/products_thumbs/" . $row->productId . '.jpg' ?>" alt=""></a></td><td style="vertical-align: middle"><h2><?= $row->productTitle ?></h2></td></tr>
             
        <?php endforeach; } ?>
        </table>
            
