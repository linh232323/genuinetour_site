$(document).ready(function(){
    //FCKeditor.ReplaceAllTextareas() ;
	
    $(".delete").click(function(e){
        var href = this.href;
        e.preventDefault();
        $("#deleteDialog").dialog({
            title: 'benlytourist.com.vn',
            resizable: false,
            height: 140,
            modal: true,
            buttons: {
                'Xóa': function(){
                    window.location=href;
                    $(this).dialog('close');
                },
                'Không xóa': function(){
                    $(this).dialog('close');
                }
            }
        });
    });
    $(".datepicker").datepick({
    	multiSelect: 999,
    	dateFormat:"dd-mm-yyyy"
    	
    });
   $(".browse").click(function(){
	   var finder = new CKFinder();
	   finder.basePath = '../../upload/images';	// The path for the installation of CKFinder (default = "/ckfinder/").
	   finder.selectActionFunction = function(url){
		   $(".browse").val(url)
	   };
	   finder.popup(); 
   });
    //Sidebar Accordion Menu:
		
		$("#main-nav li ul").hide(); // Hide all sub menus
		$("#main-nav li a.current").parent().find("ul").slideToggle("slow"); // Slide down the current menu item's sub menu
		
		$("#main-nav li a.nav-top-item").click( // When a top menu item is clicked...
			function () {
				$(this).parent().siblings().find("ul").slideUp("normal"); // Slide up all sub menus except the one clicked
				$(this).next().slideToggle("normal"); // Slide down the clicked sub menu
				return false;
			}
		);
		
		$("#main-nav li a.no-submenu").click( // When a menu item with no sub menu is clicked...
			function () {
				window.location.href=(this.href); // Just open the link instead of a sub menu
				return false;
			}
		); 

    // Sidebar Accordion Menu Hover Effect:
		
		$("#main-nav li .nav-top-item").hover(
			function () {
				$(this).stop().animate({ paddingRight: "25px" }, 200);
			}, 
			function () {
				$(this).stop().animate({ paddingRight: "15px" });
			}
		);
		
});
