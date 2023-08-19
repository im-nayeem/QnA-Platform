<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/account/model/user.php";
require_once $_SERVER['DOCUMENT_ROOT']."/model/question.php";
require_once $_SERVER['DOCUMENT_ROOT']."/utility.php";

if(!isset($_SESSION))
    session_start();

$questionList = [];

try{
    if(isset($_GET['q']))
    {
        if($_GET['q'] == 'not_answered')
            $questionList = Question::getNotAnsweredQuestions();
        elseif($_GET['q'] == 'top_answered')
            $questionList = Question::getTopAnsweredQuestions();
    }    
    else
        $questionList = Question::getAllQuestionList();
}
catch(Exception $e){
    log_error($e);
    header('Location: /error/error404.php');
}

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
    <script src="/assets/js/timeConverter.js"></script>
</head>

<body>

    <?php require "./includes/header.php";?>
        <div class="main-content">

                <div id="filter-btn">
                    <a href="./all-questions.php">All</a>
                    <a href="">Popular</a>
                    <a href="./all-questions.php?q=top_answered">Top Answered</a>
                    <a href="./all-questions.php?q=not_answered">Not Answered</a>
                </div>
                
            <div id="q-list">
                <?php foreach($questionList as $qn): ?>
                    <div class="question q">
                        
                        <h3><a href="question-view.php?qid=<?=$qn->getQid();?>"> <?= $qn->getTitle(); ?> </a></h3>
                        
                        <div class="question-footer">
                            <div class="time">
                                <?= convertUTCToLocal($qn->getTimestamp()); ?> | Answered: <?=$qn->getAnswerCount();?>
                            </div>
                            <div class="user-profile">
                                <span>By: <a href="/user-profile.php?uid=<?=$qn->getAuthor()->getUserId(); ?>">
                                    <?= $qn->getAuthor()->getFirstName(); ?>
                                </a></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>

        </div>
            <div class="right-sidebar">
                <!-- right-sidebar -->
            </div>
    </main>

    <?php require "./includes/footer.php";?>
    
</body>
</html>