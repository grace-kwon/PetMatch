/* checks if all questions have been answered */

function submit_check()
{
    var namecheck = document.forms["quiz"]["q9"].value;
	var questions = document.querySelectorAll('input[type = "radio"]:checked');

    if (namecheck == null || namecheck == "") {
        alert("Name must be filled out!");
        return false;
    }
    else if(questions.length < 7) {
        alert("All questions must be answered!");
        return false;
    }
}