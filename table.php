<?php
session_start();

// منع الكاش لتفادي زر الرجوع يعرض الصفحة بدون تحقق
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

// تحقق من تسجيل الدخول
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: admin.php");
    exit();
}

// تسجيل الخروج
if (isset($_POST["out"])) {
    session_destroy();
    header("Location: admin.php");
    exit();
}

$mysqli = new mysqli('localhost', 'root', '', 'job');
if ($mysqli->connect_error) {
    die("Échec connexion : " . $mysqli->connect_error);
}

$stmt = $mysqli->prepare("SELECT * FROM information");
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Table des employés</title>
  <link href="css/styletable.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="search/src2.css">
  <script src="search/src1.js"></script>
  <script src="search/src3.js"></script>
  <style>
    .navbar-custom {
        background-color: #0b3cc1;
        color: #ffffff;
        padding: 20px 83px;
    }
    .btn-custom {
        background-color: brown;
        border: none;
        color: #ffffff;
        padding: 11px 10px;
        font-size: 14px;
        cursor: pointer;
    }
    .btn-danger {
        background-color: red;
        color: #fff;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
    }
    .btn-danger:hover {
        background-color: #265df2;
    }
  </style>
</head>
<body>
  <div class="navbar navbar-custom">
    <div class="container-fluid">
      <h1>Employés ayant pris un rendez-vous</h1>
      <form method="post">
        <button class="btn btn-custom" name="out">Se Déconnecter</button>
      </form>
    </div>
  </div>

  <div class="container">
    <table id="myTable">
      <thead>
        <tr>
          <th>Numéro CIN</th>
          <th>Nom & Prénom</th>
          <th>Date début</th>
          <th>Date fin</th>
          <th>Téléphone Employé</th>
          <th>Genre</th>
          <th>Entreprise</th>
          <th>Adresse</th>
          <th>Téléphone Employeur</th>
          <th>Plainte</th>
          <th>Demandes</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['National_id']) . "</td>
                    <td>" . htmlspecialchars($row['nom_prenom']) . "</td>
                    <td>" . htmlspecialchars($row['date_entreetravail']) . "</td>
                    <td>" . htmlspecialchars($row['date_fintravail']) . "</td>
                    <td>" . htmlspecialchars($row['N_telephoneemp']) . "</td>
                    <td>" . htmlspecialchars($row['Genre']) . "</td>
                    <td>" . htmlspecialchars($row['Nom_entreprise']) . "</td>
                    <td>" . htmlspecialchars($row['adresse']) . "</td>
                    <td>" . htmlspecialchars($row['N_telephoneempr']) . "</td>
                    <td>" . htmlspecialchars($row['plainte']) . "</td>
                    <td>" . htmlspecialchars($row['demandes']) . "</td>
                    <td><a class='btn-danger' href='delete.php?id=" . htmlspecialchars($row['National_id']) . "'>Supprimer</a></td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='12'>Aucun enregistrement trouvé</td></tr>";
        }

        $stmt->close();
        $mysqli->close();
        ?>
      </tbody>
    </table>
  </div>

  <script>
    $(document).ready(function() {
      $('#myTable').DataTable({
        "pagingType": "simple_numbers",
        "language": {
          "search": "Recherche:",
          "lengthMenu": "Afficher _MENU_ enregistrements par page",
          "zeroRecords": "Aucun enregistrement trouvé",
          "info": "Affichage de la page _PAGE_ sur _PAGES_",
          "infoEmpty": "Aucun enregistrement disponible",
          "infoFiltered": "(filtré de _MAX_ enregistrements au total)"
        }
      });
    });
  </script>
</body>
</html>
