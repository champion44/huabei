function getStudentDetail($id) {

	$.ajax({
		url:'../user/getStudentDetail.php?id='+$id,
		type:"GET",
		dataType:'jsonp',
		success:function(result){

			setStudentBaseInfo(result[2].studentname,result[2].studentid,result[2].class,result[2].contact);

			setStudentExperimentInfo(result);
		}
	});
};