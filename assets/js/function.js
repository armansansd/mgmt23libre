
$(document).ready(function(){
	console.log("jquery");
	//fun css pad 
	var content = "https://mensuel.framapad.org/p/platforme_css/export/txt";
	var elem = "<style></style>";
	elem = $(elem).load(content);
	$("head").append(elem);

	lspad()
	$("#addPad").click(function(){
		var input = $(this).parent().find("input");
		//console.log();
		if(input[0].textLength !== 0){
			newpad(input[0])
		}else{
			alert("nom de pad vide ou invalide");
		}
	});
});

function newpad(p){
	//alert("un nouveau pad a été créé, redirection en cours");
	var t = p.value;
	$.ajax({ url: 'http://localhost/23libre-platforme/assets/php/function.php',
        data: {action: 'pushpad', padname: t},
        type: 'post',
        success: function(output) {
            console.log(output);
        },
        error: function(xhr, status, error) {
  			//var err = eval("(" + xhr.responseText + ")");
  			console.log(error);
		}
	});
	alert("un nouveau pad mensuel a été créé, redirection en cours");
	var url = "https://mensuel.framapad.org/p/"+t;
	//window.location.href = url;
	
}
function lspad(){
	//import list of pads
	$.getJSON( "links/pads.json", function( data ) {
	  var items = [];
	  $.each( data, function( key, val ) {
	    items.push( "<a href='https://mensuel.framapad.org/p/"+val+"'><li id='" + key + "'>" + val + "</li></a>" );
	  });
	 
	  $( "<ul/>", {
	    "class": "pad",
	    html: items.join( "" )
	  }).prependTo( ".padliste" );
	});
}

// function upload(a){
// 	var fn = $(a).parent().find("#folder");
// 	fn = fn[0].value;
// 	var ff = $(a).parent().find("#file");
// 	var ffl = $(ff)[0].files.length;
// 	if(fn !== "" && fn !== " " && fn !== "." && fn !== ".."){
// 		if(ffl > 0){
// 			var fd = new FormData();
// 		//for(var i = 0; i < ffl; i ++){
// 			var file_data = $(ff).prop('files')[0];
// 			///console.log(file_data);
// 			formData.append('username', 'Chris');
// 			console.log(fd);
// 		//}
		

// 		//creat folder + import pictures
// 		// $.ajax({ url: 'http://localhost/23libre-platforme/assets/php/function.php',
//   //       	data: {action: 'upload', foldername: fn, },
//   //       	type: 'post',
//   //       	success: function(output) {
//   //           	console.log(output);
//   //       	},
//   //       	error: function(xhr, status, error) {
//   // 			//var err = eval("(" + xhr.responseText + ")");
//   // 				console.log(error);
// 		// 	}
// 		// });



// 		}else{

// 		}
// 	}else{
// 	 	alert("nom de dossier vide ou invalide");
// 	}
// }