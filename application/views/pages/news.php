<div class="row innerPage_section">
  <div class="innerPage_section_head">
    <div class="container">
      <h1><?=$result->news_title?></h1>
     <!--  <div class="innerPage_section_social">
        <img src="<?=base_url()?>includes/img/xample_soc_snippet.jpg" alt="">
      </div> -->
    </div>
  </div>
  <div class="innerPage_section_content">
    <div class="container">
      <div class="col-md-8">
        <?php if($result->news_image != ''): ?>
        <img src="<?=base_url()?>uploads/news/<?=$result->news_image?>" alt="" class="img-responsive">
        <?php endif; ?>
        <br/>
        <?=$result->news_content?>
      </div>
      <div class="innerPage_section_sidebar col-md-4">

        <div class="panel panel-default">
          <div class="panel-heading">Our Main Office</div>
          <div class="panel-body">
            <address>
              731 Aurora Blvd.,<br/>
              Quezon City, Philippines<br/><br/>

              Tel. No. [+632] 721.5781 / 414.1593-95 /<br/>
              1800-1888-6263 (Toll Free)<br/>
              Fax. [+632] 414.1596<br/>
              Email: info@repchem.com
            </address>
            <a href="<?=base_url()?>contact" class="contact_link"><i class="glyphicon glyphicon-earphone"></i> Click here to contact us</a>
          </div>
        </div> 

        <?php if($news): ?>

          <?php 
                $image = ($news->news_link != '' ? $news->news_image : base_url().'uploads/news/'.$news->news_image );
            ?>  
        <div class="panel-bl">
          <div class="panel-bl-heading"><i class="nu"></i>News & Updates</div>
          <div class="panel-bl-body">
            <div class="col-md-5">
              <!-- <img src="<?=$image?>" class="img-responsive"> -->
              <?php if($news->news_link != ''):
                                $url = get_youtube_newurl($news->news_link);
                            ?>
                            <a class="fancybox-media" href="<?=$url?>">
                                <img src="<?=$image?>" class="img-responsive"/>
                            </a>
                        <?php else: ?>
                            <img src="<?=$image?>" class="img-responsive"/>
                        <?php endif; ?>
            </div>
             <div class="col-md-7">
              <!-- <p><strong><?=$news->news_title?></strong></p>
              <?=word_limiter($news->news_content,18); ?>
              <a href="<?=base_url()?>news-updates/<?=$news->news_slug?>">Read more>></a> -->
              <?php if($news->news_link != ''): ?>
                  <p><strong><a class="fancybox-media" href="<?=$url?>">Watch video</a></strong></p>
                  <p><?=date('F d, Y', strtotime($news->date_created))?></p>
              <?php else: ?>   
                  <p><strong><a href="<?=base_url()?>news-updates/<?=$news->news_slug?>"><?=$news->news_title?></a></strong></p>
                  <?=word_limiter($news->news_content,18); ?> 
                  <a href="<?=base_url().'news-updates/'.$news->news_slug?>">Read more</a>
              <?php endif; ?>
            </div>
          </div>
        </div>

      <?php endif; ?>

      <?php if($commercial): ?>

        <div class="panel-bl">
          <div class="panel-bl-heading"><i class="com"></i>Commercials</div>
          <div class="panel-bl-body">
            <div class="col-md-5">
              <?php $url = get_youtube_newurl($commercial->link); ?>
                <?php $youtube_id = get_youtube_id($commercial->link); ?>
                <?php $youtube_img = get_youtube_img($youtube_id); ?>
                <a class="fancybox-media" href="<?=$url?>" >
                    <img class="example-image" src="<?=$youtube_img?>" alt="thumb-1" width="130" height="100">
                </a>
            </div>
             <div class="col-md-7">
              <p><strong><?=$commercial->title?></strong></p>
              <p><?=date('F d, Y', strtotime($commercial->date_created))?></p>
              <!-- <a href="#">Read more >></a> -->
            </div>
          </div>
        </div>

        <?php endif; ?>

      </div>
    </div>
  </div>
</div>