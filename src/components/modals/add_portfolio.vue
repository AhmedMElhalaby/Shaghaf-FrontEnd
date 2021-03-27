<template>
  <div class="modal fade collection-request" id="add_portfolio" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="text-center">اضافة نماذج أعمال</h5>
        <div class="modal-body secound-m">
          <div class="model-img login100-pic js-tilt" data-tilt><img src="../../assets/img/job-portfolio-1956296-1650459.png" alt="" style="width: 150px ;height:150px"></div>
          <span class="vc-m"> </span>
          <div class="container">
            <div class="form-group">
              <label for="type"> النوع:</label>
              <select class="form-control minimal" id="type" v-on:change="getPortfolioTypeValue()">
                <option>select</option>
                <option :value="1">1</option>
                <option :value="2">2</option>
              </select>
            </div>
            <div class="form-group">
            <label for="description">التفاصيل : </label>
              <textarea class="form-control" id="description" rows="3" v-model="description">تفاصيل نموذج العمل</textarea>
          </div>
          <div class="form-group" v-show="this.type === '1'">
          <label for="file">الصورة : </label>
            <form id="file-upload-form" class="">
              <input id="file" ref="file" type="file" name="fileUpload" accept="image/*"/>
            </form>
        </div>
            <div class="form-group" v-show="this.type === '2'">
              <label for="file">الفيديو</label>
                <input id="video" class="form-control" type="text" name="video" value="" placeholder="أدخل رابط الفيديو"/>
            </div>
          </div>
          <div class="tab-button">
            <button type="submit" class="btn" id="dep" v-on:click.prevent="addPortfolio()">اضافة</button>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import * as Swal from "sweetalert2";
import jquery from 'jquery';
let $ = jquery;
import url from '../../main';

export default {
  name:'add_portfolio',
  data(){
    return{
      Portfolio:[],
      type:'',
      description:'',
      image:'',
      file:'',

    }
  },
  created() {

  },
  methods:{
    addPortfolio(){
      try {
        let file = this.$refs.file.files[0];
        let formData = new FormData();
        formData.append('media', file);
        formData.append('type', this.type);
        formData.append('description', this.description);
        console.log(file);
        const token = sessionStorage.getItem('access_token_1');
        axios.post(url+'/api/portfolios/store',
            formData,
            {
              headers: {
                'Authorization': 'Bearer ' + token,
                'X-localization': 'ar',
              }
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                $('#add_portfolio').modal('hide');
                Swal.fire(
                    res.data['status']['status'],
                    'تمت الاضافة بنجاح',
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
    getPortfolioTypeValue(){
      var PortfolioType = document.getElementById('type').value;
      this.type = PortfolioType;
    }
  }
}
</script>