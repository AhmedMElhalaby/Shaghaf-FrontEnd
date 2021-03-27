<template>
    <div class="cards">
        <div class="row">
            <div class="col-lg-3" v-for="(freelancer, index) in Freelancers" :key="index">

                <div class="card" onclick="location.href='#';">
                    <div class="img-o-h">
                        <div class="order-card-img">
                            <img class="card-img-top" :src="freelancer.avatar" alt="Card image cap" style="min-width: 100%; min-height: 100%">
                        </div>
                    </div>
                    <div class="card-body">
                        <h4>{{ freelancer.name }}</h4>
                        <p class="card-text">{{ freelancer.bio }}</p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-3 p-0"><span><i class="fas fa-map-marker-alt"></i>{{freelancer.City['name'] }}</span></div>
                            <div class="col-lg-2"></div>
                            <div class="col-4 star">
                                <span class="fa fa-star" :class="{'checked': freelancer.rate >= 1}"></span>
                                <span class="fa fa-star" :class="{'checked': freelancer.rate >= 2}"></span>
                                <span class="fa fa-star" :class="{'checked': freelancer.rate >= 3}"></span>
                                <span class="fa fa-star" :class="{'checked': freelancer.rate >= 4}"></span>
                                <span class="fa fa-star" :class="{'checked': freelancer.rate >= 5}"></span>
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

export default {
    mounted() {
        console.log('Component mounted.');
    },
  data(){
      return{
        Categories:[],
        Freelancers:[],
      }
  },
  created() {
      this.fetchServices();
      this.fetchFreelancers();
  },
  methods:{
      fetchServices(){
        try {
          axios.get('http://18.194.157.202/api/home/install')
              .then(res => {
                if (res.data['status']['status'] === "success") {
                  this.Categories = res.data['data']['Categories'];
                  console.log(res.data['data']['Categories']);
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
      fetchFreelancers(){
      axios.get('http://18.194.157.202/api/home/get_freelancers',
          {
            headers:{
              'X-localization':'ar',
            },
            params:{
              'category_id' : '1',
            },
          })
      .then(res=>{
        if (res.data['status']['status'] === "success"){
          this.Freelancers = res.data['Freelancers'];
          console.log(res.data['Freelancers']);
        }else {
          console.log(res.data['Freelancers']);
        }
      })
      .catch(e=>{
        console.log(e);
      })
    },
  }
}
</script>
