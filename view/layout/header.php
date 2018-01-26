<html>
<head>
    <!-- main css -->
    <link rel="stylesheet" href="/151/assets/css/main.css">
    <!-- responsive required meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Javscript -->
    <script src="/151/assets/javascript/main.js" type="text/javascript"></script>
</head>

<body>
    <div class="siteBackground">
        <div class="siteRoot">
            <header>
                <div class="navbar">
                    <ul class="navbarlist">
                        <li class="navbarlistelement"><a href="/Bonziblog/Index">Home</a></li>
                        <li class="navbarlistelement"><a href="/Bonziblog/Blog">Blog</a></li>
                        <li class="navbarlistelement"><a href="https://www.fda.gov/AboutFDA" target="_blank">About</a></li>
                        <?php if(!isset($_SESSION['user'])){
                        echo'<li class="navbarlistelement"><a href="/user/login"><img src="https://png.icons8.com/nolan/22//login-rounded-right.png"></a></li>';
                        }else{
                            echo'<li class="navbarlistelement"><a href="/user/logout"><img src="https://png.icons8.com/nolan/22//logout-rounded.png"></a></li>';
                            echo'<li class="navbarlistelement"><a href="/BonziBlog/addBlog"><img src="https://png.icons8.com/nolan/22//add.png"></a></li>';
                            if($_SESSION['user']['Role']=="admin"){
                                echo'<li class="navbarlistelement"><a href="/BonziBlog/resetDB"><img src="https://png.icons8.com/nolan/22//synchronize.png"></a></li>';
                            }
                        }?>
                        <li class="navbarlistelement" style="float: right;"><a href="https://facebook.com" target="_blank"><img src="/151/assets/images/facebook.png"></a></li>
                        <li class="navbarlistelement" style="float: right;"><a href="https://instagram.com" target="_blank"><img src="/151/assets/images/instagram.png"></a></li>
                        <li class="navbarlistelement" style="float: right;"><a href="https://snapchat.com" target="_blank"><img src="/151/assets/images/snapchat.png"></a></li>
                        <li class="navbarlistelement" style="float: right;"><a href="https://patreon.com" target="_blank"><img src="/151/assets/images/patreon.png"></a></li>
                        <li class="navbarlistelement" style="float: right;"><a href="https://twitter.com" target="_blank"><img src="/151/assets/images/twitter.png"></a></li>
                    </ul>
                </div>
            </header>


