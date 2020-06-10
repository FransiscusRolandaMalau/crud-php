<?php require_once "../conn/config.php";
    if (isset($_GET['id_transaksi'])) {
        $id_transaksi = htmlspecialchars($_GET["id_transaksi"]);
        $sql = "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location:index.php");
        } else {
            echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
        }
    }
?>