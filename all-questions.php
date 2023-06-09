<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QnA Platform</title>

    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/all-question.css">

</head>
<body>

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
            <form class="search-form" action="#">
                <input type="text" placeholder="Search" class="search-input">
                <button type="submit" class="search-button">Search</button>
              </form>
        </div>
        <div class="account">
            <a href="login.html">LogIn</a>
            <a href="signup.html">SignUp</a>
        </div>
        <div class="user">

        </div>
    </header>
    <div class="float-search search">
        <form class="search-form" action="#">
            <input type="text" placeholder="Search" class="search-input">
            <button type="submit" class="search-button">Search</button>
          </form>
    </div>

    

    <main>
        <div class="left-sidebar" id="left-sidebar">
            <button class="sidenav-close-btn" id="sidenav-close-btn" onclick="toggleSidebar();">&times;</button>
            <nav>
                <a href="./">Home</a>
                <a href="all-questions.html">Questions</a>
                <a href="">Tags</a>
                <a href="">Users</a>
            </nav>
        </div>

        <div class="main-content">

                <div id="filter-btn">
                    <a href="">All</a>
                    <a href="">Popular</a>
                    <a href="">Top Answered</a>
                    <a href="">Not Answered</a>
                </div>
                
            <div id="q-list">

                <div class="question">
                    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </h3>
                    <div class="user-profile">

                    </div>
                </div>

                <div class="question">
                    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </h3>
                    <div class="user-profile">

                    </div>
                </div>

            </div>

        <div class="right-sidebar">
            right-sidebar
        </div>
    
    </main>

    <footer>
        <div class="help">
            QnA Platform
            <hr>
            Help
        </div>
        <div class="about">
            QnA Platform
            <hr>
            About Us
        </div>
        <div class="copyright">
            Copyright &copy; 2023 QnA Platform
        </div>
    </footer>
    <script src="assets/responsive.js"></script>
</body>
</html>