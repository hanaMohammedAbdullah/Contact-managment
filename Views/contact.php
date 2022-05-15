<?php
include './Config/utility.php';
include('./Config/config.php');
?>

<div class="d-flex align-items-center justify-content-between w-75 mx-auto  ">
    <div class="">
        <h2>Contact</h2>
    </div>
    <div class="">
        <span onclick="adding()" class="d-flex btn bg-primary align-items-center justify-content-between mb-2 model__btn">
            <img src="./Asset/Image/person-plus-fill.svg" class="" alt="pencile">
            <span type="button" class="btn btn-primary ">
                Add Contact
            </span>
        </span>
    </div>
</div>
<?php
if (!empty($_SESSION['username'])) {
    $contact_qry = $db->prepare("SELECT * FROM contacts where userID = $_SESSION[user_id]");
    $contact_qry->execute();
    $contacts = $contact_qry->fetchAll(PDO::FETCH_OBJ);


    if (!empty($contacts)) {
        echo  render_table($contacts);
    } else {
        echo '<h3 class=" align-items-center justify-content-between text-center">There is no contact available</h3>
    ';
    }

    if (!empty($_GET['id'])) {
        include './Config/config.php';
        $ids = $_GET['id'];

        $contacts_qry = $db->prepare("SELECT * FROM contacts WHERE id = :id");
        $contacts_qry->execute(['id' => $ids]);
        $contacts = $contacts_qry->fetch(PDO::FETCH_OBJ);
        // $usernames = $contact_->full_name;
        // echo $id;
        // echo "<pre>";
        // print_r($contacts);
        echo '<div class="model__bg active__model">
                 <div class="model_body ">
                  <h4>Edit user</h4>
                  <form action="controllers/contacts-controller.php" method="POST">
                   <hr width="100%">
                <label for="name">Name</label><br>
                <input type="text" name="sendName" value="' . $contacts->full_name   . '" id="name"><br>
                <label for="phone">Phone</label><br>
                <input type="text" name="sendPhone" value="' . $contacts->phone . '" id="phone"><br>
                <label for="email">Email</label><br>
                <input type="email" name="sendEmail" value="' . $contacts->email . '" id="email"><br>
              
                <div class="mt-4 ">
                <a class="btn btn-primary model__close" href="./index.php?p=contacts" >Close</a>
                <button class="btn btn-primary model__close" name="update" value="' . $contacts->id . '" type="submit">Send</button>
              </div>
            </form>
          </div>
        </div> ';
    }
} else {
    echo '<h3 class=" align-items-center justify-content-between text-center">Please log in First then you can see the  contacts</h3>
    ';
}



// 
?>

</div>
<div class="model__bg ">

    <div class="model_body ">
        <h4>Add user</h4>

        <form action="controllers/contacts-controller.php" method="POST">
            <hr width="100%">
            <label for="name">Name</label><br>
            <input type="text" name="sendName" id="name"><br>
            <label for="phone">Phone</label><br>
            <input type="text" name="sendPhone" id="phone"><br>
            <label for="email">Email</label><br>
            <input type="email" name="sendEmail" id="email"><br>
            <div class="mt-4 ">
                <span class="btn btn-primary model__close ">Close</span>
                <button class="btn btn-primary model__close" name="add" value="200" type="submit">Send</button>
            </div>
        </form>
    </div>
</div>

<script>
    function adding() {
        var modelBtn = document.querySelector('.model__btn');
        var modelBtnClose = document.querySelector(".model__close");
        var modelBg = document.querySelector('.model__bg');
        modelBtn.addEventListener('click', function() {
            modelBg.classList.add('active__model');

        })
        modelBtnClose.addEventListener('click', function() {
            modelBg.classList.remove('active__model');

        })
    }


    //              editing
    // var modelBtnEdit = document.querySelectorAll('.editing');
    // var modelBtnClose = document.querySelector('.model__close');
    // var modelBgEdit = document.querySelectorAll('.model__edit__back');
    // modelBtnEdit.addEventListener('click', function() {
    //     modelBgEdit.classList.add('active__model');
    // })
    // modelBtnClose.addEventListener('click', function() {

    //     modelBgEdit.classList.remove('active__model');
    // })

    function editing(e) {

        document.querySelectorAll('.model__edit__back'.add('active__model'));
        document.write

    }

    function closeing() {
        document.querySelectorAll('.model__edit__back'.remove('active__model'))
    }
</script>


<!-- 


 <div class="model__edit__back ">

        <div class="model__edit__body ">
            <h4>Edit user</h4>

            <form action="../controllers/contacts-controller.php" method="POST">
                <hr width="100%">
                <label for="name">Name</label><br>
                <input type="text" name="sendName" value="<?= $contact->full_name ?>" id="name"><br>
                <label for="phone">Phone</label><br>
                <input type="text" name="sendPhone" value="<?= $contact->phone ?>" id="phone"><br>
                <label for="email">Email</label><br>
                <input type="email" name="sendEmail" value="<?= $contact->email ?>" id="email"><br>
                <div class="mt-4 ">
                    <a class="btn btn-primary " href="../index.php?p=contacts">Close</a>
                    <button class="btn btn-primary model__close" name="update" value="<?php echo $id; ?>" type="submit">Send</button>
                </div>
            </form>
        </div>
    </div>

       -->