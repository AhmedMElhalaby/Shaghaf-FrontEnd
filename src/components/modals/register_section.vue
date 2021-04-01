<template>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

        <form action="" accept-charset="UTF-8">
            <div class="radio-chose">
                <label for="radio-one" class="r-ch1"><i class="far fa-user-circle"></i> نوع التسجيل</label>
                <div class="switch-field r-ch2">
                    <input type="radio" id="radio-one" name="switch-one" value="yes" v-on:click="getTypeValue(1)" checked/>
                    <label for="radio-one"><i class="fas fa-check-circle"></i> عميل شغف</label>
                    <input type="radio" id="radio-two" name="switch-one" value="no" v-on:click="getTypeValue(2)">
                    <label for="radio-two"><i class="fas fa-check-circle"></i> شريك شغف</label>
                </div>
            </div>
            <div class="form-group">
                <label for="name"><i class="fas fa-user"></i> الاسم كاملا</label>
                <input type="text" class="form-control" id="name" placeholder="ادخال الاسم كاملا" v-model="name" required>
            </div>
            <div class="form-group">
                <label for="mobile"> <i class="fas fa-phone-alt"></i> رقم الجوال</label>

                <div class="row w-100 phone-n">
                    <input class="form-control mr-sm-2 search-t col-lg" id="mobile" type="number" placeholder="ادخال رقم الجوال" aria-label="Search" v-model="mobile" required>
                    <span class="flag-img">(+966) <img src="src/assets/img/saudi-arabia.svg" alt=""></span>
                </div> </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">المدينة</label>
                <select class="form-control minimal" id="exampleFormControlSelect1">
                  <option>اختر مدينة</option>
                  <option v-for="(city, index) in Cities" :key="index" :value="city_id = city.id"> {{city.name}} </option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1"><i class="fas fa-envelope"></i> البريد الالكتروني</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ادخال البريد الالكتروني" v-model="email" required>
            </div>
            <div class="form-group">
                <label for="inputPassword"> <i class="fas fa-lock"></i> كلمة المرور</label>
                <input type="password" class="form-control" id="inputPassword" placeholder="ادخل كلمة المرور" v-model="password" required>
            </div>
          <div class="form-group" v-show="this.type === 2">
            <label for="providerType"><i class="fas fa-envelope"></i> نوع الحساب </label>
            <select class="form-control" id="providerType" v-on:change.prevent="getProviderTypeValue()">
              <option>اختر</option>
              <option :value="1">حساب شخصي</option>
              <option :value="2">حساب شركة</option>
            </select>
          </div>
          <div class="form-group" v-show="(this.provider_type === '2')">
            <label for="formGroupExampleInput2">اسم الشركة</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" v-model="company_name">

          </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" required>
                    <label class="form-check-label" for="gridCheck">
                        أوافق على سياسة الخصوصية
                    </label>
                </div>
            </div>
            <div class="tab-button">
                <button type="submit" v-on:click.prevent="register()" class="btn">إنشاء حساب</button>
            </div>
        </form>
    </div>
</template>
<script>
import axios from "axios";
import jquery from 'jquery'
import * as Swal from "sweetalert2";
import url from "@/main";
let $ = jquery;

export default {
    data(){
        return{
            User: [],
            Cities:[],
            name: '',
            mobile: '',
            email: '',
            password: '',
            type: '1',
            country_id : '1',
            city_id : '',
            provider_type: '',
            company_name:''
        }
    },
    created() {
        this.getCities();
    },
    methods:{
        register(){
          try {
            axios.post(url+'/api/auth/register',
                {
                  'name': this.name,
                  'mobile': '966'+this.mobile,
                  'email': this.email,
                  'password': this.password,
                  'type': this.type,
                  'country_id': this.country_id,
                  'city_id': this.city_id,
                  'provider_type' : this.provider_type,
                  'company_name' : this.company_name,
                },
                {
                  headers: {
                    'X-localization': 'ar',
                  }
                })
                .then(res => {
                  if (res.data['status']['status'] === 'success') {
                    this.User = res.data['User'];
                    const email = res.data['User']['email'];
                    const password = res.data['User']['password'];
                    sessionStorage.setItem('email', email);
                    sessionStorage.setItem('password', password);
                    $('#exampleModalCenter').modal('hide');
                    Swal.fire(
                        res.data['status']['status'],
                        'تم ارسال رمز التفعيل',
                        'success'
                    );
                    $('#exampleModalCenter-2').modal('show');
                  } else {
                    Swal.fire(
                        res.data['status']['status'],
                        'خطأ في البيانات المدخلة',
                        'error'
                    );
                  }
                }).catch(e => {
              this.errors.push(e);
            });
          }catch (e){
            console.log(e);
          }
        },
        getCities(){
          try {
            axios.get(url+'/api/home/install',
                {
                  headers:{
                    'X-localization' : 'ar'
                  }
                })
            .then(res=>{
              if (res.data['status']['status'] === "success"){
                this.Cities = res.data['data']['Countries'][0]['Cities'];
              }else {
                console.log();
              }
            })
            .catch(e=>{
              console.log(e);
            })
          }catch (e){
            console.log(e);
          }
        },
      getTypeValue(val){
        this.type = val;
      },
      getProviderTypeValue(){
        let provider = document.getElementById('providerType').value;
        this.provider_type = provider;
      },

    }
}
</script>
