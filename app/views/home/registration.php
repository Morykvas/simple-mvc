<?php 
define('CSS', '../../');
require_once 'header.php';
 ?>


<div class="container">
    <div class="wrapper-page-content">
    <h1>Cторінка реєстрації</h1>
    <form action="processForm" method="post">
        <input type="text"     name="firstName" placeholder="Імя"><br>
        <input type="text"     name="lastName"  placeholder="Прізвище"><br>
        <input type="email"    name="email"     placeholder="Емейл"><br>
        <input type="password" name="pass"      placeholder="Пароль"><br>
        <input type="submit"   value="Відправити"><br>
        <div>
            <?php 
                $sesssion = new ModelSession(); 
                echo  $sesssion->getErrorMessage();
                echo  $sesssion->getSuccessMessage();
            ?>
        </div>
    </form>
    </div>
</div>


<?php require_once 'footer.php';?>