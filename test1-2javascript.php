<!DOCTYPE html>
<html>
<head>
   <body style="background-color: beige;"> 
    <?php

    $radioErr = $radio1Err = $radio2Err = $radio3Err = $radio4Err = 
    $result1 = $result2 = $result3 = $result4 = $result5 = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["radio"])) {
                $radioErr = "*Choose an option*";
        }
        else    {
                $result1 = $_POST["radio"];
                }
        if (empty($_POST["radio1"])) {
                $radio1Err = "*Choose an option*";
        }
        else    {
                $result2 = $_POST["radio1"];
                }
        if (empty($_POST["radio2"])) {
                $radio2Err = "*Choose an option*";
        }
        else    {
                $result3 = $_POST["radio2"];
                }
        if (empty($_POST["radio3"])) {
                $radio3Err = "*Choose an option*";
        }
        else    {
                $result4 = $_POST["radio3"];
                }
        if (empty($_POST["radio4"])) {
                $radio4Err = "*Choose an option*";
        }
        else    {
                $result5 =  $_POST["radio4"];
                }
}
    
?>

<form action="test1-2javascript.php" method="post">
    
    <h1>Test 1.2</h1>

<?php
    
 echo "<strong>1- JavaScript ignores extra spaces</strong>";
 echo "&nbsp;&nbsp;&nbsp;<font color='red'>&nbsp$radioErr</font>";
 
 $answer1=["A) True",
           "B) False"];

foreach( $answer1 as $answer1s)
{	   
		echo '<p><input type="radio" name="radio" value="'.$answer1s.'"> '.$answer1s.'</p>';
};


echo "<strong>2- Which of the following is correct to write 'Hello World' on the web page?</strong>";  echo "<font color='red'>&nbsp;&nbsp;&nbsp;$radio1Err</font>"; 

 $answer2=["A) System.out.println('Hello World')",
           "B) print('Hello World')",
          "C) document.write('Hello World')",
          "D) response.write('Hello World')"];

foreach( $answer2 as $answer2s)
{	   
		echo '<p><input type="radio" name="radio1" value="'.$answer2s.'"> '.$answer2s.'</p>';
};

echo "<strong>3- Which of the following is correct to write 'Hello World' on the web page?</strong>";  echo "<font color='red'>&nbsp;&nbsp;&nbsp;$radio2Err</font>"; 

 $answer3=["A) System.out.println('Hello World')",	
 "B) print('Hello World')",	
 "C) document.write('Hello World')",	
  "D) response.write('Hello World')"];

foreach( $answer3 as $answer3s)
{	   
		echo '<p><input type="radio" name="radio2" value="'.$answer3s.'"> '.$answer3s.'</p>';
};

echo "<strong>4- Which of the following is the tainted property of a window object in Java Script?</strong>";  echo "<font color='red'>&nbsp;&nbsp;&nbsp;$radio3Err</font>"; 

 $answer4=["A) Pathname",
           "B) Protocol", 
          "C) Defaultstatus",
           "D) Host"];

foreach( $answer4 as $answer4s)
{	   
		echo '<p><input type="radio" name="radio3" value="'.$answer4s.'"> '.$answer4s.'</p>';
};

echo "<strong>5- Which attribute needs to be changed to make elements invisible?</strong>";  echo "<font color='red'>&nbsp;&nbsp;&nbsp;$radio4Err</font>"; 

 $answer5=["A) Visibilty",
           "B) Visible",
           "C) Invisibility",
           "D) Invisible"];

foreach( $answer5 as $answer5s)
{	   
		echo '<p><input type="radio" name="radio4" value="'.$answer5s.'"> '.$answer5s.'</p>';
};
    
    ?>
    <input type = "submit" value = "Get Result"/>
    <a href="start.html"><input type="button" value="Return"></a>
    </form>
       
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
$totalCorrect = 0;

if ($result1 =="B) False") {$totalCorrect++;}
if ($result2 =="C) document.write('Hello World')") {$totalCorrect++;}
if ($result3 =="C) document.write('Hello World')") {$totalCorrect++;}
if ($result4 =="C) Defaultstatus") {$totalCorrect++;}
if ($result5 =="A) Visibilty"){ $totalCorrect++;}

echo "<div id='results'><h1>Your score is  $totalCorrect / 5 </h1></div>";
    
}
       ?>
    </body>
    </head>
</html>