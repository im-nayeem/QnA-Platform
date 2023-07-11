
var script = document.createElement('script');
script.src = 'https://cdn.jsdelivr.net/npm/showdown@1.9.1/dist/showdown.min.js';
document.head.appendChild(script);

/**
 * formatText function to format text in markdown
 * @param action the type of operation to perform 
 */
  function formatText(action) {
    const textarea = document.getElementById('text-box');
    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    let selectedText = textarea.value.substring(start, end);

    switch(action) {
      case 'bold':
        selectedText = `**${selectedText}**`;
        break;
      case 'italic':
        selectedText = `_${selectedText}_`;
        break;
      case 'quote':
        selectedText = `> ${selectedText}`;
        break;
      case 'list':
        selectedText = `- ${selectedText}`;
        break;
      case 'space':
        selectedText = ` ${selectedText}`;
        break;
      case 'line-break':
        selectedText = `<br> ${selectedText}`;
        break;
      case 'snippet':
        selectedText = `\`${selectedText}\``;
        break;
      case 'code':
        selectedText = `\n\`\`\`\n${selectedText}\n\`\`\`\n`;
        break;
      default:
        break;
    }

    textarea.value = textarea.value.substring(0, start) + selectedText + textarea.value.substring(end);
  }

  /**
   * convertToHTML function to convert from markdown format to html format
   */
  function convertToHTML() {
    const markdownText = document.getElementById('text-box').value;
    const converter = new showdown.Converter();
    const html = converter.makeHtml(markdownText);

    const previewBox = document.getElementById('preview-box');
    if(document.getElementById('question-title')!=null)
        previewBox.innerHTML = "<h2>"+document.getElementById('question-title').value+"</h2>"+ html;
    else
        previewBox.innerHTML =  html;
      
  
  
    document.getElementById('submit-btn').style.display='block';
  }


