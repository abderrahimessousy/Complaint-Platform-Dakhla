<?php
session_start();

$con = new mysqli('localhost', 'root', '', 'job');
if ($con->connect_error) {
    die("Échec connexion : " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['check'])) {
    $user = $con->real_escape_string($_POST['user']);
    $pwd = $con->real_escape_string($_POST['pwd']);

    // غير هذا السطر باش يتوافق مع اسم العمود الحقيقي في جدول adm
    $sql = "SELECT * FROM adm WHERE user='$user' AND mod_passe ='$pwd'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['logged_in'] = true;
        header("Location: table.php");
        exit();
    } else {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo '<script>
            Swal.fire({
                icon: "error",
                title: "Erreur",
                text: "Nom d\'utilisateur ou mot de passe incorrect"
            });
        </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body>
    <div class="content">
        <div class="text">Formulaire de Connexion</div>
        <form method="POST">
            <div class="field">
                <input type="text" required name="user">
                <span class="fas fa-user"></span>
                <label>Nom d'utilisateur</label>
            </div>
            <div class="field">
                <input type="password" required name="pwd">
                <span class="fas fa-lock"></span>
                <label>Mot de passe</label>
            </div>
            <button name="check">Se connecter</button>
        </form>
    </div>
</body>
</html>



