<link rel="stylesheet" href="../components/css/jquery.simple-dtpicker.css">
<header>
	<div class = "container">
	<div class = "row">
		
		
		<div class = "col-md-8">
			<h3>Track Exercise:</h3>
		</div>
		<div class = "col-md-4">
			<h3>Calander</h3>
			<h6 style="color:grey">Dynamically traverse daily workouts.</h6>
		</div>
	</div><!-- end of header row -->
</header>

</div>
	<div class ="container content" ng-app="myApp" ng-controller='index'>
	<a class = "btn btn-success toggle-modal add" data-target="#formModal" href="?action=create">
		<i class="glyphicon glyphicon-plus"></i>
		</a>
	
		
	<div class = "row">
		
		<div class = "col-md-8">
			
			<div class="modal fade" id="formModal" tabindex="-1" >
				  <div class="modal-dialog">
				    <div class="modal-content">
				    </div>
				  </div>
				</div>
				
				<a id="fav-menu2" href="#sidr">Pick from Favorites</a>
 
<div id="sidr">
  <h3>My Favorite Meals</h3>
  <ul>
  	 	<?foreach ($model as $rs):
  		//if isFave is 1, it's part of favorite meals
  		if ($rs['isFave'] > 0): ?>
		
			<li><a href = "?&action=edit&id=<?=$rs['id']?>"><?=$rs['Name']?></a></li>
		
  	<? endif; ?>
  	
   
 
  <? endforeach; ?>
 </ul>
</div>
 

				<div class="alert alert-success initialy-hidden" id="myAlert">
					<button type="button" class="close" data-dismiss="alert">
						<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
					</button>
					
					
				</div>
				
			<div class = "table-responsive">
				<table class = "table table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Weight (lb)</th>
							<th>Reps</th>
							<th>Time</th>
							
					</thead>
					
					<tbody>
						
						<tr ng-repeat ="row in data | filter: searchDate">
							
								<td>{{row.Name}}</td>
								<td>{{row.Weight}}</td>
								<td>{{row.Reps}}</td>
								<td>{{row.Time}}</td>
							
								<td>
									<a ng click="click(row)" title="Edit" class = "btn btn-default btn-sm toggle-modal edit" data-target="#formModal" href="?action=edit&id={{row.id}}">
										<i class="glyphicon glyphicon-pencil"></i>
									</a>
									<a ng-click="click(row)" title="Delete" class = "btn btn-default btn-sm toggle-modal delete" data-target="#formModal" href="?action=delete&id={{row.id}}">
										<i class="glyphicon glyphicon-trash"></i>
									</a>
									<a title="Favorite" id = "favButton" class = "btn btn-default btn-sm fav" href="?action=fav&id={{row.id}}">
										<i class="glyphicon glyphicon-heart"></i>
									</a>
								</td>
							</tr>
							
					</tbody>
				</table>
					
				
			</div> 
			
			
		</div> 
			
		<div class = "col-md-4">
			<input ng-model="searchDate" type="text" class="form-control" id="cal2" name="Time" placeholder="Time"  value="">
			
		</div>
			
		</div> 
	</div>
	
	<script src="../components/includes/jquery.simple-dtpicker.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.js"></script>
	

<script type = "text/javascript">
	 
      var $mContent;
	  var myApp = angular.module("myApp", [])
      	.controller('index', function($scope, $http){
     		$scope.curRow = null;
     	
			$scope.click = function(row){
				$scope.curRow = row;
		   	}
		   
		   $http.get('?format=json&userId=')
		   .success(function(data){
		   	$scope.data = data;
		   	$scope.calories = function() { return sum(data, 'Calories'); };
		   		$scope.fat = function() { return sum(data, 'Fat'); };
		   			$scope.protein = function() { return sum(data, 'Protein'); };
		   	
		   });
		   
		  
		   
		   
     	$('body').on('click',".toggle-modal", function(event){
     		event.preventDefault();
     		var $btn = $(this);
     		
     		formSetup(this.href, function (data){
     			$("myAlert").show().find('div').html(JSON.stringify(data));
     			
     			if ($btn.hasClass('edit'))
     			{
     				$scope.data[$scope.data.indexOf($scope.curRow)] = data;
     			}
     			
     			if ($btn.hasClass('add'))
     			{
     				$scope.data.push(data);
     			}
     			
     			if ($btn.hasClass('delete'))
     			{
     				$scope.data.splice($scope.data.indexOf($scope.curRow),1); //replace with USERID
     			}
     			$scope.$apply(); //angular functions will not work w/o this
     			
     			
     		})
     	
     	
     	})
     	  }); //end of angular controller
     
     function sum(data, field){
     	var total = 0;
     	$.each(data,function(i,element){
     		total += element[field];
     	});
     	return total;
     }
     	
     	function formSetup(url, then) {
     		$("#formModal").modal("show");
     		$.get(url + "&format=plain", function(data){
     			$mContent.html(data);
     			$mContent.find('form')
     			.on('submit',function(e){
     				e.preventDefault();
     				$("#formModal").modal("hide");
     				
     				$.post(this.action + '&format=json', $(this).serialize(),function(data){
     					then(data);
     				}, 'json');
     				
     			});
     		});
     		
     	}
   
     
     
     
 

	$(function(){
				  $('.fitness').addClass("active");
				$mContent = $("#formModal .modal-content");
				
				var defaultContent = $mContent.html();
				
				
								
				$('#formModal').on('submit', function (e) {
					$mContent.html(defaultContent);
				    
				})
				
				$('.alert .close').on('click',function(e){
					$(this).closest('.alert').slideUp();
				});
				
			});
	
	
 
</script>

<script>
$(document).ready(function() {
  $('#fav-menu2').sidr();
});

	$('#cal2').appendDtpicker({
		inline:true
		
		
	});

</script>


