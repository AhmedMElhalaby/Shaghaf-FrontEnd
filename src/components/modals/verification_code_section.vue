<template>
    <div class="modal fade" id="exampleModalCenter-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-header">
                    <p>تأكيد رقم الهاتف</p>
                </div>
                <div class="modal-body secound-m">
                    <div class="model-img login100-pic js-tilt" data-tilt><img src="../../assets/img/verification-code.svg" alt=""></div>
                    <span class="vc-m">يرجى إدخال الرمز المرسل الى رقم الجوال {{ User.mobile }}</span>
                    <div class="v-code-main">
                        <div class="vcode" id="vcode">
                          <input type="phone" class="vcode-input" maxlength="1" id="vcode1" v-model="code1">
                          <input type="phone" class="vcode-input" maxlength="1" v-model="code2">
                          <input type="phone" class="vcode-input" maxlength="1" v-model="code3">
                          <input type="phone" class="vcode-input" maxlength="1" v-model="code4">
                        </div>
                    </div>
                    <div class="tab-button">
                        <button type="submit" class="btn" v-on:click.prevent="verification()">تأكيد</button>
                    </div>
                    <div class="tab-a"> <span> لم يتم ارسال الكود <a style="cursor: pointer" v-on:click="resendVerification()"> اعادة الارسال </a></span></div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import jquery from 'jquery';
import * as Swal from "sweetalert2";
let $ = jquery;
import url from '../../main';

export default {
    data(){
        return{
            User:[],
            mobile: '',
            type: 2,
            code1: '',
            code2: '',
            code3: '',
            code4: '',
        }
    },
    methods:{
        verification(){
          try {

            console.log(this.code1+this.code2+this.code3+this.code4);
            const token = sessionStorage.getItem('access_token_1');
            axios.post(url+'/api/auth/verify',
                {
                  code: this.code1+this.code2+this.code3+this.code4,
                  type: this.type,
                },
                {
                  headers: {
                    'Authorization': 'Bearer ' + token,
                    'X-localization': 'ar'
                  }
                })
                .then(res => {
                  if (res.data['status']['status'] === "success") {
                    $('#exampleModalCenter-2').modal('hide');
                    $('#success').modal('show');
                    Swal.fire(
                        res.data['status']['status'],
                        'تم التفعيل بنجاح',
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
        },
        resendVerification(){
          try {
            const token = sessionStorage.getItem('access_token_1');
            axios.get(url+'/api/auth/resend_verify',
                {
                  headers: {
                    'Authorization': 'Bearer ' + token,
                    'X-localization': 'ar',
                  },
                  params: {
                    type: this.type
                  }
                })
                .then(res => {
                  sessionStorage.setItem('message', res.data['status']['message']);
                  if (res.data['status']['status'] === "success") {
                    $('#exampleModalCenter-2').modal('hide');
                    Swal.fire(
                        res.data['status']['status'],
                        'تم ارسال رمز التفعيل',
                        'success'
                    );
                  } else {
                    Swal.fire(
                        res.data['status']['status'],
                        'خطأ في البيانات المدخلة',
                        'error'
                    );
                  }
                  $('#success').modal();
                })
                .catch(e => {
                  console.log(e);
                })
          }catch (e){
            console.log(e);
          }
        }
    },
  created() {
      $(document).ready(function (){
        let $inputs = $("#vcode").find("input");
        //bind events
        $inputs.on('keyup', processInput);
        //define methods
        function processInput(e) {
          let x = e.charCode || e.keyCode;
          if( (x === 8 || x === 46) && this.value.length === 0) {
            let indexNum = $inputs.index(this);
            if(indexNum !== 0) {
              $inputs.eq($inputs.index(this) - 1).focus();
            }
          }

          if( ignoreChar(e) )
            return false;
          else if (this.value.length === this.maxLength) {
            $(this).next('input').focus();
          }
        }
        function ignoreChar(e) {
          let x = e.charCode || e.keyCode;
          return x === 37 || x === 38 || x === 39 || x === 40;
        }
      })
  }
}
</script>
