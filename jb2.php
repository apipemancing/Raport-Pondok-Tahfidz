<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raport Santri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .siswa-container {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .siswa-info {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .nilai-info {
            margin-left: 20px;
        }

        .string-info {
            font-style: italic;
            color: #555;
            margin-left: 10px;
        }

        .status-akhir {
            margin-top: 10px;
            font-weight: bold;
            color: green; /* Warna untuk status lulus */
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
        }
    </style>
</head>
<body>

    <h1>RAPORT SANTRI</h1>

    <?php

    // Fungsi untuk menentukan status kelulusan berdasarkan nilai dan KKM
    function cekKelulusan($nilai, $kkm) {
        if ($nilai >= $kkm) {
            return "LULUS";
        } else {
            return "TIDAK LULUS";
        }
    }

    // Data siswa dan nilai
    $siswa = array(
        "Fulan" => array("Nilai1" => 146, "KKM1" => 100, "Nilai2" => 34, "KKM2" => 25, "String1" => "Mudah menghafal dan lancar murajaahnya", "String2" => "Mudah menghafal dan lancar murajaahnya"),
        "Falun" => array("Nilai1" => 89, "KKM1" => 100, "Nilai2" => 45, "KKM2" => 25, "String1" => "Lumayan mudah menghafal dan lumayan lancar murajaahnya,ditingkatkan lagi", "String2" => "Mudah menghafal dan lancar murajaahnya"),
        "Faulun" => array("Nilai1" => 120, "KKM1" => 100, "Nilai2" => 14, "KKM2" => 25, "String1" => "Mudah menghafal dan lancar murajaahnya", "String2" => "Lumayan mudah menghafal dan lumayan lancar murajaahnya,ditingkatkan lagi"),
        "Fualun" => array("Nilai1" => 78, "KKM1" => 100, "Nilai2" => 22, "KKM2" => 25, "String1" => "Lumayan mudah menghafal dan lumayan lancar murajaahnya,ditingkatkan lagi", "String2" => "Lumayan mudah menghafal dan lumayan lancar murajaahnya,ditingkatkan lagi"),
        // Tambahkan data siswa lainnya sesuai kebutuhan
    );

    echo '<div class="siswa-container">';
    
    foreach ($siswa as $nama => $nilaiSiswa) {
        echo "<div class='siswa-info'>Nama Santri: $nama</div>";

        $lulus1 = $nilaiSiswa["Nilai1"] >= $nilaiSiswa["KKM1"];
        $lulus2 = $nilaiSiswa["Nilai2"] >= $nilaiSiswa["KKM2"];

        for ($i = 1; $i <= 2; $i++) {
            $nilai = $nilaiSiswa["Nilai$i"];
            $kkm = $nilaiSiswa["KKM$i"];
            $status = cekKelulusan($nilai, $kkm);
            $stringDeskripsi = $nilaiSiswa["String$i"];

            // Menambahkan kata "lembar" atau "hadist" berdasarkan nilai dan KKM
            $keterangan = ($i == 1) ? " lembar" : " hadist";
            
            echo "<div class='nilai-info'>Nilai $i: $nilai$keterangan, KKM $i: $kkm$keterangan, Status: $status<span class='string-info'>$stringDeskripsi</span></div>";
        }

        $statusAkhir = ($lulus1 || $lulus2) ? "LULUS" : "TIDAK LULUS";
        $warnaStatusAkhir = ($lulus1 || $lulus2) ? "green" : "red";

        echo "<div class='status-akhir' style='color: $warnaStatusAkhir;'>Status Akhir: $statusAkhir</div><br>";
    }

    echo '</div>';

    ?>

    <div class="footer">
        RAPORT SELESAI
    </div>

</body>
</html>
