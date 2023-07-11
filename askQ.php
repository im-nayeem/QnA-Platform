<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QnA Platform</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/formatText.css">

</head>
<body>
        <?php require "./includes/header.php";?>
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

    <?php require "./includes/footer.php";?>

    <script src="assets/js/formatText.js"></script>

</body>
</html>