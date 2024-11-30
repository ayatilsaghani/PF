<?php 
$emptyemail = "";
$emptypass = "";

if (isset($_POST["Submit"])) {
    $emailvalue = $_POST['email'];
    $passvalue = $_POST['password'];

    
    if (empty($emailvalue)) {
        $emptyemail = "Veuillez entrer un email.";
    } else if (empty($passvalue)) {
        $emptypass = "Veuillez entrer un mot de passe.";
    } 
    else if (preg_match("/\w+@emsi-edu\.ma$/", $emailvalue)) {
        session_start();
        $_SESSION["emailuser"] = $emailvalue;
        $_SESSION["passuser"] = $passvalue;
        header("Location:home_student.php"); 
        exit();
    } 

    else if (preg_match("/\w+@emsi\.ma$/", $emailvalue)) {
        session_start();
        $_SESSION["emailuser"] = $emailvalue;
        $_SESSION["passuser"] = $passvalue;
        header("Location:home_professor.php");
        exit();
    } 
    else {
        $emptyemail = "Veuillez entrer une adresse e-mail valide ";
    }
}
?>