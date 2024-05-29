<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $angkatan = $_POST['angkatan'];
  $semester = $_POST['semester'];
  $IPK = $_POST['IPK'];
  $email = $_POST['email'];
  $telepon = $_POST['telepon'];

  // Lakukan validasi data jika diperlukan

  // Lakukan permintaan PUT untuk memperbarui data mahasiswa
  $curl = curl_init();

  $data = array(
    'nama' => $nama,
    'angkatan' => $angkatan,
    'semester' => $semester,
    'IPK' => $IPK,
    'email' => $email,
    'telepon' => $telepon
  );

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost:8080/mahasiswa/' . $nim,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => 'PUT',
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
  ));

  $response = curl_exec($curl);
  $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  curl_close($curl);

  if ($response === false) {
    echo "Error: " . curl_error($curl);
  } elseif ($httpCode != 200) {
    echo "HTTP Error: " . $httpCode;
  } else {
    // Redirect ke halaman home.php setelah berhasil mengedit data
    header('Location: home.php?nim=' . $nim);
    exit();
  }
} else {
  echo "Invalid request.";
}
?>