<?php 
include 'head_admin.php';
include 'config/config.php'; 

$id = $_GET['id'];
$result=tampilamilperid($id);

if(isset($_POST['simpan'])){
	$id=$_POST['id_admin'];
	$nama_admin=$_POST['nama_admin'];
	$username=$_POST['username'];
	
	$level=$_POST['level'];
	

		if(editdataamil($username,$nama_admin,$level,$id)){
			echo "<script>alert('Berhasil')</script>";
			echo "<script>document.location.href='data_amil.php'</script>";
		}else{
			// echo "<script>alert('Gagal')</script>";
			echo "Error".mysqli_error($konek) ;
		}
}

?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->


<form action="" method="post">
<?php while ($a=mysqli_fetch_assoc($result)) { ?>

<div class="container">
<div class="row">
	<div class="col-md-5">
		<div class="header">
			<h2>Edit Amil</h2>
			<hr>
		</div>
		  <div class="form-group">
		    <label >Nama</label>
		    <input type="hidden" name="id_admin" class="form-control" value="<?= $a['id_admin'] ?>">
		    <input type="text" name="nama_admin" class="form-control" value="<?= $a['nama_admin'] ?>">
		  </div>
		  <div class="form-group">
		    <label >Username</label>
		    <input type="text" name="username" class="form-control" value="<?= $a['username'] ?>">
		  </div>
		
		   <div class="form-group">
		    <label >Level (<?= $a['level'];?>)</label>
		    <select name="level" class="form-control">
			  <option value="<?= $a['level'];?>">-Pilih Level-</option>
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
<?php } ?>
</form>
</div>

  <section class="content">
  </section>


</div>

       


<?php include 'foot_admin.php'; ?>