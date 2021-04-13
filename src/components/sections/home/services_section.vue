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
                      <div class="top-border">
                        <img v-bind:src="Category.image" alt="" style="">
                      </div>
                      <p>{{Category.name}}</p>
                      <span>{{Category.description}}</span>
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
