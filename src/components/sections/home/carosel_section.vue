<template>
    <div class="first-s" id="home">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="container">
                <div class="carousel-inner">
                    <div class="carousel-item" v-for="(Advertisment, index) in Advertisments" :key="index" :class="{'active' : index === 0}">
                        <img class="d-block w-100" :src="Advertisment.image" alt="First slide" style="max-height: 500px">
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="arow-s-l arow-s" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="arow-s-r arow-s" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                <span class="sr-only">Next</span>
            </a>
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleControls" v-for="(Advertisment , index) in Advertisments" :key="index" :class="{'active' : index === 0}" :data-slide-to="index"></li>
            </ol>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import url from '../../../main';

export default {
  name: 'carosel_section',
    data() {
        return {
                Advertisments :[],
            }
        },
    created() {
    this.fetchAdvertisments();
    },
    methods : {
    fetchAdvertisments(){
      try {
        axios.get(url+'/api/home/advertisements', {
          headers: {
            'X-localization': 'ar',
          }
        })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                this.Advertisments = res.data['Advertisements'];
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
    }
    },
};

</script>
