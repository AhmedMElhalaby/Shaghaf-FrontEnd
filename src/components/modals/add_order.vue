<template>
    <div class="modal fade add-o" id="exampleModalCenter-9" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-header">
                    <p>إضافة خدمة</p>
                </div>
                <div class="modal-body secound-m">
                    <div class="form-group">
                        <label for="categories">الخدمة الرئيسية</label>
                        <select class="form-control minimal" id="categories" v-on:change.prevent="addSubCategories()">
                          <option>select</option>
                          <option v-for="(category, index) in Categories" :key="index" :class="{'selected': index === 0}" :value="category_id = category.id">{{ category.name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategories">الخدمة الفرعية</label>
                        <select class="form-control minimal" id="subcategories">
                          <option >select</option>
                          <option v-for="(subcategory, index) in SubCategories" :key="index" :value="sub_category_id = subcategory.id">
                            {{ subcategory['name'] }}</option>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput"> إسم الخدمة</label>
                        <input type="text" class="form-control" id="formGroupExampleInput1" placeholder="تصميم منازل" v-model="name">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput"> نوع الخدمة</label>
                      <select class="form-control minimal" id="exampleFormControlSelect3">
                        <option :value="type = 1">خدمات</option>
                        <option :value="type = 1">منتجات</option>
                      </select>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput"> السعر</label>
                        <input type="number" class="form-control" id="formGroupExampleInput" placeholder="550 ر.س" v-model="price">
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"> الوصف</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" v-model="description">تصميم فيلا على برنامج اليستريتور
                                        </textarea>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <h6 class="text-start">صورة الخدمة</h6>                                                                          <!-- Upload  -->
                          <form id="file-upload-form" class="">
                          <input id="files" ref="files" multiple type="file" name="fileUpload" accept="image/*"/>
                        </form>
                      </div>
                    </div>
                    <div class="tab-button">
                        <button type="submit" class="btn" v-on:click.prevent="addService()">اضافة</button>
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
let $ = jquery;
import url from '../../main';

export default {
    data(){
        return{
          Categories:[],
          SubCategories: [],
          product:[],
          Products:[],
          name:'',
          description:'',
          category_id: '',
          sub_category_id:'',
          price:'',
          type:null,
          files: '',
        }
    },
    created() {
      this.fetchAllCategories();
    },
  methods: {
    fetchAllCategories() {
      try {
        axios.get(url+'/api/home/categories',
            {
              headers: {
                'X-localization': 'ar',
              }
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                this.Categories = res.data['Categories'];
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
    addService() {
      try {
        this.files = this.$refs.files.files;
        let formData = new FormData();
        for (var i = 0; i < this.files.length; i++) {
          let file = this.files[i];
          formData.append('media[' + i + ']', file);
        }
        formData.append('name', this.name);
        formData.append('description', this.description);
        formData.append('category_id', this.category_id);
        formData.append('sub_category_id', this.sub_category_id);
        formData.append('price', this.price);
        formData.append('type', this.type);
        const token = sessionStorage.getItem('access_token_1');
        axios.post(url+'/api/products/store',
            formData,
            {
              headers: {
                'Authorization': 'Bearer ' + token,
                'X-localization': 'ar',
              },
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                this.Product = res.data['Product'];
                $('#exampleModalCenter-9').modal('hide');
                Swal.fire(
                    res.data['status']['status'],
                    'تمت اضافة الخدمة بنجاح',
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
    addSubCategories() {
      try {
        var select = document.getElementById('categories').value;
        axios.get(url+'/api/home/categories',
            {
              headers: {
                'X-localization': 'ar',
              }
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                this.SubCategories = res.data['Categories'][select - 1]['SubCategories'];
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
