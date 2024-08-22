<?php
// Veritabanı bağlantısı (örnek bağlantı)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_database";

// Veritabanı bağlantısını oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Formdan verileri al
$user = $_POST['username'];
$pass = $_POST['password'];

// Şifreyi hash'le (güvenlik için)
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

// Veritabanına ekle
$sql = "INSERT INTO users (username, password) VALUES ('$user', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Bağlantıyı kapat
$conn->close();
?>
