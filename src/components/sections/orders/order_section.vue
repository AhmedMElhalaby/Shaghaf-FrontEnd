<template>
    <div class="row">
        <div class="col-lg-3" v-for="(order, index) in Orders" :key="index">
            <div class="card pro-ser-card" onclick="">
                <img class="card-img-top" :src="order['Product']['first_image']" alt="Card image cap">
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
                        <div class="col-lg-6"><span class="count count-pr">{{ order.total }}</span></div>
                        <div class="col-lg-6">
                            <span class="count">عدد الخدمة : {{ order.quantity }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="m-name col-7">
                            <span class="count">المنفذ</span>
                            <p>{{ order.Freelancer.name }}</p>
                        </div>
                      <router-link class="col-5 refused" to="/orders_details">
                        <div class="col-5 refused">
                          {{ order.status_str }}
                        </div>
                      </router-link>
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
        console.log('Order mounted');
    },
    data(){
        return{
          Orders: [],
        }
    },
    created() {
      this.fetchOrder();
    },
    methods:{
      fetchOrder(){
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
