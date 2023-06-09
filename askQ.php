<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QnA Platform</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/formatText.css">

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
            <h2>Ask Your Question</h2>

            <div class="format-box">
                
                <label for="question-title">Title</label>
                <input type="text" id="question-title" name="question-title" required>
                
                <label for="question-details">Question Details</label>
               
                <div class="text-box">
                    <div class="format-btn">
                        <button onclick="formatText('bold')">Bold</button>
                        <button onclick="formatText('italic')">Italic</button>
                        <button onclick="formatText('quote')">Quote</button>
                        <button onclick="formatText('list')">List</button>
                        <button onclick="formatText('line-break')">Line Break</button>
                        <button onclick="formatText('space')">Space</button>
                        <button onclick="formatText('snippet')">Code</button>
                        <button onclick="formatText('code')">Code(Multi-Line)</button>
                        
                    </div>
                   
                    <textarea class="text-box" id="text-box" name="text-box" required></textarea>
                    
                </div>

                
                <button onclick="convertToHTML()" id="preview-btn">Preview</button>
                
                <div id="preview-box">
                
                </div>
    
                <form action="" method="GET">
                    <button type="submit" id="submit-btn" style="display: none;">Submit</button>
                </form>
    
            </div>
            
            

        </div>

        <div class="right-sidebar">
            (right-sidebar)
            <h3>Markdown writing tips: </h3>
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

    <script src="assets/formatText.js"></script>

</body>
</html>