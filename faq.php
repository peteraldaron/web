<!--
File: faq.html 
Authors: Terrence Tan, Peter Zhang, Stephen Morse, Pratap Luitel
last updated: 4/16/14

-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>FAQs</title>
        <link href="style.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="./scripts.js"></script>
		<script type="text/javascript" src="Othello/lib/prototype.js"></script>

    </head>

    <body>
        <div class="blueBackground">
        
        <header>
            <h1>Othello</h1>
        </header>
        <nav>
            <ul>
                <li><a href="Home.php">Home</a></li>
                <li><a href="Directions.html">Directions</a></li>
                <li><a href="Contact.html">Contact Info</a></li>
                <li><a href="Pictures.html">Picture Collage</a></li>
                <li><a href="Othello/Othello.php">Othello</a></li>
                <li class="selectedTab"><a href="faq.html">FAQs</a></li>
            </ul>
        </nav>
        
        <aside>
            <p>
                <h2>Useful Links</h2>
            </p>
            <hr/>
            <section>    
                <p><a href="http://www.boardgamesfor.me/">Discover New Games</a></p>
                <p><a href = "http://www.amazon.com/Mattel-B3165-Othello/dp/B00004TQMQ/ref=sr_1_2?ie=UTF8&qid=1399747657&sr=8-2&keywords=othello+game">Buy The Game</a></p>
                <p><a href="http://radagast.se/othello/Help/strategy.html">Othello Strategy</a></p>
            </section>
        </aside>
        
        <div id="content">
            <h1 >FAQs</h1>
            <ol>
                <li id="li0">  How old do I need to be to play the game? <button id="0" onclick="getAnswer(event)">Answer</button> </li>
                <li id="li1">  How many people can play this game?<button id="1" onclick="getAnswer(event)">Answer</button> </li>
                <li id="li2">  Do I need to pay to play?<button id="2" onclick="getAnswer(event)">Answer</button> </li>
                <li id="li3">  What is the best strategy for this game?<button id="3    " onclick="getAnswer(event)">Answer</button> </li>
            </ol>
			<form action ="faq.php">
				<p>Comment:</p>
				<textarea id = "commentBox" name="comment" rows="5" cols="40"></textarea>
				<input id ="submitButton" type ="submit" name="submit" value="Submit">
			</form>
			<script type="text/javascript" src="./commentRefresh.js"></script>
			<hr/>	
			<div id="commentSection">

			<?php
				if(isset($_GET['comment'])){
					$comment = $_GET['comment'];
					$con=mysqli_connect("localhost","tetan","cdeufmhsw","tetan");
					// Check connection
					if (mysqli_connect_errno()) {
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
					$curTime = time();
					mysqli_query($con,"INSERT INTO comments (ID, Message, Time) VALUES ( ".$curTime." ,\"".$comment."\", ".$curTime." )");

					mysqli_close($con);
				}
            ?>
			<?php
				if(isset($_GET['subComment'])){
					$subComment = $_GET['subComment'];
					$parentTime = $_GET['parent'];
					$con=mysqli_connect("localhost","tetan","cdeufmhsw","tetan");
					// Check connection
					if (mysqli_connect_errno()) {
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
					$curTime = time();
					mysqli_query($con,"INSERT INTO subComments (ParentID, Message, Time) VALUES ( ".
								$parentTime." ,\"".$subComment."\", ".$curTime." )");

					mysqli_close($con);
				}
			?>
			</div>

        </div>
        <footer>
        <hr />
        <p>
            <a href="http://jigsaw.w3.org/css-validator/check/referer">
                <img style="border:0;width:88px;height:31px"
                    src="http://jigsaw.w3.org/css-validator/images/vcss"
                    alt="Valid CSS!" />
            </a>
        </p>
        </footer>
        </div>
    
    </body>
</html>
