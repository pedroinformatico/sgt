$(document).ready(function() {

//Preload images in css
    $.preloadCssImages();


//Main Navigation
    $('#main_nav > li > ul').hide(); // Hide all subnavigation
    $('#main_nav > li > a.current').parent().children("ul").show(); // Show current subnavigation	

    $('#main_nav > li > a[href="#"]').click(// Click!
            function() {
                $(this).parent().siblings().children("a").removeClass('current'); // Remove .current class from all tabs
                $(this).addClass('current'); // Add class .current
                $(this).parent().siblings().children("ul").fadeOut(100); // Hide all subnavigation
                $(this).parent().children("ul").fadeIn(100); // Show current subnavigation
                return false;
            }
    );

// Jump Menu
    $('.jump_menu').hover(function() {
        $('.jump_menu_btn').toggleClass('active');
        $("ul.jump_menu_list").slideDown(200);
    }, function() {
        $('.jump_menu_btn').toggleClass('active');
        $(".jump_menu_list").hide();
    });

//Close button:
    $(".close_notification").click(
            function() {
                $(this).hide();
                $(this).parent().fadeTo('fast', 0, function() {
                    $(this).slideUp('fast');
                });
                return false;
            }
    );

    $.urlParam = function(name) {
        var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results != null)
            return results[1] || 0;
        else
            return results;
        //return results != null ? results[1] || 0 : results;
    }
    
    document.getElementById("menu_" + $.urlParam("module")).className = "current";
});
