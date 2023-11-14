<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input PHP</title>
</head>
<body>

<?php
// Fungsi untuk menghitung umur berdasarkan tanggal lahir
function hitungUmur($tanggal_lahir) {
    $tanggal_lahir = new DateTime($tanggal_lahir);
    $sekarang = new DateTime();
    $umur = $sekarang->diff($tanggal_lahir);
    return $umur->y;
}

// Fungsi untuk menentukan gaji berdasarkan pekerjaan
function hitungGaji($pekerjaan) {
    switch ($pekerjaan) {
        case 'Pegawai':
            return 5000000; // Gaji pegawai
        case 'Manager':
            return 10000000; // Gaji manager
        case 'CEO':
            return 20000000; // Gaji CEO
        default:
            return 0; // Pekerjaan tidak dikenali
    }
}

// Proses form jika sudah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = $_POST["nama"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $pekerjaan = $_POST["pekerjaan"];

    // Hitung umur menggunakan fungsi hitungUmur
    $umur = hitungUmur($tanggal_lahir);

    // Hitung gaji menggunakan fungsi hitungGaji
    $gaji = hitungGaji($pekerjaan);

    // Tampilkan output
    echo "<h2>Hasil Input:</h2>";
    echo "<p>Nama: $nama</p>";
    echo "<p>Tanggal Lahir: $tanggal_lahir</p>";
    echo "<p>Umur: $umur tahun</p>";
    echo "<p>Pekerjaan: $pekerjaan</p>";
    echo "<p>Gaji: Rp " . number_format($gaji, 0, ',', '.') . "</p>";
}
?>

<h2>Form Input</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="nama">Nama:</label>
    <input type="text" name="nama" required><br>

    <label for="tanggal_lahir">Tanggal Lahir:</label>
    <input type="date" name="tanggal_lahir" required><br>

    <label for="pekerjaan">Pekerjaan:</label>
    <select name="pekerjaan" required>
        <option value="Pegawai">Pegawai</option>
        <option value="Manager">Manager</option>
        <option value="CEO">CEO</option>
    </select><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>
