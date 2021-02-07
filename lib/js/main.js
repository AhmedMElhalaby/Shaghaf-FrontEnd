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







myAnchor