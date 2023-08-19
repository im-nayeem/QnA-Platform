<?php
require_once $_SERVER['DOCUMENT_ROOT']."/account/model/user.php";
require_once $_SERVER['DOCUMENT_ROOT']."/model/question.php";
require_once $_SERVER['DOCUMENT_ROOT']."/model/qnAnswer.php";
require_once $_SERVER['DOCUMENT_ROOT']."/utility.php";

if(!isset($_SESSION))
    session_start();

$questionList = [];
$answerList = [];

if(isset($_GET['query']))
{
    try{
        $pipeline = [
            [
                '$search' => [
                    'index' => 'full_text_qn',
                    'text' => [
                        'query' => $_GET['query'],
                        'path' => ['title', 'details'] 
                    ]
                ]
            ]
        ];
        
        $collections = $db->questions->aggregate($pipeline);
        foreach($collections as $qnInfo)
        {
            array_push($questionList, new Question($qnInfo, null));
        }

        $pipeline = [
            [
                '$search' => [
                    'index' => 'full_text_ans',
                    'text' => [
                        'query' => $_GET['query'],
                        'path' => ['text'] 
                    ]
                ]
            ]
        ];
        
        $collections = $db->answers->aggregate($pipeline);
        foreach($collections as $ans)
        {
            array_push($answerList, new Answer($ans));
        }

    }
    catch(Exception $e){

    }

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
    <link rel="stylesheet" href="assets/css/search.css">
    <script src="/assets/js/timeConverter.js"></script>
</head>

<body>

    <?php require "./includes/header.php";?>
        <div class="main-content">

                <div id="filter-btn">
                    Search Results:
                </div>
                
            <div id="q-list">
                <?php foreach($questionList as $qn): ?>
                    <div class="question q">
                        
                        <h3><a href="question-view.php?qid=<?=$qn->getQid();?>"> <?= $qn->getTitle(); ?> </a></h3>
                        <div class="q-details">
                            <?= strip_tags($qn->getDetails());?>
                        </div>
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

            <div id="q-list">
                <?php foreach($answerList as $ans): ?>
                    <div class="q">
                        <div class="ans-details">
                            <a href="question-view.php?qid=<?=$ans->getQid();?>#<?=$ans->getAid();?>">
                                <?= strip_tags($ans->getText());?>
                            </a>
                        </div>
                        <div class="question-footer">
                            <div class="time">
                                <?= convertUTCToLocal($ans->getTimestamp()); ?>
                            </div>
                            <div class="user-profile">
                                <span>By: <a href="/user-profile.php?uid=<?=$ans->getAuthor()->getUserId(); ?>">
                                    <?= $ans->getAuthor()->getFirstName(); ?>
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