<?php require_once "../conn/config.php";
    if (isset($_GET['id_pasien'])) {
        $id_pasien = htmlspecialchars($_GET["id_pasien"]);
        $sql = "DELETE FROM pasien WHERE id_pasien='$id_pasien'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location:index.php");
        } else {
            echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
        }
    }
?>