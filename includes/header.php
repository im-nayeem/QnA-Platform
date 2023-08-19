<?php 
if(!isset($_SESSION)) 
        session_start();
?>
<header>
        <div class="sidenav-btn" id="sidenav-btn">
                ☰
        </div>

        <div class="logo">
            <a href="./">
                <img src="assets/logo.png" alt="logo">
            </a>
            <div class="name">
                <h2>QnA Platform</h2>   
            </div>
        </div>
       
        <div class="search">
            <form class="search-form" action="/search.php" method="$_GET">
                <input type="text" placeholder="Search" class="search-input" name="q">
                <button type="submit" class="search-button">Search</button>
              </form>
        </div>

        <?php if(!isset($_SESSION['user'])):?>
            <div class="account">
                <a href="/account/login.php">LogIn</a>
                <a href="/account/signup.php">SignUp</a>
            </div>
        <?php else:?>
            <div class="account">
                <a href="/account/profile.php">My Account</a>
            </div>
        <?php endif;?>
</header>

    <div class="float-search search">
            <form class="search-form" action="/search.php" method="$_GET">
                <input type="text" placeholder="Search" class="search-input" name="q">
                <button type="submit" class="search-button">Search</button>
              </form>
    </div>

    <main>
        <div class="left-sidebar" id="left-sidebar">
            <button class="sidenav-close-btn" id="sidenav-close-btn" onclick="toggleSidebar();">&times;</button>
            <nav>
                <a href="/">Home</a>
                <a href="all-questions.php">Questions</a>
                <a href="">Tags</a>
                <a href="">Users</a>
            </nav>
        </div>