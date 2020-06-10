<?php include '../partials/header.php'; ?>
	<?php require_once "../conn/config.php";
		function input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
    	}
	
    	if (isset($_GET['id_obat'])) {
    	    $id_obat = input($_GET['id_obat']);
    	    $sql = "SELECT * FROM obat WHERE id_obat=$id_obat";
    	    $result = mysqli_query($conn, $sql);
    	    $data = mysqli_fetch_assoc($result);
    	}

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$id_obat = htmlspecialchars($_POST["id_obat"]);
			$nama_obat = input($_POST["nama_obat"]);
			$pembuat_obat = input($_POST["pembuat_obat"]);
			$stok_obat = input($_POST["stok_obat"]);
			$tanggal_kadaluarsa = input($_POST["tanggal_kadaluarsa"]);

    	    $sql = "UPDATE obat SET nama_obat = '$nama_obat',
    	                        	pembuat_obat = '$pembuat_obat',
    	                        	stok_obat = '$stok_obat',
    	                        	tanggal_kadaluarsa = '$tanggal_kadaluarsa'
    	                        	WHERE id_obat = $id_obat";
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
				<h6 class="m-0 font-weight-bold text-primary">Edit Data Obat</h6>
			</div>
			<div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type="hidden" name="id_obat" value="<?php echo $data['id_obat']; ?>" />
                    <div class="form-group">
						<label for="nama_obat">Nama Obat</label>
						<input class="form-control" id="nama_obat" name="nama_obat" type="text" value="<?php echo $data['nama_obat']; ?>">
					</div>
                    <div class="form-group">
						<label for="pembuat_obat">Pembuat Obat</label>
						<input class="form-control" id="pembuat_obat" name="pembuat_obat" type="text" value="<?php echo $data['pembuat_obat']; ?>">
					</div>
                    <div class="form-group">
						<label for="stok_obat">Stok Obat</label>
						<input class="form-control" id="stok_obat" name="stok_obat" type="number" value="<?php echo $data['stok_obat']; ?>">
					</div>
                    <div class="form-group">
						<label for="tanggal_kadaluarsa">Tanggal Kadaluarsa</label>
						<input class="form-control" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" type="date" value="<?php echo $data['tanggal_kadaluarsa']; ?>">
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Update</button>
					<button type=button value="Cancel" onClick="javascript:history.go(-1)" class="btn btn-danger">Cancel</button>
                </form>
			</div>
		</div>
	</div>				
<?php include '../partials/footer.php'; ?>		
