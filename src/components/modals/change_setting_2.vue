<template>
    <thanks_message></thanks_message>
    <location></location>
    <div class="modal fade change-sit acount-sitting-2" id="exampleModalCenter-5" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"><i class="fas fa-user"></i> نبذة شخصة</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="bio">عبدالله جرغون بكالوريوس تصميم عملت في العديد من الشركات وحصلت على العديد من المشاريع واعمل اعمل الان كفريلانسر عبر منصات العمل الحرمن الشركات وحصلت على العديد
                                        </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput1"><i class="fas fa-user"></i> الاسم كاملا</label>
                        <input type="text" class="form-control" id="formGroupExampleInput1" placeholder="" v-model="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <i class="fas fa-phone-alt"></i> رقم الجوال</label>

                        <div class="row w-100 phone-n">
                            <input class="form-control mr-sm-2 search-t col-lg" type="number" placeholder="" aria-label="Search" v-model="mobile">
                            <span class="flag-img">(+966) <img src="../../assets/img/saudi-arabia.svg" alt=""></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2"><i class="fas fa-envelope"></i> البريد الالكتروني</label>
                        <input type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="" v-model="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">المدينة</label>
                        <select class="form-control minimal" id="exampleFormControlSelect2">
                            <option>اختر مدينة</option>
                            <option v-for="(city, index) in Cities" :key="index" :value="city_id = city.id">{{city.name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><i class="fas fa-map-marker-alt"></i> الموقع</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="المملكة العربية السعودية - المدينة المنورة - شارع الملك عبد الله">
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="formGroupExampleInput"> رقم الايبان</label>
                            <input type="number" class="form-control" id="formGroupExampleInput" placeholder="" v-model="iban_number">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="exampleFormControlSelect1"> الجنس</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option :value="gender='1'">ذكر</option>
                                <option :value="gender= '2'">أنثى</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <h6 class="text-right">صورة الهوية الوطنية</h6>                                                                                                   <!-- Upload  -->
                          <form id="file-upload-form" class="">
                            <input id="file" type="file" ref="id_file" accept="image/*">
                          </form>
                        </div>
                    </div>
                  <div class="row">
                    <div class="form-group col-lg-6">
                      <label for="providerType"> نوع الحساب</label>
                      <select class="form-control" id="providerType" @change="onChange($event)">
                        <option>select</option>
                        <option value="1">حساب شخصي</option>
                        <option value="2">حساب شركة</option>
                      </select>
                    </div>
                  </div>
                  <div id="commercial" class="row" v-show="this.provider_type === '2'">
                      <div class="form-group col-lg-6">
                        <label for="formGroupExampleInput2">اسم الشركة</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" v-model="company_name">
                      </div>
                    <div class="form-group col-lg-6">
                      <h6 class="text-right"> صورة السجل التجاري</h6>                                                                                                   <!-- Upload  -->
                      <form id="file-c-cer" class="">
                        <input id="file_commercial" type="file" ref="cfile" accept="image/*">
                      </form>
                    </div>
                  </div>
                  <div id="maroof" class="row" v-show="this.provider_type === '1'">
                    <div class="form-group col-lg-6">
                      <h6 class="text-right"> صورة شهادة معروف</h6>                                                                                                   <!-- Upload  -->
                      <form id="file-m-cer" class="">
                        <input id="file_maroof" type="file" ref="mfile" accept="image/*">
                      </form>
                    </div>
                  </div>
                    <div class="tab-button">
                        <button type="submit" v-on:click.prevent="changeSetting2()" class="btn" data-toggle="modal" aria-label="Close" data-dismiss="modal">حفظ التعديل</button>
                    </div>
                    <div class="tab-a"></div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
import thanks_message from "@/components/modals/thanks_message";
import location from "@/components/modals/location";
import axios from "axios";
import jquery from 'jquery';
import Swal from "sweetalert2";
let $ = jquery;
import url from '../../main';

export default {
    components:{
        thanks_message,
        location,
    },
    data(){
      return{
        User:[],
        Cities:[],
        bio: '',
        name: '',
        mobile: '',
        email: '',
        country_id : '1',
        city_id : '1',
        gender :'',
        identity_image: '',
        iban_number :'',
        provider_type: "",
        company_name:'',
        commercial_cert:'',
        id_file :'',
        file_commercial: '',
        file_maroof:'',
        lat:'',
        lng: '',
      }
    },
  created() {
    this.getCurrentLocation();
    this.getCities();
  },
  methods:{
      changeSetting2(){
        try {
          let id_file = this.$refs.id_file.files[0];
          let file_commercial = this.$refs.cfile.files[0];
          let file_maroof = this.$refs.mfile.files[0];
          let formData = new FormData();
          formData.append('identity_image', id_file);
          formData.append('commercial_cert', file_commercial);
          formData.append('maroof_cert', file_maroof);
          formData.append('bio', this.bio);
          formData.append('name', this.name);
          formData.append('mobile','966'+ this.mobile);
          formData.append('email', this.email);
          formData.append('country_id', this.country_id);
          formData.append('city_id', this.city_id);
          formData.append('gender', this.gender);
          formData.append('iban_number', this.iban_number);
          formData.append('provider_type', this.provider_type);
          formData.append('company_name', this.company_name);
          formData.append('lat', this.lat);
          formData.append('lng', this.lng);
          const token = sessionStorage.getItem('access_token_1');
          axios.post(url+'/api/auth/update',
              formData,
              {
                headers: {
                  'Authorization': 'Bearer ' + token,
                  'X-localization': 'ar',
                }
              })
              .then(res => {
                if (res.data['status']['status'] === "success") {
                  this.User = res.data['User'];
                  $('#exampleModalCenter-5').modal('hide');
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
      },
      getProviderTypeValue(){
        let provider = document.getElementById('providerType');
        this.provider_type = provider;
        console.log(this.provider_type);
      },
      getCurrentLocation(){
        try {
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
              if ((!position.coords.latitude)|| (!position.coords.longitud)){
                console.log();
              }else {
                this.lat = position.coords.latitude ;
                this.lng = position.coords.longitude ;
              }
            }, function () {
              //alert('Please allow location');
            //  $('#location').modal('show');
              Swal.fire(
                  'Please allow location',
                  '',
                  'warning'
              );

            });
          } else {
            // Browser doesn't support Geolocation
            Swal.fire(
                'Please allow location',
                '',
                'warning'
            );
          }
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
                console.log(res.data['data']['Countries'][0]['Cities']);
              }else {
                console.log(res.data['status']['status']);
              }
            })
            .catch(e=>{
              console.log(e);
            })
      }catch (e){
        console.log(e);
      }
    },
    onChange(event) {
        this.provider_type = event.target.value;

    }
    }

}
</script>
