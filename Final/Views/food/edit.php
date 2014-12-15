
<div id="my_container" class="fatsecret_container">
<form class="form-horizontal" action="?action=save" method="post" >
	
	<input type="hidden" name="id" value="<?=$model['id']?>" />
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title">Record a food</h4>
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
		    <label for="txtCalories" class="col-sm-2 control-label">Calories</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="txtCalories" name="Calories" placeholder="Calories" value="<?=$model['Calories']?>">
		    </div>
		  </div>
		   <div class="form-group">
		    <label for="txtProtein" class="col-sm-2 control-label">Protein</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="txtProtein" name="Protein" placeholder="Protein" value="<?=$model['Protein']?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtFat" class="col-sm-2 control-label">Fat</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="txtFat" name="Fat" placeholder="Fat" value="<?=$model['Fat']?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtCarbs" class="col-sm-2 control-label">Carbs</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="txtCarbs" name="Carbs" placeholder="Carbs" value="<?=$model['Carbs']?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtFiber" class="col-sm-2 control-label">Fiber</label>
		    <div class="col-sm-8">
		      <input type="number" class="form-control" id="txtFiber" name="Fiber" placeholder="Fiber" value="<?=$model['Fiber']?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtTime" class="col-sm-2 control-label">Time</label>
		    <div class="col-sm-8">
		      
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
</div>

<script>
	$('#cal').appendDtpicker({
		"autodateonStart": true,
		"minuteInterval": 15,
		"closeOnSelected": true
		
	});
	
	

fatsecret.setContainer("my_container"); 
fatsecret.setCanvas("home"); 

 
fatsecret.variables.navOptions = fatsecret.navFeatures.home;

</script>

