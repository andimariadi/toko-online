<?php 
if (!isset($_SESSION['masuk'])){
	include "periksa.php";}
include "kon_db.php";
?>
<script language="javascript">
 function tanya() {
 if (confirm ("Apakah Anda Yakin Akan Menghapus Data Biaya Tukang Ini ?")) {
	return true;
 } else {
	return false;
 }
 }
 </script>
<script>
function openWin() {
    window.open("http://localhost/perumahan/dasbor/cetak_tukang.php?lap");
}
</script>
<div class="post">
	<h1 align="center">Biaya Tukang</h1>
	<div class="entry">
		<p>		
		<table class="datatable" align="center">
		<tr>
			<th>Pekerjaan</th>
			<th>Jumlah (Orang)</th>
			<th>Jam Kerja/Hari</th>
			<th>Biaya/Orang</th>
			<th>Total</th>
			<?php
				if ($_SESSION['masuk'] == 'admin'){
					echo '<th>Aksi</th>';
				}
			?>
		</tr>
		<?php
		$query= mysqli_query($koneksi, "SELECT * FROM t_tukang");
		while($row=mysqli_fetch_array($query)){
		?>
		<tr>
			<td><?php echo $row['pekerjaan'];?></td><td><?php echo $row['jumlah'];?></td>
			<td><?php echo substr($row['jm_kerja'],0,10);?></td><td><?php echo $row['biaya'];?></td>
			<td><?php echo number_format($row['jumlah']*$row['biaya']);?></td>
			<?php
				if ($_SESSION['masuk'] == 'admin'){ ?>
			<td align="center">
				<a href="?page=edit_tukang&kd_tukang=<?php echo $row['kd_tukang'];?>">Edit</a>
				<a href="?page=hapus_tukang&kd_tukang=<?php echo $row['kd_tukang'];?>" onclick="return tanya()">Hapus</a>
			</td>
			<?php } ?>
		</tr>
		<?php
		}
		?>
		</table>
		</p>
		<table width="100%">
		<tr>
			<?php
			if ($_SESSION['masuk'] == 'admin'){
				echo '<td align="left"><a href="?page=tambah_tukang" class="btn">Tambah</a></td>';
			}
			?>
			<td align="right"><a href="" class="btn" onclick="openWin()">Cetak</a></td>
		</tr>
		</table>
	</div>
</div>