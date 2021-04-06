<template>
    <footer>
        <div class="shape">
            <div class="container">
                <div class="row p-f">
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-3"><a :href="'/'"><img class="fw-img login100-pic js-tilt" v-tilt data-tilt src="../../assets/img/logo2.png" alt=""></a></div>
                            <div class="col-lg-9">
                                <h4 class="h-f">المنصة الأولى في الوطن العربي</h4>
                                <p class="phr-f" v-text="footer_about"> </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row">
                            <div class="col-lg-1"><span class="footer-vr"></span></div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-2 p-0">
                                <ul class="footer-ul">
                                    <li class="li-onepage"><a data-to="#home">الرئيسية</a></li>
                                    <li class="li-onepage"><a data-to="#about-us">من نحن</a></li>
                                    <li class="li-onepage"><a data-to="#our-serve">خدماتنا</a></li>
                                    <li class="li-onepage"><a data-to="#most-wanted">الاكثر طلبا</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3 p-0">
                                <ul class="footer-ul">
                                    <li class="li-onepage"><a data-to="#said-about-us">قالوا عنا</a></li>
                                    <li class="li-onepage"><a data-to="#contact-us">تواصل معنا</a></li>
                                    <li><a href="http://18.194.157.202/privacy">سياسة الاستخدام</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-5 pl-0">
                                <ul class="footer-ul l-s-f">
                                    <li><span v-text="mobile"></span> <i class="fas fa-phone-alt"></i></li>
                                    <li> <i class="far fa-envelope"></i> <span v-text="email"></span></li>
<!--                                    <li>Location store <i class="fas fa-map-marker-alt"></i></li>-->
                                </ul>
                                <hr class="footer-hr">
                                <ul class="footer-ul last-ul">
                                    <li><a v-bind:href="facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a v-bind:href="instagram" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <li><a v-bind:href="twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right">
            <p class="mb-0">جميع الحقوق محفوظة &copy; 2020</p>
        </div>
    </footer>
</template>
<script>
import jquery from 'jquery';
let $ = jquery;

export default {
  props:['Install'],
  data(){
    return{
      footer_about:'',
      mobile:'',
      email:'',
      twitter:'',
      facebook:'',
      instagram:'',
    }
  },
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
  mounted() {
    setTimeout(() => {
      this.footer_about =this.Install['Settings']['footer_about'];
      this.mobile =this.Install['Settings']['mobile'];
      this.email =this.Install['Settings']['email'];
      this.twitter =this.Install['Settings']['twitter'];
      this.facebook =this.Install['Settings']['facebook'];
      this.instagram =this.Install['Settings']['instagram'];
    }, 1000);

  },
}
</script>
