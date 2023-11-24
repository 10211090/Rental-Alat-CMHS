<?php
include('includes/config.php');
$brand	= $_POST['brand'];
$sql 	= "INSERT INTO merek (nama_jenis) VALUES ('$brand')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'jenis.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'tambahjenis.php'; 
		</script>";

}
?>