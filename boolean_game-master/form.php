<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Contact Us | Boolean Operators Tutorial</title>
  <meta name="author" content="Charles Seymour">
  <meta name="description" content="Form for submitting questions and comments regarding the Boolean Operators Tutorial">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/style.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <script>
		function validateForm() {
			var comments = document.getElementById("comments").value;
			if (comments === "") {
				alert("Please type your question or comment in the box");
			}
		}
  </script>
</head>

<body>

<div class="wrapper">


<header class="banner">

<h1>Boolean Operators Tutorial</h1>

<?php include('includes/menu.php');?>

</header>

<main class="main">

<h2>Do you have questions or comments?</h2>
<p>If you'd like to leave us a comment or question, please use the form to the right.  We appreciate your feedback to make the tutorials better.</p>

<p>To give us a call, the library main number is 555-555-5555.</p>
<p>You can also send us an email to library@university.edu</p>



</main>


<aside class="sidebar">

<h2>Form to Contact Us</h2>

<form class="assignment-form" method="post" action="includes/process.php" onsubmit="return validateForm()">
 
<fieldset>
 
  <legend>Personal Information</legend>
   
 
  <label for="name">Name:</label>
  <input type="text" id="name" name="name">
 
  <br>
  <br>
  
  <label for="email">Email:</label>
  <input type="text" id="email" name="email">
 
  <br>
  <br>
  
  <label for="status">University affiliation</label>
  <select name="status" id="status">
    <option value="student">Student</option>
    <option value="fac">Faculty</option>
	<option value="staff">Staff</option>
	<option value="alum">Alumni</option>
	<option value="none">Not affiliated</option>	
  </select>
</fieldset>
 <br>

  <fieldset>
 
    <legend>Would you like us to contact you?</legend>
     
    <label for="yes">Yes</label>
    <input type="radio" name="response" id="yes" value="yes">
     
    <label for="no">No</label>
    <input type="radio" name="response" id="no" value="no">
     
  </fieldset>
  
  <br>
  
  <fieldset>
 
  <legend>Tutorials you had a question/comment about (check all that apply) </legend>
 
  <label for="and">Boolean AND</label>
  <input type="checkbox" name="tutorial[]" id="and" value="and">
 
  <label for="or">Boolean OR</label>
  <input type="checkbox" name="tutorial[]" id="or" value="or">
 
  <label for="not">Boolean NOT</label>
  <input type="checkbox" name="tutorial[]" id="not" value="not">
 
</fieldset>
 
<br>
  <label for="comments">Comments/Questions</label>
  <br>
  <textarea name="comments" id="comments" rows="4" cols="50" placeholder="Type questions/comments here"></textarea>
 

 
<input type="submit" value="submit">
</form>	
	

</aside>



<footer class="site-footer">

<?php include('includes/copyright.php');?>
</footer>





</div> 

</body>
</html>