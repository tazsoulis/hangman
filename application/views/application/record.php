<div class="row spacer-100">
	<div class="col s12 m10 offset-m1">
		<div class="card-panel grey lighten-5 z-depth-1">
			<div class="row valign-wrapper">
				<div class="col m12">
					 <form action="<?=site_url('Application/update')?>" method="POST">
						<input type="hidden" name="id" value="<?= $record->id ?>" >
						<div class="col m10 offset-m1">
							<h5 class="valign center-align">Update item</h5>
							<div class="input-field">
								<i class="material-icons prefix">perm_identity</i>
								<input id="word" name="word" type="text" value="<?= $record->word ?> " class="validate">
								<label for="icon_prefix">Title</label>
							</div>	
						</div>	
						<button type="submit"  class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">add</i></button>
					</form>
				</div>	
			</div>
		</div>
	</div>
</div>
