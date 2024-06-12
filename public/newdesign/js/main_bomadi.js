	
$(document).ready(function(){

	$('#myTable1').DataTable({
		"ordering": false
	});
	$('#myTable2').DataTable({
		"ordering": false
	});
	$('#myTable3').DataTable({
		"ordering": false
	});
	$('#myTable4').DataTable({
		"ordering": false
	});

	$("div.tab_index ul li").click(function(){
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