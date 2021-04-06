<template>
    <section class="our-goals" id="our-goals">
        <div class="shape">
            <div class="container">
                <div class="co-p">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="text-right"><span class="text-con"> اهدافنا </span><span class="text-c-y"></span></h5>
                            <ul v-html="goals">

                            </ul>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4 login100-pic js-tilt" data-tilt v-tilt>
                            <img class="fw-img" src="../../../assets/img/our-goals-1.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
  props:['goals']
}
</script>
