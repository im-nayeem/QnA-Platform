<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/account/model/user.php";
require_once $_SERVER['DOCUMENT_ROOT']."/model/question.php";
require_once $_SERVER['DOCUMENT_ROOT']."/utility.php";

$questionList = Question::getAllQuestionList();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QnA Platform</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <script src="/assets/js/timeConverter.js"></script>
</head>

<body>
        <?php require $_SERVER['DOCUMENT_ROOT']."/includes/header.php";?>

        <div class="main-content">

            <div class="add-qn">
                <span>Top Questions:</span>
                <a class="qn-btn" href="askQ.php">Ask Question</a>
            </div>

            <div class="quesions-list">
                <?php foreach($questionList as $qn): ?>
                    <div class="qn">
                        <h3>
                            <a href="question-view.php?qid=<?=$qn->getQid();?>"> <?= $qn->getTitle(); ?> </a>
                        </h3>
                        <div class="qn-footer">
                            <div class="time">
                                <?php convertUTCToLocal($qn->getTimestamp());?>
                            </div>
                            <div class="user-profile">
                                <span>Posted By: <a href="/user-profile.php?uid=<?=$qn->getAuthor()->getUserId(); ?>">
                                    <?= $qn->getAuthor()->getFirstName(); ?> </a>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            
        </div>

        <div class="right-sidebar">
            right-sidebar-contents
        </div>

<?php require $_SERVER['DOCUMENT_ROOT']."/includes/footer.php";?>
    
</body>
</html>