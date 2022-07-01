<?php
    require '../koneksi.php';
    session_start();

    // $query = mysqli_query($konek, "SELECT * from mahasiswa");
    // //$row = mysqli_fetch_array($query);
    // $m = [];
    // while ($row = mysqli_fetch_array($query)){
    //     $m[] = $row;
    // }
    // var_dump($m);
        
    //event button cari
    // if(isset($_POST['cari'])){
    //     $mahasiswa = cari($_POST['key']);
    // }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Mahasiswa</title>
    </head>
    <body>
        <h1>List Data Mahasiswa</h1>

        <a href="../logout.php">Log Out</a> &nbsp;&nbsp;
        <a href="insert.php">Tambah Data</a>
        
        <form action="index.php" method="get">
            <label>Cari :</label>
            <input type="text" name="cari" placeholder="Isi Keyword" autocomplete="off">
            <button type="submit" value="Cari">
        </form>
        <br>
        <?php
        if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            echo "<b>Hasil pencarian : " . $cari . "</b>";
        }
        ?>
        <br><br>
        <table class="table table-hover" border="1">
            <!-- baris header -->
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Aksi</th>
            </tr>

            <?php
            if (empty($mahasiswa)){
            }
            ?>

            <?php
            if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $query = mysqli_query($konek, "select * from mahasiswa where nama like '%" . $cari . "%'");
            }else{
                $query = mysqli_query($konek, "select * from mahasiswa");
            }
            $i = 1;
            while ($row = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><img src="<?php echo '../file/'.$row['foto']; ?>" style="width: 200px; height: auto;"></td>
                <td><?php echo $row['nim']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['prodi']; ?></td>
                <td>
                    <a href="update.php?nim=<?php echo $row['nim']; ?>">Ubah</a> &nbsp;&nbsp;
                    <a href="delete.php?id=<?= $data['id'];?>" onClick="return confirm('Apakah Yakin Akan Dihapus?')">Hapus</a>
                </td>
            </tr>
                <?php
                $i++;
            }
            ?>
        </table>
    </body>
</html>