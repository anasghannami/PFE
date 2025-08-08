<?php
// Paramètres de connexion
$host = 'localhost';
$dbname = 'tazza';
$username = 'root';
$password = '';

$success = false;
$error = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom_prenom = $_POST['nom_prenom'] ?? '';
        $email = $_POST['email'] ?? '';
        $adresse = $_POST['adresse'] ?? '';
        $telephone = $_POST['telephone'] ?? '';
        $message = $_POST['message'] ?? '';

        if ($nom_prenom && $email && $message) {
            $sql = "INSERT INTO contacts (nom_prenom, email, adresse, telephone, message)
                    VALUES (:nom_prenom, :email, :adresse, :telephone, :message)";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nom_prenom' => $nom_prenom,
                ':email' => $email,
                ':adresse' => $adresse,
                ':telephone' => $telephone,
                ':message' => $message
            ]);

            $success = true;
        }
    }
} catch (PDOException $e) {
    $error = "Erreur de connexion : " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>