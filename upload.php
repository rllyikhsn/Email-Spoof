<?php 

if(isset($_POST['save'])){
	if($nama = $_FILES['file']['name'] == ""){
		echo '<script type="text/javascript">';
		echo 'alert("Harap masukkan file CSV !")';
		echo '</script>';
		echo "<script>location='./';</script>";
	} else {
		$ekstensi_diperbolehkan	= array('csv');
		$nama = $_FILES['file']['name'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			if($ukuran < 1044070){			
				move_uploaded_file($file_tmp, 'upload/'.$nama);
				echo '<script type="text/javascript">';
				echo 'alert("Proses Berhasil Dilakukan !")';
				echo '</script>';
				echo "<script>location='./';</script>";
			}else{
				echo 'UKURAN FILE TERLALU BESAR';
			}
		}else{
			echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
		}
	}
}

if(isset($_POST['delete'])){
	$filename = 'upload/template_mahasiswa.csv';

	if(file_exists($filename)){
		unlink('upload/template_mahasiswa.csv');
		echo '<script type="text/javascript">';
		echo 'alert("File CSV berhasil dihapus !")';
		echo '</script>';
		echo "<script>location='./';</script>";
	}else{
		echo '<script type="text/javascript">';
		echo 'alert("Tidak ada file yang terhapus !")';
		echo '</script>';
		echo "<script>location='./';</script>";
	}
}
?>
