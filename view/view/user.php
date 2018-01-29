<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 27.01.2018
 * Time: 09:57
 */
?>
<div class="content">
    <div class="container_12">
        <div class="grid_12">
            <?php if(!isset($_SESSION['User'])){?>
            <h3><span>Login</span></h3>
            <?php echo $this->formHelper->createForm("user","/user/login","POST","Login"); ?>
            <div class="success_wrapper">
                <div class="success">Debug<br>
                    <strong>You are now logged in!</strong>
                </div>
            </div>
            <fieldset>
                <label class="username">
                    <input type="text" name="username" placeholder="Username">
                    <br class="clear">
                    <span class="error error-empty">*This is not a valid name.</span><span class="empty error-empty">*This field is required.</span> </label>
                <label class="password">
                    <input type="password" name="password" placeholder="Password">
                    <br class="clear">
                    <span class="error error-empty">*This is not a valid phone number.</span><span class="empty error-empty">*This field is required.</span> </label>

                <div class="btns">
                    <button type="submit" class="btn">Login</button>
                </div>
            </fieldset>
            <?php echo $this->formHelper->endForm(); ?>
            <h3><span>Register</span></h3>
            <?php echo $this->formHelper->createForm("user","/user/register","POST","Register"); ?>
            <div class="success_wrapper">
                <div class="success">Data submitted!<br>
                    <strong>You can now login with your username and password</strong>
                </div>
            </div>
            <fieldset>
                <label class="username">
                    <input type="text" name="username" placeholder="Username">
                    <br class="clear">
                    <span class="error error-empty">*This is not a valid name.</span><span class="empty error-empty">*This field is required.</span> </label>
                <label class="password">
                    <input type="password" name="password" placeholder="Password">
                    <br class="clear">
                    <span class="error error-empty">*This is not a valid phone number.</span><span class="empty error-empty">*This field is required.</span> </label>
                <label class="email">
                    <input type="text" name="email" placeholder="E-mail">
                    <br class="clear">
                    <span class="error error-empty">*This is not a valid email address.</span><span class="empty error-empty">*This field is required.</span> </label>

                <div class="btns">
                    <!--<button type="reset" class="btn">Clear</button>-->
                    <button type="submit" class="btn">Register</button>
                </div>
            </fieldset>
            <?php echo $this->formHelper->endForm(); ?>
            <?php }else{?>
                <h3><span>Profile</span></h3>
            <button class="btn" type="submit" formaction="user/logout">Logout</button>
            <?php var_dump($this->user);?>


            <?php }?>
        </div>
    </div>
</div>


