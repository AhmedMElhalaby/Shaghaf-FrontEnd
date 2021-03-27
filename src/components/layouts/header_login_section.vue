<template>
  <logout></logout>
                    <div class="col-lg-4 pl-0 logo-h">
                        <div class="row">
                            <div class="col-2 my-cart">
                            </div>
                            <div class="col-lg-10 l-r">
                                <div class="row">
                                    <div class="nav-item dropdown col-lg-12 ltr-rtl">
                                        <a class="nav-link dropdown-toggle user-name" id="MyAccount" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img :src="User.avatar" alt="">
                                            <i class="fas fa-chevron-down"></i><span>{{User.name}}</span>
                                        </a>
                                        <div class="dropdown-menu" id="MyAccountDropdown" aria-labelledby="MyAccount">
                                            <router-link ref="link" to="/serve_user" v-show="User.type === '2'" class="dropdown-item">حسابي</router-link>
                                            <div class="dropdown-divider" v-show="User.type === '2'"></div>
                                            <router-link ref="link" to="/add_service" v-show="User.type === '2'" class="dropdown-item">خدماتي</router-link>
                                            <div class="dropdown-divider" v-show="User.type === '2'"></div>
                                            <router-link ref="link" to="" v-on:click.prevent="changeOrderRoute()" style="cursor: pointer" class="dropdown-item">طلباتي</router-link>
                                            <div class="dropdown-divider"></div><div class="dropdown-divider" v-show="User.type === 2"></div>
                                            <router-link ref="link" to="/financial" class="dropdown-item">عملياتي المالية</router-link>
                                            <div class="dropdown-divider"></div>
                                            <router-link ref="link" to="" class="dropdown-item" v-on:click.prevent="changeRoute()" style="cursor: pointer" >اعدادات الحساب</router-link>
                                            <div class="dropdown-divider"></div>
                                            <router-link ref="link" to="/notifications" class="dropdown-item" style="cursor: pointer" >اشعاراتي</router-link>
                                            <div class="dropdown-divider"></div>
                                            <router-link ref="link" to="/chats" class="dropdown-item" style="cursor: pointer" >محادثاتي</router-link>
                                            <div class="dropdown-divider"></div>
                                            <router-link ref="link" to="" class="dropdown-item" v-on:click.prevent="logout()" style="cursor: pointer">تسجيل خروج</router-link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</template>
<script>
import axios from "axios";
import logout from "@/components/modals/logout";
import jquery from 'jquery';
import * as Swal from "sweetalert2";
let $ = jquery;
import url from '../../main';

export default {
  components:{
      logout
  },
    data(){
        return {
            User:[],
        }
    },
    created() {
        this.userDetails();
    },
    methods:{

        userDetails(){
          try {
            const token = sessionStorage.getItem('access_token_1');
            axios.get(url+'/api/auth/me', {
              headers: {
                'Authorization': 'Bearer ' + token
              }
            })
                .then(res => {
                  if (res.data['status']['status'] === "success") {
                    this.User = res.data['User'];
                  } else {
                    console.log()
                  }
                })
                .catch(e => {
                  console.log(e);
                })
          }catch (e){
            console.log(e);
          }
        },
        logout(){
          try {
            const token = sessionStorage.getItem('access_token_1');
            axios.post(url+'/api/auth/logout', {}, {
              headers: {
                'Authorization': 'Bearer ' + token
              }
            })
                .then(res => {
                  if (res.data['status']['status'] === "success") {
                    sessionStorage.removeItem('access_token_1');
                    this.$router.push('/');
                    $('#MyAccountDropdown').hide();
                    Swal.fire(
                        res.data['status']['status'],
                        'تم تسجيل الخروج بنجاح',
                        'success'
                    );
                    this.$emit('RefreshHeader');
                  } else {
                    Swal.fire(
                        res.data['status']['status'],
                        'فشل تسجيل الخروج',
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
        changeRoute(){
          if (sessionStorage.getItem('user_type') === '2'){
            this.$router.push('/my_account_2');
          }else {
            this.$router.push('/my_account');
          }

      },
        changeOrderRoute(){
          if (sessionStorage.getItem('user_type') === '2'){
            this.$router.push('/orders_2');
          }else {
            this.$router.push('/orders');
          }
      },
    }
}
</script>
