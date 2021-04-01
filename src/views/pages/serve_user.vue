<template>
    <div class="wrapper">
        <div class="container">
            <div class="sevice-user orders">
                <nav aria-label="breadcrumb">
                  <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><router-link to="/"><i class="fas fa-home"></i></router-link></li>
                        <li class="breadcrumb-item"><router-link to="/our_serve">خدماتنا</router-link></li>
                      <li class="breadcrumb-item" aria-current="page"><router-link to="/our_serve">التصميم الجرافيكي</router-link></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ User.name }}</li>
                    </ol>
                  </div>
                </nav>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="img-o-h">
                                <router-link to="/chats"><span class="chat"><img src="../../assets/img/chat.svg" alt=""></span></router-link>
                                <div class="order-card-img">
                                    <img class="card-img-top" :src="User.avatar" alt="Card image cap">
                                </div>
                            </div>
                            <div class="card-body">
                                <h4>{{ User['name'] }}</h4>
                                <span>{{ User['bio'] }}</span>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-3 p-0"><span><i class="fas fa-map-marker-alt"></i> {{ User.City.name }} </span></div>
                                    <div class="col-lg-2"></div>
                                    <div class="col-4 star">
                                        <span class="fa fa-star" :class="{'checked' : User.rate >= '1'}"></span>
                                        <span class="fa fa-star" :class="{'checked' : User.rate >= '2'}"></span>
                                        <span class="fa fa-star" :class="{'checked' : User.rate >= '3'}"></span>
                                        <span class="fa fa-star" :class="{'checked' : User.rate >= '4'}"></span>
                                        <span class="fa fa-star" :class="{'checked' : User.rate >= '5'}"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="pre-works said-about-us">
                                <div class="col-lg-11 o-h">
                                    <h6>الأعمال السابقة</h6>
                                  <carousel :items-to-show="1" :wrap-around="true">
                                    <Slide>
                                      <div class="col-lg-4" v-for="(portfolio, index) in Portfolios" :key="index">
                                        <input type="image" :src="portfolio.media" style="max-width: 150px;height: 100px;">
                                      </div>
                                    </Slide>
                                    <template #addons>
                                      <navigation />
                                      <pagination />
                                    </template>
                                  </carousel>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="pre-works pre-works-sec">
                                <div class="col-lg-3">
                                    <h6>الموقع</h6>
                                </div>
                                <div class="col-lg-9">
                                    <div class="map-pre-w">
                                      <GoogleMap
                                          api-key="AIzaSyCrtMEBxgNcO0-bqdMFxo5hev35ugBZMhI"
                                          style="width: 100%; height: 500px"
                                          :center="{ lat, lng}"
                                          :zoom="15"
                                          :init="initializeGoogleMap">
                                        <Marker :options="{ position: { lat, lng} }" />
                                      </GoogleMap>
                                      <!--                                        <img src="../../assets/img/map.svg" alt="">-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <div class="row d-flex justify-content-center">
                <div class="modal-tab col-3">
                  <ul class="nav nav-pills mb-3 list-con row" id="pills-tab" role="tablist">
                    <li class="nav-item col-6">
                      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" v-on:click.prevent="type= 2; fetchProducts()">منتجات</a>
                    </li>
                    <li class="nav-item col-6">
                      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#transaction" role="tab" aria-controls="pills-profile" aria-selected="false" v-on:click.prevent="type= 1;fetchProducts()">خدمات</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <div class="row pb-5">
                    <div class="col-lg-3" v-for="(product, index) in Products" :key="index">
                      <div class="card pro-ser-card">
                        <img class="card-img-top imageHeight" :src="product.Media[0].file" alt="Card image cap">
                        <div class="card-body">
                          <h6 class="card-title">{{product['name']}}</h6>
                          <p class="card-text">{{ product['description'] }}</p>
                          <hr>
                          <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6"><span class="count count-pr">السعر : {{ product.price }}</span></div>
                            <div class="col-lg-3"></div>
                          </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade" id="transaction" role="tabpanel" aria-labelledby="pills-profile-tab">
                  <div class="row pb-5">
                    <div class="col-lg-3" v-for="(product, index) in Products" :key="index">
                      <div class="card pro-ser-card">
                        <img class="card-img-top imageHeight" :src="product.Media[0].file" alt="Card image cap">
                        <div class="card-body">
                          <h6 class="card-title">{{product['name']}}</h6>
                          <p class="card-text">{{ product['description'] }}</p>
                          <hr>
                          <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6"><span class="count count-pr">السعر : {{ product.price }}</span></div>
                            <div class="col-lg-3"></div>
                          </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import { GoogleMap, Marker } from 'vue3-google-map';
import 'vue3-carousel/dist/carousel.css';
import jquery from 'jquery';
import * as Swal from "sweetalert2";
let $ = jquery;
import { Carousel, Slide , Pagination, Navigation } from 'vue3-carousel';
import url from '../../main';

export default {
    name: 'serve_user',
    components:{
      GoogleMap,
      Marker,
      Carousel,
      Slide ,
      Pagination,
      Navigation
    },
    mounted() {
        this.fetchUser();
        this.fetchProduct();
    },
  data(){
      return{
        User:{
          City:[],
        },
        type:2,
        Portfolios:[],
        Products:[],
        Product:[],
        Order : [],
        delivered_date: '',
        delivered_time : '',
        quantity :1,
        note :'',
        product_id:'',
        lat: 31,
        lng: 32 ,
        address:'',
        responsive: { 0: { items: 1, nav: false }, 600: { items: 3, nav: true } }
      }
  },
  created() {
      this.fetchUser();
      this.fetchUserPortfolios();
      this.fetchProducts();
      this.locatorButtonPressed();
  },
  methods:{
      fetchUser(){
        try {
          const token = sessionStorage.getItem('access_token_1');
          axios.get(url+'/api/auth/me',
              {
                headers: {
                  'Authorization': 'Bearer ' + token,
                  'X-localization': 'ar'
                }
              })
              .then(res => {
                if (res.data['status']['status'] === "success") {
                  this.User = res.data['User'];
                  this.User.City = res.data['User']['City'];
                  if (res.data['User']['lat'] != null) {
                    this.lat = parseFloat(res.data['User']['lat']);
                  }
                  if (res.data['User']['lng']) {
                    this.lng = parseFloat(res.data['User']['lng']);
                  }
                  const user_id = res.data['User']['id'];
                  sessionStorage.setItem('user_id', user_id);
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
      fetchUserPortfolios(){
        try {
          const token = sessionStorage.getItem('access_token_1');
          axios.get(url+'/api/portfolios',
              {
                headers: {
                  'Authorization': 'Bearer ' + token,
                  'X-localization': 'ar',
                },
              })
              .then(res => {
                if (res.data['status']['status'] === "success") {
                  this.Portfolios = res.data['Portfolios'];
                } else {
                  console.log()
                }
              })
              .catch(e => {
                console.log(e);
              })
        }catch (e){
          console.log(e);
        }
      },
      fetchProducts(){
        try {
          const token = sessionStorage.getItem('access_token_1');
          const user_id = sessionStorage.getItem('user_id');
          axios.get(url+'/api/products',
              {
                headers: {
                  'Authorization': 'Bearer ' + token,
                  'X-localization': 'ar',
                },
                params: {
                  user_id: user_id,
                  type: this.type,
                  per_page: 8,
                }
              })
              .then(res => {
                if (res.data['status']['status'] === "success") {
                  this.Products = res.data['Products'];

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
      creatrOrder(){
        try {
          const token = sessionStorage.getItem('access_token_1');
          axios.post(url+'/api/orders/store',
              {
                delivered_date: this.delivered_date,
                delivered_time: this.delivered_time,
                product_id: this.product_id,
                quantity: this.quantity,
                note: this.note,
              },
              {
                headers: {
                  'Authorization': 'Bearer ' + token,
                  'X-localization': 'ar',
                }
              })
              .then(res => {
                if (res.data['status']['status'] === "success") {
                  this.Order = res.data['Order'];
                  $('#exampleModalCenter-12').modal('hide');
                  Swal.fire(
                      res.data['status']['status'],
                      'تم انشاء طلبك بنجاح',
                      'success'
                  );
                } else {
                  Swal.fire(
                      res.data['status']['status'],
                      'خطأ في البيانات المدخلة',
                      'error'
                  );
                }
              })
              .catch(e => {
                console.log(e);
              })
        }catch (e){
          console.log(e);
        }
    },
      fetchProduct(){
        try {
          const token = sessionStorage.getItem('access_token_1');
          axios.get(url+'/api/products/show',
              {
                headers: {
                  'Authorization': 'Bearer ' + token,
                  'X-localization': 'ar',
                },
                params: {
                  product_id: this.product_id,
                }
              })
              .then(res => {
                if (res.data['status']['status'] === "success") {
                  this.Product = res.data['Product'];
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
      locatorButtonPressed() {
        try {
          navigator.geolocation.getCurrentPosition(
              position => {
                position.coords.latitude;
                position.coords.longitude;
                //console.log(position.coords.latitude);
                //console.log(position.coords.longitude);
              },
              error => {
                console.log(error.message);
              },
          )
        }catch (e){
          console.log();
        }

    },

  },
  setup() {
    const center = { lat: 31, lng: 32}
    return { center }
  },
}
</script>
<style>
.card-img-top{
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
}
</style>
