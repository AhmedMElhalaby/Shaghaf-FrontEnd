<template>
  <div class="modal fade collection-request" id="error" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="text-center"> خطأ </h5>
        <div class="modal-body secound-m">
          <div class="model-img login100-pic js-tilt" data-tilt><img src="../../assets/img/386px-Ambox_warning_yellow.svg.png" style="height: 150px; width: 150px;" alt=""></div>
          <span class="vc-m"> </span>
          <div class="container">
            <div>
              <h3> الملف الذي قمت باختياره غير صالح </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>

export default {
  name:'error',
}
</script>