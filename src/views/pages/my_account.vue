<template>
    <change_password></change_password>
    <change_setting></change_setting>
    <!-- start wrapper -->
    <div class="wrapper">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><router-link to="/"><i class="fas fa-home"></i></router-link></li>
                    <li class="breadcrumb-item active" aria-current="page">حسابي</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="acount-sitting">
                        <div class="acount-sitting-com">
                            <div class="sitting-h sitting-h-b">
                                <h5>بيانات الحساب</h5>
                            </div>
                            <div class="siting-body">
                                <div class="edit-c"><a data-tooltip="edit settings" data-toggle="modal" data-target="#exampleModalCenter-4" aria-label="Close" data-dismiss="modal"><i class="fas fa-pen"></i></a></div>
                                <div class="verify-c"><a data-tooltip="verify account" data-toggle="modal" data-target="#exampleModalCenter-2" aria-label="Close" data-dismiss="modal"><i class="fas fa-check"></i></a></div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput"><i class="fas fa-user"></i> الاسم كاملا</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" :placeholder="User.name" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> <i class="fas fa-phone-alt"></i> رقم الجوال</label>

                                    <div class="row w-100 phone-n">
                                        <input class="form-control mr-sm-2 search-t col-lg" type="number" :placeholder="User.mobile" disabled aria-label="Search">
                                        <span class="flag-img">(+966) <img src="../../assets/img/saudi-arabia.svg" alt=""></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><i class="fas fa-envelope"></i> البريد الالكتروني</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" :placeholder="User.email" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="acount-sitting-com">
                            <div class="sitting-h">
                                <h5>معلومات الأمن</h5>
                            </div>
                            <div class="siting-body">
                                <div class="form-group">
                                    <label for="inputPassword"> <i class="fas fa-lock"></i> كلمة المرور</label>
                                    <input type="password" class="form-control" id="inputPassword" placeholder="*****************" disabled>
                                </div>
                                <a href="" data-toggle="modal" data-target="#exampleModalCenter-3" aria-label="Close" data-dismiss="modal">هل نسيت كلمة المرور؟</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">

                </div>
            </div>
        </div>
    </div>
</template>
<script>
import change_password from "@/components/modals/change_password";
import change_setting from "@/components/modals/change_setting";
import axios from "axios";
import url from '../../main';

export default {
  name: 'my_account',
  components:{
    change_password,
    change_setting,
  },
  data(){
    return{
      User : [],
    }
  },
  created() {
    this.userDetails();
  },
  methods:{
    userDetails(){
      try {
      const token = sessionStorage.getItem('access_token_1');
      if(!token){
        console.log('You need to login first');
      }
      else {
        axios.get(url+'/api/auth/me', {
          headers: {
            'Authorization': 'Bearer ' + token
          }
        })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                this.User = res.data['User'];
              } else {
                console.log();
              }
            })
            .catch(e => {
              console.log(e);
            })
      }
      }catch (e){
        console.log(e);
      }
    },
  },
}
</script>
