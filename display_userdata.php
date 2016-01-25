<?php
if(isset($_POST['add'])){
    
    header("Location: registration.php");
    exit;
  }
?>

<?php include('header.php'); ?>
<?php include('menu.php'); include('config.php'); ?>

<?php
  if(!isset($_SESSION['uname'])){
    header('Location: index.php');
  }
?>

<?php
	$query_select="Select id,first_name,last_name,gender,mobile_number,email,password,company,aboutme,address,state,country from registration";
	$res=mysql_query($query_select);
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>User Data</h1>
  </section>

  <form method="post">
	  <div class="pull-right" style="margin-bottom:20px;">
	  	<input type="submit" class="btn btn-primary" name="add" value="Add More">
		  <!-- <span class="glyphicon glyphicon-plus"></span> -->
		<!-- </button> -->
	  </div>
  </form>

  <!-- Search Start -->
  <div ng-app="myApp">
  <div class="panel panel-default" style="margin-top:70px;" ng-controller="myCtrl">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Search
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
          <form class="form-inline">
            <div class="form-group">
              <label for="firstname">First Name</label>
              <input type="text" class="form-control" ng-model="searchValue">
            </div>
            <button type="submit" class="btn btn-default" ng-click="searchClick()">Search</button>
          </form>  
      </div>
    </div>
  </div>
  </div>
  <!-- Search End -->

  <section class="content">
  	<div class="row">
  		<table class="table table-bordered">
  			<thead>
  				<tr>
  					<th>No</th>
  					<th>First Name</th>
  					<th>Last Name</th>
  					<th>Gender</th>
  					<th>Mobile Number</th>
  					<th>Email</th>
  					<th>Company</th>
  					<th>Country</th>
  					<th>State</th>
  					<th>Action</th>
  				</tr>
  			</thead>

  			<tbody>
  			<?php
  				while($row=mysql_fetch_array($res)){
  			?>
  			
  				<tr id="tr_<?php echo $row['id']; ?>">
  					<td><?php echo $row['id'];?></td>
  					<td><?php echo $row['first_name'];?></td>
  					<td><?php echo $row['last_name'];?></td>
 					<td><?php if($row['gender'] == "0") echo "Male"; else if($row['gender'] == "1") echo "Female"; ?></td>
  					<td><?php echo $row['mobile_number'];?></td>
  					<td><?php echo $row['email'];?></td>
  					<td><?php echo $row['company'];?></td>
  					<td><?php 
  						if($row['country'] == "1")
  							echo "India";
  						else if($row['country'] == "2")
  							echo "Australia";
  						else if($row['country'] == "3")
  							echo "Japan";
  						?>
  					</td>
  					<td><?php 
  							if($row['state'] == "1")
  								echo "Gujrat";
  							else if($row['state'] == "2")
  								echo "Rajasthan";
  							else if($row['state'] == "3")
  								echo "Goa;"
  						?>
  					</td>
  					<td>
  						<a href="registration.php?id=<?php echo $row['id'];?>" class="btn btn-warning edit">
  							<span class="glyphicon glyphicon-pencil"></span>
  						</a>
              <a href="#" class="btn btn-success delete" id="<?php echo $row['id']; ?>">
  							<span class="glyphicon glyphicon-trash"></span>
  						</a>
  					</td>
  				</tr>

  			<?php } ?>
  			</tbody>
  		</table>
  	</div>
  </section>
</div>

<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
<script type="text/javascript">
  $('document').ready(function(){
    $('.delete').click(function(){
      var id=$(this).attr('id');

      $.ajax({
      url:'delete_user.php',
      type:'POST',
      data:'id='+id,
      success:function(data){
        $("#tr_"+id).slideUp('slow');
      }
      });
    });

  });

  var app = angular.module('myApp',[]);
  app.controller('myCtrl', function($scope) {
      $scope.searchClick = function(){
        alert("clicked");
        // searchValue
      };
  });
</script>
<?php include('footer.php'); ?>