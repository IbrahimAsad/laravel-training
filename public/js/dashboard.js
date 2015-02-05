$(function() {

window.onload=loadTasks();


function loadTasks(){
	// alert("AA")

	$.ajax({
		url:'admin/getTasks',
		type:'GET',
		success:function(data){
			console.log("response",data);
			if(data.tasks_count>=1)
				createTableElements(data.tasks);
		},
		error:function(error){
			console.log("response_error",error);
		}
	});

}
/*
<td>1</td>
                                    <td>Fixs it</td>
                                    <td>Ibrahim Asad</td>
                                    <td>Nablus</td>
                                    <td>20-12-2001</td>
                                    <td>NOT STARTED </td>

*/

function createTableElements(tasks){
	for(i=0;i<tasks.length;i++){
		(function(index){
			var row="<tr id=task_'"+tasks[index].task_id+"'>"+
					"<td>"+tasks[index].task_id+"</td>"+
					"<td>"+tasks[index].task_title+"</td>"+
					"<td>"+tasks[index].name+"</td>"+
					"<td>"+tasks[index].address+"</td>"+
					"<td>"+tasks[index].task_date+"</td>"+
					"<td>"+tasks[index].status+"</td>"+
					'<td><a href="javascript:assignTask('+tasks[index].task_id+');" class="task-icons-options"  ><img src="css/icons/assign.png"  ></a>'+
                          '<a href="javascript:editTask('+tasks[index].task_id+');" class="task-icons-options"  ><img src="css/icons/edit.png"></a>'+
                          '<a href="javascript:deleteTask('+tasks[index].task_id+');"class="task-icons-options"   ><img src="css/icons/delete.png"></a>'+
			         '</td> </tr>';

					$("#tasks_table").append(row);
					// console.log(row);
		})(i);


	}
}


});




function assignTask(task_id){
	alert("Assign "+task_id);
$.ajax({
	url:'admin/getDrivers',
	type:"GET",
	success:function(data){
		console.log(data);
	},
	error:function(error){
		console.log(error);
	}
});


}


function editTask(task_id){
	alert("Edit "+task_id);
}
function deleteTask(task_id){
	alert("delet "+task_id);
}

