<template>
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
            <label for="notes"><img :src="User.avatar" alt=""> الملاحظات</label>
            <textarea class="form-control" id="notes" rows="5" v-model="note">
                                        </textarea>
          </div>
          <div class="form-group">
            <label for="discount_code"><img src="../../assets/img/clock-1.svg" alt=""> كود الخصم</label>
            <input type="number" class="form-control" id="discount_code" placeholder="" v-model="discount_code">
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
import jquery from 'jquery';
import * as Swal from "sweetalert2";
let $ = jquery;
import url from '../../main';

export default {
  name : 'confirm_order',
  data(){
    return{
      Order:[],
      Product:[],
      delivered_date: '',
      delivered_time : '',
      quantity :1,
      discount_code:null,
      note :'',
      User:[],
      user_id:'',
    }
  },
  created() {
    this.fetchProduct();
  },
  methods:{
    creatrOrder(){
      try {
        const token = sessionStorage.getItem('access_token_1');
        axios.post(url+'/api/orders/store',
            {
              delivered_date: this.delivered_date,
              delivered_time: this.delivered_time,
              product_id: sessionStorage.getItem('product_id'),
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
                product_id: sessionStorage.getItem('product_id'),
              }
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                this.Product = res.data['Product'];
                console.log(res.data['Product']);
                console.log(res.data['status']['status']);
              } else {
                console.log(res.data['status']['status']);
              }
            })
            .catch(e => {
              console.log(e);
            })
      }catch (e){
        console.log(e);
      }
    },
    fetchUser() {
      try {
        const token = sessionStorage.getItem('access_token_1');
        axios.get(url+'/api/auth/me',
            {
              headers: {
                'Authorization': 'Bearer ' + token,
                'X-localization': 'ar',
              }
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                this.User = res.data['User'];
                this.user_id = res.data['User']['id'];
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

  }
}
</script>
