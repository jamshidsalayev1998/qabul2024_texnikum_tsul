	
$(document).ready(function(){

	// $('#myTable1').DataTable({
	// 	"ordering": false
	// });
	// $('#myTable2').DataTable({
	// 	"ordering": false
	// });
	// $('#myTable3').DataTable({
	// 	"ordering": false
	// });
	// $('#myTable4').DataTable({
	// 	"ordering": false
	// });
	// $('#acc_table').DataTable({
	// 	"ordering": false,
	// 	"pageLength": 20
	// });


	$("div.accordion table tr.click_tr").click(function(){
		$(this).next().slideToggle(0);
		$(this).toggleClass("padd_zero");
		$(this).find("span").toggleClass("rot");
		$("div.accordion table tr.click_tr").not(this).next().slideUp(0);
		$("div.accordion table tr.click_tr").not(this).removeClass("padd_zero");
		$("div.accordion table tr.click_tr").not(this).find("span").removeClass("rot");
	});

	$("div.row_info h4").click(function(event){
		$(this).parent().find(".input_hid").slideToggle(0);
		$(this).parent().find(".input_hid").focus();
		$("div.row_info h4").not(this).parent().find(".input_hid").slideUp(0);
		event.stopPropagation();
	});
	// $("div.row_info_img img").click(function(event){
	// 	$(this).parent().find(".input_hid").slideToggle(0);
	// 	$(this).parent().find(".input_hid").focus();
	// 	$("div.row_info_img img").not(this).parent().find(".input_hid").slideUp(0);
	// 	event.stopPropagation();
	// });
	$(".input_hid").click(function(ev){
		ev.stopPropagation();
	});


	var com = 0;

	  // $(".input_hid").keyup(function(){
	  //   com = 0;
	  //   $(".input_hid").each(function(){
	  //     if($(this).val() != ''){
	        
	  //       com = 1;
	  //     }
	      
	  //     if(com == 1){
	  //       $("button.accept").css({
	  //         'display': 'none'
	  //       });
	        
	  //     }
	  //     if(com == 0){
	  //       $("button.accept").css({
	  //         'display': 'block'
	  //       });
	  //     }
	  //   });
	  // });
	  $(".input_hid").each(function(){
	      if($(this).val().replace(/\s/g, "").length > 0){
	        $(this).parent().find("h4 i").css({
		   		'display':'block',
		   	});
	      }
	      else{
		  		$(this).parent().find("h4 i").css({
			   		'display':'none',
			   	});
		  	}
	      
	    });
	  $(".input_hid").keyup(function(){
	  	if ($.trim($(this).val()).length > 0) {
	  		$(this).parent().find("h4 i").css({
		   		'display':'block',
		   	});
	  	}
	  	else{
	  		$(this).parent().find("h4 i").css({
		   		'display':'none',
		   	});
	  	}
	   	
	  });

	$(window).click(function(){

		$(".input_hid").slideUp(0);
		
	});


	$("div.tab_index ul .f_tab").click(function(){
		$(this).addClass("act_li");
        $("div.tab_index ul li").not(this).removeClass("act_li");
		$("div.tab_content aside").removeClass('active').eq($(this).index()).addClass('active');
	});


	$("span.bars_nav").click(function(){
		$("div.all_page nav").toggleClass("nav_nav");
		$("div.all_page div.right_content").toggleClass("right_nav");

	});
	$("span.bars_mobile").click(function(){
		$("nav").css({
			'transform': 'translateX(0%)'
		});	
		$("div.fixn").css({
			'display': 'block'
		});
	});

	$("span.close_nav").click(function(){
		$("nav").css({
			'transform': 'translateX(-102%)'
		});	
		$("div.fixn").css({
			'display': 'none'
		});
	});
	$("div.fixn").click(function(){
		$("nav").css({
			'transform': 'translateX(-102%)'
		});	
		$("div.fixn").css({
			'display': 'none'
		});
	});

});

$("#dd span").change(function(e) {
    console.log("dropdown change event is fire : "+$(this).text());
});
$("#de span").change(function(e) {
    console.log("dropdown change event is fire : "+$(this).text());
});
var asd = $(".iii");
(function ( $ ) {
      $.fn.dropdown = function()
                    {
			    var el = $(this);
			    el.addClass("dropdown");
            	    var holder = $("span.holder",el);
				   var opts_con = $("ul",el); 
				                                   
			    var opts   = $("ul li",el);
			    var val    = "";
opts_con.prepend("<span class='arrow_up'></span>");
				
					  el.on("click",function()
					  {
						  opts_con.toggleClass("active");
						  asd.toggleClass("rot");
								  		
					  });
					  
				      opts.on("click",function()
				      {
					  holder.text($(this).text());
					  holder.change();
				      }); 
			 }
		        
}( jQuery ));	
 $("#dd").dropdown();

