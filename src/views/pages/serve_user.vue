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
                                    <Slide v-for="slide in 1" :key="slide">
                                      <div v-for="(portfolio, index) in Portfolios" :key="index">
                                        <img :src="portfolio.media" style="max-width: 150px">
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
                      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" v-on:click.prevent="fetchProducts(2)">منتجات</a>
                    </li>
                    <li class="nav-item col-6">
                      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#transaction" role="tab" aria-controls="pills-profile" aria-selected="false" v-on:click.prevent="fetchProducts(1)">خدمات</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <div class="row pb-5">
                    <div class="col-lg-3" v-for="(product, index) in Products" :key="index">
                      <div class="card pro-ser-card">
                        <img class="card-img-top" :src="product['first_image']" alt="Card image cap">
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
                        <img class="card-img-top" :src="product['first_image']" alt="Card image cap">
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
  <!--confirm order -->
  <div class="modal fade confirm-order-page" id="exampleModalCenter-12" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-header">
          <p>تأكيد الطلب</p>
        </div>
        <div class="modal-body secound-m">
          <div class="form-group">
            <label for="deliveredDate"><img src="../../assets/img/calendar.svg" alt=""> تاريخ التسليم</label>
            <input type="date" class="form-control" id="deliveredDate" placeholder="05873131316" v-model="delivered_date">
          </div>
          <div class="form-group">
            <label for="deliveredTime"><img src="../../assets/img/clock-1.svg" alt=""> توقيت التسليم</label>
            <input type="time" class="form-control" id="deliveredTime" placeholder="05873131316" v-model="delivered_time">
          </div>
          <div class="form-group">
            <label for="notes"><img :src="User['avatar']" alt=""> الملاحظات</label>
            <textarea class="form-control" id="notes" rows="5" v-model="note">
                                        </textarea>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="row confirm-order">
                <div class="col-lg-4 pr-0">
                  <img class="w-100" :src="Product['first_image']" alt="">
                </div>
                <div class="col-lg-7 confirm-order-content">
                  <h5>{{ Product['name'] }}</h5>
                  <p>{{ Product['description'] }} </p>
                  <div class="row">
                    <div class="col-lg-6">
                      <span>{{ Product['category_name'] }}</span>
                    </div>
                    <div class="col-lg-6">
                      <span>{{ Product['price'] }} ر.س</span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-1 pl-0">
                  <div class="count-card">
                    <div class="add-to-cart">
                                           <span>
                                               <i id="increment" v-on:click.prevent="quantity++" :v-model="quantity" class="fas fa-plus"></i>
                                           </span>
                    </div>
                    <div class="cart-counter">
                      {{ quantity }}
                    </div>
                    <div class="remove-from-cart">
                                           <span>
                                               <i id="decrement" v-on:click="quantity--" :v-model="quantity" class="fas fa-minus"></i>
                                           </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="row total-price">
                <h6 class="h5 col-lg-6">السعر الاجمالي</h6>
                <p :v-model="total = quantity * Product['price']" class="col-lg-6">{{ total }} ر.س</p>
              </div>
            </div>
          </div>
          <div class="tab-button">
            <button type="submit" class="btn" v-on:click.prevent="creatrOrder()">اطلب الان</button>
          </div>
          <div class="tab-a"></div>
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
        console.log('Component mounted.');
        this.fetchUser();
        this.fetchProduct();
    },
  data(){
      return{
        User:{
          City:[],
        },
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
      fetchProducts(val){
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
                  type: val,
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
                console.log(position.coords.latitude);
                console.log(position.coords.longitude);
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
