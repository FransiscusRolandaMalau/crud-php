<?php include '../partials/header.php'; ?>		
    <div class="container-fluid">
    	<div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Data Transaksi</h5>
                <a href="create.php" class="btn btn-success"><i class="fas fa-plus"></i></a>
    		</div>
    		<div class="card-body">
    			<div class="table-responsive">
    			    <table class='table table-bordered' id='dataTable' width='100%'' cellspacing='0'>
    			        <thead>
                            <tr>
                                <th>ID Transaksi</th>
                                <th>ID Pasien</th>
                                <th>ID Obat</th>
                                <th>Jumlah Transaksi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php require_once "../conn/config.php";
                                $sql = "SELECT t.id_transaksi,
                                               p.id_pasien,
                                               o.id_obat,
                                               t.jumlah_transaksi
                                        FROM transaksi t
                                        INNER JOIN pasien p ON t.id_obat = p.id_pasien
	                                    INNER JOIN obat o ON t.id_obat = o.id_obat
                                        ORDER BY t.id_transaksi ASC";
                                $result = mysqli_query($conn, $sql);
                                $inc = 0;
                                while ($data = mysqli_fetch_array($result)) {
                                $inc++;
                            ?>
                            <tr>
                                <td><?= $inc; ?></td>
                                <td><?= $data['id_pasien']; ?></td>
                                <td><?= $data['id_obat']; ?></td>
                                <td><?= $data['jumlah_transaksi']; ?></td>
                                <td>
                                    <a href="update.php?id_transaksi=<?= htmlspecialchars($data['id_transaksi']); ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="delete.php?id_transaksi=<?= htmlspecialchars($data["id_transaksi"]); ?>" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm('Are You Sure ?')"><i class="fas fa-trash"></i></a>
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
