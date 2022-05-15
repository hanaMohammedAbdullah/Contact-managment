<?php session_start(); ?>
<header class="p-3 mb-3 border-bottom ">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-between  ml-5" id='yourFormId'>
      <div class="d-flex  mr-auto ">
        <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none font-italic">
          <h3>HAN Managment</h3>
        </a>
      </div>
      <div class="d-flex">
        <ul class="nav col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <li><a href="index.php?p=contacts" name="p" value='2' class="nav-link px-2 link-dark"> <img src="./Asset/Image/person-lines-fill.svg" alt="contacts">Contact</a></li>
        </ul>
        <div class=" dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="./Asset/Image/person-circle.svg" alt="pencile">
            <span><?php if (!isset($_SESSION['username'])) {
                    echo 'username';
                  } else {
                    echo $_SESSION['username'];
                  } ?></span>
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">

            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="./login.php">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>