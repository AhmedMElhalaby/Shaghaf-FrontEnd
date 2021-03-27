<template>
    <div class="modal fade" id="exampleModalCenter-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-header">
                    <p>نسيت كلمة المرور</p>
                </div>
                <div class="modal-body secound-m">
                    <div class="model-img login100-pic js-tilt" data-tilt><img src="../../assets/img/forget-password.svg" alt=""></div>
                    <span class="vc-m">سوف نساعدك استعادة كلمة المرور الخاصة بك</span>
                    <div class="form-group">
                        <label for="mobile"> <i class="fas fa-phone-alt"></i> رقم الجوال</label>

                        <div class="row w-100 phone-n">
                            <input class="form-control mr-sm-2 search-t col-lg" id="mobile" name="mobile" type="number" placeholder="ادخال رقم الجوال" aria-label="Search" v-model="mobile">
                            <span class="flag-img">(+966) <img src="../../assets/img/saudi-arabia.svg" alt=""></span>
                        </div> </div>
                    <div class="tab-button">
                        <button type="submit" class="btn" v-on:click.prevent="forgetPassword()">تأكيد</button>
                    </div>
                    <div class="tab-a"></div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import * as Swal from "sweetalert2";
import url from '../../main';

export default {
    data(){
        return{
            User:[],
            mobile: '',

        }
    },
    methods:{
        forgetPassword(){
          try {
            const token = sessionStorage.getItem('access_token_1');
            axios.post(url+'/api/auth/forget_password',
                {
                  mobile: this.mobile
                },
                {
                  headers: {
                    'Authorization': 'Bearer ' + token,
                    'X-localization': 'ar',
                  },
                })
                .then(res => {
                  if (res.data['status']['status'] === "success") {
                    this.User = res.data['status']['status'];
                    Swal.fire(
                        res.data['status']['status'],
                        'تم ارسال الكود الى رقم الجوال، تابع الرسائل',
                        'success'
                    );
                  } else {
                    Swal.fire(
                        res.data['status']['status'],
                        'خطأ في البيانات المدخلة',
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
        }
    }
}
</script>
