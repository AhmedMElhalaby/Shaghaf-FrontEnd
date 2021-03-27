<template>
    <div class="row">
        <div class="col-lg-3" v-for="(order, index) in Orders" :key="index">
            <div class="card pro-ser-card">
              <router-link to="/orders_details">
                <img class="card-img-top" src="../../../assets/img/product-1.svg" alt="Card image cap">
              </router-link>
                <div class="card-body">
                    <h6 class="card-title">{{ order.Product.name }}</h6>
                    <p class="card-text">{{ order.Product.description }}</p>
                    <hr>
                    <ul>
                        <li>بيوت</li>
                        <li>منازل</li>
                        <li>تشطيب</li>
                    </ul>
                    <div class="row bg-h">
                        <div class="col-lg-6"><span class="count count-pr">{{ order.price }}</span></div>
                        <div class="col-lg-6">
                            <span class="count">عدد الخدمة : {{ order.quantity }}</span>
                        </div>
                    </div>

                    <div class="color-1">

                        <button type="submit" class="btn" >
                          {{ order.status_str }}  </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    mounted() {
        console.log('Component mounted.');
    },
    components:{
    },
    data(){
      return{
        Orders: [],
      }
    },
    created() {
      this.fetchOrder2();
    },
    methods:{
      fetchOrder2() {
        try {
          const token = sessionStorage.getItem('access_token_1');
          axios.get('http://18.194.157.202/api/orders',
              {
                headers: {
                  'Authorization': 'Bearer ' + token,
                  'X-localization': 'ar',
                }
              })
              .then(res => {
                if (res.data['status']['status'] === "success") {
                  this.Orders = res.data['Orders'];
                  console.log(res.data['Orders']);
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
    }
}
</script>
