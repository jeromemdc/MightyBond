<div id="main-container" class="result">
	<div class="inner-header">
		<p>RECOMMENDED PIONEER PRODUCT</p>
	</div>
	<div id="mycarousel-container" style="width:730px;margin:0 auto;">

		<?php if($results): ?>
		<div class=" jcarousel-skin-tango">
			<div class="jcarousel-container jcarousel-container-horizontal" style="position: relative; display: block;"><div class="jcarousel-clip jcarousel-clip-horizontal" style="position: relative;">
				<ul id="mycarousel" class="jcarousel-skin-tango">
					<?php foreach ($results as $result) : ?>
					<li style="height:500px; width:730px; padding-top: 20px;">
						<div class="result-box">
							<center><div id="product"><?=$result->prod_name?></div></center>
							<div id="materials_selected"><p>Materials: <?=$mat1?> + <?=$mat2?> / <?=$ex_factor?></p></div>
							<div class="info">
								<div class="prod-image">
									<div style="height:290px;"><img src="<?=base_url()?>uploads/products/<?=$result->image?>"></div>
									<?=$result->description?>
								</div>

								<div class="prod-info">
									<ul class="nav">
										<li><a href="#uses" class="current">Uses</a></li>
										<li><a href="#works">Works best on</a></li>
										<li><a href="#features">Features</a></li>
										<li><a href="#description">Technical Info</a></li>
										<li><a href="#availability">Availability</a></li>
										<li><a href="#tips">How to use</a></li>
										<li><a href="#job_type">Job Type</a></li>
										<li><a href="#remarks">Remarks</a></li>
									</ul>

									<div class="prod-info-content">
										<div id="uses">
											<?=$result->uses?>
										</div>
										<div id="description" style="display:none">
											<?=$result->description?>
										</div>
										<div id="availability" style="display:none">
											<?=$result->availability?>
										</div>
										<div id="tips" style="display:none">
											<?=$result->tips?>
										</div>
										<div id="features" style="display:none">
											<?=$result->features?>
										</div>
										<div id="works" style="display:none">
											<?php
                     						$works = $this->home_model->get_works($result->prod_id);
                     						$best = '';
                     						foreach ($works as $work):
                     							$best .= $work->material.', ';                     							
                     						endforeach;
                     						echo substr($best,0,-2);
                     						
											?>
										</div>
										<div id="job_type" style="display:none">
											<?=$result->job_type?>
										</div>
										<div id="remarks" style="display:none">
											<?=$result->remarks?>
										</div>
									</div>

								</div>

								<div class="clear"></div>

								<br>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</li>

					<?php endforeach; ?>	

					<div class="clear"></div>
				</ul>
			</div>

		</div>
	</div>

	<?php else: ?>

	<div class="result-box">
		<center><div id="product">No Results Found</div></center>
		<div class="info">
			<br>
			<center>
				<div class="no-result-text">
					No results were found for the equation<br><br>
					<?=$mat1?> + <?=$mat2?> / <?=$ex_factor?><br><br>
					<span>Please review your selected materials and external factor.</span><br>
					<p>You may also contact a Pioneer specialist <br> <strong>Metro Manila: +632 721 57 81</strong> <br> <strong>Email: info@repchem.com</strong></p>
				</div>
			</center>

			<div class="clear"></div>

			<div class="bottom-info">
				<div class="bot-left"></div>
				<div class="bot-right"></div>
				<div class="clear"></div>
			</div>

		</div>

	</div>

	<?php endif; ?>	

</div>
<br>
<center>
	<!-- <a href="#!" class="share" onclick="postToFeed();"></a> -->
	<a href="<?=base_url()?>fixit" class="set"></a>
	<div class="clear"></div>
</center>	

<div class="footer">

</div>
</div>
