var show_mesg=function(str){
	$('.message').html('<p>'+str+'</p>');
	setTimeout(function(){$('.message p').hide();},5000);
};
$(document).ready(function() {
	//mostra momentàniament l'avís
	//setTimeout(function(){ $('.m-warning').hide(); }, 5000);
	//checks existent mail
	//$('.m-warning').on('change',function(){
	//	setTimeout(function(){ $(this).hide(); }, 5000);
	//});
	$('#nick').on('change',function(){
		
		var email=$(this).val();
		var dataString='email='+email;
		bURL=window.location.href+'/veruser';
		console.log(bURL);
		$.ajax({
			method:'POST',
			url:bURL,
			data:dataString,
			success:function(resp){
				if (resp){
					console.log(resp);
					var respOBJ = JSON.parse(resp);
					//alert(respOBJ['msg']);
					$('#nick-msg').html('<p>'+respOBJ['msg']+'</p>');
					if (respOBJ['msg']==="Usuari existent"){
						$('#nick-msg').css("color","red");
						$('#nick-msg').focus();
					}else{
						$('#nick-msg').css("color","green");
						$('#nick-msg').focus();
					}
					//setTimeout(function(){ $('#nick-msg').hide(); }, 2000);
					//$('#nick-msg').fadeIn();
				}
			},
			error:function(){
				alert('Error');
			}
		})
		return false;
	});
	//login front-end
	$('form.log').on('submit',function(){
		var postData=$(this).serialize();		
        var formURL = $(this).attr("action");
		$.ajax({
			url:formURL,
			data:postData,
			method:'post',
			dataType:'json',
			beforeSend: function(){
				$('#imgload').show();
			},
			success:function(resp){
				console.log(resp);
				
				if (resp.redirect===(window.location.pathname+'dashboard')){
					show_mesg('Login ok');
					setTimeout(function(){},3000);
				
				} else{
					show_mesg('Usuari inexistent');
				}
				
                window.location.href=resp.redirect;
                
			}
		});
		return false;
	}); 
	//
	$('.admin ul button:first-child').on('click',function(){
		bURL=window.location.href+'/listUsers';
		console.log(bURL);
		$.ajax({
			url:bURL,
			method:'post' ,
			beforeSend: function(){
				$('#imgload').show(); },
			success: function(resp){
				console.log(resp);
				var obj=JSON.parse(resp);
				var listHTML="<table><tr><th>Id</th><th>Nom</th><th>Email</th><th>Password</th><th>Rol</th></tr>";

				for (var key in obj){
					listHTML += "<tr>";
					listHTML += "<td>" + obj[key]["id"] + "</td>";
            		listHTML += "<td><input type='text' size=20 id='name"+obj[key]["id"]+"' value=" + obj[key]["name"] + "></td>";
            		listHTML += "<td><input type='email' size=40 id='email"+obj[key]["id"]+"' value=" + obj[key]["email"] + "></td>";
            		listHTML += "<td><input type='password' size=30 id='passwd"+obj[key]["id"]+"' value=" + obj[key]["password"] + "></td>";
            		listHTML += "<td><input type='number' size=4 id='rol"+obj[key]["id"]+"' value=" + obj[key]["rol"] + "></td>";
          			listHTML +="<td><button class='bedit' id='bed"+obj[key]["id"]+"'><button class='btrash'></td>"
          			listHTML += "</tr>";
				}
				listHTML+="</table>"
				$('.users-table').html(listHTML);
					
						

				
			} ,
			error: function(){
				alert('Error llista');
			}
		});
		return false;
	});
	
	
	$('.users-table').on('click',function(){
		$('.bedit').on('click',function(){
				var sid=$(this).attr("id");
				//extract id and sends it to frwk
				var ident=sid.substring(3);
				//serialitzar dades post
				var dataString ="id="+ident+"&name="+$('#name'+ident).val()+"&";
					dataString +="email="+$('#email'+ident).val()+"&";
					dataString +="password="+$('#passwd'+ident).val()+"&";
					dataString +="rol="+$('#rol'+ident).val();

				bURL=window.location.href+'/editUser';
				$.ajax({
					url:bURL,
					method:'post',
					data: dataString,
					success: function(resp){
						console.log(resp);
						var obj=JSON.parse(resp);
						//mostrar missatge
						var str=obj['msg'];
						show_mesg(str);
						
					},
					error: function(){
						alert('Error updating');
						//mostrar missatge
					}
				});
				return false;
				console.log(ident);
		});
	});
		
	
});
