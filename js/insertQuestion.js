function insertQuestion($First_Question,$Second_Question,$Third_Question){

	var insertQ1 = $First_Question;
	var insertQ2 = $Second_Question;
	var insertQ3 = $Third_Question;
	/*
	var insertQuestion_first = $question_one;
	var insertQuestion_tsecond = $question_two;
	*/

	document.getElementById("first_question").innerHTML=insertQ1;
	document.getElementById("second_question").innerHTML=insertQ2;
	document.getElementById("third_question").innerHTML=insertQ3;

	/*
	document.getElementById("quesrion_first").innerHTML=insertQuestion_first;
	document.getElementById("question_second").innerHTML=insertQuestion_tsecond;
	*/
};