<?php

require_once 'connect.php';

require_once 'header.php';

echo "<div class='container'>";

if (isset($_POST['delete'])){
    $sql = "DELETE FROM datamahasiswa WHERE user_id=" . $_POST['userid'];
    if ($con->query($sql) === TRUE){
        echo "<div class='alert alert-success'>Berhasil menghapus data</div>";
    }
}

$sql = "SELECT * FROM datamahasiswa";
$result = $con->query($sql);

if($result->num_rows > 0){
?>
    <h2>Daftar Semua Data</h2>
    <table class = "table table-bordered table-striped">
        <tr>
            <td>Nama</td>
            <td>NIM</td>
            <td>Jenis Kelamin</td>
            <td>Jurusan</td>
            <td width="70px">Delete</td>
            <td width="70px">Edit</td>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()){
            echo "<form action='' method='POST'>";
            echo "<input type='hidden' value='" . $row['user_id'] . "' name='userid' />";
            echo "<tr>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['nim'] . "</td>";
            echo "<td>" . $row['jenis_kelamin'] . "</td>";
            echo "<td>" . $row['jurusan'] . "</td>";
            echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-danger' /></td>";
            echo "<td><a href='edit.php?id=" . $row['user_id'] . "' class='btn btn-info'>Edit</a></td>";
            echo "<tr>";
            echo "</form>";
        }
        ?>
    </table>
<?php                
} else {
    echo "<br><br>No Record Found";
}
?>
</div>

<?php

require_once 'footer.php'
?>