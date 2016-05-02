/* checks if user agreed to the terms of service */

function gotoQuiz()
{
   	var x = document.getElementById("checkboxG4").checked;
   	if(x==true) {
   		window.location.href = 'quiz.html';
   	} else {
   		alert("Please agree to the terms of service!");
   	}
}