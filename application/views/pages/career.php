<div id="category_section">
    <div class="row category_section_header dark_header">
        <div class="container">
          	<h1 class="category_title">Career Philosophy</h1>
          	<div class="search_filter">
            <form action="<?=base_url()?>search" method="post">
	           <div class="form-group">
	              <input id="search" name="search" class="form-control" type="text" placeholder="Search..." value="">
	              <button type="submit" class="glyphicon glyphicon-search form-control-feedback"></button>
	           </div>
	        </form>
          	</div>
        </div>
    </div>

    <div class="row content_section banner-media-bg">
        <div class="container">
          <center><img src="<?=base_url()?>includes/img/articles.png" class="img-responsive"></center>
          
          <?php foreach($results as $result): ?>
          <div class="col-md-12 article-section">
            <h2><?=$result->news_title?></h2>
            <h6><?=date('F d, Y', strtotime($result->date_created))?></h6>
            <?=word_limiter($result->news_content,25); ?>
            <div class="view-more-cta">
              <a href="<?=base_url()?>career/<?=$result->news_slug?>">Read more</a>
            </div>
          </div>

          <?php endforeach; ; ?>
                                                     
        </div>
      </div>
</div>

<div id="fixit_banner">
    <div class="container">
      	<div class="col-md-6 col-xs-6 fixit_banner_img"><img src="<?=base_url()?>includes/img/fixit-logo.png" class="img-responsive" alt=""></div>
      	<div class="col-md-6 col-xs-6 fixit_banner_caption">
        	<h2 class="title">Right Adhesives for the <br/> Right Materials</h2>
        	<p>Did you know there are Pioneer adhesives and sealants made specifically for different types of materials?</p>
        	<a href="<?=base_url()?>fixit" class="btn btn-yellow">Go to FIX-IT Center</a>
      	</div>
    </div>
</div>