<?php
include("database.php");
 
$errormsg = "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['type'];
 
    if (empty($email) || empty($password)) {
        $errormsg = "empty fields";
    }
    else {
        $password = password_hash($password,
            PASSWORD_DEFAULT);
if($type == "prof"||$type == "responsable"){
  if (preg_match("/\w+@emsi\.ma$/", $email)==0){
    $errormsg = "email must be @emsi.ma";
  
 } 
 else{
        $sql = "INSERT INTO prof (email_prof, password) 
 
            VALUES ('$email','$password')";
 
                    if (mysqli_query($conn, $sql)) {
 
                        echo "New record created successfully";
                        header("Location:prof.php");
                    } else {
 
                        echo "Error: " . $sql . "<br>" .
                            mysqli_error($conn);
 
        }}}
else{
    if (preg_match("/\w+@emsi-edu\.ma$/", $email)==0){
      $errormsg = "email must be @emsi-edu.ma";
    
   } 
    else {$sql = "INSERT INTO Etudiant (email_Etudiant, password) 
 
            VALUES ('$email','$password')";
 
    if (mysqli_query($conn, $sql)) {
 
        echo "New record created successfully";
        header("Location:etudiant.php");
    } else {
 
        echo "Error: " . $sql . "<br>" .
            mysqli_error($conn);
 
    }
  }
}
    }
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container my-5">
    <img src="logo-1.png" alt="Logo EMSI" class="logo">
    <h2>Sign In</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        require_once "connection.php";
        require_once "c.php";

        $db = new Database();
        $email = $_POST['email'];
        $password = $_POST['password'];
        $type = $_POST['type'];

        $user = new User($email, $password, $type);

        if ($user->save($db)) {
            echo "<div class='alert alert-success'>User registered successfully!</div>";
            if ($type === "prof" || $type === "responsable") {
                header("Location: prof.php");
            } else {
                header("Location: etudiant.php");
            }
        } else {
            echo "<div class='alert alert-warning'>{$user->errorMessage}</div>";
        }

        $db->close();
    }
    ?>

    <form method="post">
        <div class="row mb-3">
            <label class="col-form-label col-sm-1" for="email">Email:</label>
            <div class="col-sm-6">
                <input class="form-control" type="email" id="email" name="email" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-form-label col-sm-1" for="password">Password:</label>
            <div class="col-sm-6">
                <input class="form-control" type="password" id="password" name="password" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-form-label col-sm-1" for="type">Type:</label>
            <div class="col-sm-6">
                <select class="form-control" name="type" id="type" required>
                    <option value="" disabled selected>Select type</option>
                    <option value="responsable">Responsable</option>
                    <option value="prof">Prof</option>
                    <option value="etudiant">Etudiant</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="offset-sm-1 col-sm-3 d-grid">
                <button name="submit" type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
