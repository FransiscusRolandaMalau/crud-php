<?php include '../partials/header.php'; ?>
	<?php require_once "../conn/config.php";
		function input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
    	}
	
    	if (isset($_GET['id_pasien'])) {
    	    $id_pasien = input($_GET['id_pasien']);
    	    $sql = "SELECT * FROM pasien WHERE id_pasien=$id_pasien";
    	    $result = mysqli_query($conn, $sql);
    	    $data = mysqli_fetch_assoc($result);
    	}

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$id_pasien = htmlspecialchars($_POST["id_pasien"]);
			$nama_pasien = input($_POST["nama_pasien"]);
			$tanggal_lahir_pasien = input($_POST["tanggal_lahir_pasien"]);

    	    $sql = "UPDATE pasien SET nama_pasien = '$nama_pasien',
    	                        	  tanggal_lahir_pasien = '$tanggal_lahir_pasien'
    	                        	  WHERE id_pasien = $id_pasien";
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
				<h6 class="m-0 font-weight-bold text-primary">Edit Data Pasien</h6>
			</div>
			<div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type="hidden" name="id_pasien" value="<?php echo $data['id_pasien']; ?>">
                    <div class="form-group">
						<label for="nama_pasien">Nama Pasien</label>
						<input class="form-control" id="nama_pasien" name="nama_pasien" type="text" value="<?php echo $data['nama_pasien']; ?>">
					</div>
                    <div class="form-group">
						<label for="tanggal_lahir_pasien">Tanggal Lahir Pasien</label>
						<input class="form-control" id="tanggal_lahir_pasien" name="tanggal_lahir_pasien" type="date" value="<?php echo $data['tanggal_lahir_pasien']; ?>">
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Update</button>
					<button type=button value="Cancel" onClick="javascript:history.go(-1)" class="btn btn-danger">Cancel</button>
                </form>
			</div>
		</div>
	</div>				
<?php include '../partials/footer.php'; ?>		
