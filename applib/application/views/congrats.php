<main class="site-content" role="main" itemscope="itemscope" itemprop="mainContentOfPage" style="background-color: #FFF;min-height: 600px">
    <article id="post-1706" class="post-1706 page type-page status-publish hentry badges-style-3">
        <br><br><br>
       <h3 style="/* background: #EEE ; */text-align: center;">
           <span style="color: #ff8500;font-size:35px;font-weight:bold">THANK YOU!</span><br><small>We appreciate the confidence you have placed<br>in us and we look forward to providing you<br> with the best possible service. <br>
               <b>Your Order number: <?=$order?></b></small><br><br>
           <a class="btn btn-info" href="<?=site_url('home')?>">BACK TO HOMEPAGE</a>
        </h3>
	
        
    </article>
</main>
<script>
        history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function () {
        history.pushState(null, null, document.URL);
        });
</script>