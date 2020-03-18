<?php
require("config.php");
  $ID = $_POST['ID'];
  $query = mysqli_query($conn,"SELECT image_path FROM productdata WHERE catalouge_name='".$ID."'");
  while($rs = mysqli_fetch_object($query)){
?> 
	<div itemscope itemtype="http://schema.org/Product">
		<div class="portfolio-item apps col-xs-12 col-sm-4 col-md-3">
			<div class="thumbnail">
				<div class="recent-work-wrap">
					<span itemprop="name"><?php $ID?></span>
					<img itemprop="image" class="img-responsive" src="<?php echo stripslashes($rs->image_path)?>" alt="" >
					<div class="overlay">
						<div class="recent-work-inner">
							<a class="preview" href="<?php echo stripslashes($rs->image_path)?>" rel="prettyPhoto[<?php $ID?>]"><i class="fa fa-eye"></i> View</a>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
  }
?>