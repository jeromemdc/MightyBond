<div class="row innerPage_section">
  <div class="innerPage_section_head">
    <div class="container">
      <h1><span>About</span> Republic Chemical Industries</h1>
     <!--  <div class="innerPage_section_social">
        <img src="<?=base_url()?>includes/img/xample_soc_snippet.jpg" alt="">
      </div> -->
    </div>
  </div>
  <div class="innerPage_section_content">
    <div class="container">
      <div class="col-md-8">
        <img src="<?=base_url()?>includes/img/study-inner-img.jpg" alt="" class="img-responsive">
        <br/>
        <p><strong>REPUBLIC CHEMICAL INDUSTRIES, INC. (RCI)</strong> is a Filipino-owned manufacturing and distribution company committed to give its customers in the Asia-Pacific region, through excellence in service, reliable industrial and household adhesives, sealants, specialty coatings, insulation, packaging and other products.</p>

        <p>Now celebrating more than 50 years in the industry, RCI's well-known Pioneer brand of adhesives include epoxies, cyanoacrylates, plastic resin glues, rubber cements, and white glues, among others. The sealants and coating range covers every major type from butyls and acrylics to urethanes and silicones</p>

        <p>State-of-the-art insulation and packaging products are manufactured using polyurethane foam and expandable polystyrene. Its Fiesta brand is a byword in styropor products. RCI services its national and international markets through various well-trained and experienced selling groups. Nationwide, the Trade Sales Department directly services thousands of wholesale and retail outlets which cater to end-users, tradesmen and do-it-yourself (DIY) groups. The industrial users are attended to by the Industrial Sales Department while the Export Sales Department efficiently services the requirements of foreign markets.</p>

        <p>The construction / real property markets are serviced by Pioneer Specialty Building Systems Inc. (PSBSI). A wholly-owned subsidiary, PSBSI promotes and provides architects, contractors and property owners with effective and reliable weatherproofing, floor coating, sealants, adhesives, cladding and insulation systems and services.</p>

        <p>Since its inception in 1958, Republic Chemical Industries, Inc. has always kept its vision clear. Today, RCI is a multi-million dollar enterprise committed to developing fully its key resource - its people - to be responsible, responsive and involved individuals to ensure the continued realization of its vision and to welcome tomorrow's challenges.</p>
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
        <div class="panel-bl">
          <div class="panel-bl-heading"><i class="nu"></i>News & Updates</div>
          <div class="panel-bl-body">
            <div class="col-md-5">
              <img src="<?=base_url();?>uploads/news/<?=$news->news_image?>" class="img-responsive">
            </div>
             <div class="col-md-7">
              <p><strong><?=$news->news_title?></strong></p>
              <?=word_limiter($news->news_content,18); ?>
              <a href="<?=base_url()?>news-updates/<?=$news->news_slug?>">Read more>></a>
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
              <p><?=date('F d, Y', strtotime($commercial->date))?></p>
              <!-- <a href="#">Read more >></a> -->
            </div>
          </div>
        </div>

        <?php endif; ?>

      </div>
    </div>
  </div>
</div>