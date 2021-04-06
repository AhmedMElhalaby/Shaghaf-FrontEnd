<template>

    <!-- start wrapper -->
    <div class="wrapper">
        <carosel_section v-bind:Advertisements="Advertisements"></carosel_section>

        <about_section v-bind:about_us="about_us"></about_section>

        <services_section v-bind:Categories="Categories"></services_section>

        <most_wanted_section v-bind:Categories="Categories"></most_wanted_section>

        <said_section></said_section>

        <goals_section v-bind:goals="goals"></goals_section>

        <contact_section></contact_section>

    </div>
</template>
<script>

import carosel_section from "@/components/sections/home/carosel_section.vue";
import services_section from "@/components/sections/home/services_section.vue";
import about_section from "@/components/sections/home/about_section.vue";
import most_wanted_section from "@/components/sections/home/most_wanted_section.vue";
import said_section from "@/components/sections/home/said_section.vue";
import goals_section from "@/components/sections/home/goals_section.vue";
import contact_section from "@/components/sections/home/contact_section.vue";
// import axios from "axios";

// import url from "@/main";

export default {
  name: 'shaghaf',
  props:['Install'],
  components: {
    carosel_section,
    about_section,
    services_section,
    most_wanted_section,
    said_section,
    goals_section,
    contact_section,
  },
  data() {
    return {
      about_us :'',
      goals :'',
      Advertisements :[],
      Categories :[],
    }
  },
  mounted() {
    setTimeout(() => {
      console.log(this.Install);
      this.about_us =this.Install['Settings']['about'];
      this.goals =this.Install['Settings']['goals'];
      this.Advertisements =this.Install['Advertisements'];
      this.Categories =this.Install['Categories'];
    }, 1000);

  },
  methods:{
  }
}
</script>
