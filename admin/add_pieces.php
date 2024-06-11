<?php
// Database connection parameters (similar to your existing code)
$servername = "localhost";
$username = "root";
$password = "";
$database = "shoppingcart";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $estimated = $_POST['estimated'];

    //image upload
    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        // Specify the upload directory (relative to the script directory)
        $img_dir = 'C:/xampp/htdocs/ArtGallery/images/';
        // Generate a unique filename for the uploaded image
        $img_filename = uniqid('piece_') . '.jpg';
        // Construct the absolute path to the uploaded image
        $img_path = $img_dir . $img_filename;

        // Move uploaded image to the desired location
        if (move_uploaded_file($_FILES['img']['tmp_name'], $img_path)) {
            // Insert new piece into the database
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
            } else {
                echo "Error adding new piece.";
            }
        } else {
            echo "Failed to upload image.";
        }
    } else {
        echo "Image upload failed.";
    }
} else {
    echo "Invalid request method.";
}
?>
