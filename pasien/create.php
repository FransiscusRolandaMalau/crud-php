<?php include '../partials/header.php'; ?>
	<?php require_once "../conn/config.php";
		function input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$nama_pasien = input($_POST["nama_pasien"]);
			$tanggal_lahir_pasien = input($_POST["tanggal_lahir_pasien"]);

			$sql = "INSERT INTO pasien (nama_pasien, tanggal_lahir_pasien) VALUES('$nama_pasien', '$tanggal_lahir_pasien')";
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
				<h6 class="m-0 font-weight-bold text-primary">Tambah Data Pasien</h6>
			</div>
			<div class="card-body">
				<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
						<label for="nama_pasien">Nama Pasien</label>
						<input class="form-control" id="nama_pasien" name="nama_pasien" type="text">
					</div>
                    <div class="form-group">
						<label for="tanggal_lahir_pasien">Tanggal Lahir Pasien</label>
						<input class="form-control" id="tanggal_lahir_pasien" name="tanggal_lahir_pasien" type="date">
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Create</button>
					<button type=button value="Cancel" onClick="javascript:history.go(-1)" class="btn btn-danger">Cancel</button>
                </form>
			</div>
		</div>
	</div>				
<?php include '../partials/footer.php'; ?>		
