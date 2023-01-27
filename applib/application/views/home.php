<style>
    ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
}

li {
  float: left;
}

li a {
  display: block;
  padding: 8px;
  background-color: #dddddd;
}
</style>

<div class="banner">
    <div class="container">
        <div class="banner-content text-center">
            <h2>مولانا مفتی محمد ایاز کتب </h2>
            <!--<p></p>-->
        </div>
        <div class="banner-form">
            <form action="<?=site_url('home/search')?>">
                <div class="form-group search-text">
                    <input type="text" class="form-control" name="search" placeholder="Search Book">
                </div>
                <button type="submit" class="btn btn-primary search-btn w-100"><i><img src="<?= site_url('assets/img/icons/search-icon.svg') ?>" alt=""></i> <span>Search</span></button>
            </form>
        </div>
    </div>
</div>

<div style="padding-top:10px; align-content: right; margin-left:80px;">
    <ul>
      <li><a href="#ur">Urdu</a></li>
      <li><a href="#ps">Pashto</a></li>
      <li><a href="#fr">Farsi</a></li>
      <li><a href="#en">English</a></li>
    </ul>
</div>        
<div class="popular-mentors">
    <div id="ur" class="section-title justify-content-between">
            <h2>اردو کتب</h2>
<!--        <div>
            <a href="favourites.html">View All</a>
        </div>-->
    </div>
    
        
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php  foreach ($u_books as $row): ?>
            <div class="swiper-slide">
                <div class="mentor-widget" style="display: block">
                        <div class="inner-widget">
                            <div class="mentor-img">
                                <a href="<?= site_url() . "assets/books_pdf/" . $row->productId . '.pdf' ?>">
                                    <img src="<?= site_url() . "assets/products_thumbs/" . $row->productId . '.jpg' ?>" alt="">
                                </a>
                            </div>
                            <div class="mentor-details">
                                <a href="<?= site_url() . "assets/books_pdf/" . $row->productId . '.pdf' ?>"><h6><?= $row->productTitle ?></h6></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
        
</div>

<div class="popular-mentors" style="background-color: #DCE0E3">
    <div id="ps" class="section-title justify-content-between">
        <div>
            <h2>پشتو کتب</h2>
        </div>
        <!--<div>
        <a href="favourites.html">View All</a>
        </div>-->
    </div>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php  foreach ($p_books as $row): ?>
            <div class="swiper-slide">
                <div class="mentor-widget" style="display: block">
                        <div class="inner-widget">
                            <div class="mentor-img">
                                <a href="<?= site_url() . "assets/books_pdf/" . $row->productId . '.pdf' ?>">
                                    <img src="<?= site_url() . "assets/products_thumbs/" . $row->productId . '.jpg' ?>" alt="">
                                </a>
                            </div>
                            <div class="mentor-details">
                                <a href="<?= site_url() . "assets/books_pdf/" . $row->productId . '.pdf' ?>"><h6><?= $row->productTitle ?></h6></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>  

<div class="popular-mentors">
    <div id="fr" class="section-title justify-content-between">
            <h2>فارسی کتب</h2>
<!--        <div>
            <a href="favourites.html">View All</a>
        </div>-->
    </div>
    
        
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php  foreach ($f_books as $row): ?>
            <div class="swiper-slide">
                <div class="mentor-widget" style="display: block">
                        <div class="inner-widget">
                            <div class="mentor-img">
                                <a href="<?= site_url() . "assets/books_pdf/" . $row->productId . '.pdf' ?>">
                                    <img src="<?= site_url() . "assets/products_thumbs/" . $row->productId . '.jpg' ?>" alt="">
                                </a>
                            </div>
                            <div class="mentor-details">
                                <a href="<?= site_url() . "assets/books_pdf/" . $row->productId . '.pdf' ?>"><h6><?= $row->productTitle ?></h6></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
        
</div>

<div class="popular-mentors" style="background-color: #DCE0E3">
    <div id="en" class="section-title justify-content-between">
        <div>
            <h2>انگلش کتب</h2>
        </div>
        <!--<div>
        <a href="favourites.html">View All</a>
        </div>-->
    </div>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php  foreach ($e_books as $row): ?>
            <div class="swiper-slide">
                <div class="mentor-widget" style="display: block">
                        <div class="inner-widget">
                            <div class="mentor-img">
                                <a href="<?= site_url() . "assets/books_pdf/" . $row->productId . '.pdf' ?>">
                                    <img src="<?= site_url() . "assets/products_thumbs/" . $row->productId . '.jpg' ?>" alt="">
                                </a>
                            </div>
                            <div class="mentor-details">
                                <a href="<?= site_url() . "assets/books_pdf/" . $row->productId . '.pdf' ?>"><h6><?= $row->productTitle ?></h6></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div> 