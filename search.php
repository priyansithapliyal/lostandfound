<?php
$data = json_decode(file_get_contents("data.json"), true);
$q = strtolower($_GET["q"] ?? "");
$results = [];

foreach ($data as $item) {
    if (strpos(strtolower($item["name"]), $q) !== false || strpos(strtolower($item["details"]), $q) !== false) {
        $results[] = $item;
    }
}

header("Content-Type: application/json");
echo json_encode($results);
?>
