<div class="row prod_single_page">
   <div class="prod_single_page_head dark_header">
      <div class="container prod_single_banner">
         <div class="row">
            <div class="col-md-6 col-xs-4">
               <img src="<?=base_url()?>uploads/products/<?=$result->image?>" class="img-responsive" alt="" />
            </div>
            <div class="col-md-6 col-xs-8">
               <h1><?=$result->prod_name?></h1>
               <p><?=$result->description?></p>
            </div>
         </div>
      </div>
      <div class="prod_single_best">
         <div class="container">
            <p>Best to use on</p>
            <div class="img-best">
               <ul>
                  <?php
                     /*$works = explode(',', $result->works); 
                     foreach ($works as $work):
                     $material = $this->home_model->get_material_id($work);
                     
                        if($material->mat_image): ?>
                        <li><img src="<?=base_url()?>uploads/materials/<?=$material->mat_image?>" alt=""></li>
                        <? endif;
                     endforeach;*/

                    $works = $this->home_model->get_works($result->prod_id);
					foreach ($works as $work):
						$material = $this->home_model->get_material_name($work->material);
						if(@$material->mat_image): ?>
							<li><img src="<?=base_url()?>uploads/materials/<?=$material->mat_image?>" alt="" /></li>
						<?php endif;					
					endforeach;
                     ?>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <div class="prod_single_page_content">
      <div class="container">
         <div class="row">
            <div class="col-md-7">
               <h2>Technical Info</h2>
               <?=$result->description?>
               <h2>How to Use</h2>
               <?=$result->tips?>
            </div>
            <div class="col-md-5">
               	<h2>Uses</h2>
               	<?=$result->uses?>
               	<h2>Features</h2>
               	<?=$result->features?>
               	<h2>Availability</h2>
               	<?=$result->availability?>
               	<?php //if($result->prod_pdf1 != '' || $result->prod_pdf2 != ''): ?>
               	<?php
               		$matsheet = ($result->prod_pdf1 == '' ? '#' : base_url().'uploads/products/'.$result->prod_pdf1);
               		$techsheet = ($result->prod_pdf2 == '' ? '#' : base_url().'uploads/products/'.$result->prod_pdf2);
               	?>
               	<h2>Data Sheets</h2>
               	<p><span class="glyphicon glyphicon-download-alt" style="margin-right: 8px"> </span><a href="<?=($result->prod_pdf1 == '' ? '' : base_url().'uploads/products/'.$result->prod_pdf1);?>" target="<?=($result->prod_pdf1 == '' ? '' : '_BLANK');?>">Material Safety</a></p>
               	<p><span class="glyphicon glyphicon-download-alt" style="margin-right: 8px"> </span><a href="<?=($result->prod_pdf2 == '' ? '' : base_url().'uploads/products/'.$result->prod_pdf2);?>" target="<?=($result->prod_pdf2 == '' ? '' : '_BLANK');?>">Technical</a></p>
               	<?php //endif; ?>
            </div>
         </div>
      </div>
      <div class="prod_single_rel">
         <div class="container">
            <h2>Other related products</h2>
            <div class="prod_single_rel_imgHolder">
               <?php foreach ($products as $product): ?>
                  <a href="<?=$product->prod_slug?>"><img src="<?=base_url()?>uploads/products/<?=$product->image?>" alt="" ></a>
               <?php endforeach; ?>

            </div>
         </div>
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