<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QnA Platform</title>

    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/index.css">

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

            <div class="add-qn">
                <span>Top Questions:</span>
                <a class="qn-btn" href="askQ.html">Ask Question</a>
            </div>

            <div class="quesions-list">
                
                <div class="qn">
                   
                    <h3><a href="question.html">How to create a chatbot?</a></h3>
                   
                   <div class="user-profile">
                        <span>By: <a href="">user123</a></span>
                   </div>
                </div>

                
                <div class="qn">
                    <h3><a href="question.html">Question-2</a></h3>
                    <div class="user-profile">
                        <span>By: <a href="">user102</a></span>
                   </div>
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