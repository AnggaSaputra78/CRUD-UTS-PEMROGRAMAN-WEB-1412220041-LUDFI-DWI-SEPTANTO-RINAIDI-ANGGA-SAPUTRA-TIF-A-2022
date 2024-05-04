<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data Barang</title>
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
            border: 2px solid transparent;
            position: relative;
            overflow: hidden; 
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
            background: linear-gradient(to right, #ff0000, #000000); /* Gradient merah-putih */
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
        <h1 class="mb-4">Hapus Data Barang</h1
        <?php
        // Buat koneksi ke database
        $conn = mysqli_connect('localhost', 'root', '', 'ludfi_tech');

        // Periksa koneksi
        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        // Periksa apakah parameter id_barang telah diterima
        if (isset($_GET['id'])) {
            // Ambil id_barang dari parameter GET
            $id_barang = $_GET['id'];

            // Query untuk menghapus data berdasarkan id_barang
            $query = "DELETE FROM data_barang WHERE id_barang='$id_barang'";

            // Eksekusi query
            if (mysqli_query($conn, $query)) {
                // Jika penghapusan berhasil, arahkan kembali ke halaman read dengan notifikasi
                echo '<div class="alert alert-success" role="alert">';
                echo "Data berhasil dihapus. <a href='read.php' class='alert-link'>Kembali ke halaman Data Barang</a>.";
                echo '</div>';
            } else {
                // Jika terjadi kesalahan, tampilkan pesan kesalahan
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        } else {
            // Jika tidak ada id_barang yang diterima, tampilkan pesan kesalahan
            echo '<div class="alert alert-warning" role="alert">';
            echo "Tidak ada data yang dihapus. <a href='read.php' class='alert-link'>Kembali ke halaman Data Barang</a>.";
            echo '</div>';
        }

        // Tutup koneksi
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>