<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Contact Us | Boolean Operators Tutorial</title>
  <meta name="author" content="Charles Seymour">
  <meta name="description" content="Form for questions and comments">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../styles/style.css">
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  
  
</head>

<body>

<div class="wrapper">


<header class="banner">

<h1>Boolean Operators Tutorial</h1>

<?php include('menu_confirm.php');?>

</header>

<main class="main">

<?php echo $_SESSION['statusMessage'];?>
 
<?php echo $_SESSION['htmlOutput'];?>


</main>


<aside class="sidebar">

<h2>Form to Contact Us</h2>

<form class="assignment-form" method="post" action="process.php">
 
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