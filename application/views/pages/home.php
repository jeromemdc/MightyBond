<div class="home_slider row">
    <div class="container">
        <div id="banner_carousel" class="carousel slide row" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators clearfix">
                <?php foreach ($sliders as $key => $slider) : ?>
                <li data-target="#banner_carousel" data-slide-to="<?=$key?>" class="<?=($key == 0 ? 'active' : '')?>"></li>
                <?php endforeach; ?>
            </ol>

            <div class="carousel-inner" role="listbox">
                <?php foreach ($sliders as $key => $slider) : ?>
                    
                    <div class="item <?=($key == 0 ? 'active' : '')?>" style="background: url('uploads/slider/<?=$slider->bg_image?>') repeat 0 0;">
                        <div class="fadebg">
                            <div class="col-md-6 ">
                                <h2 class="title"><?=$slider->title;?></h2>

                                <p><?=$slider->content;?></p>
                                <a href="<?=$slider->link;?>" class="btn btn-primary btn-red"><?=$slider->btn_text;?></a>
                            </div>
                            <div class="col-md-6 caption-img">
                                <img src="<?=base_url();?>uploads/slider/<?=$slider->image;?>" class="img-responsive"/>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <a class="left carousel-control" href="#banner_carousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
            </a>
            <a class="right carousel-control" href="#banner_carousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
            </a>

        </div>
    </div>
</div>

<div class="row product_carousel_section">
    <ul class="nav nav-tabs" role="tablist">
        <li class="active">
            <a href="#diy" aria-controls="diy" role="tab" data-toggle="tab">Fix-Its and DIY</a>
        </li>
        <li>
            <a href="#epoxies" aria-controls="epoxies" role="tab" data-toggle="tab">Epoxies</a>
        </li>
        <li>
            <a href="#heavyduty" aria-controls="heavyduty" role="tab" data-toggle="tab">Heavy Duty & Construction</a>
        </li>
    </ul>
    <!-- TABS -->
    <div class="tab-content">

        <!-- START FIRST TAB --> 
        <div role="tabpanel" id="diy" class="tab-pane fade in active">
            <div class="slide multiple-items">
            <?php 
                $products_diy = $this->home_model->get_products_catid(1);
                foreach ($products_diy as $product): 
            ?>
                <div>                  
                    <h1><a href="<?=base_url()?>products/diy/<?=$product->prod_slug?>"><img src="<?=base_url()?>uploads/products/<?=$product->image?>" class="img-responsive"></a>
                    <p><?=$product->prod_name?></p>
                    </h1>
                </div>
                <?php endforeach; ?>    
            </div>

        </div>
        <!-- END FIRST TAB --> 

        <!-- START SECOND TAB --> 
        <div role="tabpanel" id="epoxies" class="tab-pane fade in">
            <div class="slide multiple-items">
            <?php 
                $products_diy = $this->home_model->get_products_catid(2);
                foreach ($products_diy as $product): 
            ?>
                <div>                  
                    <h1><a href="<?=base_url()?>products/diy/<?=$product->prod_slug?>"><img src="<?=base_url()?>uploads/products/<?=$product->image?>" class="img-responsive"></a>
                    <p><?=$product->prod_name?></p>
                    </h1>
                </div>
                <?php endforeach; ?>    
            </div>
        </div>
        <!-- END SECOND TAB --> 

        <!-- START THIRD TAB --> 
        <div role="tabpanel" id="heavyduty" class="tab-pane fade in">
            <div class="slide multiple-items">
            <?php 
                $products_diy = $this->home_model->get_products_catid(3);
                foreach ($products_diy as $product): 
            ?>
                <div>                  
                    <h1><a href="<?=base_url()?>products/diy/<?=$product->prod_slug?>"><img src="<?=base_url()?>uploads/products/<?=$product->image?>" class="img-responsive"></a>
                    <p><?=$product->prod_name?></p>
                    </h1>
                </div>
                <?php endforeach; ?>    
            </div>

        </div>
        <!-- END THIRD TAB --> 

    </div><!-- END OF class="tab-content" -->
</div><!-- END OF  class="product_carousel_section" -->


<div id="fixit_banner">
    <div class="container">
        <div class="col-md-5 col-xs-5 fixit_banner_img"><img src="<?=base_url()?>includes/img/fixit-logo.png" class="img-responsive" alt="" /></div>
        <div class="col-md-6 col-xs-6 fixit_banner_caption">
            <h2 class="title">Right Adhesives for the <br/> Right Materials</h2>
            <p>Did you know there are Pioneer adhesives and sealants made specifically for different types of materials?</p>
            <a href="<?=base_url()?>fixit" class="btn btn-yellow">Go to FIX-IT Center</a>
        </div>
    </div>
</div>

<div id="homepage_article">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3><i class="ico-news_update"></i> <a href="<?=base_url()?>news-updates">News & Update</a></h3>
                <?php if($news): ?>
                <?php
                    $image = ($news->news_link != '' ? $news->news_image : base_url().'uploads/news/'.$news->news_image );
                ?>
                    <div class="row">
                        <div class="col-md-5">
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
                            <?php if($news->news_link != ''): ?>
                                <p class="artc-title"><a class="fancybox-media" href="<?=$url?>">Watch video</a></p>
                                <p><?=date('F d, Y', strtotime($news->date_created))?></p>
                            <?php else: ?>   
                                <p class="artc-title"><a href="<?=base_url()?>news-updates/<?=$news->news_slug?>"><?=$news->news_title?></a></p>
                                <?=word_limiter($news->news_content,18); ?> 
                                <a href="<?=base_url().'news-updates/'.$news->news_slug?>">Read more</a>
                            <?php endif; ?>  

                        </div>
                    </div>
                <?php endif; ?>
            </div>
           
            <div class="col-md-6">
                <h3><i class="ico-commercial"></i> <a href="<?=base_url()?>commercials"><a href="<?=base_url()?>commercials">Commercials</a></h3>
                <div class="row">
                    <div class="col-md-5">
                        <?php $url = get_youtube_newurl($commercial->link); ?>
                        <?php $youtube_id = get_youtube_id($commercial->link); ?>
                        <?php $youtube_img = get_youtube_img($youtube_id); ?>
                        <a class="fancybox-media" href="<?=$url?>" >
                            <img class="example-image img-responsive" src="<?=$youtube_img?>" alt="thumb-1" />
                        </a>
                    </div>
                    <div class="col-md-7">
                        <p class="artc-title"><a class="fancybox-media" href="<?=$url?>" ><?=$commercial->title?></a></p>
                        <p><?=date('F d, Y', strtotime($commercial->date))?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>