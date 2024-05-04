<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('_d2926cc0-a54b-4de8-8d3f-6420a62575ce.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: white; /* Warna teks */
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background:linear-gradient(to right, #ff0000, #000000); 
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 2px solid transparent; /* Garis tepi transparan */
            position: relative; /* Untuk menempatkan animasi */
            overflow: hidden; /* Mengatur animasi ke dalam konten */
        }

        /* Animasi garis tepi */
        .container::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            border: 2px solid;
            border-radius: 8px;
            z-index: -1; /* Menempatkan di bawah konten */
            animation: animate 4s linear infinite; /* Animasi garis tepi */
        }

        @keyframes animate {
            0% {
                background-position: 0% 50%;
            }
            100% {
                background-position: 100% 50%;
            }
        }
    </style>
</head>

<body>
<nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Ludfi Tech</span>
            <span class="ms-auto">
            <a href="create.php" class="btn btn-outline-light me-2">Buat Data</a>
            <a href="read.php" class="btn btn-outline-light me-2">Baca Data</a>
            <a href="update.php" class="btn btn-outline-light me-2">Edit Data</a>
            <a href="delete.php" class="btn btn-outline-light me-2">Hapus Data</a>
        </span>
        </div>
    </nav>
    <div class="container">
        <form method="POST">
            <input type="hidden" name="id_barang" value="<?php echo isset($data['id_barang']) ? $data['id_barang'] : ''; ?>">
            <div class="mb-3">
                <label for="id_barang" class="form-label">ID Barang</label>
                <input type="text" class="form-control" id="id_barang" name="id_barang" value="<?php echo isset($data['id_barang']) ? $data['id_barang'] : ''; ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="jenis_barang" class="form-label">Jenis Barang</label>
                <select class="form-select" id="jenis_barang" name="jenis_barang">
                    <?php
                    // Tentukan pilihan jenis barang
                    $jenis_barang_options = ['keyboard', 'monitor', 'headset', 'mouse', 'kursi ergonomis'];

                    // Loop untuk membuat opsi select
                    foreach ($jenis_barang_options as $option) {
                        $selected = (isset($data['jenis_barang']) && $data['jenis_barang'] == $option) ? "selected" : "";
                        echo "<option value='$option' $selected>$option</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo isset($data['deskripsi']) ? $data['deskripsi'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" value="<?php echo isset($stok) ? $stok : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="<?php echo isset($data['tanggal_masuk']) ? $data['tanggal_masuk'] : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="read.php" class="btn btn-secondary">Batal</a>
            <a href="read.php" class="btn btn-info">Kembali ke Data</a>
        </form>
    </div>
</body>

</html>