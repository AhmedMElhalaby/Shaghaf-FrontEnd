<template>
  <div class="col-lg-8 m-auto b-link">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav nav-ul">
        <li class="nav-item active scroll">
          <a class="nav-link" data-to="#first-s">الرئيسية <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item li-onepage">
          <a class="nav-link scroll" data-to="#about-us">من نحن</a>
        </li>
        <li class="nav-item li-onepage">
          <a class="nav-link scroll" data-to="#our-serve">خدماتنا</a>
        </li>
        <li class="nav-item li-onepage">
          <a class="nav-link scroll" data-to="#most-wanted">الاكثر طلبا</a>
        </li>
        <li class="nav-item li-onepage">
          <a class="nav-link scroll" data-to="#said-about-us">قالوا عنا</a>
        </li>
        <li class="nav-item li-onepage">
          <a class="nav-link scroll" data-to="#our-goals">اهدافنا</a>
        </li>
        <li class="nav-item li-onepage">
          <a class="nav-link scroll" data-to="#contact-us">تواصل معنا</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="col-lg-2"></div>
</template>
<script>
import jquery from 'jquery';
let $ = jquery;

export default {
  created() {
    $(document).ready(function(){
      $('.li-onepage a').click(function(e) {
        e.preventDefault();
        // console.log("Offset: ", $(this).data('to'));
        $('body, html').animate({
          scrollTop: $( $(this).attr('data-to')).offset().top
        }, 800)
      });
    });
  },


}
</script>