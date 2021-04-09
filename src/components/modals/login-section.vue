<template>
  <profile_status></profile_status>
  <welcome></welcome>
    <!-- Modal -->
    <div class="modal fade login-register" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <!-- start navs section -->

                    <div class="modal-tab">
                        <ul class="nav nav-pills mb-3 list-con col-lg row" id="pills-tab" role="tablist">
                            <li class="nav-item col-6">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">تسجيل الدخول</a>
                            </li>
                            <li class="nav-item col-6">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"> إنشاء حساب</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <form action="" accept-charset="UTF-8">
                                <div class="form-group">
                                    <label for="mobile"> <i class="fas fa-phone-alt"></i> رقم الجوال</label>

                                    <div class="row w-100 phone-n">
                                        <input class="form-control mr-sm-2 search-t col-lg" id="mobile" type="number" placeholder="ادخال رقم الجوال" aria-label="Search" v-model="mobile" required>
                                        <span class="flag-img">(+966) <img src="src/assets/img/saudi-arabia.svg" alt=""></span>
                                    </div> </div>
                                <div class="form-group">
                                    <label for="password"> <i class="fas fa-lock"></i> كلمة المرور</label>
                                    <input type="password" class="form-control" id="password" placeholder="ادخل كلمة المرور" v-model="password" required>
                                </div>
                                <a data-toggle="modal" data-target="#exampleModalCenter-1"  aria-label="Close" data-dismiss="modal">هل نسيت كلمة المرور؟</a>
                                <div class="tab-button">
                                    <button type="submit" class="btn" v-on:click.prevent="login()">تسجيل الدخول</button>
                                </div>
                            </form>


                        </div>
                        <register_section></register_section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import register_section from "@/components/modals/register_section";
import Jquery from 'jquery';
import profile_status from "@/components/modals/profileStatus";
import welcome from "@/components/modals/welcome";
import * as Swal from "sweetalert2";
let $ = Jquery;
import url from '../../main';

export default {
  name: 'login',
  components:{
    profile_status,
    register_section,
    welcome
  },
    data(){
      return{
          User:[],
          email: sessionStorage.getItem('email') ,
          mobile :'',
          password: '',
      }
    },
    created() {
    },
    methods:{

        login( ){
          try {
            axios.post(url+'/api/auth/login',
                {
                  'mobile': '966'+ this.mobile,
                  'password': this.password,
                },
                {
                  'X-localization': 'ar',
                })
                .then(res => {
                  if (res.data['status']['status'] === "success") {
                    this.User = res.data['User'];
                    const token = res.data['User']['access_token'];
                    const user_id = res.data['User']['id'];
                    const user_type = res.data['User']['type'];
                    sessionStorage.setItem('access_token_1', token);
                    sessionStorage.setItem('user_id', user_id);
                    sessionStorage.setItem('user_type', user_type);
                    $('#exampleModalCenter').modal('hide');
                    this.$emit('RefreshHeader');
                    if ((sessionStorage.getItem('user_type') === '2') && (res.data['User']['profile_completed'] === false)){
                      // alert('not completed');
                     // $('#exampleModalCenter').modal('hide');
                      $('#profile_status').modal('show');
                    }else {
                      Swal.fire({
                        icon: 'success',
                        title: 'أهلا بك في منصة شغف',
                        showConfirmButton: false,
                        timer: 1500
                      });
                    }
                  } else{
                    Swal.fire(
                        res.data['status']['status'],
                        'بيانات الدخول غير صحيحة',
                        'error');
                  }

                })
                .catch(e => {
                  console.log(e);
                });
          }catch (e){
            console.log(e);
          }

        },

    }

}
</script>
