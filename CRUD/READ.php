<?php
// Buat koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'ludfi_tech');

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk mendapatkan semua data barang
$query = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $query);

// Tutup koneksi
mysqli_close($conn);
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
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
                -webkit-text-fill-color: white; /* Untuk membuat teks menjadi transparan */
            }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: transparent; /* Form transparan */
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

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: rgba(255, 255, 255, 0.5); /* Warna latar belakang transparan */
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        button[type="submit"]:last-child {
            margin-right: 0;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        footer {
            text-align: center;
            margin-top: 20px;
        }
        .navbar-brand {
            color: #ff0000 !important; /* Warna teks merah */
            text-align: left; /* Rata kiri */
            animation: colorChange 3s infinite alternate; /* Animasi berubah warna */
        }

        @keyframes colorChange {
            0%, 100% {
                color: #ff0000; /* Warna teks merah */
            }
            50% {
                color: #000000; /* Warna teks hitam */
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
        <h1 class="mb-4">Data Barang</h1>
        <table class="table">
            <thead>
            <tr>
                    <th scope="col">NO Barang</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Tanggal Masuk</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Tampilkan data setiap barang
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id_barang'] . "</td>";
                    // Pastikan untuk memeriksa keberadaan indeks sebelum mengaksesnya
                    echo "<td>" . $row['jenis_barang'] . "</td>";
                    echo "<td>" . $row['deskripsi'] . "</td>";
                    echo "<td>" . $row['stok'] . "</td>";
                    echo "<td>" . $row['tanggal_masuk'] . "</td>";
                    // Tambahkan tombol untuk delete dan update
                    echo "<td>";
                    echo "<a href='DELETE.php?id=" . $row['id_barang'] . "' class='btn btn-danger'>Delete</a>";
                    echo "<a href='update.php?id=" . $row['id_barang'] . "' class='btn btn-primary'>Update</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="create.php" class="btn btn-success mb-3">Tambah Data Barang</a>
    </div>
</body>
</html>