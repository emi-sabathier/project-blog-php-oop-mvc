$(document).ready(function () {
        $(".menu-btn a").click(function () {
            $(".nav").fadeToggle(200);
            $(this).toggleClass('btn-open').toggleClass('btn-close');
        });
        $('.nav').on('click', function () {
            $(".nav").fadeToggle(200);
            $(".menu-btn a").toggleClass('btn-open').toggleClass('btn-close');
        });
        $('.menu a').on('click', function () {
            $(".nav").fadeToggle(200);
            $(".menu-btn a").toggleClass('btn-open').toggleClass('btn-close');
        });
        $('.container').on('click', function(){
            $(".nav").fadeOut(200);
            $(".menu-btn a").removeClass('btn-close');
            $(".menu-btn a").addClass('btn-open');
        });
    });