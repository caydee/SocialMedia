
<?php 
$x=1;
foreach ($dashboard as $value) {
	
	echo '
	         <div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="col-md-6">						    
							<div class="panel panel-primary">
							    <div class="panel-heading bg-facebook">
							    	<h4>
                                   		FACEBOOK : '.str_replace('_', ' ',$value->accountgroup).'
                                   	</h4>
							    </div>
							    <div class="panel-body">
									<div id="facebook-'.$x.'" style="height:200px !important;"></div>
								</div>
							</div>
						</div>
						<div class="col-md-6">						    
							<div class="panel panel-info">
							    <div class="panel-heading bg-twitter">
							    	<h4>
                                   		TWITTER : '.str_replace('_', ' ',$value->accountgroup).'
                                   	</h4>
							    </div>
							    <div class="panel-body">
									<div id="twitter-'.$x.'" style="height:200px !important;"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		 ';
$x++;

}?>
