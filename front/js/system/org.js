var params={};

function isInt(n){
    return Number(n) === n && n % 1 === 0;
}

function isFloat(n){
    return Number(n) === n && n % 1 !== 0;
}

function validateEmail(email) {
     var re = /^[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/
    return re.test(email);
}

function errorGoto(element) {
    $('html, body').animate({
        scrollTop: $(element).offset().top-100 + 'px'
    }, 600);
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function userlogin(){

	var control=true;
	$('#user_login_error').hide();
	$('#user_login_error').html("");

	if($('#user_login_username').val().trim()=="")
	{
		control=false;
		$('#user_login_error').show();
		$('#user_login_error').html("Kullanıcı veya e-mail boş olamaz.");
	}else if($('#user_login_password').val().trim()=="")
	{

		control=false;
		$('#user_login_error').show();
		$('#user_login_error').html("Parola boş olamaz.");
	}


	if(control==true)
	{
		var data={
			username:$('#user_login_username').val().trim(),
			password:$('#user_login_password').val().trim(),
			rememberme:$('#user_login_rememberme').prop("checked")==true?1:0,
		};
		var dataString = 'data='+encodeURIComponent(JSON.stringify(data));

		$.ajax({
		 type: "POST",
		 dataType:'json',  
		 url: params.site+"/site/userlogin", 
		 data: dataString,
		 timeout: 30000,
		 success: function(data)
		 {

			if(data.sonuc==1)
			{

				window.location=params.site+"/member/uaccount";

			}else{
				$('#user_login_error').show();
				$('#user_login_error').html("Kullanıcı ve/veya Parola hatalı.");
			} 
		 }
		});
	}
	
}

function supplierlogin(){

	var control=true;
	$('#supplier_login_error').hide();
	$('#supplier_login_error').html("");

	if($('#supplier_login_username').val().trim()=="")
	{
		control=false;
		$('#supplier_login_error').show();
		$('#supplier_login_error').html("Kullanıcı veya e-mail boş olamaz.");
	}else if($('#supplier_login_password').val().trim()=="")
	{

		control=false;
		$('#supplier_login_error').show();
		$('#supplier_login_error').html("Parola boş olamaz.");
	}


	if(control==true)
	{
		var data={
			username:$('#supplier_login_username').val().trim(),
			password:$('#supplier_login_password').val().trim(),
			rememberme:$('#user_login_rememberme').prop("checked")==true?1:0,
		};
		var dataString = 'data='+encodeURIComponent(JSON.stringify(data));

		$.ajax({
		 type: "POST",
		 dataType:'json',  
		 url: params.site+"/site/supplierlogin", 
		 data: dataString,
		 timeout: 30000,
		 success: function(data)
		 {

			if(data.sonuc==1)
			{

				window.location=params.site+"/member/saccount";

			}else{
				$('#supplier_login_error').show();
				$('#supplier_login_error').html("Kullanıcı ve/veya Parola hatalı.");
			} 
		 }
		});
	}
	
}
		
function userFLogin() {
    
  FB.login(function(response){
     FB.api('/me', function(response) {

     });

  }, {scope: 'email,user_location,user_birthday,user_friends'});

}

function suppliersFLogin() {
    
  FB.login(function(response){
     FB.api('/me', function(response) {

     });

  }, {scope: 'email,user_location,user_birthday,user_friends'});

}

function userregister(){

	var control=true;

	$('#user_register_error').html("");
	$('#user_register_error_name').html("");
	$('#user_register_error_email').html("");
	$('#user_register_error_remail').html("");
	$('#user_register_error_password').html("");

	$('#user_register_error').hide();
	$('#user_register_error_name').hide();
	$('#user_register_error_email').hide();
	$('#user_register_error_remail').hide();
	$('#user_register_error_password').hide();

	if($('#user_register_name').val().trim()=="")
	{
		control=false;
		$('#user_register_error_name').show();
		$('#user_register_error_name').html("Ad Soyad boş olamaz.");
	}else if($('#user_register_name').val().trim().length<5)
	{
		control=false;
		$('#user_register_error_name').show();
		$('#user_register_error_name').html("Geçerli bir Ad Soyad giriniz.");
	}

	if($('#user_register_email').val().trim()=="")
	{

		control=false;
		$('#user_register_error_email').show();
		$('#user_register_error_email').html("Email boş olamaz.");
	}else if(!validateEmail($('#user_register_email').val().trim()))
	{

		control=false;
		$('#user_register_error_email').show();
		$('#user_register_error_email').html("Geçerli bir Email giriniz.");
	}


	if($('#user_register_remail').val().trim()=="")
	{

		control=false;
		$('#user_register_error_remail').show();
		$('#user_register_error_remail').html("Tekrar Email boş olamaz.");
	}else if($('#user_register_remail').val().trim()!=$('#user_register_email').val().trim())
	{

		control=false;
		$('#user_register_error_remail').show();
		$('#user_register_error_remail').html("Email kontrolü uyuşmuyor.");
	}



	if($('#user_register_password').val().trim()=="")
	{

		control=false;
		$('#user_register_error_password').show();
		$('#user_register_error_password').html("Parola boş olamaz.");
	}else if($('#user_register_password').val().trim().length<6)
	{
		control=false;
		$('#user_register_error_password').show();
		$('#user_register_error_password').html("Parola en az 6 karekter olamalıdır.");
	}

	if(control==true)
	{
		var data={
			name:$('#user_register_name').val().trim(),
			email:$('#user_register_email').val().trim(),
			password:$('#user_register_password').val().trim(),
		};
		var dataString = 'data='+encodeURIComponent(JSON.stringify(data));

		$.ajax({
		 type: "POST",
		 dataType:'json',  
		 url: params.site+"/member/userregister", 
		 data: dataString,
		 timeout: 30000,
		 success: function(data)
		 {

			if(data.sonuc==3)
			{
				$('#user_register_error_password').show();
				$('#user_register_error_password').html("Lütfen basit bir parola kullanmayınız ve parolanızı değiştiriniz.");

			}else if(data.sonuc==2)
			{
				$('#user_register_error_email').show();
				$('#user_register_error_email').html("Email adresi daha önce alınmış.");

				

			}else if(data.sonuc==1){

				window.location=params.site+"/member/uaccount";
			}else{
				$('#user_register_error').show();
				$('#user_register_error').html("Kayıt esnasında bir hata oluştu, lütfen tekrar deneyiniz.");
			} 
		 }
		});
	}

}

function supplierregister(){

	var control=true;

	$('#supplier_register_error').html("");
	$('#supplier_register_error_name').html("");
	$('#supplier_register_error_email').html("");
	$('#supplier_register_error_remail').html("");
	$('#supplier_register_error_password').html("");

	$('#supplier_register_error').hide();
	$('#supplier_register_error_name').hide();
	$('#supplier_register_error_email').hide();
	$('#supplier_register_error_remail').hide();
	$('#supplier_register_error_password').hide();

	if($('#supplier_register_name').val().trim()=="")
	{
		control=false;
		$('#supplier_register_error_name').show();

		$('#supplier_register_error_name').html("Ad Soyad boş olamaz.");
	}else if($('#supplier_register_name').val().trim().length<5)
	{
		control=false;
		$('#supplier_register_error_name').show();
		$('#supplier_register_error_name').html("Geçerli bir Ad Soyad giriniz.");
	}

	if($('#supplier_register_email').val().trim()=="")
	{

		control=false;
		$('#supplier_register_error_email').show();
		$('#supplier_register_error_email').html("Email boş olamaz.");
	}else if(!validateEmail($('#supplier_register_email').val().trim()))
	{

		control=false;
		$('#supplier_register_error_email').show();
		$('#supplier_register_error_email').html("Geçerli bir Email giriniz.");
	}


	if($('#supplier_register_remail').val().trim()=="")
	{

		control=false;
		$('#supplier_register_error_remail').show();
		$('#supplier_register_error_remail').html("Tekrar Email boş olamaz.");
	}else if($('#supplier_register_remail').val().trim()!=$('#supplier_register_email').val().trim())
	{

		control=false;
		$('#supplier_register_error_remail').show();
		$('#supplier_register_error_remail').html("Email kontrolü uyuşmuyor.");
	}



	if($('#supplier_register_password').val().trim()=="")
	{

		control=false;
		$('#supplier_register_error_password').show();
		$('#supplier_register_error_password').html("Parola boş olamaz.");
	}else if($('#supplier_register_password').val().trim().length<6)
	{
		control=false;
		$('#supplier_register_error_password').show();
		$('#supplier_register_error_password').html("Parola en az 6 karekter olamalıdır.");
	}

	if(control==true)
	{
		var data={
			name:$('#supplier_register_name').val().trim(),
			email:$('#supplier_register_email').val().trim(),
			password:$('#supplier_register_password').val().trim(),
		};
		var dataString = 'data='+encodeURIComponent(JSON.stringify(data));

		$.ajax({
		 type: "POST",
		 dataType:'json',  
		 url: params.site+"/member/supplierregister", 
		 data: dataString,
		 timeout: 30000,
		 success: function(data)
		 {

			if(data.sonuc==3)
			{
				$('#supplier_register_error_password').show();
				$('#supplier_register_error_password').html("Lütfen basit bir parola kullanmayınız ve parolanızı değiştiriniz.");

			}else if(data.sonuc==2)
			{
				$('#supplier_register_error_email').show();
				$('#supplier_register_error_email').html("Email adresi daha önce alınmış.");

				

			}else if(data.sonuc==1){

				window.location=params.site+"/member/saccount";
			}else{
				$('#supplier_register_error').show();
				$('#supplier_register_error').html("Kayıt esnasında bir hata oluştu, lütfen tekrar deneyiniz.");
			} 
		 }
		});
	}

}

function changepassword() {
	var control=true;
	$("#alertpassword").hide();
	$('#changepassword_register_error_oldpassword').html("");
	$('#changepassword_register_error_newpassword').html("");
	$('#changepassword_register_error_newpassword2').html("");
	$('#changepassword_register_error').html("");

	if($('#changepassword_register_oldpassword').val().trim()=="")
	{
		control=false;
		$('#changepassword_register_error_oldpassword').html("Eski Şifre boş az olamaz.");
	}

	if($('#changepassword_register_newpassword').val().trim()=="")
	{
		control=false;
		$('#changepassword_register_error_newpassword').html("Yeni Şifre boş az olamaz.");
	}else if($('#changepassword_register_newpassword').val().trim().length<6)
	{
		control=false;
		$('#changepassword_register_error_newpassword').html("Yeni Şifre 6 karekterden daha az olamaz.");
	}else if($('#changepassword_register_newpassword').val().trim()!=$('#changepassword_register_newpassword2').val().trim())
	{
		control=false;
		$('#changepassword_register_error_newpassword2').html("Yeni Şifreler birbiriyle uyuşmuyor.");
	}

	if(control==true)
	{

		var data={
			oldpassword:$('#changepassword_register_oldpassword').val().trim(),
			newpassword:$('#changepassword_register_newpassword').val().trim(),
		};
		var dataString = 'data='+encodeURIComponent(JSON.stringify(data));

		$.ajax({
		 type: "POST",
		 dataType:'json',  
		 url: params.site+"/member/changepasswordcontrol", 
		 data: dataString,
		 timeout: 30000,
		 success: function(data)
		 {
			if(data.sonuc==2)
			{

				$('#changepassword_register_error_oldpassword').html("Eski Şifreniz hatalı.");

				
			}else if(data.sonuc==1){

				
				$("#alertpassword").children("strong").html("Şifre başarılı bir şekilde değiştirilmiştir.");
				$("#alertpassword").show();
			}else if(data.sonuc==3){

				$('#changepassword_register_error').html("Basit bir şifre girmeyiniz. Lütfen Yeni şifrenizi değiştiriniz.");
			} 
		 }
		});

	}
}

function addofferlist(id) {
	var count_number = $("#count_number").val();
    var data = {
        code:id,
		count_number:count_number
    };

    var dataString = 'data='+encodeURIComponent(JSON.stringify(data));

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: params.site+"/urun/addteklifsepeti",
        data: dataString,
        success: function (data) {
				window.location = params.site+"/urun/teklifsepetim";
        }
    })
}

function addfollowlist(id) {
	var data = {
		code:id
	};

	var dataString = 'data='+encodeURIComponent(JSON.stringify(data));

	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: params.site+"/urun/addfollowlist",
		data: dataString,
		success: function (data) {
				window.location = params.site+"/urun/takiplistesi";
		}
	})
}

function addcomparelist(id) {
	var data = {
		code:id
	};

	var dataString = 'data='+encodeURIComponent(JSON.stringify(data));

	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: params.site+"/urun/addcomparelist",
		data: dataString,
		success: function (data) {
				window.location = params.site+"/urun/urunkarsilastir";
		}
	})
}

function clearFollowlist() {

	$.ajax({
		type: 'POST',
		dataType:'json',
		timeout: 30000,
		url: params.site+"/urun/clearfollowlist",
		success: function (data) {
			if(data.status == 1){
				$(".cart_item").remove();
				$(".countfollow").html("0");
				$("#allbasket").prepend("<tr><td style='text-align: center;' colspan='6'>Sepetiniz Boş</td></tr>");
			}
		}
	})
	
}

function clearOfferbasket() {

	$.ajax({
		type: 'POST',
		dataType:'json',
		timeout: 30000,
		url: params.site+"/urun/clearofferbasket",
		success: function (data) {
			if(data.status == 1){
				$(".cart_item").remove();
				$(".mini_cart_item").remove();
				$(".cart-items-count").html("0");
				$("#msgbasket").html("Sepetiniz Boş");
				$("#allbasket").prepend("<tr><td style='text-align: center;' colspan='6'>Sepetiniz Boş</td></tr>");
				$(".wc-proceed-to-checkout").remove();
			}
		}
	})

}

function deletefollowitem(id) {
	var data = {
		code:id
	};

	var dataString = 'data='+encodeURIComponent(JSON.stringify(data));

	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: params.site+"/urun/deletefollowitem",
		data: dataString,
		success: function (data) {

			if(data.status == 1){
				$("#"+data.code+"").remove();
				var datacount = data.count;
				if(datacount > 0){
					$(".countfollow").html(datacount);
				}else if(datacount == 0){
					$(".countfollow").html("0");
					$("#allbasket").prepend("<tr><td style='text-align: center;' colspan='6'>Takip Listeniz Boş</td></tr>");
				}
			}
		}
	})
}

function deleteofferitem(id) {
	var data = {
		code:id
	};

	var dataString = 'data='+encodeURIComponent(JSON.stringify(data));

	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: params.site+"/urun/deleteofferitem",
		data: dataString,
		success: function (data) {
			if(data.status == 1){
				$("#"+data.code+"").remove();
				$("#"+data.code+"_1"+"").remove();
				if(data.count == 0){
					$(".count_basket").html("0");
					$("#msgbasket").html("Sepetiniz Boş");
					$(".wc-proceed-to-checkout").remove();
					$("#allbasket").prepend("<tr><td style='text-align: center;' colspan='5'>Sepetiniz Boş</td></tr>");
				}else if(data.count > 0){
					$(".count_basket").html(data.count);
				}
			}
		}
	})
}

function deletecompareitem(id){
	var data = {
		code:id
	};

	var dataString = 'data='+encodeURIComponent(JSON.stringify(data));

	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: params.site+"/urun/deletecompareitem",
		data: dataString,
		success: function (data) {
			if(data.status == 1){
				$("#"+data.code+"").remove();
				var datacount = data.count;
				if(datacount > 0){
					$(".countcompare").html(datacount);
				}else if(datacount == 0){
					$(".countcompare").html("0");
					$("#allbasketcomp").prepend("<tr><td style='text-align: center;' colspan='6'>Karşılaştırma listenizde ürün bulunmamaktadır</td></tr>");
				}
			}
		}
	});
}

function sendofferunitprice(id) {
	var uid = id;
	var price = $("#product_price_"+id).val().trim();

	if(price != ""){

		var data = {
			uid:uid,
			price:price
		};

		var dataString = "data="+encodeURIComponent(JSON.stringify(data));

		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: params.site+"/listem/addofferunitprice",
			data: dataString,
			timeout: 30000,
			success: function (data) {
				if(data.status == 1){
					$("#tick"+uid).find("i").remove();
					$("#tick"+uid).append("<i style='color: #00A000;' class='fa fa-check-circle-o fa-4x' aria-hidden='true'></i>");
				}
			}
		})
	}
}

function sendoffers() {
	$.ajax({
		type: 'POST',
		dataType:'json',
		timeout: 30000,
		url: params.site+"/urun/sendoffers",
		success: function (data) {
			if(data.status == 1){
				$("#modalok").modal("show");
				setTimeout(function (){
					window.location = params.site+"/listem/liste";
				},3000);
			}else if(data.status == 3){
				$("#modalerr").modal("show");
				setTimeout(function (){
					window.location = params.site+"/site/giris";
				},3000);
			}
		}
	})
}

function sendtenderoffer(id) {
	var pid = id;
	var count_number = $("#count_number").val();
	var offermainprice = $("#offermainprice").val();
	var decimal = $("#decimal").val();


	if(count_number != "" && offermainprice != "" && decimal != ""){
		var price = offermainprice+"."+decimal;

		var data = {
			id:id,
			count: count_number,
			offer: price
		};

		var dataString = "data="+encodeURIComponent(JSON.stringify(data));
		var modal = "";
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: params.site+"/urun/sendtenderoffer",
			data: dataString,
			timeout: 30000,
			success: function (data) {
				if(data.status == 1){
					$("#order").prepend("<li>"+data.name+"</li>");
					$("#modalok").modal("show");
				}
			}
		})
	}else{
		$("#modalerr").modal("show");
	}



}

function plus(id) {
	var c = parseInt($("#t_count"+id+"").val());
	c++;

	var data = {
		code:id,
		piece:c
	};

	var dataString = 'data='+encodeURIComponent(JSON.stringify(data));

	$.ajax({
		type: 'POST',
		dataType: 'json',
		timeout: 30000,
		url: params.site+"/urun/changepiece",
		data: dataString,
		success: function (data) {
			if(data.status == 1) {
				$("#t_count"+id+"").val(c);
			}
		}
	});

}

function changepiece(id) {

	var c = parseInt($("#t_count"+id+"").val());

	var data = {
		code:id,
		piece:c
	};

	var dataString = 'data='+encodeURIComponent(JSON.stringify(data));

	$.ajax({
		type: 'POST',
		dataType: 'json',
		timeout: 30000,
		url: params.site+"/urun/changepiece",
		data: dataString,
		success: function (data) {
			if(data.status == 1) {
				$("#t_count"+id+"").val(c);
			}
		}
	});
}

function mins(id) {
	var c = parseInt($("#t_count"+id+"").val());
	if(c > 1) {
		c--;
		var data = {
			code:id,
			piece:c
		};

		var dataString = 'data='+encodeURIComponent(JSON.stringify(data));

		$.ajax({
			type: 'POST',
			dataType: 'json',
			timeout: 30000,
			url: params.site+"/urun/changepiece",
			data: dataString,
			success: function (data) {
				if(data.status == 1) {
					$("#t_count"+id+"").val(c);
				}
			}
		});
	}




}

function approveoffer(id) {

	var data = {
		oid:id,
		app:1
	};

	var dataString = 'data='+encodeURIComponent(JSON.stringify(data));

	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: params.site+"/listem/approvaloffer",
		data: dataString,
		timeout:3000,
		success: function (data) {
			if(data.status == 1){
				$("#approve_"+id).remove();
				$("#td"+id).append("<a class='btn btn-danger' onclick='canceloffer("+id+")' id='cancel_"+id+"'>İptal Et <i class='fa fa-times'></i></a>");
			}
		}
	});

}

function canceloffer(id) {

	var data = {
		oid:id,
		app:0
	};

	var dataString = 'data='+encodeURIComponent(JSON.stringify(data));

	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: params.site+"/listem/approvaloffer",
		data: dataString,
		timeout:3000,
		success: function (data) {
			if(data.status == 1){
				$("#cancel_"+id).remove();
				$("#td"+id).append("<a class='btn btn-success' onclick='approveoffer("+id+")' id='approve_"+id+"'>Onayla <i class='fa fa-check'></i></a>");
			}
		}
	});


}

function searchelp(e,element) {
	if($(element).val().trim().length > 1 && $(element).val().trim().length < 50){
		var data = {
			text:$(element).val().trim(),
		};

		var dataString = 'data='+encodeURIComponent(JSON.stringify(data));
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: params.site+"/yardim/mainsearch",
			data: dataString,
			timeout:3000,
			success: function (data) {
				$('.mainsearchul12').show();

				var li = "";
				var control = false;
				for(i in data.questions){
						li += "<li><a href='"+params.site+"/yardim/musterihizmetleri/"+data.questions[i].qid+"'>"+data.questions[i].question+"</a></li>";
						if(li!=""){
							control=true;
							$('.mainsearchul12').show();
							$('.mainsearchul12').find("ul").html(li);
						}else{
							control=false;
							$('.mainsearchul12').hide();
							$('.mainsearchul12').find("ul").html("");
						}
					}
				if(control==false)
				{
					$('.mainsearchul12').hide();
				}

			}
		});
	}else{
		$('.mainsearchul12').hide();
		$('.mainsearchul12').find("ul").html("");
		$('.mainsearchul12').find("ul").html("");

	}

	if(e.which == 13){
		var text = $(element).val();
		window.location.href = params.site+"/yardim/ara?text="+text;
	}
}

function searchmain(e,element){
	if($(element).val().trim().length>1 && $(element).val().trim().length<50)
	{
		var data = {
			text:$(element).val().trim(),
		};
		var dataString = 'data='+encodeURIComponent(JSON.stringify(data));
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: params.site+"/urun/mainsearch",
			data: dataString,
			timeout:3000,
			success: function (data) {

				$('.mainsearchul').show();

				var li="";
				var control=false;
				for(i in data.productgroups){
					li+='<li><a href="'+params.site+'/urun/ara/?productgroup='+data.productgroups[i].key+'">'+data.productgroups[i].name+'</a></li>';
				}

				if(li!=""){
					control=true;
					$('.mainsearchul').find(".productgroups").show();
					$('.mainsearchul').find(".productgroups").find("ul").html(li);
				}else{
					$('.mainsearchul').find(".productgroups").hide();
					$('.mainsearchul').find(".productgroups").find("ul").html("");
				}

				var li="";
				for(i in data.products){
					li+='<li><a href="'+params.site+'/urun/ara/?text='+$(element).val().trim()+'&product_id='+data.products[i].key+'">'+data.products[i].name+'</a></li>';
				}

				if(li!=""){
					control=true;
					$('.mainsearchul').find(".products").show();
					$('.mainsearchul').find(".products").find("ul").html(li);
				}else{
					$('.mainsearchul').find(".products").hide();
					$('.mainsearchul').find(".products").find("ul").html("");
				}

				if(control==false)
				{
					$('.mainsearchul').hide();
				}
				
			}
		});
	}else{
		$('.mainsearchul').hide();
		$('.mainsearchul').find(".products").find("ul").html("");
		$('.mainsearchul').find(".productgroups").find("ul").html("");

	}
}

function followcompany(id){
	var data = {
		fid:id
	};

	var dataString = 'data='+encodeURIComponent(JSON.stringify(data));

	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: params.site+"/sirket/followcompany",
		data: dataString,
		timeout:3000,
		success: function (data) {
			if(data.status == 1){
			$("#flw_"+id).remove();
			var button = "<a onclick='followcompany("+id+")' id='flw_"+id+"' type='button' class='btn btn-danger btn-sm'>Takibi bırak</a>";
			$(".profile-userbuttons_"+id).append(button);
			}else if(data.status == 2){
				var text = "<i style='color: #8a6d3b; position: relative; top: 10px;' class='fa fa-exclamation-circle fa-4x' aria-hidden='true'></i> &nbsp;&nbsp;Takip ederken sorunlar oluştu, lütfen daha sonra tekrar deneyiniz";
				$("#parag").html(" ");
				$("#parag").append(text);
				$("#modal").modal("show");
			}else if(data.status == 3){
				setTimeout(function (){
					window.location = params.site+"/site/index";
				},3000);
			}else if(data.status == 4){
				var text = "<i style='color: #8a6d3b; position: relative; top: 10px;' class='fa fa-exclamation-circle fa-4x' aria-hidden='true'></i> &nbsp;&nbsp;Takip edebilmek için lütfen üye olunuz";
				$("#parag").html(" ");
				$("#parag").append(text);
				$("#modal").modal("show");
				setTimeout(function (){
					window.location = params.site+"/site/giris";
				},3000);
			}else if(data.status == 5){
				$("#flw_"+id).remove();
				var button = "<a onclick='followcompany("+id+")' id='flw_"+id+"' type='button' class='btn btn-success btn-sm'>Takip Et</a>";
				$(".profile-userbuttons_"+id).append(button);
			}
		}
	});
}

