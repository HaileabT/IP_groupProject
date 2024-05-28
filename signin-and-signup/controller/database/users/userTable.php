<?php
session_save_path('C:\xampp_sessions');
session_start();
function tableCreation($connection)
{
    $sql = "CREATE TABLE User (
       id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
       first_name VARCHAR(30) NOT NULL,
       middle_name VARCHAR(30),
       last_name VARCHAR(50) NOT NULL,
       email VARCHAR(50) NOT NULL UNIQUE,
       passsword VARCHAR(255) NOT NULL,
       phone_no VARCHAR(15) NOT NULL,
       account_no VARCHAR(19) NOT NULL UNIQUE
    --    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    )";
    if ($connection->query($sql)) {
        echo "table created successfully";
    } else {
        echo "Error creating" . $connection->error;
    }
}
function insertUser($connection, string $first_name, string $middle_name, string $last_name, string $email, string $password, string $phone_no, $account_type, $account_no)
{
    $sql = "INSERT INTO User (first_name,middle_name,last_name,email,passsword,phone_no,account_type,account_no) VALUES('$first_name','$middle_name','$last_name','$email','$password','$phone_no','$account_type','$account_no')";

    if (mysqli_query($connection, $sql)) {
        $sql = "SELECT * FROM User WHERE email='$email'";
        $user = mysqli_query($connection, $sql);
        if (!$user) {
            header("location:../../../signup.php?error=please fill all information carefully");
        } else {
            if ($row = mysqli_fetch_array($user)) {
                $_SESSION["id"] = $row['id'];
                $_SESSION["email"] = $row["email"];
                $_SESSION["first_name"] = $row["first_name"];
                header("location:../../../userProfile/profile.php");
                echo "user successfully inserted";
            }
        }
    } else {
        echo "Creation error" . $sql . mysqli_error($connection);
    }
}
function deleteUser($connection, $id)
{
    $sql = "DELETE FROM User WHERE id='$id'";
    if (mysqli_query($connection, $sql)) {
        echo "deleted successfully";
    } else {
    }
}
function alterTable($connection)
{
    $sql = "ALTER TABLE User ADD COLUMN avatar LONGBLOB DEFAULT NULL ";
    if (mysqli_query($connection, $sql)) {
        echo "updated successfully";
    }
}

// function updateUser($connection,$id){
//     $sql="UPDATE "
// }