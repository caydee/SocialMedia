

<div class="">
	<div class="panel">
		<div class="panel-body">
		    <div class="col-md-5 col-md-offset-1">
			    <div id="facebookchart"  style="height: 250px;"></div>
			</div>
			<div class="col-md-5">
			    <div id="twitterchart"  style="height: 250px;"></div>
			</div>
			<div class="row col-md-10 col-md-offset-1" >
				<div class="table-responsive" >
					<table class='table table-condensed table-striped header-fixed' >
						<thead>
						<h4 class='table-header text-center'>FACEBOOK</h4>
							<tr>
							<th>DATE</th>
							 <?php
							 //echo json_encode($date);
							 				 	
								 foreach($records as $key =>$val)
								 	{
								 		$r=$val['facebook'];

								 		foreach($r as $v)
		                                     {
		                                     	foreach ($v as $va)
		                                     	 	{
		                                     		   	echo'<th>'.$va->name.'</th>';
		                                     		   	$top[]=$va->name;
		                                     		}
		                                     	
		                                     }
										break;
									}
								
								?>
							</tr>
						</thead>
						<tbody >
						<?php
						foreach($records as $key =>$val)
		                    {                    
		                        echo'<tr><td>'.$key.'</td>';
		                        foreach ($top as $va)
		                            {
		                                
		                                $rco=$this->transactions->getstats2($va,$key,'facebook');
		                                
		                                foreach ($rco as $fan)
		                                  {
		                                	echo'<td>'.number_format($fan->fans).'</td>';

		                                  }

		                            }
		                            unset($rco);
		                        echo '</tr>';
		                    }
										
		                    	
									unset($top);
									?>
						</tbody>
					</table>
					
				</div>
			</div>
			<div class="row col-md-10 col-md-offset-1">
				<div class="table-responsive">
					<table class='table table-condensed table-striped'>
						<thead>
						<h4 class='table-header text-center'>TWITTER</h4>
							<tr>
							<th>DATE</th>
							 <?php
							 //echo json_encode($date);
							 				 	
								 foreach($records as $key =>$val)
								 	{
								 		$r=$val['twitter'];

								 		foreach($r as $v)
		                                     {
		                                     	foreach ($v as $va)
		                                     	 	{
		                                     		   	echo'<th>'.$va->name.'</th>';
		                                     		   	$top[]=$va->name;
		                                     		}
		                                     	
		                                     }
										break;
									}
								
								?>
							</tr>
						</thead>
						<tbody>
						<?php
						foreach($records as $key =>$val)
		                    {                    
		                        echo'<tr><td>'.$key.'</td>';
		                        foreach ($top as $va)
		                            {
		                                
		                                $rco=$this->transactions->getstats2($va,$key,'twitter');
		                                
		                                foreach ($rco as $fan)
		                                  {
		                                	echo'<td>'.number_format($fan->fans).'</td>';

		                                  }

		                            }
		                            unset($rco);
		                        echo '</tr>';
		                    }
										
		                    	
									
									?>
						</tbody>
					</table>
					
				</div>
			</div>				
		</div>
	</div>
</div>
