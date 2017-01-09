<div id="category_section">
    <div class="row category_section_header dark_header">
        <div class="container">
          	<h1 class="category_title">Commercials</h1>
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

    <div class="row category_section_list banner-media-bg">
        <div class="container">
			
          	<center><img src="<?=base_url()?>includes/img/watch.png" class="img-responsive"></center>

          	<?php  foreach ($results as $result): ?>

               <?php $url = get_youtube_newurl($result->link); ?>


            <a class="fancybox-media" href="<?=$url?>" >
            <div class="col-md-3 banner-media">
              <p><?=$result->title?></p>
            </div>
          </a>   

      		<?php endforeach; ?>                                                                    
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