$(document).ready(function(){
  $('.most-l a').click(function(){
    $('.most-l a').removeClass("active");
    $(this).addClass("active");
});
$('#MyAccount').on('click',function (){
        $('#MyAccountDropdown').toggle();
    });
    $('#LogNavBtn').on('click',function (){
        $('#pills-home-tab').click();
    });
    $('#RegNavBtn').on('click',function (){
        $('#pills-profile-tab').click();
    });
    $('#RegNavBtn-2').on('click',function (){
        $('#pills-profile-tab').click();
    });
    $('#LogNavBtn-2').on('click',function (){
        $('#pills-home-tab').click();
    });


});
$(document).ready(function(){
  $('.your-class').slick({
 dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 4,
  centerMode: true,
  slidesToScroll: 4,
      arrows:true
  });
});
var vcode = (function(){
  //cache dom
  var $inputs = $("#vcode").find("input");

  //bind events
  $inputs.on('keyup', processInput);
  
  //define methods
  function processInput(e) {
    var x = e.charCode || e.keyCode;
    if( (x == 8 || x == 46) && this.value.length == 0) {
      var indexNum = $inputs.index(this);
      if(indexNum != 0) {
        $inputs.eq($inputs.index(this) - 1).focus();
      }
    }
    
    if( ignoreChar(e) ) 
      return false;
    else if (this.value.length == this.maxLength) {
      $(this).next('input').focus();
    }
  }
  function ignoreChar(e) {
    var x = e.charCode || e.keyCode;
    if (x == 37 || x == 38 || x == 39 || x == 40 )
      return true;
    else 
      return false
  }
  
})();
var vcode = (function () {
  //cache dom
  var $inputs = $("#vcode").find("input");

  //bind events
  $inputs.on("keyup", processInput);

  //define methods
  function processInput(e) {
    var x = e.charCode || e.keyCode;
    if ((x == 8 || x == 46) && this.value.length == 0) {
      var indexNum = $inputs.index(this);
      if (indexNum != 0) {
        $inputs.eq($inputs.index(this) - 1).focus();
      }
    }

    if (ignoreChar(e)) return false;
    else if (this.value.length == this.maxLength) {
      $(this).next("input").focus();
    }
  }
  function ignoreChar(e) {
    var x = e.charCode || e.keyCode;
    if (x == 37 || x == 38 || x == 39 || x == 40) return true;
    else return false;
  }
})();
$(document).ready(function () {
  var scrollLink = $(".scroll");

  // Smooth scrolling
  scrollLink.click(function (e) {
    e.preventDefault();
    $("body,html").animate(
      {
        scrollTop: $(this.hash).offset().top
      },
      1000
    );
  });

  // Active link switching
//  $(window).scroll(function () {
//    var scrollbarLocation = $(this).scrollTop();
//
//    scrollLink.each(function () {
//      var sectionOffset = $(this.hash).offset().top - 20;
//
//      if (sectionOffset <= scrollbarLocation) {
//        $(this).parent().addClass("active");
//        $(this).parent().siblings().removeClass("active");
//      }
//    });
//  });
});
$(document).ready(function(){
   var counts = 1;
   $(".add-to-cart").click(function () {
      counts += +1;
      $(".cart-counter").animate({
                opacity: 1
            }, 300, function () {
                $(this).text(counts);
            });
        }); 
     $(".remove-from-cart").click(function () {
      counts += -1;
      $(".cart-counter").animate({
                opacity: 1
            }, 300, function () {
                $(this).text(counts);
            });
        });
});

$(document).ready(function(){

// --- BUTTON
const $ = (s, o = document) => o.querySelector(s);
const $$ = (s, o = document) => o.querySelectorAll(s);

$$(".button").forEach((el) =>
  el.addEventListener("mousemove", function (e) {
    const pos = this.getBoundingClientRect();
    const mx = e.clientX - pos.left - pos.width / 2;
    const my = e.clientY - pos.top - pos.height / 2;

    this.style.transform = "translate(" + mx * 0.15 + "px, " + my * 0.3 + "px)";
    this.style.transform +=
      "rotate3d(" + mx * -0.1 + ", " + my * -0.3 + ", 0, 12deg)";
    this.children[0].style.transform =
      "translate(" + mx * 0.025 + "px, " + my * 0.075 + "px)";
  })
);

$$(".button").forEach((el) =>
  el.addEventListener("mouseleave", function () {
    this.style.transform = "translate3d(0px, 0px, 0px)";
    this.style.transform += "rotate3d(0, 0, 0, 0deg)";
    this.children[0].style.transform = "translate3d(0px, 0px, 0px)";
  })
);
});
