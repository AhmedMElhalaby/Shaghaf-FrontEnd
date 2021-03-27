<template>
  <edit_order></edit_order>
  <div class="row justify-content-center">
    <div class="modal-tab col-3">
      <ul class="nav nav-pills mb-3 list-con row" id="pills-tab" role="tablist">
        <li class="nav-item col-6">
          <a v-on:click.prevent="fetchService(2)" class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">منتجات</a>
        </li>
        <li class="nav-item col-6">
          <a v-on:click.prevent="fetchService(1)" class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#transaction" role="tab" aria-controls="pills-profile" aria-selected="false">خدمات</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
      <div class="row">
        <div class="col-lg-3" v-for="(product,index) in Products" :key="index">
          <div class="card pro-ser-card" v-tilt>
            <img class="card-img-top" :src="product['first_image']" alt="Card image cap">
            <div class="card-body">
              <h6 class="card-title">{{ product['name'] }}</h6>
              <p class="card-text">{{ product['description'] }}</p>
              <hr>
              <div class="row">
                <div class="col-lg-12"><span class="count count-pr">السعر : {{ product.price }}</span></div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <button type="submit" v-on:click="getProductId(product.id)" class="btn" data-toggle="modal" data-target="#edit_product" aria-label="Close" data-dismiss="modal"><i class="fas fa-pen"></i> تعديل </button>
                </div>
                <div class="col-lg-6">
                  <button type="submit" v-on:click="getProductId(product.id)" class="btn no-bg" data-toggle="modal" data-target="#exampleModalCenter-11" aria-label="Close" data-dismiss="modal"><i class="far fa-trash-alt"></i> حذف </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="tab-pane fade" id="transaction" role="tabpanel" aria-labelledby="pills-profile-tab">
      <div class="row">
        <div class="col-lg-3" v-for="(product,index) in Products" :key="index">
          <div class="card pro-ser-card" v-tilt>
            <img class="card-img-top" :src="product['first_image']" alt="Card image cap">
            <div class="card-body">
              <h6 class="card-title">{{ product['name'] }}</h6>
              <p class="card-text">{{ product['description'] }}</p>
              <hr>
              <div class="row">
                <div class="col-lg-12"><span class="count count-pr">السعر : {{ product.price }}</span></div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <button type="submit" v-on:click="getProductId(product.id)" class="btn" data-toggle="modal" data-target="#edit_product" aria-label="Close" data-dismiss="modal"><i class="fas fa-pen"></i> تعديل </button>
                </div>
                <div class="col-lg-6">
                  <button type="submit" v-on:click="getProductId(product.id)" class="btn no-bg" data-toggle="modal" data-target="#exampleModalCenter-11" aria-label="Close" data-dismiss="modal"><i class="far fa-trash-alt"></i> حذف </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- modal -->
  <div class="modal fade add-o" id="exampleModalCenter-11" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-header">
          <p>حذف</p>
        </div>
        <div class="modal-body secound-m">
          هل أنت متأكد من عملية الحذف؟
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
          <button type="button" class="btn btn-danger" v-on:click.prevent="deleteService()">حذف</button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import edit_order from "@/components/modals/edit_order.vue";
import jquery from 'jquery';
let $ = jquery;
import url from '../../../main';

export default {
    name:'services',
    mounted() {
        console.log('Component mounted.')
    },
  components:{
    edit_order,
  },
  data(){
    return{
      Products:[],
      product_id:'',
    }
  },
  created() {
      this.fetchService();
  },
  methods:{
    fetchService(val){
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
              }
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                this.Products = res.data['Products'];
                console.log(res.data['Products']);

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
    deleteService(){
      try {

        const token = sessionStorage.getItem('access_token_1');
        axios.post(url+'/api/products/destroy',
            {
              product_id: sessionStorage.getItem('product_id'),
            },
            {
              headers: {
                'Authorization': 'Bearer ' + token,
                'X-localization': 'ar',
              }
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                console.log(res.data['status']['message']);
                $('#exampleModalCenter-11').modal('hide');
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
    getProductId(product_id){
      sessionStorage.setItem('product_id',product_id);
    }
  }
}
</script>
