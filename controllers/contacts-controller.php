<?php
require('../Config/config.php');

session_start();
if (isset($_SESSION)) {

    if (!empty($_POST['add'])) {
        if (!empty($_POST['sendName']) && !empty($_POST['sendPhone']) && !empty($_POST['sendEmail'])) {
            $qry = $db->prepare(
                'INSERT INTO contacts(
            full_name,
            email,
            phone,
            userid
        ) VALUE (
            :fname,
            :email,
            :phone,
            :usId
        )'
            );

            $qry->execute([
                'fname' => $_POST['sendName'],
                'email' => $_POST['sendEmail'],
                'phone' => $_POST['sendPhone'],
                'usId' => $_SESSION['user_id']
            ]);

            // redirect to
            header("Location: ../index.php?p=contacts&state=200");
        } else {
            header("Location: ../index.php?p=contacts&state=400");
        }
    }
    if (!empty($_POST['update'])) {



        if (!empty($_POST['sendName']) && !empty($_POST['sendPhone']) && !empty($_POST['sendEmail'])) {
            $id = $_POST['update'];

            $qry = $db->prepare(
                'UPDATE contacts
        SET full_name = :fname,
            email = :email,
            phone = :phone
        WHERE id = :id'
            );

            $qry->execute([
                'fname' => $_POST['sendName'],
                'email' => $_POST['sendEmail'],
                'phone' => $_POST['sendPhone'],
                'id'      => $id
            ]);
            // redirect to
            header("Location: ../index.php?p=contacts&state=200");
        } else {
            header("Location:  ../index.php?p=contacts&state440 '");
        }
    }
}
echo "<pre>";
print_r($_POST);
if (!empty($_GET)) {

    $typo = $_GET['typo'];
    echo  $typo;
    if ($typo == 'delete') {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            try {
                $qry = $db->prepare('DELETE FROM contacts WHERE id = :id');
                $qry->execute(['id' => $id]);
            } catch (PDOException $e) {
                echo $e . getMessage();
            }
            // redirect to
            header("Location: ../index.php?p=contacts&state=200");
        } else {
            header("Location: ../index.php?p=contacts&state=400");
        }
    }
}
