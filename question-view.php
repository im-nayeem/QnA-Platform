<?php
require_once $_SERVER['DOCUMENT_ROOT']."/utility.php";
require_once $_SERVER['DOCUMENT_ROOT']."/account/model/user.php";
require_once $_SERVER['DOCUMENT_ROOT']."/db.php";
require_once $_SERVER['DOCUMENT_ROOT']."/model/question.php";
require_once $_SERVER['DOCUMENT_ROOT']."/model/qnAnswer.php";


if(!isset($_SESSION))
    session_start();

$question = null;
$answerList = [];
if($_SERVER["REQUEST_METHOD"] == "GET" and isset($_GET))
{
    try{
        $qid = $_GET['qid'];
        $question = new Question($qid);
        $answerList = $question->getAnswerList();
    }catch(Exception $e){
        log_error($e);
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
    <link rel="stylesheet" href="assets/css/formatText.css">
    <link rel="stylesheet" href="assets/css/question.css">
    <script src="/assets/js/timeConverter.js"></script>

</head>

<body>

        <?php require $_SERVER['DOCUMENT_ROOT']."/includes/header.php";?>

        <div class="main-content">
            <div class="question">
                
                <div id="q-title">
                    <h2><?= $question->getTitle(); ?></h2>
                </div>

                <hr>

                <div id="q-details">
                    <?= $question->getDetails(); ?>
                </div>
                <div class="paragraph-footer">
                    <div class="time">
                        <?php convertUTCToLocal($question->getTimestamp());?>
                    </div>
                    <div class="user-profile">
                        <span>Posted By: <a href="/user-profile.php?uid=<?=$question->getAuthor()->getUserId();?>">
                                <?= $question->getAuthor()->getFirstName(); ?>
                            </a></span>
                    </div>
                </div>
            </div>
            <hr>

            <div class="answer-list">

                <div class="add-ans">
                    <span><strong><u>Answers:</u></strong></span>
                    <a class="ans-btn" href="#answer-box">Answer This</a>
                </div>
                
                <?php foreach($answerList as $ans): ?>
                    <div class="answer" id="<?=$ans->getAid();?>">
                        <?= $ans->getText(); ?>
                        <div class="paragraph-footer">
                            <div class="time">
                            <?php convertUTCToLocal($ans->getTimestamp());?>
                            </div>
                            <div class="user-profile">
                                <span>By: <a href="/user-profile.php?uid=<?= $ans->getAuthor()->getUserId(); ?>">
                                    <?= $ans->getAuthor()->getFirstName(); ?></a></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                

            </div>

            <div id="answer-box">
                <div class="format-box">

                    <label for="text-box">Your Answer</label>
                <!-- common text-box for markdown formatting -->
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
        
                    <form action="/postAnswer.php" method="POST">
                        <input type="text" name="qid" value="<?= $question->getQid(); ?>" hidden>
                        <textarea class="text-box" id="details" name="details" required hidden></textarea>
                        <button type="submit" id="submit-btn" style="display: none;">Submit</button>
                    </form>
        
                </div>
            </div>
        </div>

        <div class="right-sidebar">
            right-sidebar
        </div>
    
        <script src="/assets/js/formatText.js"></script>


    <?php require $_SERVER['DOCUMENT_ROOT']."/includes/footer.php";?>


</body>
</html>