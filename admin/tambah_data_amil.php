<?php include 'head_admin.php';
 include 'config/config.php'; 
 // include 'config/fungsi.php';
$id_admin=pengkodean("admin","AML");
 // $id_admin=pengkodean("mustahiq","MUS");


if(isset($_POST['simpan'])){
	$id_admin=$_POST['id_admin'];
	$nama=$_POST['nama'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$confirmpassword=$_POST['confirmpassword'];
	$level=$_POST['level'];

	if($password==$confirmpassword){
	$password=sha1($password);	

		if(simpandataamil($id_admin,$nama,$username,$password,$level)){

			echo "<script>alert('Berhasil')</script>";
			echo "<script>location='data_amil.php';</script>";
		}else{

            echo "Error: " . $query1 . "<br>" . mysqli_error($konek);
			echo "<script>alert('Gagal')</script>";

		}
	}else{
		echo "<script>alert('Password Salah')</script>";
	}
}

?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->


<form action="" method="post">

<div class="container">
<div class="row">
	<div class="col-md-5">
		<div class="header">
			<h2>Tambah Amil Baru</h2>
			<hr>
		</div>
		  <div class="form-group">
		    <label >Nama</label>
		    <input type="hidden" name="id_admin" value="<?= $id_admin ?>">
		    <input type="text" name="nama" class="form-control">
		  </div>
		  <div class="form-group">
		    <label >Username</label>
		    <input type="text" name="username" class="form-control">
		  </div>

		  <div class="form-group">
		    <label >Password</label>
		    <input type="password" name="password" class="form-control">
		  </div>

		  <div class="form-group">
		    <label >Konfirmasi Password</label>
		    <input type="password" name="confirmpassword" class="form-control">
		  </div>

		  <div class="form-group">
		    <label >Level</label>
		    <select name="level" class="form-control">
			  <option value="0">-Pilih Level-</option>
			  <option value="adminartikel">Admin Artikel</option>
			  <option value="adminmuzakki">Admin Data Muzakki</option>
			  <option value="adminmustahiq">Admin Data Mustahiq</option>
			  <option value="admintransaksi">Admin Data Transaksi</option>
			  <option value="adminpesan">Admin Konfirmasi Pesan</option>
			  <option value="adminlaporan">Admin Laporan</option>
			</select>
		  </div>
		  <input type="submit" name="simpan" class="btn btn-success" value="Simpan Data">
		  <a href="data_amil.php" class="btn btn-primary">Kembali</a>
	</div>
</div>
</form>
</div>

  <section class="content">
  </section>


</div>

       


<?php include 'foot_admin.php'; ?>