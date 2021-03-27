<template>
    <div class="row pb-5">
        <div class="col-lg-3" v-for="(product, index) in Products" :key="index">
            <div class="card pro-ser-card">
                <img class="card-img-top" src="../../../assets/img/product-1.svg" alt="Card image cap">
                <div class="card-body">
                    <h6 class="card-title">{{ product.name }}</h6>
                    <p class="card-text">{{ product.description }}</p>
                    <hr>
                    <ul>
                        <li>بيوت</li>
                        <li>منازل</li>
                        <li>تشطيب</li>
                    </ul>
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6"><span class="count count-pr">300 ر.س</span></div>
                        <div class="col-lg-3"></div>
                    </div>
                    <a href="#" class="btn pro-ser-button">أطلب الان</a>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
const token = sessionStorage.getItem('access_token');
export default {
    name:'user_services',
    mounted() {
        console.log('Component mounted');
        this.fetchProducts();
    },
  data(){
      return{
        Products:[],
      }
  },
  created() {
      this.fetchProducts();
  },
  methods:{
      fetchProducts(){
        try {
          axios.get('http://18.194.157.202/api/products/',
              {
                headers: {
                  'Authorization': 'Bearer ' + token,
                  'X-localization': 'ar',
                }
              })
              .then(res => {
                if (res.data['status']['status'] === "success") {
                  this.Products = res.data['Products'];
                } else {
                  console.log();
                }
              })
              .catch(e =>
                  console.log(e));
        }catch (e){
          console.log(e);
        }
      }
  }
}
</script>
