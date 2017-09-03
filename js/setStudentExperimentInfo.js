function	setStudentExperimentInfo($result) {

	var $experimentCount = $result.experimentCount;

	for (var $i = 0 ; $i < $experimentCount ; $i++ ) {

		$experimentname = $result[$i].experimentname;

		$experimentStatus = $result[$experimentCount][$experimentname];



		if (0 == $experimentStatus || 2 == $experimentStatus) {
			$("tbody").append('<tr>'+
								'<td  colspan="2"><div id="experimentInfo" class="experimentInfo unfinish" >'+ $experimentname +' <span class="unfinish-label">未完成</span></div></td>'+
									'</tr>"');
		}
		else if (1 == $experimentStatus) {
			$("tbody").append('<tr>'+
								'<td colspan="2"><div id="experimentInfo" class="experimentInfo finish" >'+ $experimentname +' <span class="finish-label">已完成</span></div></td>'+
									'</tr>"');
		}
	}
}