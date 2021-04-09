<template>
  <section class="said-about-us" id="said-about-us">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <h5 class="text-right"><span class="text-con"> آراء العملاء </span><span class="text-c"></span></h5>
          <p>عرض بعض مراجعات الزبائن في التعامل من منصة شغف</p>
          <carousel :settings="settings" :wrap-around="true">
            <Slide v-for="(review, index) in Reviews" :key="index">
              <div class="said-cur-p text-center">
                <div class="b-sh">
                  <div class="said-img">
                    <img :src="review['User']['avatar']" alt="avatar" style="width: 70px">
                  </div>
                  <h4>{{ review['User']['name'] }}</h4>
                  <p>{{ review['review'] }}</p>
                  <div class="star">
                    <span class="fa fa-star" :class="{'checked' : review.rate >= 1}"></span>
                    <span class="fa fa-star" :class="{'checked' : review.rate >= 2}"></span>
                    <span class="fa fa-star" :class="{'checked' : review.rate >= 3}"></span>
                    <span class="fa fa-star" :class="{'checked' : review.rate >= 4}"></span>
                    <span class="fa fa-star" :class="{'checked' : review.rate >= 5}"></span>
                  </div>
                </div>
              </div>
            </Slide>
            <template #addons="{slidesCount}">
              <navigation v-if="slidesCount > 1" />
            </template>
          </carousel>
        </div>
        <div class="col-lg-3 login100-pic" v-tilt><img class="w-100" src="../../../assets/img/said-about.svg" alt=""></div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";

import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Navigation } from 'vue3-carousel';
import url from '../../../main';
import 'vue3-carousel/dist/carousel.css';

export default {
  components:{
    Carousel,
    Slide,
    Navigation,
  },
    data(){
        return {
            Reviews:[],
        }
    },
    created() {
      this.fetchReviews();
    },
    methods:{
        fetchReviews(){
          try {
            axios.get(url+'/api/home/get_reviews',
                {
                  headers: {
                    'X-localization': 'ar',
                  },
                  params: {}
                })
                .then(res => {
                  if (res.data['status']['status'] === "success") {
                    this.Reviews = res.data['Reviews'];
                  } else {
                    console.log();
                  }
                })
                .catch(e => {
                  console.log(e);
                })
          }catch (e){
            console.log(e);
          }
        },
    },
    setup() {
      return {
        settings: {
          itemsToShow: 3.5,
          snapAlign: "center"
        },
      };
    }
}
</script>
<style>
.carousel{
  width: 100% !important;
  direction: ltr !important;
}
.carousel__viewport{
  direction: ltr !important;
}
.carousel__track{
  direction: ltr !important;
}
.carousel__track{
  /*transform: translateX(0) !important;*/
}
</style>
