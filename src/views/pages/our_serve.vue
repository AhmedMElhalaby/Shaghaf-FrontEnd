<template>
  <login_section></login_section>
    <div class="wrapper">
        <div class="container">
            <div class="our-services">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><router-link to="/"><i class="fas fa-home"></i></router-link></li>
                      <li class="breadcrumb-item"><router-link to="/our_serve">خدماتنا</router-link></li>
                        <li class="breadcrumb-item active" aria-current="page">التصميم الجرافيكي</li>
                    </ol>
                </nav>
                <div class="col-lg most-l">
                    <a v-on:click.prevent="fetchAllFreelancers()" class="active" style="cursor: pointer">الكل</a>
                    <a v-for="(category, index) in Categories" :key="index" v-on:click.prevent="category_id = category.id ; fetchAllFreelancers()" style="cursor: pointer">
                      {{ category.name }}
                    </a>
                </div>

              <div class="cards">
                <div class="row">
                  <div class="col-lg-3" v-for="(freelancer, index) in Freelancers" :key="index">
                    <router-link v-on:click="getFreelancerId(freelancer.id)" to="/Freelancer_page">
                    <div class="card">
                      <div class="img-o-h">
                        <div class="order-card-img">
                          <img class="card-img-top" :src="freelancer.avatar" alt="Card image cap" style="width: 70px; height: 70px">
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
                    </router-link>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4"></div>
                  <div class="col-lg-4">
                    <nav aria-label="Page freelancers example">
                      <ul class="pagination">
                        <li class="page-item">
                          <button type="button" class="page-link" v-if="page !== 1" @click="page--; fetchAllFreelancers()"> Previous </button>
                        </li>
                        <li class="page-item">
                          <button type="button" class="page-link" v-for="(pageNumber, index) in pages.slice(page-1, page+5)" :key="index" @click="page = pageNumber; fetchAllFreelancers()"> {{pageNumber}} </button>
                        </li>
                        <li class="page-item">
                          <button type="button" @click="page++; fetchAllFreelancers()" v-if="page < pages.length" class="page-link"> Next </button>
                        </li>
                      </ul>
                    </nav>
                  </div>
                  <div class="col-lg-4"></div>
                </div>
              </div>
            </div>
        </div>
    </div>
</template>
<script>
import login_section from "@/components/modals/login-section";
import axios from "axios";
import url from '../../main';

export default {
    name:'our_serve',
  components:{
    login_section,
  },
  data(){
      return{
        Categories: {
          SubCategories:[],
        },
        category_id: null,
        Freelancers:[],
        q: sessionStorage.getItem('q'),
        page: 1,
        perPage: 5,
        pages: [],
      }
  },
  created() {
      this.fetchServices();
      this.fetchAllFreelancers();
  },
  methods:{
    fetchServices(){
      try {
        axios.get(url+'/api/home/categories',
            {
              headers: {
                'X-localization': 'ar',
              },
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                this.Categories = res.data['Categories'];
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
    fetchAllFreelancers(){
      try {
        axios.get(url+'/api/home/get_freelancers', {
          headers: {
            'X-localization': 'ar',
          },
          params:{
            'q' : this.q,
            page: this.page,
            per_page : 12,
            category_id: this.category_id,
          }
        },)
            .then(res => {
              if (res.data['status']['status'] === "success") {
                this.Freelancers = res.data['Freelancers'];
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
    getFreelancerId(freelancer_id){
      sessionStorage.setItem('freelancer_id', freelancer_id);
    },
    setPages () {
      this.pages= [];
      let numberOfPages = Math.ceil(this.Freelancers.length / this.perPage);
      for (let index = 1; index <= numberOfPages; index++) {
        this.pages.push(index);
      }
    },
    paginate (Freelancers) {
      let page = this.page;
      let perPage = this.perPage;
      let from = (page * perPage) - perPage;
      let to = (page * perPage);
      return  Freelancers.slice(from, to);
    },
  },
  computed: {
    displayedPosts () {
      return this.paginate(this.Freelancers);
    }
  },
  watch: {
    Freelancers () {
      this.setPages();
    }
  },
  filters: {
    trimWords(value){
      return value.split(" ").splice(0,20).join(" ") + '...';
    }
  }
}
</script>
<style>
button.page-link {
  display: inline-block;
}
button.page-link {
  font-size: 14px;
  color: black;
  font-weight: 500;
}
.offset{
  width: 500px !important;
  margin: 20px auto;
}
</style>
