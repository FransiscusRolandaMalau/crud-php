<?php include '../partials/header.php'; ?>		
    <div class="container-fluid">
    	<div class="card shadow mb-4">
    		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Data Obat</h5>
                <a href="create.php" class="btn btn-success"><i class="fas fa-plus"></i></a>
    		</div>
            <div class="card-body">
              <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  			            <thead>
                            <tr>
                                <th>ID Obat</th>
                                <th>Nama Obat</th>
                                <th>Pembuat Obat</th>
                                <th>Stok Obat</th>
                                <th>Tanggal Kadaluarsa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php require_once "../conn/config.php";
                                $sql = "SELECT * FROM obat ORDER BY id_obat ASC";
                                $result = mysqli_query($conn, $sql);
                                $inc = 0;
                                while ($data = mysqli_fetch_array($result)) {
                                $inc++;
                            ?>
                            <tr>
                                <td><?= $inc; ?></td>
                                <td><?= $data['nama_obat']; ?></td>
                                <td><?= $data['pembuat_obat']; ?></td>
                                <td><?= $data['stok_obat']; ?></td>
                                <td><?= $data['tanggal_kadaluarsa']; ?></td>
                                <td>
                                    <a href="update.php?id_obat=<?= htmlspecialchars($data['id_obat']); ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="delete.php?id_obat=<?= htmlspecialchars($data["id_obat"]); ?>" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm('Are You Sure ?')"><i class="fas fa-trash"></i></a>
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
