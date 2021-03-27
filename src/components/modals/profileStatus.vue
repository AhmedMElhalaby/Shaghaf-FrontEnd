<template>
    <div class="modal fade thanks" id="profile_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body secound-m">
                    <div class="model-img login100-pic js-tilt" data-tilt><img src="../../assets/img/images.png" alt="" style="width: 150px; height: 150px;"></div>
                    <p class="vc-m">يرجى العلم أن بياناتك غير مكتملة ، سوف تتمكن من اضافة منتجاتك و خدماتك ، و لكنك لن تظهر للمستخدمين الا بعد اكمال بياناتك
                    </p>
                    <div class="tab-button">

                          <button type="submit" class="btn" v-on:click="hideModal()">
                            <router-link to="/my_account_2">
                              اكمال بياناتي
                            </router-link>
                          </button>

                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
import jquery from 'jquery';
let $ = jquery;
export default {
  name: 'profile_status',
  methods:{
    hideModal(){
      $('#profile_status').modal('hide')
    }
  }
}
</script>
