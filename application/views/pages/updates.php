<div id="category_section">

    <div class="row category_section_header dark_header">
        <div class="container">
            <?php $title = ($this->uri->segment(1) == 'news-updates' ? 'News and Updates' : 'Tips and tricks'); ?>
            <h1 class="category_title"><?=$title?></h1>
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
            <?php $img = ($this->uri->segment(1) == 'news-updates' ? 'whatsnew.png' : 'tricky.png'); ?>

            <center><img src="<?=base_url()?>includes/img/<?=$img?>" class="img-responsive"></center>

            <?php  foreach ($results as $result): 
                $image = ($result->news_link != '' ? $result->news_image : base_url().'uploads/news/'.$result->news_image );
            ?>   

            <div class="col-md-12 article-section">
                <div class="col-md-3 "> 

                    <?php if($result->news_link != ''):
                        $url = get_youtube_newurl($result->news_link);
                    ?>

                    <a class="fancybox-media" href="<?=$url?>">
                        <div class="article-image" style="background:url(<?=$image?>) no-repeat center center; background-size: cover; -webkit-background-size:cover;"></div>
                    </a>
                <?php else: ?>
                    <div class="article-image" style="background:url(<?=$image?>) no-repeat center center; background-size: cover; -webkit-background-size:cover; "></div>
                <?php endif; ?>

                </div>

                <div class="col-md-9">
                    <h2>
                        <?php if($result->news_link != ''): ?>
                            <a class="fancybox-media" href="<?=$url?>"><?=$result->news_title?></a>
                        <?php else: ?>    
                            <a href="<?=$this->uri->segment(1).'/'.$result->news_slug?>"><?=$result->news_title?></a>
                        <?php endif; ?> 
                    </h2>

                    <h6><?=date('F d, Y', strtotime($result->date_created))?></h6>
                    <?=word_limiter($result->news_content,55)?>

                    <div class="view-more-cta">

                        <?php if($result->news_link != ''): ?>

                            <a class="fancybox-media" href="<?=$url?>">Watch video</a>
                        <?php else: ?>    
                            <a href="<?=$this->uri->segment(1).'/'.$result->news_slug?>">Read more</a>
                        <?php endif; ?>    

                    </div>
                </div>
            </div> 

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