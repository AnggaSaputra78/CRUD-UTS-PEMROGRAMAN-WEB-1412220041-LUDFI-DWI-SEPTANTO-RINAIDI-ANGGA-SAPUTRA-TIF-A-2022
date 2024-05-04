<?php
$host = 'localhost';
$username = 'root';
$password = ''; 
$dbname = 'ludfi_tech';


$conn = mysqli_connect($host, $username, $password, $dbname);


if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari formulir dan hindari serangan SQL injection
    $id_barang = mysqli_real_escape_string($conn, $_POST["id_barang"]);
    $jenis_barang = mysqli_real_escape_string($conn, $_POST['jenis_barang']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $stok = mysqli_real_escape_string($conn, $_POST['stok']);
    $tanggal_masuk = mysqli_real_escape_string($conn, $_POST['tanggal_masuk']);

    // Query untuk menyimpan data ke dalam tabel
    $query = "INSERT INTO data_barang (id_barang, jenis_barang, deskripsi, stok, tanggal_masuk) 
              VALUES ('$id_barang', '$jenis_barang', '$deskripsi', '$stok', '$tanggal_masuk')";
    
    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        // Redirect ke halaman read.php setelah data disimpan
        header("Location: read.php");
        exit;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data Barang</title>
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
            color: #fff;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: linear-gradient(to right, #ff0000, #000000);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 2px solid transparent;
            position: relative; 
            overflow: hidden;
        }
        .container::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            border: 2px solid;
            border-radius: 8px;
            background: linear-gradient(to right, #ff0000, #000000);
            z-index: -1; 
            animation: animate 4s linear infinite;
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
        <h1 class="mb-4">Form Input Data Barang</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-3">
                <label for="id_barang" class="form-label">NO barang</label>
                <input type="text" class="form-control" id="id_barang" name="id_barang">
            </div>
            <div class="mb-3">
                <label for="jenis_barang" class="form-label">Jenis Barang</label>
                <select class="form-select" id="jenis_barang" name="jenis_barang">
                    <option value=""></option>
                    <option value="keyboard">Keyboard</option>
                    <option value="monitor">Monitor</option>
                    <option value="headset">Headset</option>
                    <option value="mouse">Mouse</option>
                    <option value="kursi">Kursi</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi">
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok">
            </div>
            <div class="mb-3">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="submit" class="btn btn-danger" name="delete">Batal</button>
            </div>
        </form>
    </div>
</body>
</html>
