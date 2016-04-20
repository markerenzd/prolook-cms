jQuery(document).ready(function($) {

    $.noConflict();
    new WOW().init();
    // document.location.href = String(document.location.href).replace("#/", "");

    $(window).on('hashchange', function(e) {
        history.replaceState("", document.title, e.originalEvent.oldURL);
    });

    //*ADOPTING HEADER SLIDER*//  
    $(window).on("load resize", function() {
        var header_height = $(".site-header").height();
        var window_height = $(window).height();
        $(".tt-fullHeight").css("height", window_height - header_height);
    });

    //* Mobile Menu *//
    $('#nav-mobile').click(function() {
        $(this).addClass('current');
        $(this).attr('id', 'newID');
    });


    //*Flext Slider*//  
    $('.flexslider').flexslider({
        animation: "fade",
        controlNav: false,
        directionNav: true,
        animationSpeed: 600
    });

    //*No Children Menu*// 
    $(".mega-menu-flyout a.mega-menu-link").mouseover(function() {
        $(".nav-backdrop").fadeTo(200, 0, function() {
            $(this).hide();
        });
    });

    //* Mega Has Child *//
    $("li.mega-menu-item-has-children").mouseenter(function() {
        $(".nav-backdrop").fadeTo(400, 0.6);
    });

    $(".mega-menu-item-has-children a.mega-menu-link").mouseover(function() {
        $(".nav-backdrop").fadeTo(0, 0.6);
    });

    //* Cheat nav backdrop hidden *//
    $(".nav-backdrop").mouseenter(function() {
        $(".nav-backdrop").fadeTo(200, 0, function() {
            $(this).hide();
        });
    });

    $("#mega-menu-wrap").mouseover(function() {
        $(".nav-backdrop").hide();
    });


    var $grid = $('#grid');

    $grid.shuffle({
        itemSelector: '.picture-item'
    });

    /* reshuffle when user clicks a filter item */
    $('#category-menu a').click(function(e) {
        e.preventDefault();

        // set active class
        $('#category-menua').removeClass('active');
        $(this).addClass('active');

        // get group name from clicked item
        var groupName = $(this).attr('data-group');

        // reshuffle grid
        $grid.shuffle('shuffle', groupName);
    });


});

/****Responsive Menu****/