	
function setVIDEOurl() {

	var $videourl = $(".hidden_data_video").attr('rel');


 	var FZ_VIDEO = new createVideo(
 		"testBox",	//容器的id
 		{
			//url         : 'http://171.15.197.89/xdispatch/o8t28neoq.bkt.clouddn.com/test.mp4',  //视频地址
 			url 		: "../files/" + $videourl, 	//视频地址
 			autoplay	: false				//是否自动播放
 		}
 	);

 };