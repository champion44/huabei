function insertWidgetURL($pdfurl,$videourl,$flashurl){

	var insertPDFurl = '<embed src="../files/' + $pdfurl + '" type="application/pdf" />';
	var insertFLASHurl = '<embed src="../files/' + $flashurl + '" type="application/x-shockwave-flash" />';
	var insertVIDEOurl = '<video id="video" controls><source src="../files/' + $videourl + '" type="video/mp4"><object data="movie.mp4" width="100%" height="100%"><embed width="320" height="240" src=<?php echo $videourl; ?>></object></video>';
	/*
	var insertQuestion_first = $question_one;
	var insertQuestion_tsecond = $question_two;
	*/

	document.getElementById("pdf_content").innerHTML=insertPDFurl;
	document.getElementById("flash_content").innerHTML=insertFLASHurl;
	document.getElementById("video_content").innerHTML=insertVIDEOurl;

	/*
	document.getElementById("quesrion_first").innerHTML=insertQuestion_first;
	document.getElementById("question_second").innerHTML=insertQuestion_tsecond;
	*/
};