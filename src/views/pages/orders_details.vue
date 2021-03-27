<template>
  <check-balance></check-balance>
  <reject></reject>
  <cancel></cancel>
  <div class="modal fade thanks rate-page" id="rate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-body secound-m">
          <h4 class="vc-m">كيف كان طلبك من الشريك</h4>
          <p class="vc-m">{{ (Order.Freelancer)? Order.Freelancer['name'] : '' }}</p>
          <div class="rate">
            <input type="radio" id="star5" name="rate" value="5" v-model="rate" />
            <label for="star5" title="text">5 stars</label>
            <input type="radio" id="star4" name="rate" value="4" v-model="rate" />
            <label for="star4" title="text">4 stars</label>
            <input type="radio" id="star3" name="rate" value="3" v-model="rate" />
            <label for="star3" title="text">3 stars</label>
            <input type="radio" id="star2" name="rate" value="2" v-model="rate" />
            <label for="star2" title="text">2 stars</label>
            <input type="radio" id="star1" name="rate" value="1" v-model="rate" />
            <label for="star1" title="text">1 star</label>
          </div>

          <form>
            <div class="form-group">
              <label for="exampleFormControlTextarea1"><h5>ملاحظات</h5></label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="7" v-model="review"></textarea>
            </div>
          </form>
          <div class="tab-button">
            <button type="submit" class="btn" v-on:click.prevent="reviewOrder(); updateOrder(8)">تقييم</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="wrapper">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><router-link to="/"><i class="fas fa-home"></i></router-link></li>
                    <li class="breadcrumb-item"><a style="cursor: pointer" v-on:click="changeRoute()">الطلبات</a></li>
                    <li class="breadcrumb-item"><a style="cursor: pointer" v-on:click="changeRoute()">الطلبات الحالية</a></li>
                    <li class="breadcrumb-item"><router-link to="/orders_details">تفاصيل الطلب</router-link></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Order.title }} {{ (Order.Freelancer)? Order.Freelancer.name :'' }}</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="orders-details">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="card pro-ser-card">
                                    <img class="card-img-top" src="../../assets/img/product-1.svg" alt="Card image cap">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ (Order.Product)? Order.Product.name : '' }}</h6>
                                        <p class="card-text">{{ (Order.Product)? Order.Product.description : '' }}</p>
                                        <hr>
                                        <div class="row bg-h">
                                            <div class="col-lg-5"><span class="count count-pr"> {{(Order.Product)? Order.Product.price:''}} </span></div>
                                            <div class="col-lg-2"></div>
                                            <div class="col-lg-5">
                                                <span class="count">عدد الخدمة : {{ Order.quantity }}</span>
                                            </div>
                                        </div>
                                        <div class="m-name">
                                            <span class="count">المنفذ</span>
                                            <p>{{ (Order.Freelancer)? Order.Freelancer.name : '' }}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="midd-line"></div>
                            </div>
                            <div class="col-lg-5">
                                <div class="t-d">
                                    <span><img src="../../assets/img/clock.svg" alt=""> {{ Order['delivered_time'] }}</span>
                                    <span><img src="../../assets/img/calendar.svg" alt=""> {{ Order['delivered_date'] }}</span>
                                </div>
                                <div class="order-state">
                                    <div class="order-header">
                                        <h5>حالة الطلب</h5>
                                    </div>
                                    <div class="order-content t-d">
                                        <div class="doted-bor">
                                          <div v-for="(status, index) in Order.OrderStatuses" :key="index">
                                            <span>{{ status.status_str}}</span>
                                            <p>{{ status.created_at }}</p>
                                            <div class="time-line">
                                              <div class="">
                                                <i class="fas fa-check-circle"></i>
                                              </div>
                                              <span class="test-border"></span>
                                              <div class="">
                                                <i class="fas fa-circle"></i>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="total-price t-d">
                                    <p>السعر الاجمالي</p>
                                    <span> {{ Order.total }} </span>
                                </div>
                                <div class="tab-button" id="accept" v-show="((Order.status === 1) && (this.user_type === '2'))" >
                                    <button type="submit" class="btn" v-on:click.prevent="updateOrder(2)">قبول الطلب</button>
                                </div>
                              <div class="tab-button" id="reject" v-show="((Order.status === 1) && (this.user_type === '2'))">
                                <button type="submit" class="btn" data-toggle="modal" data-target="#reject" aria-label="Close" data-dismiss="modal">رفض الطلب</button>
                              </div>
                              <div class="tab-button" id="cancel" v-show="((Order.status === 1) && (this.user_type === '1'))">
                                <button type="submit" class="btn" data-toggle="modal" data-target="#cancel" aria-label="Close" data-dismiss="modal">الغاء الطلب</button>
                              </div>
                              <div class="tab-button" id="paid" v-show=" ((Order.status === 2) && (this.user_type === '1'))">
                                <button type="submit" class="btn" v-on:click.prevent="updateOrder(5)">تم الدفع</button>
                              </div>
                              <div class="tab-button" id="inProgress" v-show="((Order.status === 5) && (this.user_type === '2'))">
                                <button type="submit" class="btn" v-on:click.prevent="updateOrder(6)">قيد التنفيذ</button>
                              </div>
                              <div class="tab-button" id="delivered" v-show="((Order.status === 6) && (this.user_type === '2'))">
                                <button type="submit" class="btn" v-on:click.prevent="updateOrder(7)">تم التسليم</button>
                              </div>
                              <div class="tab-button" id="received" v-show="((Order.status === 7) && (this.user_type === '1'))">
                                <button type="submit" class="btn" data-toggle="modal" data-target="#rate" aria-label="Close" data-dismiss="modal">تم الاستلام</button>
                              </div>
                              <div class="tab-button" id="notDelivered" v-show="((Order.status === 6) && (this.user_type === '2'))">
                                <button type="submit" class="btn" v-on:click.prevent="updateOrder(9)">لم يتم التسليم</button>
                              </div>
                              <div class="tab-button" id="notReceived" v-show="((Order.status === 7) && (this.user_type === '1'))">
                                <button type="submit" class="btn" v-on:click.prevent="updateOrder(10)">لم يتم الاستلام</button>
                              </div>
                              <div class="tab-button" id="chat">
                                <router-link v-on:click="createRoom()" to="/chats"> <button type="submit" class="btn">بدء المحادثة</button> </router-link>
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
import cancel from "@/components/modals/cancel";
import reject from "@/components/modals/reject";
import jquery from 'jquery';
import * as Swal from "sweetalert2";
import checkBalance from "@/components/modals/checkBalance";
let $ = jquery;
import url from '../../main';

export default {
  components:{
      cancel,
      reject,
    checkBalance
  },
    data(){
      return{
        Order:[],
        order_id:'1',
        OrderStatuses:[],
        user_type : sessionStorage.getItem('user_type'),
        Balance:[],
        availableBalance:'',
        chatRoom:[],
        user_id:'',
        balance:'',
      }
  },
    created() {
      this.fetchOrderDetails();
      this.createRoom();
    },
    methods:{
      fetchOrderDetails(){
        try {
          const token = sessionStorage.getItem('access_token_1');
          axios.get(url+'/api/orders/show',
              {
                headers: {
                  'Authorization': 'Bearer ' + token,
                  'X-localization': 'ar',
                },
                params: {
                  order_id: sessionStorage.getItem('order_id'),
                }
              })
              .then(res => {
                if (res.data['status']['status'] === "success") {
                  this.Order = res.data['Order'];
                  this.OrderStatuses = res.data['OrderStatuses'];
                  this.balance = res.data['Order']['balance'];
                  const customer_id = res.data['Order']['user_id'];
                  sessionStorage.setItem('customer_id', customer_id);
                  sessionStorage.setItem('amount', res.data['Order']['total']);
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
      updateOrder(order_status){
        try {
            const token = sessionStorage.getItem('access_token_1');
            axios.post(url+'/api/orders/update',
                {
                  order_id: sessionStorage.getItem('order_id'),
                  status: order_status,
                },
                {
                  headers: {
                    'Authorization': 'Bearer ' + token,
                    'X-localization': 'ar',
                  },
                })
                .then(res => {
                  if (res.data['status']['status'] === "success") {
                    this.Order.status = res.data['Order']['status'];
                    Swal.fire(
                        res.data['status']['status'],
                        'تم تحديث حالة الطلب',
                        'success'
                    );
                  } else {
                    $('#check_balance').modal('show');
                  }
                })
                .catch(e => {
                  console.log(e);
                })
        }catch (e){
          console.log(e);
        }
      },
      reviewOrder(){
        try {
          const token = sessionStorage.getItem('access_token_1');
          axios.post(url+'/api/orders/review',
              {
                order_id: this.order_id,
                rate: this.rate,
                review: this.review,
              },
              {
                headers: {
                  'Authorization': 'Bearer ' + token,
                  'X-localization': 'ar'
                },
              }
          )
              .then(res => {
                if (res.data['status']['status']) {
                  this.Order = res.data['Order'];
                  $('#rate').modal('hide');
                  Swal.fire(
                      res.data['status']['status'],
                      'تم التقييم',
                      'success'
                  )
                } else {
                  Swal.fire(
                      res.data['status']['status'],
                      'لم يتم التقييم',
                      'error'
                  );
                }
              })
              .catch(e => {
                console.log(e);
              });
        }catch (e){
          console.log(e);
        }
      },
      changeRoute(){
        const user_type = sessionStorage.getItem('user_type');
        if (user_type === '1'){
          this.$router.push('/orders');
        }else if (user_type === '2'){
          this.$router.push('/orders_2');
        }else {
          this.$router.push('/');
        }
      },
      createRoom(){
        try {
          const token = sessionStorage.getItem('access_token_1');
          const user_type = sessionStorage.getItem('user_type');
          if (user_type === '1') {
            this.user_id = sessionStorage.getItem('freelancer_id');
          } else {
            this.user_id = sessionStorage.getItem('customer_id');
          }
          axios.post(url+'/api/chats/rooms/create',
              {
                user_id: this.user_id,
              },
              {
                headers: {
                  'Authorization': 'Bearer ' + token,
                  'X-localization': 'ar',
                }
              })
              .then(res => {
                if (res.data['status']['status'] === "success") {
                  this.chatRoom = res.data['ChatRoom'];
                  const room_id = res.data['ChatRoom']['id'];
                  sessionStorage.setItem('room_id', room_id);
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
}
</script>
