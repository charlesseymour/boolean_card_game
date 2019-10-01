<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Boolean OR | Boolean Operators Tutorial</title>
  <meta name="author" content="Charles Seymour">
  <meta name="description" content="Explanation of Boolean operator OR, with game to test understanding">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/style.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  
  
</head>

<body>

<div class="wrapper">


<header class="banner">

<h1>Boolean Operators Tutorial</h1>

<?php include('includes/menu.php');?>

</header>

<main class="main">

<h2>What is Boolean OR?</h2>
<p>When you use Boolean OR, the database looks for documents with at least one of the search terms, or both.  For instance, if you type:</p>

<p><strong>united states or america</strong></p>

<p>into the database, you will get items that have "united states", items that have "america", and items that have both.</p>

<p>This means that using OR will usually increase the number of results you get. Using OR is a good idea when there are synonyms or related words for your search terms, for instance:<p>

<p><strong>genetics OR heredity</strong></p>
<p><strong>leadership OR management</strong></p>
<p><strong>holland OR netherlands</strong></p>

<p>We recommend typing your Boolean expression with OR inside a single search box in the databases and leaving the little drop down menus at AND, as in the image below:<p> 

<img src="images/ebsco_or.png" alt="Database search boxes with Boolean menus" width="214" height="116">
<p>(If one of your drop down menus is at AND and the other is at OR, there are rules of precedence that you might not want to learn.)</p>

<p>Try the card game on this page to practice the Boolean OR.</p>

</main>


<aside class="sidebar">

<div id="explanation">
	<h1>
      Card Game for Boolean OR
    </h1>


    <p>Click the button to get a random spread of 21 cards.  Above the spread will be a Boolean statement using OR.  Click to highlight all the cards (if any) that match the Boolean statement, then click the Submit button under the spread to check your answer. (Some Boolean statements will have no matching cards; in this case, just click the Submit button without highlighting any cards.)</p>
	
	<p>For instance, the Boolean expression</p>
	
	<p><strong>clubs OR odd</strong></p>
	
	<p>is asking for all the cards (if any) that are EITHER clubs OR have an odd number (OR both).  In the entire deck, the cards that satisfy this condition are the 13 clubs (Ace through King), as well as the Ace, Three, Five, Seven, and Nine cards from the other three suits, for a total of 28 cards.  You would highlight any of these 28 cards that appear in your spread. <a href="http://senna.sjsu.edu/rdean/cseymour/final/help.php" target="_blank">Explanation of card terms</a> (opens in new window).</p>  
	
	</div>

    <div id="buttons">

      <button id="spread_button">Get my spread</button>

    </div>

    <div id="boolean">

    </div>

    <div id="output">


    </div>

    <span id="feedback">
      
    </span>
	
	<span id="submitButton">

	</span>
</aside>
</div>
 
  
  <script>
    // Define deck and subsets

    var deck = [{name:"Ace of spades", location:"images/playing_cards/cards_resized/JPEG/ace_of_spades.jpg"}, {name:"Two of spades", location:"images/playing_cards/cards_resized/JPEG/2_of_spades.jpg"}, {name:"Three of spades", location:"images/playing_cards/cards_resized/JPEG/3_of_spades.jpg"}, {name:"Four of spades", location:"images/playing_cards/cards_resized/JPEG/4_of_spades.jpg"}, {name:"Five of spades", location:"images/playing_cards/cards_resized/JPEG/5_of_spades.jpg"}, {name:"Six of spades", location:"images/playing_cards/cards_resized/JPEG/6_of_spades.jpg"}, {name:"Seven of spades", location:"images/playing_cards/cards_resized/JPEG/7_of_spades.jpg"}, {name:"Eight of spades", location:"images/playing_cards/cards_resized/JPEG/8_of_spades.jpg"}, {name:"Nine of spades", location:"images/playing_cards/cards_resized/JPEG/9_of_spades.jpg"}, {name:"Ten of spades", location:"images/playing_cards/cards_resized/JPEG/10_of_spades.jpg"},  {name:"Jack of spades", location:"images/playing_cards/cards_resized/JPEG/jack_of_spades2.jpg"}, {name:"Queen of spades", location:"images/playing_cards/cards_resized/JPEG/queen_of_spades2.jpg"}, {name:"King of spades", location:"images/playing_cards/cards_resized/JPEG/king_of_spades2.jpg"}, {name:"Ace of clubs", location:"images/playing_cards/cards_resized/JPEG/ace_of_clubs.jpg"}, {name:"Two of clubs", location:"images/playing_cards/cards_resized/JPEG/2_of_clubs.jpg"}, {name:"Three of clubs", location:"images/playing_cards/cards_resized/JPEG/3_of_clubs.jpg"}, {name:"Four of clubs", location:"images/playing_cards/cards_resized/JPEG/4_of_clubs.jpg"}, {name:"Five of clubs", location:"images/playing_cards/cards_resized/JPEG/5_of_clubs.jpg"}, {name:"Six of clubs", location:"images/playing_cards/cards_resized/JPEG/6_of_clubs.jpg"}, {name:"Seven of clubs", location:"images/playing_cards/cards_resized/JPEG/7_of_clubs.jpg"}, {name:"Eight of clubs", location:"images/playing_cards/cards_resized/JPEG/8_of_clubs.jpg"}, {name:"Nine of clubs", location:"images/playing_cards/cards_resized/JPEG/9_of_clubs.jpg"}, {name:"Ten of clubs", location:"images/playing_cards/cards_resized/JPEG/10_of_clubs.jpg"}, {name:"Jack of clubs", location:"images/playing_cards/cards_resized/JPEG/jack_of_clubs2.jpg"}, {name:"Queen of clubs", location:"images/playing_cards/cards_resized/JPEG/queen_of_clubs2.jpg"}, {name:"King of clubs", location:"images/playing_cards/cards_resized/JPEG/king_of_clubs2.jpg"}, {name:"Ace of hearts", location:"images/playing_cards/cards_resized/JPEG/ace_of_hearts.jpg"}, {name:"Two of hearts", location:"images/playing_cards/cards_resized/JPEG/2_of_hearts.jpg"}, {name:"Three of hearts", location:"images/playing_cards/cards_resized/JPEG/3_of_hearts.jpg"}, {name:"Four of hearts", location:"images/playing_cards/cards_resized/JPEG/4_of_hearts.jpg"}, {name:"Five of hearts", location:"images/playing_cards/cards_resized/JPEG/5_of_hearts.jpg"}, {name:"Six of hearts", location:"images/playing_cards/cards_resized/JPEG/6_of_hearts.jpg"}, {name:"Seven of hearts", location:"images/playing_cards/cards_resized/JPEG/7_of_hearts.jpg"}, {name:"Eight of hearts", location:"images/playing_cards/cards_resized/JPEG/8_of_hearts.jpg"}, {name:"Nine of hearts", location:"images/playing_cards/cards_resized/JPEG/9_of_hearts.jpg"}, {name:"Ten of hearts", location:"images/playing_cards/cards_resized/JPEG/10_of_hearts.jpg"}, {name:"Jack of hearts", location:"images/playing_cards/cards_resized/JPEG/jack_of_hearts2.jpg"}, {name:"Queen of hearts", location:"images/playing_cards/cards_resized/JPEG/queen_of_hearts2.jpg"}, {name:"King of hearts", location:"images/playing_cards/cards_resized/JPEG/king_of_hearts2.jpg"}, {name:"Ace of diamonds", location:"images/playing_cards/cards_resized/JPEG/ace_of_diamonds.jpg"}, {name:"Two of diamonds", location:"images/playing_cards/cards_resized/JPEG/2_of_diamonds.jpg"}, {name:"Three of diamonds", location:"images/playing_cards/cards_resized/JPEG/3_of_diamonds.jpg"}, {name:"Four of diamonds", location:"images/playing_cards/cards_resized/JPEG/4_of_diamonds.jpg"}, {name:"Five of diamonds", location:"images/playing_cards/cards_resized/JPEG/5_of_diamonds.jpg"}, {name:"Six of diamonds", location:"images/playing_cards/cards_resized/JPEG/6_of_diamonds.jpg"}, {name:"Seven of diamonds", location:"images/playing_cards/cards_resized/JPEG/7_of_diamonds.jpg"}, {name:"Eight of diamonds", location:"images/playing_cards/cards_resized/JPEG/8_of_diamonds.jpg"}, {name:"Nine of diamonds", location:"images/playing_cards/cards_resized/JPEG/9_of_diamonds.jpg"}, {name:"Ten of diamonds", location:"images/playing_cards/cards_resized/JPEG/10_of_diamonds.jpg"}, {name:"Jack of diamonds", location:"images/playing_cards/cards_resized/JPEG/jack_of_diamonds2.jpg"}, {name:"Queen of diamonds", location:"images/playing_cards/cards_resized/JPEG/queen_of_diamonds2.jpg"}, {name:"King of diamonds", location:"images/playing_cards/cards_resized/JPEG/king_of_diamonds2.jpg"}];
    
    var redCards = ["Ace of hearts", "Two of hearts", "Three of hearts", "Four of hearts", "Five of hearts", "Six of hearts", "Seven of hearts", "Eight of hearts", "Nine of hearts", "Ten of hearts", "Jack of hearts", "Queen of hearts", "King of hearts", "Ace of diamonds", "Two of diamonds", "Three of diamonds", "Four of diamonds", "Five of diamonds", "Six of diamonds", "Seven of diamonds", "Eight of diamonds", "Nine of diamonds", "Ten of diamonds", "Jack of diamonds", "Queen of diamonds", "King of diamonds"]
    
    var blackCards = ["Ace of spades", "Two of spades", "Three of spades", "Four of spades", "Five of spades", "Six of spades", "Seven of spades", "Eight of spades", "Nine of spades", "Ten of spades", "Jack of spades", "Queen of spades", "King of spades", "Ace of clubs", "Two of clubs", "Three of clubs", "Four of clubs", "Five of clubs", "Six of clubs", "Seven of clubs", "Eight of clubs", "Nine of clubs", "Ten of clubs", "Jack of clubs", "Queen of clubs", "King of clubs"];
    
    var clubCards = ["Ace of clubs", "Two of clubs", "Three of clubs", "Four of clubs", "Five of clubs", "Six of clubs", "Seven of clubs", "Eight of clubs", "Nine of clubs", "Ten of clubs", "Jack of clubs", "Queen of clubs", "King of clubs"];
    
    var spadeCards = ["Ace of spades", "Two of spades", "Three of spades", "Four of spades", "Five of spades", "Six of spades", "Seven of spades", "Eight of spades", "Nine of spades", "Ten of spades", "Jack of spades", "Queen of spades", "King of spades"]
    
    var heartCards = ["Ace of hearts", "Two of hearts", "Three of hearts", "Four of hearts", "Five of hearts", "Six of hearts", "Seven of hearts", "Eight of hearts", "Nine of hearts", "Ten of hearts", "Jack of hearts", "Queen of hearts", "King of hearts"];
    
    var diamondCards = ["Ace of diamonds", "Two of diamonds", "Three of diamonds", "Four of diamonds", "Five of diamonds", "Six of diamonds", "Seven of diamonds", "Eight of diamonds", "Nine of diamonds", "Ten of diamonds", "Jack of diamonds", "Queen of diamonds", "King of diamonds"];
    
    var oddCards = ["Ace of spades", "Three of spades", "Five of spades", "Seven of spades", "Nine of spades", "Ace of clubs", "Three of clubs", "Five of clubs", "Seven of clubs", "Nine of clubs", "Ace of hearts", "Three of hearts", "Five of hearts", "Seven of hearts", "Nine of hearts", "Ace of diamonds", "Three of diamonds", "Five of diamonds", "Seven of diamonds", "Nine of diamonds"];
    
    var evenCards = ["Two of spades", "Four of spades", "Six of spades", "Eight of spades", "Ten of spades", "Two of clubs", "Four of clubs", "Six of clubs", "Eight of clubs", "Ten of clubs", "Two of hearts", "Four of hearts", "Six of hearts", "Eight of hearts", "Ten of hearts", "Two of diamonds", "Four of diamonds", "Six of diamonds", "Eight of diamonds", "Ten of diamonds"];
    
    var faceCards = ["Jack of spades", "Queen of spades", "King of spades", "Jack of clubs", "Queen of clubs", "King of clubs", "Jack of hearts", "Queen of hearts", "King of hearts", "Jack of diamonds", "Queen of diamonds", "King of diamonds"];
    
    var numberCards = ["Ace of spades", "Two of spades", "Three of spades", "Four of spades", "Five of spades", "Six of spades", "Seven of spades", "Eight of spades", "Nine of spades", "Ten of spades", "Ace of clubs", "Two of clubs", "Three of clubs", "Four of clubs", "Five of clubs", "Six of clubs", "Seven of clubs", "Eight of clubs", "Nine of clubs", "Ten of clubs", "Ace of hearts", "Two of hearts", "Three of hearts", "Four of hearts", "Five of hearts", "Six of hearts", "Seven of hearts", "Eight of hearts", "Nine of hearts", "Ten of hearts", "Ace of diamonds", "Two of diamonds", "Three of diamonds", "Four of diamonds", "Five of diamonds", "Six of diamonds", "Seven of diamonds", "Eight of diamonds", "Nine of diamonds", "Ten of diamonds"];
    
    

    // Define facets of cards to be used in generating booleans
    var facets=[{name:"red", subset:redCards}, {name:"black", subset:blackCards}, {name:"club", subset:clubCards}, {name:"spade", subset:spadeCards}, {name:"heart", subset:heartCards}, {name:"diamond", subset:diamondCards}, {name:"odd", subset:oddCards}, {name:"even", subset:evenCards}, {name:"face card", subset:faceCards}, {name:"number card", subset:numberCards}];

    // Button to generate spread and Boolean statement
    var buttonEl = document.getElementById("spread_button");
    var onButtonClick = function() {
      document.getElementById("spread_button").innerHTML = "New spread";
      document.getElementById("boolean").innerHTML = " ";
      document.getElementById("output").innerHTML = " ";
      document.getElementById("feedback").innerHTML = " ";
	  document.getElementById("submitButton").innerHTML = " ";
      var answers = [ ];
      var correct = [ ];
      var dealt = [ ];
      var spread = [ ];
      var correctInSpread = [ ];
      var randomNumber1 = Math.floor(Math.random()*10);
      var randomNumber2 = Math.floor(Math.random()*10);
      var left_hand = facets[randomNumber1].name;
      var right_hand = facets[randomNumber2].name;
      var leftAnswer = facets[randomNumber1].subset;
      var rightAnswer = facets[randomNumber2].subset;
      var attemptNumber = 0;
      //console.log(left_hand);
      //console.log(right_hand); 
      //console.log(leftAnswer);
      //console.log(rightAnswer);
      for (i = 0; i < leftAnswer.length; i++) {
			correct.push(leftAnswer[i]);
	  };

for (i = 0; i < rightAnswer.length; i++) {
			if (correct.indexOf(rightAnswer[i]) === -1)
				{correct.push(rightAnswer[i])};
	  };
      //console.log(correct);
      var x = document.createElement("P");
      var t = document.createTextNode("Boolean statement" + " " + ":" + " " + left_hand + " " + "OR" + " " + right_hand);
      x.appendChild(t);
      document.getElementById("boolean").appendChild(x);
     
      for (i = 0; i < 21; i++) {
        var randomNumber = Math.floor(Math.random()*52);
        var card = deck[randomNumber].name;
        /*var rowNumber = i % 4;
        if (rowNumber === 0) {
          var row = document.createElement("p");
		  var element = document.getElementById("output");
          element.appendChild(row);
        }*/
        if (dealt.indexOf(card) === -1) {
          var x = document.createElement("IMG");
		  x.setAttribute("src", deck[randomNumber].location);
		  x.setAttribute("alt", deck[randomNumber].name);
		  x.style.margin = "0.5%";
		  x.style.border = "5px solid transparent";
		  x.style.borderRadius = "10px";
		  document.body.appendChild(x);
          x.onclick = function() {
            if (this.style.border === "5px solid gold")     
            {this.style.borderColor = "transparent";
			 var index = answers.indexOf(this.alt);
             answers.splice(index, 1);
            } else {this.style.border = "5px solid gold";
					this.style.borderRadius = "10px";
					answers.push(this.alt);
                   }
          };

          document.getElementById("output").appendChild(x);             
		  dealt.push(card);
        } else {
          //dealt.push(card);
          i = i - 1;
        };
        //console.log(dealt);


      };
      var lineBreak = document.createElement("p");
      document.getElementById("output").appendChild(lineBreak);
      var submit_button = document.createElement('button');
	  document.getElementById("submitButton").appendChild(submit_button);
	  submit_button.style.display = "inline";
	  submit_button.style.marginTop = "20%";
      submit_button.innerHTML = 'Submit answer'; 
      submit_button.addEventListener("click", myFunction);
      function myFunction() {
        //clear previous correctInSpread
        correctInSpread = [];      
        //create correctInSpread
        for (i = 0; i < dealt.length; i++) {
          if (correct.indexOf(dealt[i]) !== -1) {
            correctInSpread.push(dealt[i]);
            
          };
        };
        //compare correctInSpread with answers
         correctInSpread.sort();
         answers.sort();
         var is_same = correctInSpread.length == answers.length && correctInSpread.every(function(element, index) {
          return element === answers[index]; 
        });
        if (is_same === true) {
		feedback.innerHTML = " ";
		submitButton.innerHTML = " ";
        var response = document.createElement("span");
		response.style.fontWeight = "bold";
		document.getElementById("feedback").appendChild(response);
        response.innerHTML = "Correct!  To play again, click the New Spread button.";
        } else {
          feedback.innerHTML = " ";
		  attemptNumber = attemptNumber + 1;
          var response = document.createElement("span");
		  response.style.fontWeight = "bold";
          document.getElementById("feedback").appendChild(response);
		  if (attemptNumber % 3 === 1) {response.innerHTML = "Incorrect.  You can change your answers and click Submit to try again, or click the New Spread button to get a new quiz.";
		  } else if (attemptNumber % 3 === 2) {
			  response.innerHTML = "Not quite.  Change your selections and try again or click the button at the top to get a new spread.";
		  } else {
			  response.innerHTML = "Sorry, try again, or click New Spread to start a new game.";
		  };
        };
      };
      


      
    };

    buttonEl.addEventListener("click", onButtonClick); 







  </script>





<footer class="site-footer">

<?php include('includes/copyright.php');?>
</footer>







</body>
</html>