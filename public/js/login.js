$(document).ready(function() {

	$("#login_btn").click(function(){
		var id=$("#yourID").val();
		var code=$("#yourCode").val();
		var object=new Object();
		object.user_id=id;
		object.user_code=code;

		$.ajax({
			data:object,
			type:'POST',
			url:'admin/login',
			success:function(data){
				console.log(data);
				if(data.status==10){
					alert(data.message);
					document.location="dashboard";
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