<?php 
define('CSS', '../../');
require_once($_SERVER['DOCUMENT_ROOT'] . '/simple-mvc/app/views/header.php');
?>
<div class="container">
    <div class="wrapper-page-content">
            <h1>Сторінка авторизації</h1>

        <form action="processForm" method="post"> 
            <input type="email"    name="email"    placeholder="Емейл">
            <input type="password" name="password" placeholder="Пароль">
            <input type="submit" value="Авторищуватись">
        </form>

        <?php 
            $sesssion = new ModelSession();
            echo  $sesssion->getErrorMessage();
        ?>
    </div>
</div>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/simple-mvc/app/views/footer.php'); ?>