<?php
class User {
    private $email;
    private $password;
    private $type;
    public $errorMessage;

    public function __construct($email, $password, $type) {
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->type = $type;
        $this->errorMessage = "";
    }

    public function validateEmail() {
        if ($this->type === "prof" || $this->type === "responsable") {
            return preg_match("/\w+@emsi\.ma$/", $this->email);
        } elseif ($this->type === "etudiant") {
            return preg_match("/\w+@emsi-edu\.ma$/", $this->email);
        }
        return false;
    }

    public function save(Database $db) {
        if (!$this->validateEmail()) {
            $this->errorMessage = "Invalid email format for type " . $this->type;
            return false;
        }

        $email = $db->escape($this->email);
        $password = $db->escape($this->password);

        if ($this->type === "prof" || $this->type === "responsable") {
            $sql = "INSERT INTO prof (email_prof, password) VALUES ('$email', '$password')";
        } else {
            $sql = "INSERT INTO Etudiant (email_Etudiant, password) VALUES ('$email', '$password')";
        }

        if ($db->query($sql)) {
            return true;
        } else {
            $this->errorMessage = "Error: " . $db->conn->error;
            return false;
        }
    }
}
?>
