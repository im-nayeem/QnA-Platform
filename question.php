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


</head>
<body>

        <?php require "./includes/header.php";?>

        <div class="main-content">

            <div class="question">
                <div id="q-title">
                    <h2>How to create a chatbot?</h2>
                </div>
                <hr>
                <div id="q-details">
                    What are the procedures to create chatbot?<br>
                    Where to get started?<br>
                    What are prerequisites?
                </div>
                <div class="user-profile">
                    <span>By: <a href="">user123</a></span>
                </div>
            </div>
            <hr>

            <div class="answer-list">
                <div class="add-qn">
                    <span><strong><u>Answers:</u></strong></span>
                    <a class="qn-btn" href="#answer-box">Answer This</a>
                </div>
                
                <div class="answer">
                    Creating a chatbot involves several steps and requires a combination of programming skills, natural language processing (NLP) knowledge, and understanding of the problem domain. 
                    <div class="user-profile">
                        <span>By: <a href="">user345</a></span>
                    </div>
                </div>
                <div class="answer">
                    Prerequisites for creating a chatbot:
                    <br>
                    1. Programming Knowledge: You'll need programming skills to develop a chatbot. Proficiency in languages such as Python, JavaScript, or Java can be beneficial.
                    <br>
                    2. Natural Language Processing (NLP): Familiarity with NLP concepts, such as tokenization, part-of-speech tagging, and sentiment analysis, will help in processing and understanding user inputs.
                    <div class="user-profile">
                        <span>By: <a href="">user789</a></span>
                    </div>
                </div>
            </div>

            <div id="answer-box">
                <div class="format-box">
                
                    <label for="text-box">Your Answer</label>
                   
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

            <div id="answers">

            </div>

        </div>

        <div class="right-sidebar">
            right-sidebar
        </div>
    
    </main>

    <?php require "./includes/footer.php";?>

    <script src="assets/formatText.js"></script>

</body>
</html>