<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../inc/header.php';

if (isAuthenticated()) { $user_id = decodeJwt('sub'); }

?>

<div class="jumbotron">
	<h1 class="display-4">Boolean Game</h1>
    <p class="lead">In this game, you'll get a random Boolean statement involving aspects of playing cards
	(for instance, "red AND face card") and a random selection of 21 cards from the standard deck.  Click
	all the cards that match the Boolean statement (for instance, the Queen of Hearts among others would match
	"red AND face card"), then click the submit button to check your answers.</p>
    <hr class="my-4">
    <p><?php if (isAuthenticated() == false) { echo "Log in first if you would like to save your results. "; } 
		else { echo "Log out if you do not want to save your results. "; }
	?> Click 
	one of the Boolean buttons below to start playing.</p>
    <div class="container boolean-options">
		<div class="row">
			<div class="col text-center">
				<button type="button" class="btn btn-primary btn-lg" onclick="makeSpread('and')">AND</button>
			</div>
			<div class="col text-center">
				<button type="button" class="btn btn-primary btn-lg" onclick="makeSpread('or')">OR</button>
			</div>
			<div class="col text-center">
				<button type="button" class="btn btn-primary btn-lg" onclick="makeSpread('not')">NOT</button>
			</div>
		</div>
	</div>

<div id="boolean">

</div>

<div id="output">


</div>

<span id="feedback">
  
</span>

<span id="submitButton">

</span>

<?php include '../inc/game_script.php'; ?>

</div> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>