<template>
  <div class="modal fade collection-request" id="check_balance" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="text-center"> تحذير </h5>
        <div class="modal-body secound-m">
          <div class="model-img login100-pic js-tilt" data-tilt><img src="../../assets/img/386px-Ambox_warning_yellow.svg.png" style="height: 150px; width: 150px;" alt=""></div>
          <span class="vc-m"> </span>
          <div class="container">
            <div>
              <h3> لا يوجد لديك رصيد كافي </h3>
            </div>
            <div class="tab-button">
              <button type="submit" class="btn" id="dep" v-on:click.prevent="goToCard()">انتقل للبطاقة</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>

import axios from "axios";
import Swal from "sweetalert2";
import jquery from 'jquery';
let $ = jquery;
import url from '../../main';

export default {
  name:'check_balance',
  methods:{
    goToCard(){
      try {
        const token = sessionStorage.getItem('access_token_1');
        axios.post(url+'/api/transactions/generate_checkout',
            {
              value: sessionStorage.getItem('amount'),
            },
            {
              headers: {
                'Authorization': 'Bearer ' + token,
                'X-localization': 'ar',
              }
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                const transaction_id = res.data['Transaction']['id'];
                const payment_token = res.data['Transaction']['payment_token'];
                sessionStorage.setItem('transaction_id', transaction_id);
                sessionStorage.setItem('payment_token', payment_token);
                $('#check_balance').modal('hide');
                this.$router.push('/payment');
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