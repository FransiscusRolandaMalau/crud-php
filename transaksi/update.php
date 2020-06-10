<?php include '../partials/header.php'; ?>
	<?php require_once "../conn/config.php";
		function input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
    	}
	
    	if (isset($_GET['id_transaksi'])) {
    	    $id_transaksi = input($_GET['id_transaksi']);
    	    $sql = "SELECT * FROM transaksi WHERE id_transaksi=$id_transaksi";
    	    $result = mysqli_query($conn, $sql);
    	    $data = mysqli_fetch_assoc($result);
    	}

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$id_transaksi = htmlspecialchars($_POST["id_transaksi"]);
			$id_pasien = input($_POST["id_pasien"]);
			$id_obat = input($_POST["id_obat"]);
			$jumlah_transaksi = input($_POST["jumlah_transaksi"]);

    	    $sql = "UPDATE transaksi SET id_pasien = '$id_pasien',
    	                        		  id_obat = '$id_obat',
    	                        		  jumlah_transaksi = '$jumlah_transaksi'
    	                        		  WHERE id_transaksi = $id_transaksi";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				header("Location: index.php");
			} else {
				echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";
			}
		}
	?>
	<div class="container-fluid">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Edit Data Transaksi</h6>
			</div>
			<div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type="hidden" name="id_transaksi" value="<?php echo $data['id_transaksi']; ?>" />
				<div class="form-group">
						<label for="id_pasien">Nama Pasien</label>
						<select class="form-control" name="id_pasien" id="id_pasien">
							<?php $sql = "SELECT * FROM pasien"; ?>
							<?php $result = mysqli_query($conn, $sql); ?>
							<?php while($data_pasien = mysqli_fetch_array($result)) { ?>
								<option value="<?= $data_pasien['id_pasien']; ?>"
								<?php if ($data_pasien['id_pasien'] == ($data['id_pasien'])) { 
									echo 'selected';} ?> >
								<?php echo $data_pasien['nama_pasien']; ?></option>
							<?php } ?>
						</select>
					</div>
                    <div class="form-group">
						<label for="id_obat">Nama Obat</label>
						<select class="form-control" name="id_obat" id="id_obat">
							<?php $sql = "SELECT * FROM obat"; ?>
							<?php $result = mysqli_query($conn, $sql); ?>
							<?php while($data_obat = mysqli_fetch_array($result)) { ?>
								<option value="<?= $data_obat['id_obat']; ?>"
									<?php if ($data_obat['id_obat'] == ($data['id_obat'])) { 
										echo 'selected';} ?> >
								<?php echo $data_obat['nama_obat']; ?></option>
							<?php } ?>
						</select>
					</div>
                    <div class="form-group">
						<label for="jumlah_transaksi">Jumlah Transaksi</label>
						<input class="form-control" id="jumlah_transaksi" name="jumlah_transaksi" type="number" value="<?php echo $data['jumlah_transaksi']; ?>">
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Update</button>
					<button type=button value="Cancel" onClick="javascript:history.go(-1)" class="btn btn-danger">Cancel</button>
                </form>
			</div>
		</div>
	</div>				
<?php include '../partials/footer.php'; ?>