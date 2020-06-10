<?php include '../partials/header.php'; ?>
	<?php require_once "../conn/config.php";
		function input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$id_pasien = input($_POST["id_pasien"]);
			$id_obat = input($_POST["id_obat"]);
			$jumlah_transaksi = input($_POST["jumlah_transaksi"]);

			$sql = "INSERT INTO transaksi (id_pasien, id_obat, jumlah_transaksi) VALUES('$id_pasien', '$id_obat', '$jumlah_transaksi')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				header("Location: index.php");
			} else {
				echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
			}
		}
	?>
	<div class="container-fluid">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Tambah Data Transaksi</h6>
			</div>
			<div class="card-body">
				<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
						<label for="id_pasien">Nama Pasien</label>
						<select class="form-control" name="id_pasien" id="id_pasien">
							<option value="" disabled selected>Pilih Pasien</option>
							<?php
								$sql = "SELECT * FROM pasien";
								$result = mysqli_query($conn, $sql);
								while($data = mysqli_fetch_array($result)) {
									echo " <option value=$data[id_pasien]>$data[nama_pasien]</option>";
								}
							?>
						</select>
					</div>
                    <div class="form-group">
						<label for="id_obat">Nama Obat</label>
						<select class="form-control" name="id_obat" id="id_obat">
							<option value="" disabled selected>Pilih Pasien</option>
								<?php
									$sql = "SELECT * FROM obat";
									$result = mysqli_query($conn, $sql);
									while($data = mysqli_fetch_array($result)) {
										echo " <option value=$data[id_obat]>$data[nama_obat] </option>";
									}
								?>
						</select>
					</div>
                    <div class="form-group">
						<label for="jumlah_transaksi">Jumlah Transaksi</label>
						<input class="form-control" id="jumlah_transaksi" name="jumlah_transaksi" type="number">
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Create</button>
					<button type=button value="Cancel" onClick="javascript:history.go(-1)" class="btn btn-danger">Cancel</button>
                </form>
			</div>
		</div>
	</div>				
<?php include '../partials/footer.php'; ?>		
