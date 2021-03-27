<template>
    <div class="modal fade change-sit" id="exampleModalCenter-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-header">
                    <p>تعديل بيانات الحساب</p>
                </div>
                <div class="modal-body secound-m">
                    <div class="form-group">
                        <label for="formGroupExampleInput"><i class="fas fa-user"></i> الاسم كاملا</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="ادخال الاسم كاملا" v-model="name">
                    </div>
                    <div class="form-group">
                        <label for="mobileNum"> <i class="fas fa-phone-alt"></i> رقم الجوال</label>

                        <div class="row w-100 phone-n">
                            <input class="form-control mr-sm-2 search-t col-lg" id="mobileNum" type="number" placeholder="ادخال رقم الجوال" aria-label="Search" v-model="mobile">
                            <span class="flag-img">(+966) <img src="../../assets/img/saudi-arabia.svg" alt=""></span>
                        </div> </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><i class="fas fa-envelope"></i> البريد الالكتروني</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ادخال البريد الالكتروني" v-model="email">
                    </div>
                    <div class="tab-button">
                        <button type="submit" class="btn" v-on:click.prevent="changeSetting()">حفظ التعديل</button>
                    </div>
                    <div class="tab-a"></div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
import axios from "axios";
import jquery from 'jquery';
import * as Swal from "sweetalert2";
import url from '../../main';

let $ = jquery;

export default {
  data(){
      return{
        User:[],
        name: '',
        mobile: '',
        email:'',

      }
  },
  created() {
  },
  methods:{
      changeSetting(){
        try {
          const token = sessionStorage.getItem('access_token_1');
          axios.post(url+'/api/auth/update',
              {
                arguments: {
                  name: this.name,
                  mobile: this.mobile,
                  email: this.email,
                }
              },
              {
                headers: {
                  'Authorization': 'Bearer ' + token
                }
              })
              .then(res => {
                if (res.data['status']['status']) {
                  this.User = res.data['User'];
                  $('#exampleModalCenter-4').modal('hide');
                  Swal.fire(
                      res.data['status']['status'],
                      'تم تحديث البيانات بنجاح',
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
