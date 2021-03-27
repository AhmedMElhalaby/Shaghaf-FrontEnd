<template>
    <div class="modal fade thanks" id="location" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body secound-m">
                    <p class="vc-m">السماح بتحديد الموقع</p>
                    <div class="tab-button">
                        <button type="submit" class="btn">موافق</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
export default {
  data(){
      return{
        message: sessionStorage.getItem('message'),
      }
  }
}
</script>
