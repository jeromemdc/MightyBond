<div class="row innerPage_section">
  <div class="innerPage_section_head">
    <div class="container">
      <h1>ENVIRONMENTAL POLICY</h1>
     <!--  <div class="innerPage_section_social">
        <img src="<?=base_url()?>includes/img/xample_soc_snippet.jpg" alt="">
      </div> -->
    </div>
  </div>
  <div class="innerPage_section_content">
    <div class="container">
      <div class="col-md-8">
        <p>Republic Chemical Industries, Inc. is committed to protect &amp; conserve the environment through responsible environmental practices in all of its business activities.. This policy is established to provide an environment-friendly workplace, protecting the environment, conserving energy and natural resources. With this policy in place we believe that we can achieve a sustainable business.</p>
        <br>
        <p>To minimize environmental impacts concerning our activities, products and services, we shall:</p>
        <ul>
        <li>Comply with applicable legal requirements and other requirements to which the Company subscribes which relate to its environmental aspects;</li>
        <li>Prevent pollution, reduce waste and minimize the consumption of resources;</li>
        <li>Reduce wherever practicable the level of harmful emissions;</li>
        <li>Educate, train and motivate employees to carry out tasks in environmentally responsible manner;</li>
        <li>Encourage environmental protection among suppliers and subcontractors; and</li>
        <li>Continually improve our environmental performance through set objectives, targets and programs.</li>
        </ul>
        
        <p>This Policy shall be communicated to all employees, contractors and suppliers, and be made available to the public.</p><br>

        <h4>John W. Spakowski II</h4>
        <h4>President and CEO</h4>


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