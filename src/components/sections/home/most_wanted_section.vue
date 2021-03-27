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
                            <a href="javascript:;" class="active" v-on:click.prevent="fetchAllFreelancer()">الكل</a>
                            <a href="javascript:;" v-for="(category,index) in Categories" :key="index" v-on:click.prevent="category_id = category.id; fetchFreelancer()">{{ category.name }}</a>
                        </div>
                    </div>
                </div>
              <div class="container">
                <carousel :items-to-show="1" :wrap-around="true">
                  <Slide v-for="freelancer in 4" :key="freelancer">
                      <div class="carousel__item col-lg-4" v-for="(freelancer, index) in Freelancers" :key="index">
                        <router-link v-on:click="getFreelancerId(freelancer.id)" to="/Freelancer_page">
                          <div class="card">
                            <div class="img-o-h">
                              <div class="order-card-img">
                                <img class="card-img-top" :src="freelancer.avatar" alt="Card image cap">
                              </div>
                            </div>
                            <div class="card-body">
                              <h4>{{ freelancer.name }}</h4>
                              <p class="card-text">{{freelancer['Categories']['name']}}</p>
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
                  <template #addons>
                    <navigation/>
                    <pagination/>
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
import { Carousel, Slide , Pagination, Navigation } from 'vue3-carousel';
import url from '../../../main';

export default {
    mounted() {
        $('.most-l a').click(function(){
          $('.most-l a').removeClass("active");
          $(this).addClass("active");
        });
          },
  components:{
    Carousel,
    Pagination,
    Navigation,
    Slide
  },
    data(){
        return{
            Categories:[],
            Freelancers:[],
            City:[],
            category:[],
            category_id:'',

        }
    },
    created() {
        this.fetchCategories();
        this.fetchAllFreelancer();
      $(document).ready(function(){
        $('.onepage').click(function(e) {
          e.preventDefault();
          // console.log("Offset: ", $(this).data('to'));
          $('body, html').animate({
            scrollTop: $( $(this).attr('data-to')).offset().top
          }, 800)
        });
      });
    },
    methods:{
        fetchCategories(){
          try {
            axios.get(url+'/api/home/categories', {
              headers: {
                'X-localization': 'ar',
              }
            })
                .then(res => {
                  if (res.data['status']['status']){
                    this.Categories = res.data['Categories'];
                  }else {
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
        fetchAllFreelancer(){
          try {
            axios.get(url+'/api/home/get_freelancers', {
              headers: {
                'X-localization': 'ar',
              },
              params: {}
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
        }
    }

}
</script>

