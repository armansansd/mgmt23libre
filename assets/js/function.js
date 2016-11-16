$(document).ready(function(){
	console.log("jquery");
	lspad()
	$("#addPad").click(function(){
		var input = $(this).parent().find("input");
		//console.log();
		if(input[0].textLength !== 0){
			newpad(input[0])
		}else{
			alert("nom de pad vide ou invalide <br /> ");
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
	alert("un nouveau pad <b>mensuel</b> a été créé, redirection en cours");
	var url = "https://mensuel.framapad.org/p/"+t;
	window.location.href = url;
	
}
function lspad(){
	//import list of pads
	$.getJSON( "links/pads.json", function( data ) {
	  var items = [];
	  $.each( data, function( key, val ) {
	  	//insert framapad link
	  	console.log(val)
	    items.push( "<a href='https://mensuel.framapad.org/p/"+val+"'><li id='" + key + "'>" + val + "</li></a>" );
	  });
	 
	  $( "<ul/>", {
	    "class": "pad",
	    html: items.join( "" )
	  }).prependTo( ".padliste" );
	});
}