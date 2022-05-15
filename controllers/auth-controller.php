<?php
require('../Config/config.php');

if (!empty($_POST['log'])) {

    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        // print_r($_POST);
        $qry = $db->prepare(
            "SELECT * 
             FROM users 
             WHERE  username = :uname
                AND password = :upass"
        );
        $qry->execute([
            ':uname' => $username,
            ':upass' => $password
        ]);
        if ($qry->rowCount() == 1) {
            $user = $qry->fetch(PDO::FETCH_OBJ);
            session_start();
            $_SESSION['user_id'] = $user->id;
            $_SESSION['username'] = $user->username;
            $_SESSION['fullname'] = $user->fullname;
            $_SESSION['email'] = $user->email;
            header("Location: ./../index.php");
        } else {
            header("Location: ../login.php?status=498&msg=Username or password is wrong");
        }
    } else {
        header("Location: ../login.php?status=498&msg=Please fill all the required fields");
    }
}
if (!empty($_POST['sing'])) {
    if (
        !empty($_POST['fullname']) &&
        !empty($_POST['username']) &&
        isset($_POST['email']) &&
        !empty($_POST['password']) &&
        !empty($_POST['cpassword']) &&
        $_POST['password'] == $_POST['cpassword']
    ) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        # 1. check for username uniqueness
        # if is uniq insert or signup
        # else redirect to sign up form and show a messages
        $qry = $db->query(
            "SELECT count(id) AS no_of_users 
         FROM users 
         WHERE username='$username'"
        );
        $res = $qry->fetch(PDO::FETCH_OBJ);
        if ($res->no_of_users > 1) {
            header("Location: ../signup.php?status=499&msg=Username is not available");
        } else {
            try {
                $qry = $db->prepare(
                    'INSERT INTO users(
                    fullname,
                    username,
                    email,
                    password
                ) VALUE (
                    :fname,
                    :uname,
                    :email,
                    :password
                )'
                );

                $qry->execute([
                    'fname' => $fullname,
                    'uname' => $username,
                    'email' => $email,
                    'password' => $password
                ]);
                header("Location: ../signup.php?status=299&msg=Signup succeed");
            } catch (PDOException $e) {
                header("Location: ../signup.php?status=499&msg=" . $e->getMessage());
            }
        }
    } else {
        header("Location: ../signup.php?status=499&msg=Please fill all the required fields, and make sure that password matches");
    }
}
