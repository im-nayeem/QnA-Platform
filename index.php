<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QnA Platform</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/index.css">

</head>

<body>
        <?php require "./includes/header.php";?>

        <div class="main-content">

            <div class="add-qn">
                <span>Top Questions:</span>
                <a class="qn-btn" href="askQ.php">Ask Question</a>
            </div>

            <div class="quesions-list">
                
                <div class="qn">
                   
                    <h3><a href="question.php">How to create a chatbot?</a></h3>
                   
                   <div class="user-profile">
                        <span>By: <a href="">user123</a></span>
                   </div>
                </div>

                
                <div class="qn">
                    <h3><a href="question.php">Question-2</a></h3>
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

<?php require "./includes/footer.php";?>
    
</body>
</html>