<template>
  <div class="modal fade collection-request" id="exampleModalCenter-11" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="text-center">طلب تحصيل</h5>
        <div class="modal-body secound-m">
          <div class="model-img login100-pic js-tilt" data-tilt><img src="../../assets/img/col-req.svg" alt=""></div>
          <span class="vc-m">ر.س 800 </span>
          <div class="container">
            <div class="form-group">
              <label for="name"></label>
              <input id="name" class="form-control mr-sm-2" type="text" placeholder="الاسم" aria-label="name" v-model="name" required>
            </div>
            <div class="form-group">
              <label for="iban"></label>
              <input id="iban" class="form-control mr-sm-2" type="number" placeholder="رقم الايبان" aria-label="number" v-model="iban" required>
            </div>
            <div class="form-group">
              <label for="amount"></label>
              <input id="amount" class="form-control mr-sm-2" type="number" placeholder="800 ر.س" aria-label="amount" v-model="amount" required>
            </div>
            <div class="form-group">
              <label for="swift_code"></label>
              <input id="swift_code" class="form-control mr-sm-2" type="text" placeholder="سويفت كود" aria-label="swift_code" v-model="swift_code" required>
            </div>
            <div class="form-group">
              <label for="address"></label>
              <input id="address" class="form-control mr-sm-2" type="text" placeholder="العنوان الأول" aria-label="address" v-model="address_1" required>
            </div>
            <div class="form-group">
              <label for="address2"></label>
              <input id="address2" class="form-control mr-sm-2" type="text" placeholder="العنوان الثاني" aria-label="address2" v-model="address_2">
            </div>
            <div class="form-group">
              <label for="address3"></label>
              <input id="address3" class="form-control mr-sm-2" type="text" placeholder="العنوان الثالث" aria-label="address3" v-model="address_3">
            </div>

          </div>
          <div class="tab-button">
            <button type="submit" class="btn" v-on:click.prevent="refund()">طلب تحصيل</button>
          </div>
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
  name:'collection_request',
  data(){
    return{
      name:'',
      iban :'',
      swift_code : '',
      address_1 :'',
      amount : '',
      address_2 :'',
      address_3 :''
    }
  },
  methods:{
    refund(){
      try {
        const token = sessionStorage.getItem('access_token_1');
        axios.post(url+'/api/transactions/request_refund',
            {
              name : this.name,
              iban :this.iban,
              swift_code : this.swift_code,
              address_1 : this.address_1,
              amount : this.amount,
              address_2 : this.address_2,
              address_3 : this.address_3
            },
            {
              headers: {
                'Authorization': 'Bearer ' + token,
                'X-localization': 'ar',
              }
            })
            .then(res=>{
              if (res.data['status']['status'] === "success"){
                $('#exampleModalCenter-11').modal('hide');
                Swal.fire(
                    res.data['status']['status'],
                    'تمت العملية بنجاح',
                    'success'
                );
              }else {
                Swal.fire(
                    res.data['status']['status'],
                    'خطأ في البيانات المدخلة',
                    'error'
                );
              }
            })
            .catch(e=>{
              console.log(e);
            })
      }catch (e){
        console.log(e);
      }

    }
  }
}
</script>