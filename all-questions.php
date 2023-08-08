<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/account/user.php";
require_once $_SERVER['DOCUMENT_ROOT']."/question.php";
require_once $_SERVER['DOCUMENT_ROOT']."/utility.php";

$questionList = getAllQuestionList();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QnA Platform</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/all-question.css">

</head>
<body>

    <?php require "./includes/header.php";?>
        <div class="main-content">

                <div id="filter-btn">
                    <a href="">All</a>
                    <a href="">Popular</a>
                    <a href="">Top Answered</a>
                    <a href="">Not Answered</a>
                </div>
                
            <div id="q-list">
            <?php foreach($questionList as $qn): ?>
                <div class="question q">
                    
                    <h3><a href="question-view.php?qid=<?=$qn->getQid();?>"> <?= $qn->getTitle(); ?> </a></h3>
                    
                    <div class="user-profile">
                            <span>By: <a href="/user-profile.php?uid=<?=$qn->getAuthor()->getUserId(); ?>">
                                <?= $qn->getAuthor()->getFirstName(); ?>
                            </a></span>
                    </div>

                    </div>
                <?php endforeach;?>
               

            </div>

        <div class="right-sidebar">
            <!-- right-sidebar -->
        </div>
    
    </main>

    <?php require "./includes/footer.php";?>
    
</body>
</html>