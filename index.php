//CREATE A TABLE IN SQL NAMED 'TextChat' SQL: CREATE TABLE textChat(Name VARCHAR(255), Text VARCHAR(255)); 

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

  <html>
    <body>
      <style>
          body{
            background-color: green;
          }

          .blocktext {
            margin-left: auto;
              margin-right: auto;
                width: 8em
          }

          .com{
          background-color: black; 
            border: 5px solid darkgoldenrod;
              padding: 15px;
               margin: 2%;
                  display: width;
                    text-align: center;
          }

          .chatWindow{
            height:400px;
              width:500px;
                border:1px solid #ccc;
                  font:16px/26px Georgia, Garamond, Serif;
                    overflow:auto; 
                      background-color: white; 
                        margin-left: auto; 
                          margin-right: auto

          }

      </style>


  <script>

   $(document).ready(function() {
      setInterval(function(){
        $("#content").load('index.php' + ' #content');
             },500);
              });

  </script>


<?php


$servername = "127.0.0.1";
  $username = "root";
    $password = "AK7llv748";     
      $dbname = "asharsDataBase";
  
        $conn = new mysqli($servername, $username, $password, $dbname);
     
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
        }

              $name = mysqli_real_escape_string($conn,$_REQUEST['Name'] ?? '') ;
                $text = mysqli_real_escape_string($conn,$_REQUEST['Text'] ?? '') ;
                  if($name != NULL && $text != NULL){
                      $chat= "INSERT INTO textChat(Name, Text) VALUES ('$name','$text')";
                        $conn->query($chat);
                    }
           
                        $result = mysqli_query($conn,"SELECT * FROM textChat");

  ?>

 <h1 style = "color: white; text-align: center"> TextChat WebApp </h1>
    <div id = "window">
      <div id = "content">
          <div class = "chatWindow">
  
<?php
      while($row = mysqli_fetch_array($result)){    
        $nameRow = $row['Name'];
          $textRow = $row['Text'];

      echo "<h style = 'color:Red'> ".$nameRow. " </h> <h style = 'color:Navy'> Says: </h> <h style = 'color:green'>" .$textRow. "</h>".
   "<br>";
      }
?>

      </div>
    </div>
  <br>
  <div class = 'com'>
    <h style = "color: white; font-size: 20px; text-align: center">Enter Chat!</h>
      <br>
        <br>
  <form action="index.php" method="post">
     <input placeholder = "Name" type="text" name="Name" value = "<?php echo isset($_POST['Name']) ? htmlspecialchars($_POST['Name'], ENT_QUOTES) : ''; ?>">
         <br>
          <br>
           <input placeholder = "Enter a Chat" type="text" name="Text">
            <br>
              <br>
            <input type="submit">
          </form>
        </div>
      </div>

<br>
  
     <?php

        $conn->close();

      ?>


     <?php

 if(array_key_exists('button1', $_POST)) { 
        button1(); 
          } 
      function button1() { 
          $output = shell_exec("python deleteChat.py");
              echo "<h1>$output</h1>";
            } 

      ?>

          <div style = "text-align: center">
            <form method="post"> 
              <input type="submit" name="button1"
                class="button1" value="Delete Database data" />
            </form>
          </div>
        </body>
      </html>

