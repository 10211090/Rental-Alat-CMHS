<?php
include('includes/config.php');
error_reporting(0);
$vehicletitle=$_POST['vehicletitle'];
$brand=$_POST['brandname'];
$vehicleoverview=$_POST['vehicalorcview'];
$priceperday=$_POST['priceperday'];
$id=$_POST['id'];

$sql="UPDATE alat SET nama_alat='$vehicletitle',id_jenis='$brand',deskripsi='$vehicleoverview',harga='$priceperday' where id_alat='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil edit data.'); 
			document.location = 'alat.php'; 
		</script>";
}else {
			echo "No Error : ".mysqli_errno($koneksidb);
			echo "<br/>";
			echo "Pesan Error : ".mysqli_error($koneksidb);

	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'alatedit.php?id=$id'; 
		</script>";
}
?>