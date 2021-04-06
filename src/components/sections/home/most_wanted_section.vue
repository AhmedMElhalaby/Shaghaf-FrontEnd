<template>
    <section class="most-wanted" id="most-wanted">
        <div class="shape">
            <div class="co-p">
                <div class="m-w-top container">
                    <div class="row">
                        <div class="col-lg-4">
                            <h5 class="text-right"><span class="text-con"> الاكثر طلبا </span><span class="text-c-y"></span></h5>
                        </div>
                        <div class="col-lg most-l">
                            <a href="javascript:" class="active" v-bind:class="{ active: selected_cat===0 }" v-on:click.prevent="fetchAllFreelancer();selected_cat = 0">الكل</a>
                            <a href="javascript:" v-for="(category,index) in Categories" v-bind:class="{ active: selected_cat===category.id }"  :key="index" v-on:click.prevent="category_id = category.id; fetchFreelancer();selected_cat = category.id">{{ category.name }}</a>
                        </div>
                    </div>
                </div>
              <div class="container">
                <carousel :settings="settings" :wrap-around="true">
                  <Slide v-for="(freelancer, index) in Freelancers" :key="index">
                      <div class="carousel__item col-12">
                        <router-link v-on:click="getFreelancerId(freelancer.id)" to="/Freelancer_page">
                          <div class="card">
                            <div class="img-o-h">
                              <div class="order-card-img">
                                <img class="card-img-top" :src="freelancer.avatar" alt="Card image cap" style="width: 100px;height: 100px;">
                              </div>
                            </div>
                            <div class="card-body">
                              <h4>{{ freelancer.name }}</h4>
                              <p class="card-text">{{ (freelancer['Categories'][0])?freelancer['Categories'][0]['name']:''}}</p>
                            </div>
                            <div class="card-footer">
                              <div class="row">
                                <div class="col-3 p-0"><span><i class="fas fa-map-marker-alt"></i> {{ freelancer.City['name'] }}</span></div>
                                <div class="col-lg-2"></div>
                                <div class="col-4 star">
                                  <span class="fa fa-star" :class="{'checked': freelancer.rate >= '1'}"></span>
                                  <span class="fa fa-star" :class="{'checked': freelancer.rate >= '2'}"></span>
                                  <span class="fa fa-star" :class="{'checked': freelancer.rate >= '3'}"></span>
                                  <span class="fa fa-star" :class="{'checked': freelancer.rate >= '4'}"></span>
                                  <span class="fa fa-star" :class="{'checked': freelancer.rate >= '5'}"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </router-link>
                      </div>
                    </Slide>
                  <template #addons="{slidesCount}">
                    <navigation v-if="slidesCount > 1" />
                  </template>
                </carousel>
              </div>

            </div>
        </div>
    </section>
</template>

<script>
import axios from "axios";
import jquery from 'jquery';
let $ = jquery;
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide , Navigation } from 'vue3-carousel';
import url from '../../../main';

export default {
  props:['Categories'],
    mounted() {
        $('.most-l a').click(function(){
          $('.most-l a').removeClass("active");
          $(this).addClass("active");
        });
          },
  components:{
    Carousel,
    Navigation,
    Slide
  },
    data(){
      return{
        Freelancers:[],
        City:[],
        category:[],
        category_id:'',
        selected_cat: null
      }
    },
    created() {
      this.fetchAllFreelancer();
    },
    methods:{
        fetchAllFreelancer(){
          try {
              axios.get(url+'/api/home/get_freelancers', {
              headers: {
                'X-localization': 'ar',
              },
              params: {
                per_page: 10
              }
            },)
                .then(res => {
                  if (res.data['status']['status'] === "success") {
                    this.Freelancers = res.data['Freelancers'];
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
        fetchFreelancer(){
          try {
            axios.get(url+'/api/home/get_freelancers', {
              headers: {
                'X-localization': 'ar',
              },
              params: {
                'category_id': this.category_id,
                per_page : 10
              },

            })
                .then(res => {
                  if (res.data['status']['status'] === "success") {
                    this.Freelancers = res.data['Freelancers'];
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
        getFreelancerId(freelancer_id){
          sessionStorage.setItem('freelancer_id', freelancer_id);
        },
    },
    setup() {
      return {
        settings: {
          itemsToShow: 3,
          snapAlign: "center"
        },
      };
    }

}

</script>

