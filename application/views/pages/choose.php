<div id="main-container" class="bg-for-fixit choose">
	<div id="bulong1"></div>
	<div id="bulong2"></div>
	<div id="bulong3"></div>
	<div id="bulong4"></div>
	<div class="inner-header">
	<p>SELECT THE MATERIALS THAT YOU WANT TO BOND OR SEAL AND ANY EXTERNAL FACTORS, IF APPLICABLE.</p>
</div>	

	<div class="mat-cont mat-cont-1">
		<center><img style="position: relative;top: 10px;" src="<?=base_url()?>includes/img/img-mat-1.png" /></center>
		
		<div class="wrap">
			<div class="wrap">
				<ul class="items items-1">

					<?php foreach ($materials as $material) { ?>
					<li class="mat <?=url_title($material->mat_name,'',TRUE)?>" style="background-image:url('<?=base_url()?>uploads/materials/<?=url_title($material->mat_name,'',TRUE)?>.jpg');">
						<div class="mat-name"><?=$material->mat_name?></div>
					</li>
					<?php } ?>
									
				</ul>
			</div>
		</div>	
	</div>

	<!-- external factors -->
	<div class="ext-fac disabled">
		<center>
			<img src="<?=base_url()?>includes/img/img-ext-fac-disabled.png" class="ef" id="ef-title">
		</center>

		<a href="javascript:void(0)" class="ef-btn left" alt="disable"><img src="<?=base_url()?>includes/img/btn-left-disabled.jpg" /></a>
		<a href="javascript:void(0)" class="ef-btn right" alt="disable"><img src="<?=base_url()?>includes/img/btn-right-disabled.jpg" /></a>
		
		<center>
			<div id="choices">
				<div class="ef-choice active" rel="1">None</div>
			</div>
		</center>
		
		<center>
		<form action="<?=base_url()?>fixit/result" method="post" accept-charset="utf-8">
			<input type="hidden" name="material1" value="Brick" id="material1">
			<input type="hidden" name="material2" value="Brick" id="material2">
			<input type="hidden" name="ex_factor" value="none" id="ex_factor">
			<input type="submit" name="submit" value="" id="submit" class="fixitbotton" disabled>
			<!--a href="#!" class="fixit"></a-->
		</form>
		</center>
		
	</div>

	<!-- Materials 2 -->
	<div class="mat-cont mat-cont-2">
		<center><img style="position: relative; top: 10px;"src="<?=base_url()?>includes/img/img-mat-2.png" /></center>
		
		<div class="wrap">
			<div class="wrap">
				<ul class="items items-2">
					<?php foreach ($materials as $material) { ?>
					<li class="mat <?=url_title($material->mat_name,'',TRUE)?> disabled" style="background-image:url('<?=base_url()?>uploads/materials/<?=url_title($material->mat_name,'',TRUE)?>.jpg') ;  transform: rotateY(180deg); " >
						<div class="mat-name" style=""><?=$material->mat_name?></div>
					</li>
					<?php } ?>
					
				</ul>
			</div>
		</div>	
	</div>

	<div class="footer">
		<div id="equation">
			<ul>
				<li id="equation_first">
					<div class="equation_materials">
						<img src="<?=base_url();?>includes/img/equation/none.png" alt="" class="image_equation" id="image_equation_one"><br>
						<img src="<?=base_url();?>includes/img/equation/label1.png" alt="" class="label_equation">
					</div>
				</li>
				<li id="equation_second">
					<div class="equation_materials">
						<img src="<?=base_url();?>includes/img/equation/none.png" alt="" class="image_equation" id="image_equation_two"><br>
						<img src="<?=base_url();?>includes/img/equation/label2.png" alt="" class="label_equation">
					</div>
				</li>
				<li id="equation_third">
					<div class="equation_materials">
						<p class="equation_factor" id="equation_factors">none</p><br>
						<img src="<?=base_url();?>includes/img/equation/label3.png" alt="" class="label_equation">
					</div>
				</li>
				<li>
					<div class="equation_materials">
						<p class="equation_instruct">Press <span>THE FIX IT BUTTON</span><br>to find the right product</p>
						<img src="<?=base_url();?>includes/img/equation/label4.png" alt="" class="label_equation">
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>	