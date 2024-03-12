<?php
  define('CSS', '../../');  
  require_once($_SERVER['DOCUMENT_ROOT'] . '/simple-mvc/app/views/header.php');
  $session = new ModelSession();
  $methods = get_class_methods($session);
  $userId = null;

 if( isset($_SESSION['user'] ) ) :
        $userData = $session->getUserData('data'); 
        foreach ($userData as $key => $value) {
            if ($key === "user_id") {
                $userId = $value;
            }
        }
?>
<div class="container">
    <div class="wrapper-page-content">
        <h1>Сторінка-Акаунт користувача</h1><br>
        <button><a href="exit">Вийти</a></button>
        <h2>Вітаємо <p style="color : red;"><?= $userData['firstname'] . '  ' . $userData['lastname'];  ?></p></h2>
        <form  action="editForm" method="post">
            <input type="hidden"   name="user_id"   value="<?= $userId; ?>">
            <input type="text"     name="firstName" placeholder="Імя">     <br>
            <input type="text"     name="lastName"  placeholder="Прізвище"><br>
            <input type="email"    name="email"     placeholder="Eмейл">   <br>
            <input type="password" name="pass"      placeholder="Пароль">  <br>
            <input type="submit"   value="Підтвердити зміни">
        </form>
        <div>
            <?php 
                echo $session->getErrorMessage();
                echo $session->getSuccessMessage();  
            ?>
        </div>
    </div>
</div>
<?php else : ?>
    <h2>Закрита сторінка</h2>
<?php endif; ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/simple-mvc/app/views/footer.php'); ?>