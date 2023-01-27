
<main class="site-content store-content container" style="padding:0px;margin-bottom: 0px;background-color: #fff;padding: 15px">
    <article id="post-1706" class="post-1706 page type-page status-publish hentry badges-style-3">

        <div class="row ">
            <div class="col-md-12 col-lg-9 col-md-9 col-sm-12 col-xs-12 tmargin10 padding0" style="z-index:99;">            
                <div class="col-md-5 col-sm-6 col-xs-12 deal-gallery-box">  
                    <br><br><br><br>
                    <div class="sp-wrap sp-non-touch" style="display: inline-block;">








                        <div class="sp-large" id="img-des">

                            <a href="<?= site_url() . "assets/products_thumbs/" .$product['productId'].'.jpg' ?>" class="sp-current-big">
                                <img src="<?= site_url() . "assets/products_thumbs/" .$product['productId'].'.jpg' ?>" alt=""></a>
                        </div>

                    </div>

                </div>
                <div class="col-md-7 col-sm-6 col-xs-12 single-details">
                    <div class="row"> 
                        <div class="col-xs-12"> 
                            <h1 class="single-product-title h3 text-capitalize tgreen tmargin0 bmargin5" style="direction:rtl" title="<?= $product['productTitle'] ?>"><?= $product['productTitle'] ?></h1>

                            <p class="text-capitalize bmargin5 " style="direction:rtl;font-family: calibri"><b>مصنف:</b> <?= $product['autName'] ?></p>   

                            <a href="tel:923365629797" class="tgreen"><p class="text-capitalize bmargin5 " style="font-size:13px"><img src="<?= parent_url . 'assets/whatsapp.png' ?>" width="30px"> Order on Whatsapp:  +92 336 5629797 </p></a>
                            <!--<button class="btn small-btn btn-orange">Bought </button> -->
                        </div>

                    </div>

                    <hr> 
                     
                    <div class="row">
                        <div class="col-xs-12">
                            <a  href="https://docs.google.com/viewer?url=<?=  site_url('assets/books_pdf/'.$product['productId'])?>.pdf&embed=true" class="btn btn-block  text-capitalize btn-success" >  پڑھیئے</a>
                        </div>

<!--                        <div class="col-xs-12">
                            <a href="<?=  site_url('assets/books_pdf/'.$product['productId'])?>.pdf" class="btn btn-block  text-capitalize btn-info">کتاب پڑھیئے</a>
                        </div>-->
                        <div class="col-md-12">
                            <div id="product-added-to-cart"></div>
                        </div>
                    </div>


                </div>
            </div>    


        </div>
    </article>
</main>
<!--<script src="https://github.com/eligrey/FileSaver.js"  type="text/javascript"></script>
<script>
    function get_download(){
        var URLToPDF = "<?=  site_url('assets/books_pdf/'.$product['productId'])?>.pdf";
        var element = document.createElement('a');
        element.setAttribute('download', URLToPDF);
   }
</script>-->