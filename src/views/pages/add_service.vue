<template>
<add_order></add_order>
    <!-- start wrapper -->
    <div class="wrapper">
        <div class="container">
            <div class="sevice-user orders add-orders">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">خدماتي</li>
                    </ol>
                </nav>
                <div class="row justify-content-end">
                    <div class="add-serv col-lg-2"  v-tilt>
                        <button type="submit" class="btn" data-toggle="modal" data-target="#exampleModalCenter-9" aria-label="Close" data-dismiss="modal"><i class="fas fa-plus-circle"></i> إضافة خدمة</button>
                    </div>
                </div>
                <services></services>
            </div>
        </div>
    </div>

</template>
<script>
import services from "@/components/sections/add_service/services";
import add_order from "@/components/modals/add_order";

export default {
    name:'add_service',
    mounted() {
        console.log('Add Service mounted.')
    }
  ,
  components:{
      services,
      add_order,
  },
  data(){
      return {
      }
  },
}
</script>
