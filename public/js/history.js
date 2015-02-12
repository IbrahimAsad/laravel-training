
window.load=loadTasks();

function loadTasks(){
	// alert("AA")

	$.ajax({
		url:'admin/getHistoryTasks',
		type:'GET',
		success:function(data){
			console.log("response",data);
			if(data.tasks_count>=1)
				createTableElements(data.tasks);
		},
		error:function(error){
			console.log("response_error",error);
			loadTasks();
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
		// });s
	});

}



function createTableElements(tasks){
	for(i=0;i<tasks.length;i++){
		(function(index){
			var row="<tr id=task_"+tasks[index].task_id+">"+
					"<td>"+tasks[index].task_id+"</td>"+
					"<td>"+tasks[index].task_title+"</td>"+
					"<td>"+tasks[index].name+"</td>"+
					"<td>"+tasks[index].address+"</td>"+
					"<td>"+tasks[index].task_date+"</td>"+
					"<td >"+tasks[index].status+"</td>"+
					"<td> "+tasks[index].driver_name+"</td></tr>";
					$("#tasks_table").append(row);
		})(i);


	}
}
