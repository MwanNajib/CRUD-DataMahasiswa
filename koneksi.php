<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost:8080/mahasiswa/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode(
      array(
        "nim" => $_POST["nim"],
        "nama" => $_POST["nama"],
        "angkatan" => $_POST["angkatan"],
        "semester" => $_POST["semester"],
        "IPK" => $_POST["ipk"],
        "email" => $_POST["email"],
        "telepon" => $_POST["telepon"]
      )
    ),
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json'
    ),
  )
  );

  $response = curl_exec($curl);

  if ($response === false) {
    echo "Error: " . curl_error($curl);
  } else {
    echo $response;
    header("Location: home.php");
  }

  curl_close($curl);
}
?>