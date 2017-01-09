<div id="category_section">
   <div class="row category_section_header dark_header">
      <div class="container">
         <h1 class="category_title"><?=$category->cat_name;?></h1>
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
   
   <?php if($subcategories): ?>
      <?php foreach ($subcategories as $subcategory): ?>
         
      <div class="row subCatergory_section">
         <div class="subCatergory_section_title">
            <div class="container">
               <h2><?=$subcategory->sub_name?></h2>
            </div>
         </div>

         <?php $results = $this->home_model->get_products_subid($subcategory->sub_id); ?>
         <div class="container subCatergory_section_list">
            <div class="row">
               <?php foreach ($results as $product): ?>
               <?php $slug = $this->home_model->get_category_id($product->cat_id); ?> 
               <div class="col-md-3">
                  <img src="<?=base_url();?>uploads/products/<?=$product->image?>" alt="" />
                  <p><?=$product->prod_name?></p>
                  <a href="<?=base_url()?>products/<?=$slug->cat_slug?>/<?=$product->prod_slug?>" class="btn btn-red">View Product</a>
               </div>
               <?php endforeach; ?>
            </div>
         </div>
      </div>

      <?php endforeach; ?>

   <?php else: ?>

      <div class="row subCatergory_section">
         <div class="container subCatergory_section_list">
            <div class="row">
               <?php foreach ($products as $product): ?>
               <?php $slug = $this->home_model->get_category_id($category->cat_id); ?> 
               <div class="col-md-3">
                  <img src="<?=base_url();?>uploads/products/<?=$product->image?>" alt="" />
                  <p><?=$product->prod_name?></p>
                  <a href="<?=base_url()?>products/<?=$slug->cat_slug?>/<?=$product->prod_slug?>" class="btn btn-red">View Product</a>
               </div>
               <?php endforeach; ?>
            </div>
         </div>
      </div>
      
   <?php endif; ?>

</div>

<div id="fixit_banner">
   <div class="container">
      <div class="col-md-6 col-xs-6 fixit_banner_img"><img src="<?=base_url();?>includes/img/fixit-logo.png" class="img-responsive" alt="" /></div>
      <div class="col-md-6 col-xs-6 fixit_banner_caption">
         <h2 class="title">Right Adhesives for the <br/> Right Materials</h2>
         <p>Did you know there are Pioneer adhesives and sealants made specifically for different types of materials?</p>
         <a href="<?=base_url()?>fixit" class="btn btn-yellow">Go to FIX-IT Center</a>
      </div>
   </div>
</div>