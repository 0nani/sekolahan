<?php 
include 'koneksi.php';
if (isset($_GET['id'])) {
	if ($_GET['id'] != "") {
		
		// Mengambil ID diURL
		$id = $_GET['id'];

		// Mengambil data siswa_foto didalam table siswa
		$get_foto = "SELECT foto_guru FROM guru WHERE id_guru='$id'";
		$data_foto = mysqli_query($koneksi, $get_foto); 
        // Mengubah data yang diambil menjadi Array
		$foto_lama = mysqli_fetch_array($data_foto);

        // Menghapus Foto lama didalam folder FOTO
		unlink("foto/".$foto_lama['foto_guru']);    

		// Mengapus data siswa berdasarkan ID
		$query = mysqli_query($koneksi,"DELETE FROM guru WHERE id_guru='$id'");
		if ($query) {
			header("location:index.php?pesan=hapus");
		}else{
			header("location:index.php?pesan=gagalhapus");
		}
		
	}else{
		// Apabila ID nya kosong maka akan dikembalikan kehalaman index
		header("location:index.php");
	}
}else{
	// Jika tidak ada Data ID maka akan dikembalikan kehalaman index
	header("location:index.php");
}

?>