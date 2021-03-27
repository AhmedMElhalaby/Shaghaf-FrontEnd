<template>
    <div class="wrapper">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">الطلبات</a></li>
                    <li class="breadcrumb-item"><a href="#">الطلبات الحالية</a></li>
                    <li class="breadcrumb-item"><a href="#">تفاصيل الطلب</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Order.title }} {{ Order['Freelancers']['name'] }}</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="orders-details orders-details-2">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="card pro-ser-card">
                                    <img class="card-img-top" v-for="(media,index) in Order['Products']['Media']" :key="index" :src="media.file" alt="Card image cap">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ Order['Product']['name'] }}</h6>
                                        <p class="card-text">{{ Order['Product']['description'] }}</p>
                                        <hr>
                                        <ul>
                                            <li>بيوت</li>
                                            <li>منازل</li>
                                            <li>تشطيب</li>
                                        </ul>
                                        <div class="row bg-h">
                                            <div class="col-lg-5"><span class="count count-pr">{{Order['Product']['price']}}</span></div>
                                            <div class="col-lg-2"></div>
                                            <div class="col-lg-5">
                                                <span class="count">عدد الخدمة : {{ Order['quantity'] }} </span>
                                            </div>
                                        </div>
                                        <div class="m-name">
                                            <span class="count">المنفذ</span>
                                            <p>{{ Order['Freelancer']['name'] }}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="midd-line"></div>
                            </div>
                            <div class="col-lg-5">
                                <div class="t-d">
                                    <span><img src="../../assets/img/clock.svg" alt=""> {{ Order['delivered_time'] }} </span>
                                    <span><img src="../../assets/img/calendar.svg" alt=""> {{ Order['delivered_date'] }} </span>
                                </div>
                                <div class="order-state">
                                    <div class="order-header">
                                        <h5>حالة الطلب</h5>
                                    </div>
                                    <div class="order-content t-d">
                                        <div class="doted-bor">
                                            <span> إنشاء الطلب</span>
                                            <p>{{ Order['order_date'] }}</p>
                                            <span> الغاء الطلب</span>
                                            <p>23:13-2020/07/30</p>
                                            <div class="time-line">
                                                <div class="">
                                                    <i class="fas fa-check-circle"></i>
                                                </div>
                                                <span class="test-border"></span>
                                                <div class="">
                                                    <i class="fas fa-check-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="total-price t-d">
                                    <p>السعر الاجمالي</p>
                                    <span> {{ Order['price'] }} </span>
                                </div>
                                <div class="row">
                                    <div class="tab-button col-lg-6">
                                        <button type="submit" class="btn color-y" v-on:click.prevent="changeOrderStatus()">قبول الطلب</button>
                                    </div>
                                    <div class="tab-button col-lg-6">
                                        <button type="submit" class="btn">الغاء الطلب</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1">

                </div>
            </div>
        </div>
    </div>


</template>
<script>
import axios from "axios";
import url from '../../main';

export default {
    mounted() {
        console.log('Component mounted.')
    },
  data(){
    return{
      Order:[],
      order_id:'1',
    }
  },
  created() {
    this.fetchOrderDetails();
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
                order_id: this.order_id,
              }
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                this.Order = res.data['Order'];
                console.log(res.data['status']['status']);
              } else {
                console.log(res.data['status']['message']);
              }
            })
            .catch(e => {
              console.log(e);
            })
      }catch (e){
        console.log(e);
      }
    },
    changeOrderStatus(){
      try {
        const token = sessionStorage.getItem('access_token_1')
        axios.post(url+'/api/orders/update',
            {
              order_id: '',
              status: '',
              cancel_reason: '',
              reject_reason: ''
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
                console.log(res.data['status']['status']);
              } else {
                console.log(res.data['status']['message']);
              }
            })
            .catch(e => {
              console.log(e);
            })
      }catch (e){
        console.log(e);
      }
    }
  },
}
</script>
