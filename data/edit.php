<?php

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
    <?php

    if(isset($_POST['update'])){

        if (
            empty($_POST['nama']) || empty($_POST['nim']) ||
            empty($_POST['jenis_kelamin']) || empty($_POST['jurusan'])
        ) {
            echo "Please fillout all required fields";
        } else {
            $nama = $_POST['nama'];
            $nim  = $_POST['nim'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $jurusan = $_POST['jurusan'];
            $sql = "UPDATE datamahasiswa SET nama='{$nama}', nim='{$nim}',
                    jenis_kelamin='{$jenis_kelamin}', jurusan='{$jurusan}'
                    WHERE user_id=" . $_POST['userid'];

            if($con->query($sql) === TRUE){
                echo "<div class=alert alert-success'>Successfully updated user</div>";
            } else{
                echo "<div class=alert alert-danger'>Error: There was an error while updating user info</div>";
            }
        }
    }
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    $sql = "SELECT * FROM datamahasiswa WHERE user_id={$id}";
    $result = $con->query($sql);

    if($result->num_rows < 1){
        header('Location: index.php');
        exit;
    }
    $row = $result->fetch_assoc();
    ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box">
                <h3><i class="glyphicon glyphicon-plus"></i>&nbsp;MODIFY User</h3>
                <form action="" method="POST">
                    <input type="hidden" value="<?php echo $row['user_id']; ?>" name="userid">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" class="form-control"><br>
                    <label for="nim">NIM</label>
                    <input type="text" id="nim" name="nim" value="<?php echo $row['nim']; ?>" class="form-control"><br>
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <input type="text" id="jenis_kelamin" name="jenis_kelamin" value="<?php echo $row['jenis_kelamin']; ?>" class="form-control"><br>
                    <label for="jurusan">Jurusan</label>
                    <input type="text" id="jurusan" name="jurusan" value="<?php echo $row['jurusan']; ?>" class="form-control"><br>
                    <br>
                    <input type="submit" name="update" class="btn btn-success" value="Update">
                </form>
            </div>
        </div>
    </div>
</div>

<?php

require_once 'footer.php';
?>