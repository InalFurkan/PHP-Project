<HTML>
    <head>
    <meta charset="UTF-8">
    <title>Your Web Page</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #2C2C2C;
        }
        .header {
            display: flex;
            align-items: center;
            margin-top: 10px;
            margin-left: 10px;
            color: #FFFFFF;
        }
        .header h1 {
            font-size: 60px;
            margin-right: 10px;
            color: #FFFFFF;
        }

        .header input {
            height: 60px;
            font-size: 48px;
            color: #7C7C7C;
            background-color: #2C2C2C;
        }
        

        .header img {
            margin-left: 200px;
            align-items: right;
        }

        .subheader {
            display: flex;
            align-items: center;
            margin-top: 20px;
            margin-left: 10px;
            color: #FFFFFF;
        }
        .subheader h2 {
            font-size: 36px;
            margin-right: 10px;

        }
        .picker {
            display: inline-block;
            //width: 150px; /* Adjust the width as needed */
            height: 60px;
            font-size: 48px;
            color: #7C7C7C;
            background-color: #2C2C2C;
        }
        .picker:nth-child(1) {
            width: 200px;
        }
        .picker:nth-child(2) {
            width: 85px;
        }
        .picker:nth-child(3) {
            width: 200px;
        }
        .datetime {
            margin-left: auto;
            margin-right: 10px;
            margin-top: 10px;
            font-size: 30px;
            color: #FFFFFF;
            align-items: right;
        }
        .buttons {
            display: flex;
            margin-top: 20px;
            margin-left: 10px;
            
        }
        .rounded-button {
            border-radius: 10px;
            font-size: 24px;
            padding: 10px 20px;
            margin-right: 10px;
            color: #7C7C7C;
            background-color: #2C2C2C;
        }

        content {
            display: flex;
            align-items: center;
            color: #FFFFFF;
        }
        .content p {
            flex: 1;
            margin-left:20px;
            margin-right:20px;
            color: #FFFFFF;
        }
        .content img {
            align-items: right;
            margin-left: auto;
            margin-right: 10px;
            width: 100px; /* Adjust the width as needed */
            height: auto;
        }
        body {
            background-image: url('image 2.png');
            background-size: cover;
            
        }

    </style>
</head>
    <BODY>
        <div class="subheader">
        <h2>Your Name Is</h2>
        <input id="nameInput" type="text" placeholder="Enter your name">
        <div class="datetime">
        <div class="datetime">
            <div <h3>Now is</h3> </div>
            <div id="date"></div>
            <div id="time"></div>
        </div>
        </div>
    </div>

    <script>
        <?php
            $filename = 'USER.txt';
            $fileContents = file_get_contents($filename);
            $fileContents = trim($fileContents);
            $fileContents = str_replace("\n", "", $fileContents);
        ?>

        var nameInput = document.getElementById('nameInput');
        nameInput.value = '<?php echo $fileContents; ?>';
    </script>

    <div class="subheader">
        <h2>My Birthday Is</h2>
        <select id = "dayPicker" class="picker">
            <?php
            for ($i = 1; $i <= 31; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>
        <select id = "monthPicker" class="picker">
            <option value="01">January</option>
            <option value="02">February</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>
        <select id = "yearPicker" class="picker">
            <?php
            $currentYear = date("Y");
            for ($year = 1970; $year <= $currentYear; $year++) {
                echo "<option value='$year'>$year</option>";
            }
            ?>
        </select>
        </div>
        <div class="buttons">
        <button id = "clearButton" class="rounded-button">Clear</button>
        <button id = "submitButton" class="rounded-button">Submit</button>
    </div>


    <script>
        var nameInput = document.getElementById('nameInput');
        var dayPicker = document.getElementById('dayPicker');
        var monthPicker = document.getElementById('monthPicker');
        var yearPicker = document.getElementById('yearPicker');
        var clearButton = document.getElementById('clearButton');
        var submitButton = document.getElementById('submitButton');
        var zodiacName = document.getElementById('zodiacName');

        // Function to clear the input field and pickers
        function clearFields() {
            nameInput.value = '';
            dayPicker.selectedIndex = 0;
            monthPicker.selectedIndex = 0;
            yearPicker.selectedIndex = 0;
            zodiacName.value = 'S';
        }

        // Add event listener to the clear button
        clearButton.addEventListener('click', clearFields);
    </script>
    </div>
        <div class="header">
        <h1>ZODIAC SIGN</h1>
        <h1 id = "zodiacName" >S</h1>
      
        <div class="content">
        </div>
        </div>

<div class = "content">
<p id="description"></p>
        </div>
    <script>
        var paragraph = document.getElementById('description');

        // Function to clear the paragraph and fill it with text from file
        function updateParagraph(address) {
            paragraph.textContent = '';

            // Make an AJAX request to fetch the file contents
            var xhr = new XMLHttpRequest();
            xhr.open('GET', address, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Update the text content of the paragraph with the contents of the file
                    paragraph.textContent = xhr.responseText.trim();
                }
            };
            xhr.send();
        }

        // Call the function to update the paragraph initially
        updateParagraph('default.txt');
    </script>
<script>
  var zodiacName = document.getElementById('zodiacName');
  var body = document.body;
  var text = document.getElementById('description');

  function submit() {
    var selectedMonth = parseInt(monthPicker.value);
    var selectedDay = parseInt(dayPicker.value);

    switch (selectedMonth) {
      case 1: 
        if (selectedDay >= 20) {
          zodiacName.textContent = 'Aquarius';
          body.style.backgroundImage = "url('aquarius.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('aquarius.txt');
    
        } else {
          zodiacName.textContent = 'Capricorn';
          body.style.backgroundImage = "url('capricorn.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('default.txt');
        }
        break;

      case 2: 
        if (selectedDay >= 19) {
          zodiacName.textContent = 'Pisces';
          body.style.backgroundImage = "url('pisces.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('descriptions/Pisces.txt');
        } else {
          zodiacName.textContent = 'Aquarius';
          body.style.backgroundImage = "url('aquarius.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('descriptions/aquarius.txt');
        }
        break;

        case 3: 
        if (selectedDay >= 21) {
          zodiacName.textContent = 'Aries';
          body.style.backgroundImage = "url('images/aries.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('descriptions/aries.txt');
        } else {
          zodiacName.textContent = 'Pisces';
          body.style.backgroundImage = "url('Pisces.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('descriptions/pisces.txt');
            
        }
        break;

        case 4: 
        if (selectedDay >= 20) {
          zodiacName.textContent = 'Taurus';
          body.style.backgroundImage = "url('Taurus.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('descriptions/Taurus.txt');
        } else {
          zodiacName.textContent = 'Aries';
          body.style.backgroundImage = "url('Aries.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('descriptions/Aries.txt');
        }
        break;

        case 5: 
        if (selectedDay >= 21) {
          zodiacName.textContent = 'Gemini';
          body.style.backgroundImage = "url('Gemini.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('descriptions/Gemini.txt');
        } else {
          zodiacName.textContent = 'Taurus';
          body.style.backgroundImage = "url('Taurus.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('descriptions/Taurus.txt');
        }
        break;

        case 6: 
        if (selectedDay >= 21) {
          zodiacName.textContent = 'Cancer';
          body.style.backgroundImage = "url('Cancer.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('descriptions/Cancer.txt');
        } else {
          zodiacName.textContent = 'Gemini';
          body.style.backgroundImage = "url('gemini.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('descriptions/gemini.txt');
        }
        break;

        case 7: 
        if (selectedDay >= 23) {
          zodiacName.textContent = 'Leo';
          body.style.backgroundImage = "url('leo.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('descriptions/leo.txt');
        } else {
          zodiacName.textContent = 'Cancer';
          body.style.backgroundImage = "url('cancer.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('descriptions/cancer.txt');
        }
        break;

        case 8: 
        if (selectedDay >= 19) {
          zodiacName.textContent = 'Virgo';
          body.style.backgroundImage = "url('virgo.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('descriptions/virgo.txt');
        } else {
          zodiacName.textContent = 'Leo';
          body.style.backgroundImage = "url('leo.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('descriptions/leo.txt');
        }
        break;

        case 9: 
        if (selectedDay >= 19) {
          zodiacName.textContent = 'Libra';
          body.style.backgroundImage = "url('libra.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('descriptions/libra.txt');
        } else {
          zodiacName.textContent = 'Virgo';
          body.style.backgroundImage = "url('virgo.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('descriptions/virgo.txt');
        }
        break;

        case 10: 
        if (selectedDay >= 19) {
          zodiacName.textContent = 'Scorpio';
          body.style.backgroundImage = "url('scorpio.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('descriptions/scorpio.txt');
        } else {
          zodiacName.textContent = 'Libra';
          body.style.backgroundImage = "url('libra.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('descriptions/libra.txt');
        }
        break;

        case 11: 
        if (selectedDay >= 19) {
          zodiacName.textContent = 'Sagittarius';
          body.style.backgroundImage = "url('sagittarius.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('descriptions/sagittarius.txt');
        } else {
          zodiacName.textContent = 'Scorpio';
          body.style.backgroundImage = "url('scorpio.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('descriptions/scorpio.txt');
        }
        break;

        case 12: 
        if (selectedDay >= 19) {
          zodiacName.textContent = 'Capricorn';
          body.style.backgroundImage = "url('capricorn.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('descriptions/capricorn.txt');
        } else {
          zodiacName.textContent = 'Sagittarius';
          body.style.backgroundImage = "url('sagittarius.jpg')";
          body.style.backgroundSize = "cover";
          updateParagraph('descriptions/sagittarius.txt');
        }
        break;


      default:
        zodiacName.textContent = 'Invalid date';
        break;
    }
  }

  submitButton.addEventListener('click', submit);
</script>

    <script>
       
        var currentDate = new Date();
        var dateElement = document.getElementById("date");
        var timeElement = document.getElementById("time");
        
        dateElement.textContent = currentDate.toLocaleDateString();
        timeElement.textContent = currentDate.toLocaleTimeString();
    </script>
    </div>

    </BODY>
</HTML>