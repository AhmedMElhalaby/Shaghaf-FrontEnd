<template>
    <div class="modal fade thanks" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body secound-m">
                    <div class="model-img login100-pic js-tilt" data-tilt><img src="../../assets/img/thanks.svg" alt=""></div>
                    <h4 class="vc-m">{{ this.message }}</h4>
                    <div class="tab-button">
                        <button type="submit" class="btn" data-toggle="modal" data-target="#exampleModalCenter-8" aria-label="Close" data-dismiss="modal">تقييم</button>
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
