<div class="row content_section banner-media-bg">
    <div class="container">
        <center><img src="<?=base_url()?>includes/img/pioneer-foundation.png" class="img-responsive" width="50%"></center>                       
        <div class="col-md-12">
            <h2>Brief Background</h2>
            <p>The foundation was commissioned in the year 2012 as the JWS Foundation Philippines, Inc. and was relaunched in 2015 as the Pioneer Adhesives Foundation, Inc. (PAFI). PAFI now has a clearer purpose primarily driven by three main advocacies: environment, education and disaster relief. The foundation is supported by a group of companies whose collaboration has made it possible to craft and carry out projects which support the purpose of the foundation. Since it’s rebirth this year, the foundation has launched its Educational Assistance Program and its environmental campaign through full support for a project entitled Coral REEFurbishment. The PAFI is eager to give back to the Filipino community and has made its first few steps in doing so these past months. Looking ahead, it aims to create larger waves of positive change throughout the country.</p>
        </div>      
        <div class="col-md-12">
            <h2>Vision Statement</h2>
            <p>Pioneer Adhesives Foundation, Inc. envisions to assist Filipinos by improving lives and being of service to others, anchored on our strong heritage and leadership in our industry.</p>
        </div>      
        <div class="col-md-12">
            <h2>Mission Statement</h2>
            <p>We commit to help our communities through:</p>
            <p>Relief and rehabilitation programs for disaster-stricken areas.</p>
            <p>Education programs for the deserving youth, tradesmen and fishermen;</p>
            <p>Relief and rehabilitation programs for disaster-stricken areas.</p>
        </div>   
        <div class="col-md-12">
            <h2>Our Earth. Our Responsibility.</h2>
            <p>PAFI’s environmental campaign is titled “Our earth. Our responsibility.” This campaign’s main objectives are to inculcate environmental sensitivity among Filipinos and to regenerate and preserve our environment. The campaign’s first project took place in Boracay Island over the weekend of April 25-26, 2015 by showing its full support for the Coral REEFurbishment Project of the Boracay Foundation, Inc. (BFI). The Coral REEFurbishment Project is an existing effort of the BFI which aims to increase the number of corals on Boracay Island by up to 2% per annum. The PAFI’s involvement aims to help them achieve that goal as well as generate awareness and a steady inflow of volunteers for the cause. The foundation also facilitated the donation of over 3,600 tubes of Pioneer EpoxyClay Aqua from Republic Chemical Industries, Inc. (RCI) to serve as a years worth of epoxy for the Coral REEFurbishment Project.</p>
            <p>The results of the weekend’s volunteer activities are summarized below:</p>
        </div> 
        <div class="col-md-4">
            <div style="background:url(<?=base_url()?>includes/img/lvl1.jpg) no-repeat center center; background-size: cover; -webkit-background-size:cover; height: 150px;"></div>
            <p>Level 1: Coastal Cleanup</p>
            <p>Volunteers collected over 100 kilograms of trash along the shoreline of White Beach. The top three trash items collected included 2,769 cigarette butts, 724 food wrappers (i.e. candy, chips etc.) and 419 plastic pieces.</p>
        </div>
        <div class="col-md-4">
            <div style="background:url(<?=base_url()?>includes/img/lvl2.jpg) no-repeat center center; background-size: cover; -webkit-background-size:cover; height: 150px;"></div>
            <p>Level 2: Coral Nursery</p>
            <p>Level 2: Coral Nursery Volunteers attached approximately 400 damaged coral fragments to the nursery.</p>
        </div>
        <div class="col-md-4">
            <div style="background:url(<?=base_url()?>includes/img/lvl3.jpg) no-repeat center center; background-size: cover; -webkit-background-size:cover; height: 150px;"></div>
            <p>Level 3: Underwater Coral Transplantation</p>
            <p>Volunteers transplanted approximately 200 healthy coral fragments back to the reef with the use of RCI’s Pioneer EpoxyClay Aqua. The 2-day event generated a total of 235 volunteers exceeding PAFI’s expected count of 170. PAFI aims to bring Our earth. Our responsibility. to other corners of the country with Boracay Island as its starting point.</p>
        </div>
        <div class="col-md-12" style="margin-bottom: 70px">
            <h2>Educational Assistance Program</h2>
            <p>PAFI has three affiliate companies namely: RCI, PSBSI and PAE. These companies are in the adhesives, construction and water purifying industries respectively. This program is open to all legitimate children of RCI, PSBSI and PAE employees. The employees must be within supervisory level and below for their children to qualify. The program provides the students with a grant intended to subsidize tuition fees and other school expenses. A student must maintain a GPA of at least 85 points, among other requirements, and must be currently enrolled in grade school or high school to apply for the program. Once the student meets all requirements for the program they will receive the grant which is disbursed every grading period. If a student fails to meet one or more of the requirements they will be removed from the program but may reapply at any time in the future if qualified. This program will start in October 2015.</p>
        </div>                                            

        <center><img src="<?=base_url()?>includes/img/csrnews.png" class="img-responsive" alt=""></center>

        <?php foreach ($results as $row): 
                if($row->news_link != ''){
                    $image = $row->news_image;
                }else{
                    $image = base_url().'uploads/news/'.$row->news_image;
                }
                ?>
                <div class="col-md-4">
                    <?php if($row->news_link != ''):
                    $url = get_youtube_newurl($row->news_link);
                    ?>


                    <a class="fancybox-media" href="<?=$url?>">
                        <div style="background:url(<?=$image?>) no-repeat center center; background-size: cover; -webkit-background-size:cover; height: 250px;"></div>
                    </a>
                <?php else: ?>
                    <div style="background:url(<?=$image?>) no-repeat center center; background-size: cover; -webkit-background-size:cover; height: 250px;"></div>
                <?php endif; ?>

                <h2 style="height: 98px">
                    <?php if($row->news_link != ''): ?>
                        <a class="fancybox-media" href="<?=$url?>"><?=$row->news_title?></a>
                    <?php else: ?>    
                        <a href="<?=base_url()?>csr/<?=$row->news_slug?>"><?=$row->news_title?></a>
                    <?php endif; ?> 
                </h2>
                <h6><?=date('F d,Y',strtotime($row->date_created));?></h6>
                <p><?=word_limiter($row->news_content,20)?></p>

                <?php if($row->news_content != ''): ?>
                    <a href="<?=base_url()?>csr/<?=$row->news_slug?>">Read more>></a>
                <?php endif; ?>

            </div>

        <?php endforeach; ?> 

        <div class="clearfix"></div>

        <center><?=$pagination?></center>
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