<?php require_once "../conn/config.php";
    if (isset($_GET['id_obat'])) {
        $id_obat = htmlspecialchars($_GET["id_obat"]);
        $sql = "DELETE FROM obat WHERE id_obat='$id_obat'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location:index.php");
        } else {
            echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
        }
    }
?>