<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nim = $_POST['nim'];

  // Lakukan validasi data jika diperlukan

  // Lakukan permintaan DELETE untuk menghapus data mahasiswa
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost:8080/mahasiswa/' . $nim,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => 'DELETE',
  ));

  $response = curl_exec($curl);
  $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  curl_close($curl);

  if ($response === false) {
    echo "Error: " . curl_error($curl);
  } elseif ($httpCode != 200) {
    echo "HTTP Error: " . $httpCode;
  } else {
    // Redirect ke halaman index.php setelah berhasil menghapus data
    header('Location: home.php');
    exit();
  }
} else {
  echo "Invalid request.";
}
?>