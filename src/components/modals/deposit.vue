<template>
  <checkBalance></checkBalance>
  <div class="modal fade collection-request" id="deposit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="text-center">طلب ايداع</h5>
        <div class="modal-body secound-m">
          <div class="model-img login100-pic js-tilt" data-tilt><img src="../../assets/img/col-req.svg" alt=""></div>
          <span class="vc-m"> </span>
          <div class="container">
            <div class="form-group">
              <label for="balance"></label>
              <input id="balance" class="form-control mr-sm-2" type="number" placeholder="800 ر.س" aria-label="number" v-model="value">
            </div>
          </div>
          <div class="tab-button">
            <button type="submit" class="btn" id="dep" v-on:click.prevent="createTransaction()">ايداع</button>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import checkBalance from "@/components/modals/checkBalance";
import jquery from 'jquery';
import * as Swal from "sweetalert2";
let $ = jquery;
import url from '../../main';

export default {
  name:'deposit',
  components:{
    checkBalance,
  },
  data(){
    return{
      value:'',
      Transaction:[],
    }
  },
  methods:{
    createTransaction(){
      try {
        const token = sessionStorage.getItem('access_token_1');
        axios.post(url+'/api/transactions/generate_checkout',
            {
              value: this.value,
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
                sessionStorage.setItem('amount', this.value);
                $('#deposit').modal('hide');
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
    },
    checkBalance(){
      try {
        const token = sessionStorage.getItem('access_token_1');
        axios.get(url+'/api/transactions/my_balance',
            {
              headers: {
                'Authorization': 'Bearer ' + token,
                'X-localization': 'ar'
              }
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                this.Balance = res.data['Balance'];
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
  }
}
</script>