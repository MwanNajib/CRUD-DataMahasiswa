<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost:8080/mahasiswa/' . $_POST["nim"],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => 'DELETE',
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