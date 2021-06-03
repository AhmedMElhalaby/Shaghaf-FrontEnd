<template>
  <div class="modal fade collection-request" id="add_ticket" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="text-center">إضافة تذكرة جديدة</h5>
        <div class="modal-body secound-m">
          <span class="vc-m"> </span>
          <div class="container">
            <div class="form-group">
              <label for="title"></label>
              <input id="title" class="form-control mr-sm-2" type="text" placeholder="عنوان التذكرة" aria-label="number" v-model="title">
            </div>
            <div class="form-group">
              <label for="message"></label>
              <textarea id="message" class="form-control mr-sm-2" type="text" placeholder="تفاصيل التذكرة" aria-label="number" rows="4" v-model="message"></textarea>
            </div>
          </div>
          <div class="tab-button">
            <button type="submit" class="btn" id="dep" v-on:click.prevent="createTicket()">إضافة</button>
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
  name:'add_ticket',
  components:{
  },
  data(){
    return{
      title:'',
      message:'',
      Transaction:[],
    }
  },
  methods:{
    createTicket(){
      try {
        const token = sessionStorage.getItem('access_token_1');
        axios.post(url+'/api/tickets/store',
            {
              title: this.title,
              message: this.message,
            },
            {
              headers: {
                'Authorization': 'Bearer ' + token,
                'X-localization': 'ar',
              }
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                Swal.fire(
                    res.data['status']['status'],
                    'تم الحفظ بنجاح',
                    'success'
                );
                $('#add_ticket').modal('hide');
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
  }
}
</script>
