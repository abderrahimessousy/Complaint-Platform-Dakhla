<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/information.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Responsive Regisration Form </title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    
    
</head>

<body>

    <div class="container">
        <header>Inscription</header>

        <form action="#" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Informations sur les employés</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Nom et Prenom / الاسم والنسب</label>
                            <input type="text"  name = "nom_prenom" placeholder="Entrez votre nom et prénom" required>
                        </div>

                        <div class="input-field">
                            <label>Date d'entrée au travail / تاريخ الذخول الى العمل</label>
                            <input type="date"  name ="DB_travail" placeholder="Entrer Votre Date d'entrée au travail" required>
                        </div>

                        <div class="input-field">
                            <label>Date de fin de travail / تاريخ الخروج من العمل</label>
                            <input type="date" name ="DF_travail" placeholder="Entrer Votre Date de fin de travail" required>
                        </div>

                        <div class="input-field">
                            <label>Numéro de téléphone de l'employé/ رقم الهاتف</label>
                            <input type="number" name ="N_phone1" placeholder="Entrer Votre Numéro de téléphone" required>
                        </div>

                        <div class="input-field">
                            <label>Genre / نوع الجنس</label>
                            <select required name ="Genre">
                                <option disabled selected>Sélectionnez le sexe</option>
                                <option>Homme</option>
                                <option>Femme</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Numéro de carte nationale / رقم البطاقة الوطنية </label>
                            <input type="text" name ="national" placeholder="Entrer Votre Numéro de carte nationale " required>
                        </div>
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Des informations sur employeur</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Nom de l'entreprise / اسم الشركة</label>
                            <input type="text"  name ="Nom_enreprise" placeholder="Nom de l'entreprise" required>
                        </div>

                        <div class="input-field">
                            <label>l'adresse / العنوان </label>
                            <input type="text" name ="Adress" placeholder="l'adresse" required>
                        </div>

                        <div class="input-field">
                            <label>Numéro de téléphone  / رقم الهاتف</label>
                            <input type="number" name ="N_phone2" placeholder="Entrer Votre Numéro de téléphone" required>
                        </div>

                        

                        <div class="input-field">
                            <label>Demandes / المطالب</label>
                            <select required name ="Demandes">
                                    <option disabled selected>Sélectionnez les demandes</option>
                                    <option>التعويض عن الفصل</option>
                                    <option>التعويض عن سابق الاعلام</option>
                                    <option>التعويض عن الضرر</option>
                                    <option>الاجر</option>
                                    <option>العطلة السنوية المؤدى عنها</option>
                                </select>
                        </div>






                    </div>

                    <button class="nextBtn">
                        <span class="btnText">Next</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div>
            </div>

            <div class="form second">
                <div class="details address">
                    <span class="title">la plainte</span>


                    <div class="input-field">
                        <label for="message">Quel est le problème et ses causes ? :</label>
                        <textarea class="fixed-textarea" id="message" name="message" rows="10" required></textarea>
                    </div>
                </div>

                <style>
                    .fixed-textarea {
                        resize: none;
                        /* منع تغيير الحجم */
                        overflow: auto;
                        /* إضافة شريط تمرير إذا كان المحتوى أكبر من الحجم المحدد */
                    }
                </style>



                <div class="buttons">
                    <div class="backBtn">
                        <i class="uil uil-navigator"></i>
                        <span class="btnText">Back</span>
                    </div>

                    <div>
                        <input type="submit" name="send" value="Save" class="submit-button">
                    </div>

                    <style>
                            /* Style for the button */
                    .submit-button {
                    background-color: #4CAF50; /* Green background */
                    border: none; /* Remove borders */
                    color: white; /* White text */
                    padding: 10px 20px; /* Padding */
                    text-align: center; /* Center text */
                    text-decoration: none; /* Remove underline */
                    display: inline-block; /* Make it inline */
                    font-size: 16px; /* Font size */
                    cursor: pointer; /* Cursor style */
                    border-radius: 5px; /* Rounded corners */
                    }

                    /* Style when hovering over the button */
                    .submit-button:hover {
                    background-color: #45a049; /* Darker green */
                    }
                    </style>
                </div>
            </div>
    </div>
    </form>
    </div>

    <script src="js/scriptinf.js"></script>

    
</body>

</html>



<?php 

if (isset($_POST["send"])){
       $con = new mysqli('localhost','root','','job'); // Create connection
        // Receive data from the form
        $nom_prenom = $_POST['nom_prenom'];
        $DB_travail = $_POST['DB_travail'];
        $DF_travail = $_POST['DF_travail'];
        $N_phone1 = $_POST['N_phone1'];
        $Gender = $_POST['Genre'];
        $national = $_POST['national'];
        $Nom_enreprise = $_POST['Nom_enreprise'];
        $Adress = $_POST['Adress'];
        $N_phone2 = $_POST['N_phone2'];
        $Demandes = $_POST['Demandes'];
        $complain = $_POST['message'];
        

        // Insert data into the database table
        $sql = "INSERT INTO information VALUES ('$national', ' $nom_prenom', '$DB_travail', '$DF_travail', '$N_phone1', '$Gender', '$Nom_enreprise', '$Adress','$N_phone2', ' $complain', '  $Demandes')";




// Assuming $primaryKeyValue contains the primary key value you want to check


// SQL query to select records with the specified primary key
$sql_check = "SELECT * FROM information WHERE National_id = '$national'";

// Execute the query
$result_check = mysqli_query($con, $sql_check);

// Check if any rows were returned (indicating the primary key already exists)
if (mysqli_num_rows($result_check) > 0) {
    // Primary key already exists, handle accordingly
    echo '<script>
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Numéro de carte nationale déjà enregistré"
    });
</script>';
} else {
    // Primary key does not exist, proceed with insertion
    if (mysqli_query($con, $sql)) {
        echo '<script>
            Swal.fire({
                icon: "success",
                title: "Success",
                text: "The information has been filled out successfully, we will contact you shortly"
            });
        </script>';
    } else {
        echo '<script>
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "An error occurred: ' . mysqli_error($con) . '"
            });
        </script>';
    }
}
    }
?>
