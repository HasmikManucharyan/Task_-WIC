$(document).ready(function() {
    $('#submit').click(function(){
    	var country = $(this).prev().prev().val();
    	country = country.split(".");
    	var country_code = country[0];
    	var country_id = country[1];
    	var zipcode = $(this).prev().val();
    	$.ajax({
    		url: "main/checkCode",
    		type:'post',
        	data:{country_code:country_code,zipcode:zipcode}, 
    		success: function(result){
    			result = JSON.parse(result);
    			createTable(result);
    			if(result.length == 0){
    				var url = "http://api.zippopotam.us/"+country_code+"/"+zipcode+"";
    				var client = new XMLHttpRequest();
					client.open("GET", url, true);
					client.onreadystatechange = function() {
						if(client.readyState == 4) {
							result = JSON.parse(client.responseText)['places'];
							result = JSON.stringify(result);
							if(result !== undefined){
								$.ajax({
    								url: "main/insertPlace",
    								type:'post',
        							data:{zipcode:zipcode,country_id:country_id,places:result}, 
    								success: function(result){debugger
    									createTable(result);
    								}});
								createTable(result);								
							} else{
								var txt ='Please enter correct Zip Code. Zip Codes list you can check here <a href="http://www.zippopotam.us/" target="blank">Click Here</a>';
								$('#places').html(txt);
							}							
						}
					};
					client.send();
    			}
  			}
  		});
    })

    function createTable (result){debugger
    	if(result.length !=0){
    		result = JSON.parse(result[0]['places']) || JSON.parse(result);
    	}
    	var table = '<table border=1><th>Place Name</th><th>Latitude</th><th>Longitude</th>';
    			for(var i=0; i<result.length;i++){ 
    				table += '<tr><td>'+result[i]['place name']+'</td><td>'+result[i]['latitude']+'</td></td><td>'+result[i]['longitude']+'</td></tr>';
    			}
    			table += '</table>';
    			$('#places').html(table);
    }
});