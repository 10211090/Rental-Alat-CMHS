<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0){	
header('location:index.php');
}else{ 
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>PT. Catur Manunggal Hidup Sejahtera | Admin Edit Info alat</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
<style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
</style>
<script type="text/javascript">

</script>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Edit Alat</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Form Edit Alat</div>
									<div class="panel-body">
										<?php 
										$id=intval($_GET['id']);
										$sql ="SELECT alat.*,merek.* FROM alat, merek WHERE alat.id_jenis=merek.id_jenis AND alat.id_alat='$id'";
										$query = mysqli_query($koneksidb,$sql);
										$result = mysqli_fetch_array($query);
										?>

										<form method="post" class="form-horizontal" name="theform" action ="alateditact.php" onsubmit="return valid(this);" enctype="multipart/form-data">
										<div class="form-group">
											<label class="col-sm-2 control-label">Nama Alat<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<input type="hidden" name="id" class="form-control" value="<?php echo $id;?>" required>
												<input type="text" name="vehicletitle" class="form-control" value="<?php echo htmlentities($result['nama_alat']);?>" required>
											</div>
											<label class="col-sm-2 control-label">Jenis<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<select class="form-control" name="brandname" required="" data-parsley-error-message="Field ini harus diisi" >
													<option value=""></option>
														<?php
														$mySql = "SELECT * FROM merek ORDER BY nama_jenis";
														$myQry = mysqli_query($koneksidb, $mySql);
														$dataMerek = $result['id_jenis'];
														while ($merekData = mysqli_fetch_array($myQry)) {
															if ($merekData['id_jenis']== $dataMerek) {
															$cek = " selected";
															} else { $cek=""; }?>
															<option value='<?php echo htmlentities($merekData['id_jenis']); ?>' <?php echo htmlentities($cek); ?>><?php echo htmlentities($merekData['nama_jenis']); ?></option>";
														<?php }
														?>
												</select>
											</div>
										</div>
																					
										<div class="hr-dashed"></div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Deskripsi Alat<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<textarea class="form-control" name="vehicalorcview" rows="3" required><?php echo htmlentities($result['deskripsi']);?></textarea>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-2 control-label">Harga/Hari<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<input type="text" name="priceperday" class="form-control" value="<?php echo htmlentities($result['harga']);?>" required>
											</div>
										</div>
										
										<div class="hr-dashed"></div>								
										
										<div class="form-group">
											<div class="col-sm-12">
												<h4><b>Gambar Alat</b></h4>
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-4">
												Gambar 1 <img src="img/vehicleimages/<?php echo htmlentities($result['image1']);?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage1.php?imgid=<?php echo htmlentities($result['id_alat'])?>">Ganti Gambar 1</a>
											</div>
											<div class="col-sm-4">
												Gambar 2<img src="img/vehicleimages/<?php echo htmlentities($result['image2']);?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage2.php?imgid=<?php echo htmlentities($result['id_alat'])?>">Ganti Gambar 2</a>
											</div>
											<div class="col-sm-4">
												Gambar 3<img src="img/vehicleimages/<?php echo htmlentities($result['image3']);?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage3.php?imgid=<?php echo htmlentities($result['id_alat'])?>">Ganti Gambar 3</a>
											</div>
										</div>
										
										<div class="hr-dashed"></div>									
										
									</div>
								</div>
							</div>
						</div>
						
					</div>
		
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="form-group">
										<div class="col-sm-3">
											<div class="checkbox checkbox-inline">
												<button class="btn btn-primary" type="submit" style="margin-top:4%">Save changes</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					</div>
				</div>
				</form>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>