/* Filename: script.js
   Authors: Pratap Luitel, Peter Zhang, Stephen Morse, Terrence Tan
   Last Updated: 4/16/14
*/

//array storing FAQ answers 
var answerArray = new Array();
answerArray[0] = " It is recommended that players be at least 10 years old";
answerArray[1] = " Between two and four players can play this game";
answerArray[2] = "NO";
answerArray[3] = "see the links in the sidebar";


//Generates an answer to a given question based on the button click.
//Check to see if an answer is already showing. If so, remove that answer
// and generate the new answer.
function getAnswer(event){

		
		var buttonObject = event.target;
		var buttonId = buttonObject.getAttribute("id");
		var question = buttonObject.parentNode;

		//if the question has not been answered yet
		if(question.childNodes.length == 3){
			
			var ansToRemove = document.getElementById("answer");
			//if any other questions have been answered, remove that answer
			if (ansToRemove != null){
				var questionToRemove = document.getElementById("answer").parentNode; 
				questionToRemove.removeChild(questionToRemove.childNodes[3]);
				questionToRemove.childNodes[1].innerHTML = "Answer";
			}	

			//change the button text after answering the question
			buttonObject.innerHTML="Less";
			
			//create the answer node
			var answer = document.createElement("p");
			//set the answer node attribute to ensure only one question is answered at a time
			answer.setAttribute("id","answer");
			
			var answerId = parseInt(buttonId);
			var answerText = document.createTextNode(answerArray[answerId]);
			answer.appendChild(answerText);
			question.appendChild(answer);
				
		}

		//to remove the answer node 
		else if(question.childNodes.length == 4){
			question.removeChild(question.childNodes[3]);	
			buttonObject.innerHTML="Answer";
		
		}


	}