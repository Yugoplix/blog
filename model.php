<?php

function dbConnect(){
    $dsn = 'mysql:dbname=blog;host=localhost';
    $user = 'root';
    $password = '';

    try {
        $dbh = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo 'Connexion échouée : '.$e->getMessage();
    }

    return $dbh;
}

function get_ip()
{
    if ( isset ( $_SERVER['HTTP_X_FORWARDED_FOR'] ) )
    {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    elseif ( isset ( $_SERVER['HTTP_CLIENT_IP'] ) )
    {
        $ip  = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif ($_SERVER['REMOTE_ADDR'] == "::1")
    {
        $ip = "localhost";
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function isLog(){
    if ($_SESSION['isLog'] == False){
        header("Location: connexion.php");
    }
}

function loadSession(){
    $dbh = dbConnect();
    session_start();

    if (empty($_SESSION['isLog'])) {
        $_SESSION['isLog'] = False;
    }

    if ($_SESSION['isLog'] == True){

        $userAccount = $dbh->prepare("SELECT * FROM users WHERE LOWER(username) = LOWER(:username)");
        $userAccount->bindValue('username', $_SESSION['username']);
        $userAccount->execute();

        $grade = $dbh->prepare('SELECT grade.label FROM users JOIN role grade ON users.role = grade.id WHERE LOWER(username) = LOWER(:username)');
        $grade->bindValue('username', $_SESSION['username']);
        $grade->execute();

        $userData = $userAccount->fetch(PDO::FETCH_ASSOC);

        $_SESSION['id'] = $userData['id'];
        $_SESSION['username'] = $userData['username'];
        $_SESSION['password'] = $userData['password'];
        $_SESSION['role'] = $userData['role'];
        $_SESSION['grade'] = $grade->fetch(PDO::FETCH_ASSOC)['label'];
        if ($userData['image'] == "user_default.png") {
            $_SESSION['picture'] = "assets/profile/".$userData['image'];
        } else {
            if (is_file("assets/profile/" . $_SESSION['id'] . "/" . $userData['image'])){
                $_SESSION['picture'] = "assets/profile/" . $_SESSION['id'] . "/" . $userData['image'];
            } else {
                $_SESSION['picture'] = "assets/profile/user_default.png";
            }

        }


    }
}

function updateProfile(){

    $dbh = dbConnect();
    if (isset($_POST['envoyer'])){
        if (!empty($_POST['newUsername'])){
            if ($_POST['newUsername'] != $_SESSION['username']){

                $_SESSION['username'] = $_POST['newUsername'];

                $newUsername = $dbh->prepare("UPDATE users SET username = :username WHERE id = :id");
                $newUsername->bindValue("username", $_POST['newUsername']);
                $newUsername->bindValue("id", $_SESSION['id']);
                $newUsername->execute();

            }
        }
        if (password_verify($_POST['oldPassword'],$_SESSION['password']) && $_POST['newPassword'] == $_POST['newPassword2']){
            $newPassword = $dbh->prepare("UPDATE users SET password = :password WHERE id = :id");
            $newPassword->bindValue("password",password_hash($_POST['newPassword'],PASSWORD_DEFAULT));
            $newPassword->bindValue("id", $_SESSION['id']);
            $newPassword->execute();

            $_SESSION['password'] = $_POST['newPassword'];

        }
        if (isset($_FILES['newPicture'])){
            $name_file = $_FILES['newPicture']['name'];
            if (!empty($name_file)){
                if ($_SESSION['picture'] != "assets/profile/user_default.png"){
                    unlink($_SESSION['picture']);
                }
                $tmp_file = $_FILES['newPicture']['tmp_name'];
                if (!is_dir("assets/profile/".$_SESSION['id'])){
                    mkdir("assets/profile/".$_SESSION['id']);
                }
                $directory = "assets/profile/".$_SESSION['id']."/";
                move_uploaded_file ($tmp_file, $directory.$name_file);

                $_SESSION['picture'] = $directory.$name_file;

                $newPicture = $dbh->prepare("UPDATE users SET image = :image WHERE id = :id");
                $newPicture->bindValue("image", $name_file);
                $newPicture->bindValue("id", $_SESSION['id']);
                $newPicture->execute();
            }
        }
    }
}

function checkIP(){
    if (empty($_SESSION['isChecked'])){
        $_SESSION['isChecked'] = False;
    }

    if ($_SESSION['isChecked'] == False){
        $checkConnect = $dbh->prepare('INSERT INTO ip_log (user_id, ip) VALUES (:id, :ip)');
        $checkConnect->bindValue('id', $_SESSION['id']);
        $checkConnect->bindValue('ip', get_ip());
        $checkConnect->execute();
        $_SESSION['isChecked'] = True;
    }
}