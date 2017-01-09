<div id="category_section">
    <div class="row category_section_header dark_header">
        <div class="container">
            <h1 class="category_title">Contact Form</h1>
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
        <div class="col-md-12">
          <p id="switch-font">Get in touch with us</p>
        <div class="row">
          <div class="col-md-3 details-panel">
            <img src="<?=base_url()?>includes/img/numtab.png" class="img-responsive">
            <p>+632 721.5781 / +632 414.1593 - 95 / 1800-1888-6263</p>
          </div>
          <div class="col-md-3 details-panel">
            <img src="<?=base_url()?>includes/img/faxnumtab.png" class="img-responsive">
            <p>+632 414.1596</p>
          </div>
          <div class="col-md-3 details-panel">
            <img src="<?=base_url()?>includes/img/emailtab.png" class="img-responsive">
            <p>info@repchem.com</p>
          </div>
          <div class="col-md-3 details-panel">
            <img src="<?=base_url()?>includes/img/addresstab.png" class="img-responsive">
            <p>REPUBLIC CHEMICAL INDUSTRIES, INC. (RCI) 731 Aurora Blvd. Quezon City, Philippines</p>
          </div>                        
        </div>
        <form class="form-horizontal" role="form" method="post" action="<?=base_url()?>contact">
            <div class="form-group <?=(form_error('name') ? 'has-error' : '')?>">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?=set_value('name')?>" >
                </div>
            </div>
            <div class="form-group <?=(form_error('email') ? 'has-error' : '')?>">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="<?=set_value('email')?>" >
                </div>
            </div>
            <div class="form-group <?=(form_error('contact') ? 'has-error' : '')?>">
                <label for="tel" class="col-sm-2 control-label">Contact No.</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Number" value="<?=set_value('contact')?>">
                </div>
            </div>   
            <div class="form-group <?=(form_error('inquiry') ? 'has-error' : '')?>">
                <label for="inquiry" class="col-sm-2 control-label">Type of Inquiry</label>
                <div class="col-sm-8">
                  <select class="col-sm-12 form-control" name="inquiry">
                    <option value="">--Select Inquiry--</option>
                    <option value="sales" <?=(set_value('inquiry') == 'sales' ? 'selected' : '')?>>Sales</option>
                    <option value="marketing" <?=(set_value('inquiry') == 'marketing' ? 'selected' : '')?>>Marketing</option>
                    <option value="support" <?=(set_value('inquiry') == 'support' ? 'selected' : '')?>>Support</option>
                    <option value="dealership" <?=(set_value('inquiry') == 'dealership' ? 'selected' : '')?>>Dealership</option>
                    <option value="others" <?=(set_value('inquiry') == 'others' ? 'selected' : '')?>>Others</option>
                  </select>
                </div>
            </div>                      
            <div class="form-group <?=(form_error('message') ? 'has-error' : '')?>">
                <label for="message" class="col-sm-2 control-label">Message</label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="12" name="message" ><?=set_value('message')?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input id="submit" type="submit" value="Send" class="btn btn-primary">
                </div>
            </div>
            <?php if($success == 1): ?>
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="alert alert-success" role="alert">
                      <strong>Well done!</strong> Your Inquiry has been submitted, Thank you.
                    </div>  
                </div>
            </div>
          <?php endif; ?>
        </form>          
        </div>                                               
        </div>
      </div></div>

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