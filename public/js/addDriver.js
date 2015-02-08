


$(document).ready(function() {

	$("#addDriver").click(function(){
		var driver_name=$("#driver_name").val();
		var driver_code=$("#driver_code").val();
		var object=new Object();
		object.driver_name=driver_name;
		object.driver_code=driver_code;

		$.ajax({
			data:object,
			type:'POST',
			url:'admin/addDriver',
			success:function(data){
				console.log(data);
				if(data.status==10){
					alert(data.message);
					// document.location="dashboard";
					$("#driver_result ul").append("<li> "+driver_name +"</li>");
				}else{
					alert(data.message);
				}

			},
			error:function(error){
				console.log(error);
			}

		});

	});



});