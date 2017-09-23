/**
 * main.js
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2014, Codrops
 * http://www.codrops.com
 */




function getExperimentInfo($experimentname,$index) {

	var bodyEl = document.body,
		content = document.querySelector( '.content-wrap' ),
		openbtn = $index;
		closebtn = document.getElementById( 'close-button' ),
		submitbtn = document.getElementById( 'submit_button' ),
		isOpen = false;

	function init() {
		initEvents();
	}

	function initEvents() {
		openbtn.addEventListener( 'click', toggleMenu );
		if( submitbtn ) {
			submitbtn.addEventListener( 'click', toggleMenu );
		}		
	}


	function toggleMenu() {
		if( isOpen ) {
			classie.remove( bodyEl, 'show-menu' );
		}
		else {
			classie.add( bodyEl, 'show-menu' );
		}
		isOpen = !isOpen;
	}



	$.ajax({
		url:'../user/getExperimentInfo.php?experimentname='+$experimentname,
		type:"GET",
		dataType:'jsonp',
		success:function(result) {

			insertWidgetURL(result.pdfurl,result.videourl,result.flashurl);

			insertQuestion(result.First_Question,result.Second_Question,result.Third_Question);
		}

	});

	$.ajax({
		url:'../user/getAnswer.php?experimentname='+$experimentname,
		type:"GET",
		dataType:'jsonp',
		success:function(answer) {
			insertAnswer(answer.First_Answer,answer.Second_Answer,answer.Third_Answer);
		}
	});

	var $experimentData = '<input type="hidden" name="experimentname" value=' + $experimentname	+ '>';
	document.getElementById('experiment_hidden_data').innerHTML=$experimentData;

	init();


	

};