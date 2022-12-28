<table class="table table-striped">
    <thead>
        <style>
           table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  width: 100px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

.table-striped tbody tr:nth-of-type(odd) {
  background-color: #f9f9f9;
}   
            </style>
                <tr>
                    <th scope="col"> No</th>
                    <th scope="col"> Nama</th>
                    <th scope="col"> Jenkel</th>
                    <th scope="col"> Alamat</th>
                    <th scope="col"> Agama</th>
                    <th scope="col"> No Hp</th>
                    <th scope="col"> email</th>
                    <th scope="col"> Foto</th>
                    <th scope="col"> Menu</th>
    </thead>
    <tbody>
        <?php
            include "koneksi.php";
            $no=1;
            $query=mysqli_query($connect, "SELECT * FROM `data_siswa` ");
            while ($result=mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td>
                        <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $result['nama']; ?>
                        </td>
                        <td>
                            <?php echo $result['jeniskelamin']; ?>
                        </td>
                        <td>
                            <?php echo $result['alamat']; ?>
                        </td>
                        <td>
                            <?php echo $result['agama']; ?>
                        </td>
                        <td>
                            <?php echo $result['nohp']; ?>
                        </td>
                        <td>
                            <?php echo $result['email']; ?>
                        </td>
                        <td>
                            <?php echo "<img src='gambar/$result[foto]' width=50>"; ?>
                        </td>
                        <td>
                        <button class="btn btn-danger rounded-3" data-id="<?php echo $result['id']; ?>">Hapus</button>
                     </td>
                    </tr>
                <?php
            }
        ?>
    </tbody>
</table>
<script>
   $(document).ready(function(){
      $("button.btn-danger").click(function(){
         var id = $(this).attr("data-id");
         if(confirm("Anda yakin akan menghapus data ini?")){
            $.ajax({
               url: 'delete.php',
               type: 'get',
               data: 'id=' + id,
               success: function(data){
                  update();
               }
            });
         }
         return false;
      });
   });
</script>
