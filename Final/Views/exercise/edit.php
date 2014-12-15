<form class="form-horizontal" action="?action=save" method="post" >
	
	<input type="hidden" name="id" value="<?=$model['id']?>" />
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title">Record a Workout</h4>
  </div>
  <div class="modal-body">
  		<?//print_r($_REQUEST)?>
  		<? if(!empty($errors)): ?>
  			<div class="alert alert-danger">
  				<ul>
  				<? foreach ($errors as $key => $value): ?>
					  <li><?=$key?> <?= $value ?></li>
				<? endforeach; ?>
				</ul>
  			</div>
  		<? endif; ?>

		  <div class="form-group <?=!empty($errors['Name']) ? 'has-error has-feedback' : '' ?>">
		    <label for="txtName" class="col-sm-2 control-label">Name</label>
		    <div class="col-sm-10">
		      
		      <input type="text" class="form-control" id="txtName" name="Name" placeholder="Name" value="<?=$model['Name']?>">
		      <? if(!empty($errors['Name'])): ?>
		      	<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		      	<span class="help-block"><?=$errors['Name']?></span>
		      <? endif; ?>
		    </div>
		  </div>
		 
		  <div class="form-group">
		    <label for="txtWeight" class="col-sm-2 control-label">Weight</label>
		    <div class="col-sm-4">
		      <input type="number" class="form-control" id="txtWeight" name="Weight" placeholder="Weight" value="<?=$model['Weight']?>">
		    </div>
		  </div>
		   <div class="form-group">
		    <label for="txtReps" class="col-sm-2 control-label">Reps</label>
		    <div class="col-sm-4">
		      <input type="number" class="form-control" id="txtReps" name="Reps" placeholder="Reps" value="<?=$model['Reps']?>">
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label for="txtTime" class="col-sm-2 control-label">Time</label>
		    <div class="col-sm-4">
		      
	     <input type="text" class="form-control" id="cal" name="Time" placeholder="Time"  value="<?=date('m/d/Y H:i:s', strtotime( $model['Time'])) ?>">
		   


		    </div>
		  </div>
		   <div class="radio">
        <label>
          <input type="radio" name = "isFave" value = "1"> Add to Favorites
        </label>
      </div>
	   <div class="radio">
        <label>
          <input type="radio" name = "isFave" value = "0"> Do not add to Favorites
        </label>
      </div>
      
     
  </div>
  <div class="modal-footer">
    <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel" />
    <input type="submit" name="submit" class="btn btn-primary" value="Save changes" />
  </div>
</form>

<script>
	$('#cal').appendDtpicker({
		"autodateonStart": true,
		"minuteInterval": 15,
		"closeOnSelected": true
		
	});
	
	$('#dateSet').click(function(){
			var date = $('#date_manual').handleDtpicker('getDate');
			
		});
</script>

