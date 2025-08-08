<?php
// Autoriser les requêtes CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, OPTIONS");

// Gérer les requêtes préflight (OPTIONS)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

header("Content-Type: application/json");

// Connexion à la base de données
$host = "localhost";
$dbname = "boutique";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Connexion échouée: " . $e->getMessage()]);
    exit;
}

// Lire les données JSON
$input_json = file_get_contents("php://input");
$input = json_decode($input_json, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode([
        "success" => false,
        "message" => "Données JSON invalides: " . json_last_error_msg()
    ]);
    exit;
}

// Données du formulaire
$nom = $input["nom"] ?? "";
$email = $input["email"] ?? "";
$telephone = $input["telephone"] ?? "";
$adresse = $input["adresse"] ?? "";
$codepostal = $input["codepostal"] ?? "";
$ville = $input["ville"] ?? "";
$livraison = $input["livraison"] ?? "";
$produits = $input["produits"] ?? [];
$total = $input["total"] ?? 0;


// Insertion dans la base de données
try {
    $stmt = $pdo->prepare("INSERT INTO commandes (nom, email, telephone, adresse, codepostal, ville, livraison, produits, total) 
                           VALUES (:nom, :email, :telephone, :adresse, :codepostal, :ville, :livraison, :produits, :total)");
    $stmt->execute([
        ":nom" => $nom,
        ":email" => $email,
        ":telephone" => $telephone,
        ":adresse" => $adresse,
        ":codepostal" => $codepostal,
        ":ville" => $ville,
        ":livraison" => $livraison,
        ":produits" => json_encode($produits),
        ":total" => $total
    ]);

    echo json_encode(["success" => true]);
} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "message" => "Erreur lors de l'insertion : " . $e->getMessage()
    ]);
}