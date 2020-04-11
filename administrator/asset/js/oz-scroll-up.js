$(function(){var a=$("#oz-scroll");$(window).scroll(function(){if($(this).scrollTop()>=200){a.show(10).animate({right:"15px"},10)}else{a.animate({right:"-80px"},10)}});a.click(function(b){b.preventDefault();$("html,body").animate({scrollTop:0},600)})});
  
