<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "shoppingcart";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $estimated = $_POST['estimated'];

    // upload foto
    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $img_dir = 'C:/xampp/htdocs/ArtGallery/images/';
        $img_filename = uniqid('piece_') . '.jpg';
        $img_path = $img_dir . $img_filename;

        if (move_uploaded_file($_FILES['img']['tmp_name'], $img_path)) {
            $sql = "INSERT INTO pieces (name, description, price, img, estimated) VALUES (:name, :description, :price, :img, :estimated)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':img', $img_filename);
            $stmt->bindParam(':estimated', $estimated);

            if ($stmt->execute()) {
                header("Location: manage_pieces.php");
                exit;
            }
}
}
}
?>