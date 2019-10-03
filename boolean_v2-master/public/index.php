<?php

include '../inc/header.php';

?>

<div class="wrapper">


<header class="banner">

  <h1>Boolean Operator AND Tutorial</h1>
 
</header>

<main class="main">

<h2>What is Boolean AND?</h2>
<p>When you use Boolean AND, the search terms on both sides of the AND are required.  For instance, if you type:</p>
<p><strong>diabetes and insulin</strong></p>
<p>into the database, you will only get results that contain BOTH terms.  You won't get anything that talks about diabetes without mentioning insulin, or anything that talks about insulin without mentioning diabetes.  Both words have to show up.</p>

<p>This means that using AND will reduce the number of results you get, because it makes the search more specific.  If you search just:</p>

<p><strong>diabetes</strong></p>

<p>You would get everything that talks about diabetes, whether or not it mentions insulin.</p>

<p>So you want to use the Boolean AND when you need to narrow the search to articles more relevant to your topic.  If your topic is the effect of insulin on diabetes, you would want to join the two words with AND rather than searching just for "diabetes" because otherwise you'll get a lot of articles on diabetes that are irrelevant.</p>

<p>Most of the library databases have 2 or 3 search boxes with small menus between them set to AND:<p>

<img src="images/ebsco_and.png" alt="Database search boxes with Boolean menus" width="214" height="114">

<p>You can either type:</p>

<p><strong>diabetes and insulin</strong></p>

<p>in the same box, or you can type "diabetes" and "insulin" in separate boxes with the AND menu between them.</p>

<p>Try the card game on this page to practice the Boolean AND.</p>

</main>


<aside class="sidebar">

<h2>Card Game for Boolean AND</h2>
	
	<div id="explanation">

    <p>Click the button to get a random spread of 21 cards.  Above the spread will be a Boolean statement using AND.  Click to highlight all the cards (if any) that match the Boolean statement, then click the Submit button under the spread to check your answer. (Some Boolean statements will have no matching cards; in this case, just click the Submit button without highlighting any cards.)</p>
	
	<p>For example, the Boolean expression</p>
	<p><strong>face card AND red</strong></p>
	<p>is asking for all the cards (if any) that are BOTH face cards AND red.  In the entire deck, the six cards that satisfy this condition are the King, Queen, and Jack of hearts, and the King, Queen, and Jack of diamonds.  Only these cards fulfill BOTH conditions; they are face cards, AND they are red.  You would highlight any of these six cards that appear in your spread. <a href="help.html" target="_blank">Explanation of card terms</a> (opens in new window).</p>
	
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

  
  <script>

    // Define deck and subsets

    var deck = [{name:"Ace of spades", location:"../images/playing_cards/cards_resized/JPEG/ace_of_spades.jpg"}, {name:"Two of spades", location:"../images/playing_cards/cards_resized/JPEG/2_of_spades.jpg"}, {name:"Three of spades", location:"../images/playing_cards/cards_resized/JPEG/3_of_spades.jpg"}, {name:"Four of spades", location:"../images/playing_cards/cards_resized/JPEG/4_of_spades.jpg"}, {name:"Five of spades", location:"../images/playing_cards/cards_resized/JPEG/5_of_spades.jpg"}, {name:"Six of spades", location:"../images/playing_cards/cards_resized/JPEG/6_of_spades.jpg"}, {name:"Seven of spades", location:"../images/playing_cards/cards_resized/JPEG/7_of_spades.jpg"}, {name:"Eight of spades", location:"../images/playing_cards/cards_resized/JPEG/8_of_spades.jpg"}, {name:"Nine of spades", location:"../images/playing_cards/cards_resized/JPEG/9_of_spades.jpg"}, {name:"Ten of spades", location:"../images/playing_cards/cards_resized/JPEG/10_of_spades.jpg"},  {name:"Jack of spades", location:"../images/playing_cards/cards_resized/JPEG/jack_of_spades2.jpg"}, {name:"Queen of spades", location:"../images/playing_cards/cards_resized/JPEG/queen_of_spades2.jpg"}, {name:"King of spades", location:"../images/playing_cards/cards_resized/JPEG/king_of_spades2.jpg"}, {name:"Ace of clubs", location:"../images/playing_cards/cards_resized/JPEG/ace_of_clubs.jpg"}, {name:"Two of clubs", location:"../images/playing_cards/cards_resized/JPEG/2_of_clubs.jpg"}, {name:"Three of clubs", location:"../images/playing_cards/cards_resized/JPEG/3_of_clubs.jpg"}, {name:"Four of clubs", location:"../images/playing_cards/cards_resized/JPEG/4_of_clubs.jpg"}, {name:"Five of clubs", location:"../images/playing_cards/cards_resized/JPEG/5_of_clubs.jpg"}, {name:"Six of clubs", location:"../images/playing_cards/cards_resized/JPEG/6_of_clubs.jpg"}, {name:"Seven of clubs", location:"../images/playing_cards/cards_resized/JPEG/7_of_clubs.jpg"}, {name:"Eight of clubs", location:"../images/playing_cards/cards_resized/JPEG/8_of_clubs.jpg"}, {name:"Nine of clubs", location:"../images/playing_cards/cards_resized/JPEG/9_of_clubs.jpg"}, {name:"Ten of clubs", location:"../images/playing_cards/cards_resized/JPEG/10_of_clubs.jpg"}, {name:"Jack of clubs", location:"../images/playing_cards/cards_resized/JPEG/jack_of_clubs2.jpg"}, {name:"Queen of clubs", location:"../images/playing_cards/cards_resized/JPEG/queen_of_clubs2.jpg"}, {name:"King of clubs", location:"../images/playing_cards/cards_resized/JPEG/king_of_clubs2.jpg"}, {name:"Ace of hearts", location:"../images/playing_cards/cards_resized/JPEG/ace_of_hearts.jpg"}, {name:"Two of hearts", location:"../images/playing_cards/cards_resized/JPEG/2_of_hearts.jpg"}, {name:"Three of hearts", location:"../images/playing_cards/cards_resized/JPEG/3_of_hearts.jpg"}, {name:"Four of hearts", location:"../images/playing_cards/cards_resized/JPEG/4_of_hearts.jpg"}, {name:"Five of hearts", location:"../images/playing_cards/cards_resized/JPEG/5_of_hearts.jpg"}, {name:"Six of hearts", location:"../images/playing_cards/cards_resized/JPEG/6_of_hearts.jpg"}, {name:"Seven of hearts", location:"../images/playing_cards/cards_resized/JPEG/7_of_hearts.jpg"}, {name:"Eight of hearts", location:"../images/playing_cards/cards_resized/JPEG/8_of_hearts.jpg"}, {name:"Nine of hearts", location:"../images/playing_cards/cards_resized/JPEG/9_of_hearts.jpg"}, {name:"Ten of hearts", location:"../images/playing_cards/cards_resized/JPEG/10_of_hearts.jpg"}, {name:"Jack of hearts", location:"../images/playing_cards/cards_resized/JPEG/jack_of_hearts2.jpg"}, {name:"Queen of hearts", location:"../images/playing_cards/cards_resized/JPEG/queen_of_hearts2.jpg"}, {name:"King of hearts", location:"../images/playing_cards/cards_resized/JPEG/king_of_hearts2.jpg"}, {name:"Ace of diamonds", location:"../images/playing_cards/cards_resized/JPEG/ace_of_diamonds.jpg"}, {name:"Two of diamonds", location:"../images/playing_cards/cards_resized/JPEG/2_of_diamonds.jpg"}, {name:"Three of diamonds", location:"../images/playing_cards/cards_resized/JPEG/3_of_diamonds.jpg"}, {name:"Four of diamonds", location:"../images/playing_cards/cards_resized/JPEG/4_of_diamonds.jpg"}, {name:"Five of diamonds", location:"../images/playing_cards/cards_resized/JPEG/5_of_diamonds.jpg"}, {name:"Six of diamonds", location:"../images/playing_cards/cards_resized/JPEG/6_of_diamonds.jpg"}, {name:"Seven of diamonds", location:"../images/playing_cards/cards_resized/JPEG/7_of_diamonds.jpg"}, {name:"Eight of diamonds", location:"../images/playing_cards/cards_resized/JPEG/8_of_diamonds.jpg"}, {name:"Nine of diamonds", location:"../images/playing_cards/cards_resized/JPEG/9_of_diamonds.jpg"}, {name:"Ten of diamonds", location:"../images/playing_cards/cards_resized/JPEG/10_of_diamonds.jpg"}, {name:"Jack of diamonds", location:"../images/playing_cards/cards_resized/JPEG/jack_of_diamonds2.jpg"}, {name:"Queen of diamonds", location:"../images/playing_cards/cards_resized/JPEG/queen_of_diamonds2.jpg"}, {name:"King of diamonds", location:"../images/playing_cards/cards_resized/JPEG/king_of_diamonds2.jpg"}];
    
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
      //determining all cards from the entire deck that match the boolean statement
	  if (leftAnswer.length <= rightAnswer.length) {
        for (i = 0; i < leftAnswer.length; i++) {
          if (rightAnswer.indexOf(leftAnswer[i]) !== -1)
          {correct.push(leftAnswer[i])
          } 
            }
      } else {
        for (i = 0; i < rightAnswer.length; i++) {
          if (leftAnswer.indexOf(rightAnswer[i]) !== -1)
          {correct.push(rightAnswer[i])
          } 
        };
      };
      //print boolean statement
      var x = document.createElement("P");
      var t = document.createTextNode("Boolean statement" + " " + ":" + " " + left_hand + " " + "AND" + " " + right_hand);
      x.appendChild(t);
      document.getElementById("boolean").appendChild(x);
	  //create 21 card spread
      for (i = 0; i < 21; i++) {
        var randomNumber = Math.floor(Math.random()*52);
        var card = deck[randomNumber].name;
        //optional code for generating rows of 4 cards each
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
		  x.style.cursor = "pointer";
		  document.body.appendChild(x);
          //when cards are clicked, they are highlighted and sent to the answers array
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
        


      };
      //submit button checks answers
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
			  response.innerHTML = "Sorry, try again, or click New Spread to start a new game." + "<br>" + "<br>";
			  
		  };
        };
      };
      


      
    };

    buttonEl.addEventListener("click", onButtonClick); 







  </script>

</aside>



<footer class="site-footer">

</footer>





</div> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>