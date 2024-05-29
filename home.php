<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bg.css">
    <title>Data Mahasiswa</title>
</head>

<body>
    <table class="table table-bordered">
        <h1>Data Mahasiswa</h1>
        <form action="tambah_data_mahasiswa.php">
            <button class="tambah-button" type="submit">Tambah Data</button>
        </form>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Angkatan</th>
            <th>Semester</th>
            <th>IPK</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
        <?php
        $curl = curl_init();

        // Set the cURL options
        curl_setopt($curl, CURLOPT_URL, 'http://localhost:8080/mahasiswa/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // Execute the cURL request
        $response = curl_exec($curl);

        // Check for cURL errors
        if (curl_errno($curl)) {
            echo 'HTTP Error: ' . curl_error($curl);
        } else {
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if ($httpCode !== 200) {
                echo 'HTTP Error: ' . $httpCode;
            } else {
                // Response is successful, process the data
                $data = json_decode($response, true);
                if (isset($data['status']) && $data['status'] === 'success' && isset($data['data'])) {
                    // Process the data array
                    foreach ($data['data'] as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['nim'] . '</td>';
                        echo '<td>' . $item['nama'] . '</td>';
                        echo '<td>' . $item['angkatan'] . '</td>';
                        echo '<td>' . $item['semester'] . '</td>';
                        echo '<td>' . $item['IPK'] . '</td>';
                        echo '<td>' . $item['email'] . '</td>';
                        echo '<td>' . $item['telepon'] . '</td>';
                        echo "<td><a class='edit-button' href=\"edit_data_mahasiswa.php?nim=" . $item['nim'] . "\">Edit</a></td>";
                        echo "<td>";
                        echo "<form action='hapus_data_mahasiswa.php' method='POST'>";
                        echo "<input type='hidden' name='nim' value='" . $item['nim'] . "'>";
                        echo "<input type='submit' class='delete-button' value='Hapus'>";
                        echo "</form>";
                        echo "</td>";
                        echo '</tr>';
                    }
                } else {
                    echo 'Invalid API response.';
                }
            }
        }

        // Close the cURL handle
        curl_close($curl);
        ?>
    </table>
</body>

</html>