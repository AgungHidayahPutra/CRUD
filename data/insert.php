<?php

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
    <?php

    if(isset($_POST['addnew'])){

        if(empty($_POST['nama']) || empty($_POST['nim']) || empty($_POST['jenis_kelamin']) || empty($_POST['jurusan'])){
           echo "Please fillout all required fields";     
        } else {
            $nama          = $_POST['nama'];
            $nim           = $_POST['nim'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $jurusan       = $_POST['jurusan'];
            $sql = "INSERT INTO datamahasiswa(nama,nim,jenis_kelamin,jurusan)
            VALUES('$nama','$nim','$jenis_kelamin','$jurusan')";

            if ($con->query($sql) === TRUE) {
            echo "<div class=alert alert-success'>Berhasil menambahkan data baru</div>";
            } else {
            echo "<div class=alert alert-danger'>Error: There was an error while adding new user</div>";
            }
        }
        
    }
    ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box">
                <h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Tambah Data Baru</h3>
                <form action="" method="POST">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control"><br>
                    <label for="nim">NIM</label>
                    <input type="text" id="nim" name="nim" class="form-control"><br>
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control"><br>
                    <label for="jurusan">Jurusan</label>
                    <input type="text" id="jurusan" name="jurusan" class="form-control"><br>
                    <br>
                    <input type="submit" name="addnew" class="btn btn-success" value="Add New">
                </form>
            </div>
        </div>
    </div>
</div>

<?php

require_once 'footer.php';
?>