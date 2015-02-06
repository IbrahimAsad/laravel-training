// $(function() {


var longitude = '-97.4267578125';
var latitude = '39.436192999314095';

var map = null;
// var marker = null;

var tasks_list=[];

window.onload=initPage();


function initPage(){
	initMap();

}

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
					var tt=new Object();
					tt.taskInfo=tasks[index];
				 	  tt.marker = new google.maps.Marker({
					  	map: map,
					  	icon:'css/icons/marker_task.png',
					  	position:  new google.maps.LatLng(tasks[index].latitude, tasks[index].longitude)
					  });
					  tt.status=tasks[index].status;
					  tt.assign_to=tasks[index].assign_to;
					  tasks_list[tasks[index].task_id]=tt;	
		})(i);


	}
}




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


function initMap() {
    var mapProp = {
        center: new google.maps.LatLng(latitude, longitude),
        zoom: 7,
        mapTypeId: google.maps.MapTypeId.ROADMAP

    };
    map = new google.maps.Map(document.getElementById("map-container"), mapProp);
    
	loadTasks();

}

/*
new_tasks
assigned_tasks
not_started_tasks
in_progress_tasks
completed_tasks
*/

function showNewTasks(value){
	console.log("showNewTasks",value);
	// if(value){
	// 	$("#assigned_tasks").prop('checked', false);
	// 	$("#not_started_tasks").prop('checked', false);
	// 	$("#in_progress_tasks").prop('checked', false);
	// 	$("#completed_tasks").prop('checked', false);
	// }

	for(id in tasks_list){
		(function(task_id){
				if(tasks_list[task_id].assign_to==0){
					if(value)
						tasks_list[task_id].marker.setMap(map);
					else
						tasks_list[task_id].marker.setMap(null);
				}
		})(id);
	}
}

function showAssignedTasks ( value){
	return ;
	console.log("showAssignedTasks",value);
	if(value){
		$("#not_started_tasks").prop('checked', true);
		$("#in_progress_tasks").prop('checked', true);
		$("#completed_tasks").prop('checked', true);
	}

	for(id in tasks_list){
		(function(task_id){
				if(tasks_list[task_id].assign_to>0){
					if(value)
						tasks_list[task_id].marker.setMap(map);
					else
						tasks_list[task_id].marker.setMap(null);
				}
		})(id);
	}


}
function showNotStartedTasks ( value){
	console.log("showNotStartedTasks",value);
	for(id in tasks_list){
		(function(task_id){
				if(tasks_list[task_id].status=='NOT STARTED'){
					if(value)
						tasks_list[task_id].marker.setMap(map);
					else
						tasks_list[task_id].marker.setMap(null);
				}
		})(id);
	}
}
function showInProgressTasks ( value){
	console.log("showInProgressTasks",value);
	for(id in tasks_list){
		(function(task_id){
				if(tasks_list[task_id].status=='IN PROGRESS'){
					if(value)
						tasks_list[task_id].marker.setMap(map);
					else
						tasks_list[task_id].marker.setMap(null);
				}
		})(id);
	}
}
function showCompletedTasks ( value){
	console.log("showCompletedTasks",value);
	for(id in tasks_list){
		(function(task_id){
				if(tasks_list[task_id].status=='COMPLETED'){
					if(value)
						tasks_list[task_id].marker.setMap(map);
					else
						tasks_list[task_id].marker.setMap(null);
				}
		})(id);
	}
}
