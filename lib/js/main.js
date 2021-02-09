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
  $(window).scroll(function () {
    var scrollbarLocation = $(this).scrollTop();

    scrollLink.each(function () {
      var sectionOffset = $(this.hash).offset().top - 20;

      if (sectionOffset <= scrollbarLocation) {
        $(this).parent().addClass("active");
        $(this).parent().siblings().removeClass("active");
      }
    });
  });
});
