<?php include '../partials/header.php'; ?>		
    <div class="container-fluid">
    	<div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Data Pasien</h5>
                <a href="create.php" class="btn btn-success"><i class="fas fa-plus"></i></a>
    		</div>
    		<div class="card-body">
    			<div class="table-responsive">
    			    <table class='table table-bordered' id='dataTable' width='100%'' cellspacing='0'>
    			        <thead>
                            <tr>
                                <th>ID Pasien</th>
                                <th>Nama Pasien</th>
                                <th>Tanggal Lahir Pasien</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php require_once "../conn/config.php";
                                $sql = "SELECT * FROM pasien ORDER BY id_pasien ASC";
                                $result = mysqli_query($conn, $sql);
                                $inc = 0;
                                while ($data = mysqli_fetch_array($result)) {
                                $inc++;
                            ?>
                            <tr>
                                <td><?= $inc; ?></td>
                                <td><?= $data['nama_pasien']; ?></td>
                                <td><?= $data['tanggal_lahir_pasien']; ?></td>
                                <td>
                                    <a href="update.php?id_pasien=<?= htmlspecialchars($data['id_pasien']); ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="delete.php?id_pasien=<?= htmlspecialchars($data["id_pasien"]); ?>" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm('Are You Sure ?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>                    
                        </tbody> 
                    </table>
    			</div>
    		</div>
    	</div>
    </div>				
<?php include '../partials/footer.php'; ?>		
