<?php
require_once '../../BusinessLayer/controller/manageServiceController.php';

session_start();

$item = new manageServiceController();

if(isset($_POST['add'])){
	$item->add();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Service Provider Service Add</title>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link href="ExternalCSS/styles.css" rel="stylesheet" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script src="https://use.fontawesome.com/3cc6771f24.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
	<script>
		var loadFile = function(event){
			var image = document.getElementById('imageOut');
			image.src = URL.createObjectURL(event.target.files[0]);
		};

		function displayFile(){
			var x = document.getElementById("itemimage").files[0];
			var y = x.name;

			document.myForm.imagename.value = y;
		}
	</script>
		<!-- <style>
			 td {
				padding-top: 15px;
				padding-bottom: 15px;
			}
		</style> -->
	</head>
	<body>
		<body class="hold-transition sidebar-mini">
			<div class="wrapper">

				<?php include("../sidebar.php") ?>

				<!-- Content Wrapper. Contains page content -->
				<div class="content-wrapper">
					<!-- Content Header (Page header) -->
					<div class="content-header">
						<div class="container-fluid">
							<div class="row mb-2">
								<div class="col-sm-6">
									<h1 class="m-0">Service Provider Service Add</h1>
								</div><!-- /.col -->
								<div class="col-sm-6">
									<ol class="breadcrumb float-sm-right">
										<li class="breadcrumb-item"><a href="./serviceProviderServiceView.php?spID=<?=$_SESSION['spID']?>">Home</a></li>
										<li class="breadcrumb-item active">Service Add</li>
									</ol>
								</div><!-- /.col -->
							</div><!-- /.row -->
						</div><!-- /.container-fluid -->
					</div>
					<!-- /.content-header -->
					<!-- Main content -->
					<div class="content">
						<div class="container-fluid" style="width: 70%">

							<div class="card shadow-lg border-0 rounded-lg mt-1" >
								<div class="card-header"><h3 class="text-center font-weight-light my-1">Add New Service</h3></div>
								<div class="card-body" >
									<form name="myForm" action="" method="POST" enctype="multipart/form-data">
										
										<table class="table table-borderless">
											<tr>
												<td>Service Type:</td>
												<td colspan="2">
													<select id="servicetype" name="servicetype" class="form-control py-2">
														<option disabled selected>Choose a category</option>
														<option value="Good">Good</option>
														<option value="Food">Food</option>
														<option value="Pet">Pet</option>
														<option value="Medical">Medical</option>
													</select>
												</td>
											</tr>
											<tr>
												<td>Item Name:</td>
												<td colspan="2"><input type="text" name="itemname" required class="form-control py-2"></td>
											</tr>
											<tr>
												<td>Unit Price (RM):</td>
												<td colspan="2"><input type="text" name="itemprice" required class="form-control py-2"></td>
											</tr>
										
											<tr>
												<td>Item Image</td>
												<td><image id="imageOut" width="120px" height="120px" border="1px solid black" style="margin-top: 2px;" ></image></td>
												<td>
													<input type="button" class="form-control py-2" value="Select File" onclick="document.getElementById('itemimage').click()">
													<input type="file" id="itemimage" name="itemimage" accept="image/*" onchange="loadFile(event)" style="display: none">
													&emsp;&emsp;
													<br>
													<input type="button" class="form-control py-2" value="Upload Photo" accept="image/*" onclick="displayFile()" onchange="loadFile(event)">
												</td>
												
												
											</tr>
											<tr>
													<td></td>
													<td><input type="text" name="imagename" placeholder="Photo.png" size="15">&emsp;&emsp;</td>
													<td></td>
												</tr>
											<tr>
												<td colspan="3" style="text-align: center">
													<button type="submit" name="add" class="btn btn-primary" style="width: 20%"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Add</button>
												</td>
											</tr>
										</table>
									</form>
								</div>

							</div><!-- /.container-fluid -->
						</div>
						<!-- /.content -->

					</div>
					<!-- /.content-wrapper -->



				</div>
				<!-- ./wrapper -->

			</body>
			</html>