<?php 
date_default_timezone_set("Asia/Jakarta");

function pengkodean($table,$inisial){
	include "konek.php";
	$query = mysqli_query($konek,"SELECT * from $table");
	$properties = 	mysqli_fetch_field($query);
	$field = $properties->name; 
	if($table == 'transaksi'){
		$thn = date("y");
		$bln = date("m");
		$w   = "Where id_transaksi like '$inisial".$thn.$bln."%'";
	}else{
		$thn = "";
		$bln = "";
		$w   = "";
	}

	$hasil =mysqli_query($konek,"SELECT max(".$field.") from $table $w ");
	$data=mysqli_fetch_array($hasil);
	$panjang = $properties->length;
	$panjang -= 1;
	$no=$data[0];

	$panjanghuruf = strlen($inisial) + strlen($thn) + strlen($bln);
	$panjangnol = $panjang - $panjanghuruf;
	$nol = "";
		if(empty($no)){
			for ($i=2; $i <= $panjangnol ; $i++) { 
				$nol .= "0";
			}
			$no=$inisial.$thn.$bln.$nol."1";
		}else{
			$noterakhir=substr($no,$panjanghuruf); // dimulai dari digit ke dua dan diambil 3 digit
			$nourut=$noterakhir+1;
			$no=$inisial.$thn.$bln.sprintf('%0'.$panjangnol.'s',$nourut);	
		}
	return $no;
}
function lihatlaporanpertgl($tglawal,$tglakhir){
	global $konek;
	$sql="SELECT * FROM muzakki WHERE tgl_daftar BETWEEN '$tglawal' AND '$tglakhir'";
	$query=mysqli_query($konek,$sql);
	$cek=mysqli_fetch_array($query);

	if(mysqli_num_rows($query)>0){
		return true;
	}else{
		return false;
	}
}

function editdataamil($username,$nama_admin,$level,$id){
	$query="UPDATE
  `zakat`.`admin`
SET
  
  `nama_admin` = '$nama_admin',
  `username` = '$username',
  
  `level` = '$level'
WHERE `id_admin` = '$id';

";
	return run($query);
}

function editpassword($passwordnew,$id){
	$query="UPDATE admin SET password='$passwordnew' WHERE id_admin='$id'";
	return run($query);	
}

function simpandataamil($id_admin,$nama,$username,$password,$level){
	global $konek;

	$query1="INSERT INTO `zakat`.`admin` (
  `id_admin`,
  `nama_admin`,
  `username`,
  `password`,
  `level`
)
VALUES
  (
    '$id_admin',
    '$nama',
    '$username',
    '$password',
    '$level'
  );

";
	if (mysqli_query($konek, $query1)) {
    	return true;
	} else {
    	return false;
	}	
}

function simpanartikel($id_artikel,$judul,$lokasi,$artikel,$namaamil,$namamustahiq){
	global $konek;

	$query = "INSERT INTO `zakat`.`artikel` (
  `id_artikel`,
  `judul_artikel`,
  `isi_artikel`,
  `gambar`,
  `nama_mustahiq`,
  `nama_admin`
)
VALUES
  (
    '$id_artikel',
    '$judul',
    '$artikel',
    '$lokasi',
    '$namamustahiq',
    '$namaamil'
  );

";
	if (mysqli_query($konek, $query)) {
    	return true;
	} else {
    	return false;
	}
} 

function simpanbanner($link,$ket,$lokasi){
	global $konek;

	$query = "INSERT INTO banner(id_banner,link,keterangan,banner) VALUES (null,'$link','$ket','$lokasi')";
	if (mysqli_query($konek, $query)) {
    	return true;
	} else {
    	return false;
	}
}

function simpandatamustahiq($id_mustahiq,$namapenerima,$namayayasan,$alamat,$jumlah,$tgl,$amil){
	global $konek;

	$query="INSERT INTO `zakat`.`mustahiq` (
  `id_mustahiq`,
  `nama_penerima`,
  `nama_yayasan`,
  `alamat`,
  `jumlah_zakat`,
  `tgl_penyaluran`,
  `nama_admin`
)
VALUES
  (
    '$id_mustahiq',
    '$namapenerima',
    '$namayayasan',
    '$alamat',
    '$jumlah',
    '$tgl',
    '$amil'
  );

";
	if (mysqli_query($konek, $query)) {
    	return true;
	} else {
    	return false;
	}	
}

function tampilbanner(){
	global $konek;
	$sql="SELECT * FROM banner";
	$result=mysqli_query($konek,$sql) or die('gagal menampilkan data');
	return $result;	
}

function tampilartikel(){
	global $konek;
	$sql="SELECT * FROM artikel";
	$result=mysqli_query($konek,$sql) or die('gagal menampilkan data');
	return $result;
}

function tampilartikellperid($id){
	global $konek;
	$sql="SELECT * FROM artikel WHERE id_artikel='$id'";
	$result=mysqli_query($konek,$sql) or die('gagal menampilkan data');
	return $result;
}

function tampilmuzakki(){
	global $konek;
	$sql="SELECT * FROM muzakki";
	$result=mysqli_query($konek,$sql) or die('gagal menampilkan data');
	return $result;
}

function tampilamilperid($id){
	global $konek;
	$sql="SELECT * FROM admin WHERE id_admin='$id'";
	$result=mysqli_query($konek,$sql) or die('gagal menampilkan data');
	return $result;
}

function tampilmustahiqperid($id){
	global $konek;
	$sql="SELECT * FROM mustahiq WHERE id_mustahiq='$id'";
	$result=mysqli_query($konek,$sql) or die('gagal menampilkan data');
	return $result;	
}

function tampilamil(){
	global $konek;
	$sql="SELECT * FROM admin";
	$result=mysqli_query($konek,$sql) or die('gagal menampilkan data');
	return $result;
}

function tampilmustahiq(){
	global $konek;
	$sql="SELECT * FROM mustahiq";
	$result=mysqli_query($konek,$sql) or die('gagal menampilkan data');
	return $result;
}

function tampildatatransaksi(){
	global $konek;
	$sql="SELECT * FROM transaksi WHERE status IN(1,2,3)";
	$result=mysqli_query($konek,$sql) or die('gagal menampilkan data');
	return $result;
}

function tampiltransaksiperid($id){

	global $konek;
	$sql="SELECT * FROM transaksi WHERE id_transaksi='$id'";
	$result=mysqli_query($konek,$sql) or die('gagal menampilkan data');
	return $result;	
}

function tampiljumlahtransaksiperid(){

	global $konek;
	$sql="SELECT SUM(jumlah_bayar) AS jumlah FROM transaksi";
	$result=mysqli_query($konek,$sql) or die('gagal menampilkan data');
	return $result;
}

function tampilpesan(){
	global $konek;
	$sql="SELECT * FROM pesan";
	$result=mysqli_query($konek,$sql) or die('gagal menampilkan data');
	return $result;
}

function tampilpesanperid($id){
	global $konek;
	$sql="SELECT * FROM pesan WHERE id_pesan='$id'";
	$result=mysqli_query($konek,$sql) or die('gagal menampilkan data');
	return $result;
}

function hapus_datamuzakki($id){
	global $konek;
	$query="DELETE FROM muzakki WHERE id_user='$id'";
	if(mysqli_query($konek,$query)) return true;
	else return false;
}


function hapus_banner($id){
	global $konek;
	$query="DELETE FROM banner WHERE id_banner='$id'";
	if(mysqli_query($konek,$query)) return true;
	else return false;
}

function hapus_artikel($id){
	global $konek;
	$query="DELETE FROM artikel WHERE id_artikel='$id'";
	if(mysqli_query($konek,$query)) return true;
	else return false;
}

function hapus_mustahiq($id){
	global $konek;
	$query="DELETE FROM mustahiq WHERE id='$id'";
	if(mysqli_query($konek,$query)) return true;
	else return false;
}

function hapus_dataamil($id){
	global $konek;
	$query="DELETE FROM admin WHERE id_admin='$id'";
	if(mysqli_query($konek,$query)) return true;
	else return false;
}

function cekloginadmin($username,$password){
	global $konek;

	$sql="SELECT * FROM admin WHERE username ='$username' AND password='$password'";
	$query=mysqli_query($konek,$sql);
	
	$cek=mysqli_fetch_array($query);
	$_SESSION['id_admin']=$cek['id_admin'];
	$_SESSION['username']=$cek['username'];
	$_SESSION['nama_admin']=$cek['nama_admin'];

	if(mysqli_num_rows($query)>0){
		return true;
	}else{
		return false;
	}
}



function updatepesan($id,$id_muzakki,$balasan,$status){
	global $konek;

	$query="UPDATE pesan SET balasan='$balasan',status='$status' WHERE id_pesan='$id'";
	return run($query);	
}

function updateartikel($id,$judul,$lokasi,$artikel,$namaamil,$namamustahiq){
	global $konek;

	$query="UPDATE
  `zakat`.`artikel`
SET
  `judul_artikel` = '$judul',
  `isi_artikel` = '$artikel',
  `gambar` = '$lokasi',
  `nama_mustahiq` = '$namamustahiq',
  `nama_admin` = '$namaamil'
WHERE `id_artikel` = '$id';

";
	return run($query);	
}

function editdatamustahiq($namapenerima,$namayayasan,$alamat,$jumlah,$tgl,$amil,$id){
	global $konek;

	$query="UPDATE mustahiq SET nama_penerima='$namapenerima',nama_yayasan='$namayayasan',alamat='$alamat',jumlah_zakat='$jumlah',tgl_penyaluran='$tgl',nama_amil='$amil' WHERE id='$id'";
	return run($query);	
}

function updatetransaksi($status,$id){
	global $konek;

	$query="UPDATE transaksi SET status='$status' WHERE id_transaksi='$id'";
	return run($query);
}

function rupiah($angka){
$jadi =number_format($angka,0,',','.');
return $jadi;
}

function run($query){
	global $konek;

	if(mysqli_query($konek,$query)) return true;
	else return false;
}
 ?>

