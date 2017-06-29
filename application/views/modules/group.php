<div class="col-md-8 col-md-offset-2">
	<div class="box border-top-0" style="border-top:transparent !important;">
		<div class="box-body">
			<form action="<?=site_url('group'); ?>" method="post" class="form form-horizontal">
				<div class="form-group">
					<label for="group" class="control-label col-md-2">GROUP NAME</label>
					<div class="col-md-8">
						<input type="text" name="group" class="form-control">
					</div>
					
				</div>
				<!--div class="form-group">
					<label for="" class="control-label col-md-2"></label>
					<div class="col-md-8">
						<input type="" name="" class="form-control">
					</div>
				</div-->
				<div class="form-group">
					<div class="col-md-10">
					    <div class="pull-left">
					    	<?=@$msg; ?>
					    </div>
						<div class="pull-right">
							<button class="btn btn-default">Save</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>