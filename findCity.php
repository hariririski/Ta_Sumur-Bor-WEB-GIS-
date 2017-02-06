
<?php 
$stateId=($_GET['country']);
 include'maps/db.php';
$query="SELECT `id_desa`, `nama_desa`, `id_kecamatan` FROM `desa` WHERE id_kecamatan='$stateId'";
$result=mysqli_query($con,$query);

?>
<select name="nama_desa" class="form-control">
<option>Pilih Desa</option>
<?php while($row=mysqli_fetch_array($result)) { ?>
<option value=<?php echo $row['id_desa']?>><?php echo $row['nama_desa']?></option>
<?php } ?>
</select>
