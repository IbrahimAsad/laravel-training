// $(function() {

$(function() {
    $( "#accordion" ).accordion();
  });
var longitude = '-97.4267578125';
var latitude = '39.436192999314095';

var NOT_STARTED='NOT STARTED';
var COMPLETED='COMPLETED';
var IN_PROGRESS='IN PROGRESS';
// var  

var map = null;
// var marker = null;

var tasks_list=[];
var drivers_list=[];

var taskToAssign=-1;
var driverToAssign=-1;

var assignStatus=false;
var marker=null;

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
			loadTasks();
		}
	}).done(function(){

		$("#tasks_table > tbody > tr").on('mouseover',function(){
			// console.log(this);
			var currTaskID=$(this).attr('id').split('_');
			// currTaskID=currTaskID.
			currTaskID=currTaskID[1];
			// console.log(currTaskID);
			map.setCenter(tasks_list[currTaskID].marker.getPosition());
		});

		$("#tasks_table > tbody > tr").on('click',function(){
			var currTaskID=$(this).attr('id').split('_');
			currTaskID=currTaskID[1];
			if(tasks_list[currTaskID].status==NOT_STARTED && tasks_list[currTaskID].assign_to ==0){
				// alert('Click in the driver to assign this map');
				taskToAssign=currTaskID;
				assignStatus=true;
				$("#tasks_table > tbody > tr").css('background-color','white');
				$(this).css('background-color','gray');
				$("#cancel_selected_task").css('display','block');
			}
		});






	});

}

function cancelSelectedTask(){
	assignStatus=false;
	taskToAssign=-1;
	$("#cancel_selected_task").css('display','none');
	$("#tasks_table > tbody > tr").css('background-color','white');


}
function loadDrivers(){
	$.ajax({
		url:'admin/getAllDrivers',
		type:'GET',
		success:function(data){
			console.log("response",data);
			for (var i = 0; i < data.length; i++) {
				(function(driver){
					var row="<tr id='driver_"+data[driver].driver_id+"' >"+
					"<td>"+data[driver].driver_name+"</td>"+
					"<td id='driver_location_"+data[driver].driver_id+"'></td></tr>";
					var drivData=new Object();
					drivData.data=data[driver]
					drivers_list[data[driver].driver_id]=drivData;

					$("#dirver_table").append(row);
					console.log(row);
					console.log(drivers_list);
					loadDriversToMap(data[driver].driver_id,data[driver].latitude,data[driver].longitude);
				})(i);

			};
			 
		},
		error:function(error){
			console.log("response_error",error);
			loadDrivers();
		}
	}).done(function(){
		$("#dirver_table > tbody > tr").on('mouseover',function(){
			// console.log(this);
			var currDriver=$(this).attr('id').split('_');
			// currDriver=currDriver.
			currDriver=currDriver[1];
			// console.log(currDriver);
			map.setCenter(drivers_list[currDriver].marker.getPosition());
		});
		$("#dirver_table > tbody > tr").on('click',function(){
			if(!assignStatus)
				return;
			var currDriver=$(this).attr('id').split('_');
			currDriver=currDriver[1];
			 	driverToAssign=currDriver;
			 	assignTask();
			
		});

	});
}
 


function loadDriversToMap(driver_id,latitude,longitude){
	latlng=new google.maps.LatLng(latitude,longitude);
	 geocoder.geocode({
        'latLng': latlng
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[1]) {
                // $("#address").val(results[1].formatted_address);
                $("#driver_location_"+driver_id).html(results[1].formatted_address);
                drivers_list[driver_id].marker=new google.maps.Marker({
					  	map: map,
					  	icon:'css/icons/marker_driver.png',
					  	position:  new google.maps.LatLng(latitude, longitude)
					  });

            } else {
                console.log('No results found', latlng);
                 $("#driver_location_"+driver_id).html("NO Address Yet.");
            }
        } else {
            console.log('Geocoder failed due to: ' + status, geocoder);
            $("#driver_location_"+driver_id).html("NO Address Yet.");
        }
    });
} 

function createTableElements(tasks){
	for(i=0;i<tasks.length;i++){
		(function(index){

			//assign status text
			ast="NO";
			removeAssignText="";
			if(tasks[index].assign_to>0){
				ast="YES";
				removeAssignText='<a href="javascript:removeAssign('+tasks[index].task_id+');" class="task-icons-options"  ><img src="css/icons/remove_assign.png"  ></a>';
			}

			var row="<tr id=task_"+tasks[index].task_id+">"+
					"<td>"+tasks[index].task_id+"</td>"+
					"<td>"+tasks[index].task_title+"</td>"+
					"<td>"+tasks[index].name+"</td>"+
					"<td>"+tasks[index].address+"</td>"+
					"<td>"+tasks[index].task_date+"</td>"+
					"<td >"+tasks[index].status+"</td>"+
					"<td id='assign_status_"+tasks[index].task_id+"'>"+ast+"</td>"+
					'<td>'+
                          '<a href="javascript:editTask('+tasks[index].task_id+');" class="task-icons-options"  ><img src="css/icons/edit.png"></a>'+
                          '<a href="javascript:deleteTask('+tasks[index].task_id+');"class="task-icons-options"   ><img src="css/icons/delete.png"></a>'+
			        removeAssignText+ '</td> </tr>';

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




function removeAssign (task_id){
	console.log(task_id);
}




function assignTask(){
	// alert("Assign "+task_id);
	var sendData=new Object();
	sendData.task_id=taskToAssign;
	sendData.driver_id=driverToAssign;

	if(sendData.task_id==-1 || sendData.driver_id == -1 || assignStatus == false ){
		console.log("CANT ASSIGN TASK ... need to select task + driver ");
		return;
	}



	$.ajax({
		url:'admin/assignTask',
		type:"GET",
		data:sendData,
		success:function(data){
			console.log(data);
			alert(data.message);
			if(data.error==100){
				$("#assign_status_"+sendData.task_id).html("YES");
				tasks_list[sendData.task_id].assign_to=sendData.driver_id;
				cancelSelectedTask();
			}
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
        mapTypeId: google.maps.MapTypeId.SATELLITE

    };
    map = new google.maps.Map(document.getElementById("map-container"), mapProp);
    geocoder = new google.maps.Geocoder();
 google.maps.event.addListener(map, 'click', getLocation);

	loadTasks();
	loadDrivers();

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
				if(tasks_list[task_id].status==NOT_STARTED){
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
				if(tasks_list[task_id].status==IN_PROGRESS){
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
				if(tasks_list[task_id].status==COMPLETED){
					if(value)
						tasks_list[task_id].marker.setMap(map);
					else
						tasks_list[task_id].marker.setMap(null);
				}
		})(id);
	}
}





function showDrivers ( value){
	console.log("showDrivers",value);
	for(id in drivers_list){
		(function(driver_id){
			if(value)
				drivers_list[driver_id].marker.setMap(map);
			else
				drivers_list[driver_id].marker.setMap(null);
		})(id);
	}
}








function getLocation(event) {
    // alert("event");
    console.log(event.latLng);
    orig = event.latLng;
    // orig.
    longitude=orig.lng();
    latitude=orig.lat();
    map.setCenter(orig);
    if (marker != null)
        marker.setMap(null);
    marker = new google.maps.Marker({
        map: map,
        position: orig
    });

    codeLatLng(orig);

}

function codeLatLng(latlng) {
    geocoder.geocode({
        'latLng': latlng
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[1]) {
                $("#address").val(results[1].formatted_address);
            } else {
                log('No results found', latlng);
            }
        } else {
            log('Geocoder failed due to: ' + status, geocoder);
        }
    });
}




function showAddressInMap() {
    address = $("#address").val();
    geocoder.geocode({
        'address': address
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            orig = results[0].geometry.location;
            longitude=orig.lng();
            latitude=orig.lat();
            map.setCenter(orig);
            if (marker != null)
                marker.setMap(null);
            marker = new google.maps.Marker({
                map: map,
                position: orig
            });
        } else {
            alert("Invalid Address:Location Not Found!");
        }
    });
}



function AddNewTask() {
  var sendData=new Object();
  sendData.latitude=latitude;
  sendData.longitude=longitude;
  sendData.task_title=$("#task_title").val();
  sendData.address=$("#address").val();
  sendData.note_text=$("#note_text").val();
  sendData.phone=$("#phone").val();
  sendData.first_name=$("#first_name").val();
  sendData.last_name=$("#last_name").val();

  console.log(sendData);
  $.ajax({
      url:'admin/addTask',
      data:sendData,
      type:'GET',
      success:function(data){
        if(data==1){
            alert('Task Added');
            loadTasks();
        }
        else
            alert('failed');
        console.log('success',data);

    },
    error:function(data){
        console.log("error",error);
    }

});
}