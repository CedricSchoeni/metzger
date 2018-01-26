<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 20.12.2017
 * Time: 19:27
 */
?>

<?php echo $this->formHelper->createForm(
    "user",
    "/user/login",
    "POST"
); ?>
    <div class="LoginContainer">
        <div class="alert" id="alert"></div>
        <?php echo $this->formHelper->inputGroup('username', 'form-element','text', ['label' => 'Username', 'maxlength' => 50]);?>
        <?php echo $this->formHelper->inputGroup('password', 'form-element','text', ['label' => 'Password', 'maxlength' => 50]);?>
        <button class="btn btnLogin" type="submit">Login</button>
</div>


<?php echo $this->formHelper->endForm(); ?>