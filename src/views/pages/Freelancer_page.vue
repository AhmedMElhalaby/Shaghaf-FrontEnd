<template>
    <div class="wrapper">
        <div class="container">
            <div class="sevice-user">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><router-link to="/"><i class="fas fa-home"></i></router-link></li>
                      <li class="breadcrumb-item"><router-link to="/our_serve">خدماتنا</router-link></li>
                      <li class="breadcrumb-item" aria-current="page"><router-link to="/our_serve">التصميم الجرافيكي</router-link></li>
                        <li class="breadcrumb-item active" aria-current="page">{{Freelancer['name']}}</li>
                    </ol>
                </nav>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="img-o-h">
                                <router-link to="/chats"><span class="chat"><img src="../../assets/img/chat.svg" alt=""></span></router-link>
                                <div class="order-card-img">
                                    <img class="card-img-top" :src="Freelancer['avatar']" alt="Card image cap">
                                </div>
                            </div>
                            <div class="card-body">
                                <h4>{{ Freelancer['name'] }}</h4>
                                <span>{{ Freelancer['bio'] }}</span>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-3 p-0"><span><i class="fas fa-map-marker-alt"></i> city</span></div>
                                    <div class="col-lg-2"></div>
                                    <div class="col-4 star">
                                        <span class="fa fa-star" :class="{'checked' : Freelancer['rate'] >= 1}"></span>
                                        <span class="fa fa-star" :class="{'checked' : Freelancer['rate'] >= 2}"></span>
                                        <span class="fa fa-star" :class="{'checked' : Freelancer['rate'] >= 3}"></span>
                                        <span class="fa fa-star" :class="{'checked' : Freelancer['rate'] >= 4}"></span>
                                        <span class="fa fa-star" :class="{'checked' : Freelancer['rate'] >= 5}"></span>
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
                                  <carousel :items-to-show="1" :wrap-around="true" style="width: 100%">
                                    <Slide>
                                      <div class="col-lg-3" v-for="(portfolio, index) in Portfolios" :key="index">
                                        <img :src="portfolio.media" alt="portfolio" style="max-width: 150px">
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
                                          :center="center"
                                          :zoom="15"
                                          :init="initializeGoogleMap" :markers="markers" :getUserLocation="true">
                                        <Marker :options="{ position: center }" />
                                      </GoogleMap>
                                      <!--                                        <img src="../../assets/img/map.svg" alt="">-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <div class="row justify-content-center">
                <div class="pro-ser col-3">
                  <!-- start navs section -->
                  <div class="col-lg most-l">
                    <a class="active" v-on:click.prevent="fetchFreelancerProducts(1)" style="cursor: pointer">خدمات</a>
                    <a v-on:click.prevent="fetchFreelancerProducts(2)" style="cursor: pointer">منتجات</a>
                  </div>
                </div>
              </div>
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
                        <a class="btn pro-ser-button" data-toggle="modal" data-target="#exampleModalCenter-12" aria-label="Close" data-dismiss="modal" v-on:click.prevent="fetchProduct(product.id)">أطلب الان</a>
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
            <input type="date" class="form-control" id="deliveredDate" placeholder="05873131316" v-model="delivered_date" required>
          </div>
          <div class="form-group">
            <label for="deliveredTime"><img src="../../assets/img/clock-1.svg" alt=""> توقيت التسليم</label>
            <input type="time" class="form-control" id="deliveredTime" placeholder="05873131316" v-model="delivered_time" required>
          </div>
          <div class="form-group">
            <label for="notes"><img :src="User.avatar" alt=""> الملاحظات</label>
            <textarea class="form-control" id="notes" rows="5" v-model="note" required>
                                        </textarea>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="row confirm-order">
                <div class="col-lg-4 pr-lang">
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
                <p class="col-lg-6">{{ Product['price'] * this.quantity }} ر.س</p>
              </div>
            </div>
          </div>
          <div class="tab-button">
            <button type="submit" class="btn" v-on:click.prevent="creatrOrder(Product.id)">اطلب الان</button>
          </div>
          <div class="tab-a"></div>
        </div>
      </div>
    </div>
  </div>

</template>
<script>
import axios from "axios";
import { GoogleMap, Marker } from 'vue3-google-map'
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';
import jquery from 'jquery';
import * as Swal from "sweetalert2";
let $ = jquery;
import url from '../../main';


export default {
    name: 'Freelancer_page',
    components:{
      GoogleMap,
      Marker,
      Carousel,
      Slide,
      Pagination,
      Navigation,
    },
    mounted() {
        console.log('Component mounted.');
    },
  data(){
      return{
        Freelancer: [],
        Portfolios:[],
        Products:[],
        Product:[],
        Order : [],
        delivered_date: '',
        delivered_time : '',
        quantity :1,
        note :'',
        product_id:'',
        lat: '',
        lng: '' ,
        User:[],
        user_id:'',
      }
  },
  created() {
      this.fetchFreelancer();
      this.fetchFreelancerPortfolios();
      this.fetchFreelancerProducts();


  },
  methods:{
      fetchFreelancer() {
        try {
          axios.get(url+'/api/home/get_freelancer', {
            headers: {
              'X-localization': 'ar',
            },
            params: {
              user_id: sessionStorage.getItem('freelancer_id')
            }
          },)
              .then(res => {
                if (res.data['status']['status'] === "success") {
                  this.Freelancer = res.data['Freelancer'];
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
      fetchFreelancerPortfolios(){
        try {
          const token = sessionStorage.getItem('access_token_1');
          axios.get(url+'/api/portfolios',
              {
                headers: {
                  'Authorization': 'Bearer ' + token,
                  'X-localization': 'ar',
                },
                params: {
                  user_id: sessionStorage.getItem('freelancer_id')
                }
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
      fetchFreelancerProducts(val){
        try {
          const token = sessionStorage.getItem('access_token_1');
          axios.get(url+'/api/products',
              {
                headers: {
                  'Authorization': 'Bearer ' + token,
                  'X-localization': 'ar',
                },
                params: {
                  type: val,
                  user_id: sessionStorage.getItem('freelancer_id'),
                  per_page: 10,
                }
              })
              .then(res => {
                if (res.data['status']['status'] === "success") {
                  this.Products = res.data['Products'];
                } else {
                  console.log();
                }
              })
        }catch (e){
          console.log(e);
        }
    },
    creatrOrder(product_id){
      try {
        const token = sessionStorage.getItem('access_token_1');
        axios.post(url+'/api/orders/store',
            {
              delivered_date: this.delivered_date,
              delivered_time: this.delivered_time,
              product_id: product_id,
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
                    'تم انشاء الطلب بنجاح',
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
    fetchProduct(product_id){
      try {
        const token = sessionStorage.getItem('access_token_1');
        axios.get(url+'/api/products/show',
            {
              headers: {
                'Authorization': 'Bearer ' + token,
                'X-localization': 'ar',
              },
              params: {
                product_id: product_id,
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
                this.lng = position.coords.longitude;
                this.lat = position.coords.latitude;
              },
              error => {
                alert(error.message);
              },
          )
        }catch (e){
          console.log();
        }

  }

  },
  setup() {
    const center = { lat: 32, lng: 35.25 }
    return { center }
  },
}
</script>
