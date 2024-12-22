<?php
// Koneksi ke database
require 'db_connection.php'; // File koneksi database

// API Key TomTom
$apiKey = "YOUR_API_KEY";

// Koordinat pengguna (latitude dan longitude)
$userLatitude = -7.7904;
$userLongitude = 110.4040;

// Ambil pekerja dengan status "ready" dari database
$query = "SELECT id, name, latitude, longitude FROM workers WHERE status = 'ready'";
$stmt = $pdo->prepare($query);
$stmt->execute();
$workers = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Format data untuk TomTom API
$origins = [["point" => ["latitude" => $userLatitude, "longitude" => $userLongitude]]];
$destinations = [];

foreach ($workers as $worker) {
    $destinations[] = [
        "point" => [
            "latitude" => $worker['latitude'],
            "longitude" => $worker['longitude']
        ]
    ];
}

// Kirim permintaan ke TomTom Matrix API
$url = "https://api.tomtom.com/routing/1/matrix/sync/json?key=$apiKey";

$requestData = [
    "origins" => $origins,
    "destinations" => $destinations,
    "routeType" => "fastest",
    "travelMode" => "car"
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    die("Error: " . curl_error($ch));
}

curl_close($ch);

// Decode respons JSON dari TomTom API
$responseData = json_decode($response, true);

if (isset($responseData['matrix']) && count($responseData['matrix']) > 0) {
    $distances = [];

    // Ambil jarak dari respons API dan gabungkan dengan data pekerja
    foreach ($responseData['matrix'] as $index => $matrix) {
        if ($matrix['statusCode'] == 200) {
            $distances[] = [
                "id" => $workers[$index]['id'],
                "name" => $workers[$index]['name'],
                "distance" => $matrix['response']['routeSummary']['lengthInMeters']
            ];
        }
    }

    // Urutkan berdasarkan jarak terdekat
    usort($distances, function ($a, $b) {
        return $a['distance'] - $b['distance'];
    });

    // Ambil top 5 pekerja terdekat
    $topWorkers = array_slice($distances, 0, 5);

    // Tampilkan hasil
    echo "<h3>Top 5 Pekerja Terdekat:</h3>";
    foreach ($topWorkers as $worker) {
        echo "<p>Pekerja: {$worker['name']}, Jarak: {$worker['distance']} meter</p>";
    }
} else {
    echo "Gagal menghitung jarak dari API TomTom.";
}
?>
