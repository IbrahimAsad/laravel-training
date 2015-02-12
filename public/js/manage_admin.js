
window.onload=loadAdmins();
var admins_list=[];
function loadAdmins(){
	 $.ajax({
		url:'admin/getAdmins',
		type:'GET',
		success:function(data){
			console.log("response",data);
			if(data.admin_count>=1)
				createTableElements(data.admins);
		},
		error:function(error){
			console.log("response_error",error);
		}
	}).done(function(){

		// $("#tasks_table > tbody > tr").on('mouseover',function(){
		// 	// console.log(this);
		// 	var currTaskID=$(this).attr('id').split('_');
		// 	// currTaskID=currTaskID.
		// 	currTaskID=currTaskID[1];
		// 	// console.log(currTaskID);
		// 	map.setCenter(tasks_list[currTaskID].marker.getPosition());
		// });

		// $("#tasks_table > tbody > tr").on('click',function(){
		// 	var currTaskID=$(this).attr('id').split('_');
		// 	currTaskID=currTaskID[1];
		// 	if(tasks_list[currTaskID].status==NOT_STARTED && tasks_list[currTaskID].assign_to ==0){
		// 		// alert('Click in the driver to assign this map');
		// 		taskToAssign=currTaskID;
		// 		assignStatus=true;
		// 		$("#tasks_table > tbody > tr").css('background-color','white');
		// 		$(this).css('background-color','gray');
		// 		$("#cancel_selected_task").css('display','block');
		// 	}
		// });






	});

}

function createTableElements(admins){
	for(i=0;i<admins.length;i++){
		(function(index){
			var row="<tr id=task_"+admins[index].admin_id+">"+
					"<td>"+admins[index].admin_id+"</td>"+
					"<td>"+admins[index].admin_name+"</td>"+
					"<td>"+admins[index].tasks+"</td>"+
					"<td><input type='text' id='new_code"+admins[index].admin_id+"' ></td>"+
					"<td><input type='button' value='Change Code' onclick='updateAdminCode("+admins[index].admin_id+");'</td></tr>";
					 
					$("#admins_table").append(row);
					 
					// admins_list[admins[index].task_id]=tt;	
		})(i);


	}
}



function updateAdminCode(admin_id){
	var new_code=$("#new_code"+admin_id).val();
}


function addNewAdmin(){
	var admin_name=$("#admin_name").val();
	var admin_code=$("#admin_code").val();
	var obj=new Object();
	obj.admin_name=admin_name;
	obj.admin_code=admin_code;

	$.ajax({
		url:'admin/addAdmin',
		data:obj,
		type:'GET',
		success:function(data){
			console.log(data);

			$("#result_new_admin").val(data.message);
			if(data.status == 10){
				data.data.admin_name=obj.admin_name;
				data.data.tasks=0;
				createTableElements([data.data]);	
			}
			
		},
		fail:function(err){
			console.log(err);
		}	
	});


}