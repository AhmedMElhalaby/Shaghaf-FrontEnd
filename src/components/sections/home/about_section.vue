<template>
    <section class="about-us" id="about-us">
        <div class="container">
            <h5 class="text-right"><span class="text-con"> من نحن </span><span class="text-c"></span></h5>
        </div>
        <div class="row w-100">
            <div class="col-lg-7 about-p">
                <p v-html="about_us"></p>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-3">
                <img class="login100-pic js-tilt" data-tilt v-tilt src="../../../assets/img/about-us.svg" alt="">
            </div>
            <div class="col-lg-1"></div>
        </div>
    </section>
</template>

<script>
export default {
  props:['about_us'],
  data() {
    return {
    }
  },
  created(){
    console.log(this.about_us);
  }
}
</script>
