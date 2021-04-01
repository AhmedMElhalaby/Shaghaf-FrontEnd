<template>
    <section class="contact-us" id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 for-ltr">
                    <h5 class="text-right"><span class="text-con">تواصل معنا</span><span class="text-c"></span></h5>
                    <img class="fw-img login100-pic js-tilt" v-tilt data-tilt src="../../../assets/img/contact-us.svg" alt="">
                </div>
                <div class="col-lg-4 contact-us-f-t">
                    <div class="contact-us-f">
                        <span>عندك سؤال ؟</span>
                        <h2>تواصل معنا</h2>
                        <form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="اسمك" v-model="name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="البريد الاكتروني" v-model="email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="الموضوع" v-model="title">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="نص الرسالة" id="exampleFormControlTextarea1" rows="4" v-model="message"></textarea>
                                    </div>
                                    <button type="submit" class="btn" v-on:click.prevent="storeTicket()"><img src="../../../assets/img/mail-send.svg" alt=""> ارسال</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-1 login100-pic js-tilt" data-tilt><img src="../../../assets/img/test-1.svg" alt=""></div>
            </div>
        </div>
    </section>
</template>

<script>
import url from '../../../main';
import axios from "axios";
import * as Swal from "sweetalert2";
export default {
  name: 'contact',
  data(){
    return{
      Ticket:[],
      name:'',
      email:'',
      title:'',
      message:'',
    }
  },
  methods:{
    storeTicket(){
      try {
        axios.post(url+'/api/tickets/store',
            {
              name: this.name,
              email: this.email,
              title: this.title,
              message: this.message,
            },
            {
              headers:{
                'X-localization': 'ar',
              }
            })
            .then(res=>{
              if (res.data['status']['status'] === "success"){
                this.Ticket = res.data['Ticket'];
                Swal.fire(
                    res.data['status']['status'],
                    'تم الارسال بنجاح',
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
  },
}
</script>
