/*************IOS*************/

/*******scroll*******/
var body = document.body;
var currentPos = 0;

function hideScroll() {
	var  intElemScrollTop = parseInt(window.pageYOffset);
	var topElem = body.style.top;
	currentPos = intElemScrollTop;
	body.classList.add("scroll-mnu-body");
	body.style.position = 'fixed';
	topElem = intElemScrollTop * (-1);
	body.style.top = topElem + 'px';
}


function showScroll() {
	body.classList.remove("scroll-mnu-body");
	body.style.position = '';
	body.style.top = '';
	window.scrollTo(0, currentPos);
}
/*******end scroll*******/

/*************END*************/



/************************************************popup********************************/
$(".pop--up").on("click", function(e){
    var top = $("header").outerHeight();
    e.preventDefault();
    hideScroll();

    if ( $(this).hasClass("teacher") ) {
        $(".pop__ups .pop__ups--school").addClass("active");
    } else {
        $(".pop__ups .pop__ups--form").addClass("active");
    }

    $(".pop__ups").addClass("active").css("top", top);
});


$(".pop__ups > .close").on("click", function(){
    $(this).parents(".pop__ups").removeClass("active").find("> div").removeClass("active");
    showScroll();
});
/************************************************end popup********************************/


/*******************************input file****************************************/
	
    $('.file input').change(function(){
   	 var fileName = $(this).val().split('\\');
		$(this).siblings(".list__file").find("li").text(fileName[fileName.length-1]);
		$(this).parents(".file").siblings(".list__close").find(".close").addClass("active");
    });

    $(".row .list__close .close").on("click", function(){
    	var defaultText = $(this).parents(".list__close").siblings(".input__wrap").find(".list__file").attr("data-text");
    	$(this).parents(".list__close").siblings(".input__wrap").find(".list__file li").text("");
    	$(this).removeClass("active");
		$(this).parents(".list__close").siblings(".input__wrap").find(".list__file li").text(defaultText);
    });
/*******************************end input file****************************************/

/************************************************sandwich********************************/
$(".sandwich").on("click", function(){
	if( $(this).hasClass("sandwich--active") ) {
		showScroll();
	} else {
		hideScroll();
	}
	$(this).toggleClass("sandwich--active");
	$(this).parents("header").toggleClass("active--mnu");
});

/************************************************end sandwich********************************/	

/*****tabs(переключение контента)********************************/
$(".tabs__list .tab").on("click", function(){
	$(".tabs__list .tab").removeClass("active");
	$(".tabs__content .text").removeClass("active");
	$(this).addClass("active");
	$(".tabs__content #"+$(this).attr("id")+"__sect").addClass("active");
});
/************************************************end********************************/


$(".customers .blank .card").on("click", function(){
	$(".customers .blank > .text").text($(this).find(".text").text());
});

$(".slider--customers .slide").on("click", function(){
	$(".slider--customers .slide").removeClass("active");
	$(this).addClass("active");
});


$(window).scroll(function(){		
	if ($(document).scrollTop() == 0  && $('body').css("position") != "fixed"){
		$("header").removeClass("header--fixed");
	}else {
		$("header").addClass("header--fixed");
	}	
});


/************************checkbox********************************/
	$(".row .check__wrap .check").on("click", function(e){
		e.preventDefault();
		$(this).parents(".row").find(".check").removeClass("checked")
		$(this).parents(".row").find(".check__wrap .check input").prop("checked", false);
		$(this).find("input[type='radio']").prop("checked", true);
		$(this).addClass("checked");
	});
/************************end********************************/

/****************************textarea******************************/
$(".textarea").focusout(function(){
    var element = $(this);
    if (!element.text().replace(" ", "").length) {
        element.empty();
    }
});
/****************************end textarea******************************/

$(document).ready(function(){
	/************************slide-toggle********************************/
	$(".toggle__wrap .form__toggle[data-toggle]").on("click",function(){
		$(this).parents(".toggle__wrap").toggleClass("opened");
		$(this).siblings(".form__list[data-toggle-open="+$(this).attr("data-toggle")+"--toggle]").slideToggle();
	})

	$(".toggle__wrap .form__list .form__item").on("click", function(){
		var value = $(this).text();
		$(this).parents(".form__list").slideUp().siblings(".form__toggle").find("#select_form_indicator").text(value);
		$(this).parents(".toggle__wrap").removeClass("opened");
	});
/************************************************end********************************/

	$(".slider__china").slick({
		slidesToShow: 1, 
		slideToScroll: 1, 
		infinite: false, 
		dots: false, 
		arrows: false, 
		swipe: false, 
		speed: 400,
		adaptiveHeight: true,
	});

	$(".explore__china .list .list__item").on("click", function(e) {
		e.preventDefault();

		$(".explore__china .list .list__item").removeClass("active");

		var slide = $(this).attr("data-name");
		var slidePosition = $(this).parents(".list").siblings(".slider__china").find(".slide[data-name="+slide+"]").attr("data-slick-index"); 
		$(this).addClass("active");
		$(this).parents(".list").siblings(".slider__china").slick('slickGoTo', slidePosition); 
	}) 


	$(".slider__team").slick({
		slidesToShow: 1, 
		slideToScroll: 1, 
		infinite: false, 
		dots: false, 
		prevArrow: '<div class="slick-prev"></div>',
		nextArrow: '<div class="slick-next"></div>', 
		swipe: false,
		speed: 400,
		adaptiveHeight: true,
	});

	$(".slider--customers").slick({
		arrows: false,
		slidesToScroll: 1,
		variableWidth: true,
		infinite: true,
		responsive: [
				{
					breakpoint: 9999,
					settings: "unslick"
				},
				{
					breakpoint: 1375,
					settings: "slick"
				}

			]
	});
});



$(window).on('resize orientationchange', function() {
	$(".slider--customers").slick('resize');
	if( $(window).width() > 767 && $("body").hasClass("scroll-mnu-body") && !$(".pop__ups").hasClass("active")) {
		$("body").removeClass("scroll-mnu-body");
		showScroll();
		$("header").removeClass("active--mnu");
		$(".sandwich").removeClass("sandwich--active");
	}
	$(".pop__ups > .close").click();
});

$(window).on("load", function() {

});