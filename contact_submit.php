<?php
// Informations de connexion à la base de données
$host = 'localhost'; // Serveur MySQL
$dbname = 'mmwebdesign'; // Nom de la base de données
$username = 'root'; // Nom d'utilisateur MySQL
$password = ''; // Mot de passe MySQL (modifiez-le si nécessaire)

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $name = $_POST['name'];
        $email = $_POST['email'];
        $description = $_POST['description'];

        // Préparer la requête d'insertion
        $sql = "INSERT INTO contact_requests (name, email, description) VALUES (:name, :email, :description)";
        $stmt = $pdo->prepare($sql);

        // Lier les valeurs et exécuter la requête
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':description', $description);

        if ($stmt->execute()) {
            echo "Merci, votre demande a été envoyée avec succès.";
        } else {
            echo "Une erreur est survenue. Veuillez réessayer plus tard.";
        }
    }
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

?>


