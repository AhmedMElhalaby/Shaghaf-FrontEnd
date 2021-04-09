<template>
    <section class="our-serve" id="our-serve">
        <div class="test login100-pic js-tilt" data-tilt>
            <img src="src/assets/img/test.svg" alt="">
        </div>
        <div class="container">
            <h5 class="text-right"><span class="text-con"> خدماتنا </span><span class="text-c"></span></h5>
            <div class="row">
                <div class="col-lg-3 login100-pic js-tilt" v-tilt data-tilt v-for="(Category, index) in Categories" :key="index">
                  <router-link to="/our_serve">

                    <div class="service">
                        <img v-bind:src="Category.image" alt="" style="width: 50%">
                        <p>{{Category.name}}</p>
                    </div>
                  </router-link>
                </div>
            </div>
        </div>
    </section>
</template>

<script>

export default {
    name: 'Categories',
    props:['Categories'],
}
</script>
