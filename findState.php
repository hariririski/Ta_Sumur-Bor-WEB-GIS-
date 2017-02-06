

<?php 
$country=($_GET['country']);
 include'maps/db.php';
$query="SELECT `id_kecamatan`, `nama_kecamatan`, `id_kabupaten` FROM `kecamatan` WHERE id_kabupaten='$country'";
$result=mysqli_query($con,$query);
	
?>
<select name="nama_kecamatan" onchange="getCity( this.value)" class="form-control">
<option>Pilih Kecamatan</option>
<?php while ($row=mysqli_fetch_array($result)) { ?>
<option value=<?php echo $row['id_kecamatan']?>>Kamar <?php echo $row['nama_kecamatan']?></option>
<?php }  ?>
</select>
