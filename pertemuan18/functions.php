<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// Fungsi untuk menjalankan query dan mengambil data
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Fungsi untuk menambahkan data
function tambah($data) {
    global $conn;

    // Ambil data dari form
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // Upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // Query insert data
    $query = "INSERT INTO mahasiswa VALUES ('', '$nrp', '$nama', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Fungsi untuk menghapus data
function hapus($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// Fungsi untuk mengupload file gambar
function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Cek apakah ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
            alert('Pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }

    // Validasi ekstensi file
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = strtolower(end(explode('.', $namaFile)));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('Yang Anda upload bukan gambar!');
        </script>";
        return false;
    }

    // Validasi ukuran file
    if ($ukuranFile > 1000000) {
        echo "<script>
            alert('Ukuran gambar terlalu besar!');
        </script>";
        return false;
    }

    // Generate nama file baru untuk mencegah duplikasi
    $namaFileBaru = uniqid();
    $namaFileBaru .='.';
    $namaFileBaru .= $ekstensiGambar;
    var_dump($namaFileBaru); die;

    // Pindahkan file ke folder tujuan
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

// Fungsi untuk mengubah data
function ubah($data) {
    global $conn;

    $id = $data["id"];
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // Cek apakah user mengganti gambar baru
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    // Query update data
    $query = "UPDATE mahasiswa SET
                nrp = '$nrp',
                nama = '$nama',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
              WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Fungsi untuk mencari data
function cari($keyword) {
    $query = "SELECT * FROM mahasiswa
              WHERE
              nama LIKE '%$keyword%' OR
              nrp LIKE '%$keyword%' OR
              email LIKE '%$keyword%' OR
              jurusan LIKE '%$keyword%'";

    return query($query);
}


function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes ($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if( mysqli_fetch_assoc ($result) ) {
        echo "<script>
        alert('username sudah terdaftar!')
        </script>";
        return false;
    }

    if( $password !== $password2 ) {
        echo "<script>
        alert ('konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password' )" );

    return mysqli_affected_rows($conn);
}





?>
