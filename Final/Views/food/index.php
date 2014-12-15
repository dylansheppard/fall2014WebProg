
<header>
	<div class = "container">
	<div class = "row">
		
		
		<div class = "col-md-8">
			<h3>Track Meals:</h3>
		</div>
		
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
				
				<a id="fav-menu" href="#sidr">Pick from Favorites</a>
 
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
					Your meal has been recorded.
					
				</div>
				
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
						
						<tr ng-repeat ='row in data'>
							
								<td>{{row.Name}}</td>
								<td>{{row.Calories}}</td>
								<td>{{row.Protein}}</td>
								<td>{{row.Fat}}</td>
								<td>{{row.Carbs}}</td>
								<td>{{row.Fiber}}</td>
								<td>{{row.Time}}</td>
								<td>
									<a ng click="click(row)" title="Edit" class = "btn btn-default btn-sm toggle-modal edit" data-target="#formModal" href="?action=edit&id={{row.id}}">
										<i class="glyphicon glyphicon-pencil"></i>
									</a>
									<a ng-click="click(row)" title="Delete" class = "btn btn-danger btn-sm toggle-modal delete" data-target="#formModal" href="?action=delete&id={{row.id}}">
										<i class="glyphicon glyphicon-trash"></i>
									</a>
								
									</a>
								</td>
							</tr>
							
					</tbody>
				</table>
					
				
			</div> 
			
			
		</div> 
			
		<div class ="col-md-4">
			<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>
<div class="well" ng-controller="social" >
					<img src="http://graph.facebook.com/{{me.id}}/picture" align="left" />
					<b>{{me.name}}</b><br>
					{{me.email}}
			</div>			
</div> 
			
		</div> 
	</div>
	

	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.js"></script>
	

<script>
	 
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
				  $('.nutrition').addClass("active");
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
  $('#fav-menu').sidr();
});


  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }
  
  			var $socialScope = null;
			myApp.controller('social', function($scope){
					$socialScope = $scope;
					$socialScope.$apply();
			});
			function checkLoginState() {
			    FB.getLoginStatus(function(response) {
				    $socialScope.status = response;
				    if (response.status === 'connected') {
				      FB.api('/me', function(response) {
					      $socialScope.me = response;
					      $socialScope.$apply();
					      console.log(response);
					    });
				    }
			    });
			  }
  


</script>

<script>
				  window.fbAsyncInit = function() {
				    FB.init({
				      appId      : '858309510887822',
				      xfbml      : true,
				      cookie     : true,
				      version    : 'v2.2'
				    });
				    checkLoginState();
				  };
				
				  (function(d, s, id){
				     var js, fjs = d.getElementsByTagName(s)[0];
				     if (d.getElementById(id)) {return;}
				     js = d.createElement(s); js.id = id;
				     js.src = "//connect.facebook.net/en_US/sdk.js";
				     fjs.parentNode.insertBefore(js, fjs);
				   }(document, 'script', 'facebook-jssdk'));
		</script>

