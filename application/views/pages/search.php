<div id="category_section">
   

   <div class="row category_section_header dark_header">
      <div class="container">
      <h1 class="category_title">Search results for <?=$this->session->userdata('search')?></h1>
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


   <div class="row subCatergory_section">

      <div class="container subCatergory_section_list">
         <div class="row">
         <?php if($results): ?>
            <?php foreach ($results as $result): ?>
            <div class="col-md-3 search">
               <img src="<?=base_url();?>uploads/products/<?=$result->image?>" alt="">
               <p><?=$result->prod_name?></p>
               <?php $cat = $this->home_model->get_category_id($result->cat_id); ?>
               <a href="<?=base_url()?>products/<?=$cat->cat_slug?>/<?=$result->prod_slug?>" class="btn btn-red">View Product</a>
            </div>
            <?php endforeach; ?>
         <?php else: ?> 
            <h2>Product not found.</h2>
         <?php endif; ?>   
         </div>
      </div>
   </div>


</div>


<div id="fixit_banner">
   <div class="container">
      <div class="col-md-6 col-xs-6 fixit_banner_img"><img src="<?=base_url();?>includes/img/fixit-logo.png" class="img-responsive" alt=""></div>
      <div class="col-md-6 col-xs-6 fixit_banner_caption">
         <h2 class="title">Right Adhesives for the <br/> Right Materials</h2>
         <p>Did you know there are Pioneer adhesives and sealants made specifically for different types of materials?</p>
         <a href="<?=base_url()?>fixit" class="btn btn-yellow">Go to FIX-IT Center</a>
      </div>
   </div>
</div>