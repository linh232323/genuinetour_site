$(document).ready(function(){
	$(window).scroll(function(){
        var $toado_old=0;
        var $toado_curr=$(window).scrollTop()
        //alert($toado_curr)
         $('.banner#b1,.banner#b2').stop().animate({'top':$toado_curr-$toado_old},1000)
        $('.banner#b3,.banner#b4').stop().animate({'top':$toado_curr-$toado_old+330},1000)
        $toado_old=$toado_curr
    });
    $(".tour").hover(function(){
        $(this).css("border","#999 solid 1px").css("background","#EEE");
    }, function(){
        $(this).css("border","#CCC solid 1px").css("background","none");
    });
    $(".nav-item").hover(function(){
        $(this).css("background","rgb(161, 228, 255)");
        $(this).children().css("color","#000");
    }, function(){
        $(this).css("background","none");
        $(this).children().css("color","#FFF");
    });
    $("a.add").live("click", function(e){
        e.preventDefault();
        var tbody = $(this).parent().find("table").first().find("tbody").first();
        var content = tbody.find("tr").first().clone();
        tbody.append(content);
        var pas_name = $("td").find("input[name^=pas_name]");
        var pas_gender = $("td").find("select[name^=pas_gender]");
        var pas_age = $("td").find("input[name^=pas_age]");
        var pas_nation = $("td").find("select[name^=pas_nation]");
        var pas_cid = $("td").find("input[name^=pas_cid]");
        var i;
        for (i=0;i<pas_name.length;i++){
            pas_name[i].name= "pas_name[]";
            pas_gender[i].name= "pas_gender[]";
            pas_age[i].name= "pas_age[]";
            pas_nation[i].name= "pas_nation[]";          
            pas_cid[i].name= "pas_cid[]";
        }
        i--;
        pas_name[i].value="";
        pas_gender[i].value="Nam";
        pas_age[i].value=0;
        pas_nation[i].value=1;
        pas_cid[i].value="";
        $("input[name=num_pas]").val(function(){return parseInt($(this).val())+1;});
        return false;
    });
   
    $("a.remove").live("click",function(e){
        e.preventDefault(); 
        var tr = $(this).parent().parent();
        if (tr.parent().find("tr").size()>1){
            tr.remove();
        }
        $("input[name=num_pas]").val(function(){return parseInt($(this).val())-1;});
        return false;
    });
    for(var i =2;i<=5;i++){
    	$(".left-group#"+i).hide();
    }
    $("a.next").click(function(){
    	var id = $(this).parent().parent().parent().attr('id');
    	var next = parseInt(id) + 1;
    	if(next <=5){
    		$(".left-group#"+next).toggle('drop');
    		$(".left-group#"+id).toggle('drop');
    	}
    });
    $("a.previous").click(function(){
    	var id = $(this).parent().parent().parent().attr('id');
    	var pre = parseInt(id) - 1;
    	if(pre >=1){
    		$(".left-group#"+pre).toggle();
    		$(".left-group#"+id).toggle();
    	}
    });
    $("a.lang").click(function(){
    	var id = $(this).attr("id");
    	
    	var data = "lang=_"+id;
    	$.ajax({
    		url:"/index/lang",
    		"type":"get",
			"data":data,
			"async":false,
			"success":function(kq){
				location.reload();
				
			}
    	});
    });
    
    $(".left-group-collapse").accordion({
    	 collapsible: true,
    	 heightStyle: "content"
    });
    $(".currency").currency({   	
	   	 region: 'VND',
	   	thousands: '.',
	   	decimal: ',', 
	   	decimals: 0
  });
    
    $("#bookForm").ready(function(){
    	$("#bookForm").find("#room_1_0,#room_1_1,#room_2_0,#room_0_2,.trans").click(function(){
    		
    		 $("#bookForm").ajaxSubmit({
                 type: 'post',
                 url: '/order/cal',
                 data: $("#bookForm").formSerialize(),
                 success: function(data, status) {
                	 $("#total_price").html(data);
                 }
    		 });
    	
    		  
    	});
    	
    	$("#bookForm").validate({
    		errorClass:"invalid",
    		rules:{
    			name:{
    				required: true,
    				minlength: 5
    			},
    			email: {
                    required: true,
                    email: true
                },
                phone:{
                	required: true,
                	digits: true,
                	rangelength:[9,11]
                },
                'pas_age[]':{
                	required:true,
                	digits: true
                },
                'pas_name[]':{
                	required:true,
                	minlength:4
                },
                'pas_nation[]':{
                	required:true
                },
                'pas_cid[]':{
                	required:true,
                	digits: true,
                	rangelength:[9,11]
                },
                'pas_gender[]':{
                	required:true
                }
                
    		},
    		 messages: {
    			 name: {
    				 required:"Vui lòng nhập tên (Plase enter your name)",
    				 minlength:"Ít nhất 6 kí tự (At lease 5 characters long)"
    			 },
                 
                 email: "Email không hợp lệ (Invalid email address)",
                 phone: "ĐT không hợp lệ (Invalid phone number)",
                 'pas_name[]':"Tên không hợp lệ",
                 'pas_cid[]':"Passport không hợp lệ",
                 'pas_age[]':"Tuổi không hợp lệ,",
                 'pas_nation[]':"Cần chọn Quốc gia",
                 'pas_gender[]':"Cần chọn Quốc tịch"
                	 
                
             },
    	//	submitHandler: function(form) {
    			
    		//	  $("input[type=submit]").attr('disabled', 'disabled'); 
    		      
    		   
    	//	},
    	//	invalidHandler:function(){
    	//		 $("input[type=submit]").attr('disabled', 'enabled');
    	//	}
    	})
    });
    
   
});

