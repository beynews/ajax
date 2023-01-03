<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     <style>
                
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    form {
      width: 400px;
      margin: 0 auto;
      background-color: #dddddd;
      border: 1px solid #ddd;
      padding: 20px;
      box-sizing: border-box;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-size: 16px;
      color: #666;
    }

    input[type="text"],
    input[type="tel"],
    input[type="email"],
    textarea,
    select {
      width: 100%;
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 8px;
      box-sizing: border-box;
      font-size: 16px;
    }

    input[type="radio"],
    input[type="submit"] {
      cursor: pointer;
    }

    input[type="submit"] {
      width: 100%;
      background-color: #333;
      color: #fff;
      border: 0;
      border-radius: 4px;
      padding: 12px;
      font-size: 18px;
    }

    input[type="submit"]:hover {
      background-color: #555;
    }
  </style>
    </head>
    
    <body>
        <br>
        <div class="container">
            <h2 class="alert alert-success text-center">
               Data Mahasantri Islamic Digital Boarding College
            </h2>
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <form id="form-input">
    <label for="nama">Nama:</label><br>
    <input type="text" id="nama" name="nama"><br>
    <br>
    <label for="jeniskelamin">Jenis Kelamin:</label><br>
    <input type="radio" id="laki-laki" name="jeniskelamin" value="laki-laki">
    <label for="laki-laki">Laki-laki</label><br>
    <input type="radio" id="perempuan" name="jeniskelamin" value="perempuan">
    <label for="perempuan">Perempuan</label><br>
    <br>
    <label for="alamat">Alamat:</label><br>
    <textarea id="alamat" name="alamat"></textarea><br>
    <br>
    <label for="agama">Agama:</label><br>
    <select id="agama" name="agama">
      <option value="islam">Islam</option>
      <option value="kristen">Kristen</option>
      <option value="katolik">Katolik</option>
      <option value="hindu">Hindu</option>
      <option value="budha">Budha</option>
    </select>
    <br><br>
    <label for="nohp">Nomor Telepon:</label><br>
    <input type="tel" id="nohp" name="nohp"><br>
    <br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br>
    <br>
    <label for="foto">Masukan Foto:</label><br>
    <input type="text" id="foto" name="foto"><br>
    <br>
   
                                <button type="submit" id="tombol-simpan" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div id="tabeldata">
                    
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>
    
        <script>
            $(document).ready(function () {
                update();
            });
            $("#tombol-simpan").click(function () {
                //validasi form
                $('#form-input').validate({
                    rules: {
                        nama: {
                            required: true
                        },
                        jeniskelamin: {
                            required: true
                        },
                        alamat: {
                            required: true
                        },
                        agama: {
                            required: true
                        },
                        nohp: {
                            required: true
                        },
                        email: {
                            required: true
                        },
                        foto: {
                            required: true
                        }
                    },
                    //jika validasi sukses maka lakukan
                    submitHandler: function (form) {
                        $.ajax({
                            type: 'POST',
                            url: "simpan.php",
                            data: $('#form-input').serialize(),
                            success: function () {
                                //setelah simpan data, update data terbaru
                                update()
                            }
                        });
                        //kosongkan form nama dan jurusan
                        document.getElementById("nama").value = "";
                        document.getElementById("jeniskelamin").value = "";
                        document.getElementById("alamat").value = "";
                        document.getElementById("agama").value = "";
                        document.getElementById("nohp").value = "";
                        document.getElementById("email").value = "";
                        document.getElementById("foto").value = "";
                        return false;
                    }
                });
            });
    
            //fungsi tampil data
            function update() {
                $.ajax({
                    url: 'datamahasantri.php',
                    type: 'get',
                    success: function(data) {
                        $('#tabeldata').html(data);
                    }
                });
            }
        </script>
    </body>
    
    </html>