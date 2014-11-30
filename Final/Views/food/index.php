<header>
	<div class = "container"
	<h1>Track Meals:</h1>
</header>

<div class = "container">
	<div class = "row">
		
		<div class = "col-md-8">
			<div class = "table-responsive">
				<table class = "table table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Calories</th>
							<th>Protein (g)</th>
							<th>Fat (g)</th>
							<th>Carbs (g)</th>
							<th>Fiber (g)</th>
							<th>Time Recorded</th>
						</tr>
					</thead>
					
					<tbody>
						
						<? foreach ($model as $result): ?>
							<tr>
								<td><?=$result['Name']?></td>
								<td><?=$result['Calories']?></td>
								<td><?=$result['Protein']?></td>
								<td><?=$result['Fat']?></td>
								<td><?=$result['Carbs']?></td>
								<td><?=$result['Fiber']?></td>
								<td><?=$result['Time']?></td>
							</tr>
							<? endforeach; ?>
					</tbody>
				</table>
					
				
			</div> <!-- end of table div -->
			
			
		</div> <!-- end of left column -->
			
		<div class = "col-md-4">
			
		</div> <!-- end of right column -->	
	</div> <!--- end top row -->
	
</div> <!-- end container -->
