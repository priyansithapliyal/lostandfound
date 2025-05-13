<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["itemName"];
    $details = $_POST["itemDetails"];
    $image = $_FILES["itemImage"]["name"];
    $target = "uploads/" . basename($image);

    if (move_uploaded_file($_FILES["itemImage"]["tmp_name"], $target)) {
        $entry = ["name" => $name, "details" => $details, "image" => $image];
        $data = json_decode(file_get_contents("data.json"), true);
        $data[] = $entry;
        file_put_contents("data.json", json_encode($data));
        header("Location: index.html");
    } else {
        echo "Image upload failed.";
    }
}
?>
