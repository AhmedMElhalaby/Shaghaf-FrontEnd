<template>

    <!-- start wrapper -->
    <div class="wrapper">
        <carosel_section></carosel_section>

        <about_section></about_section>

        <services_section></services_section>

        <most_wanted_section></most_wanted_section>

        <said_section></said_section>

        <goals_section></goals_section>

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

export default {
  name: 'shaghaf',
  components: {
    carosel_section,
    about_section,
    services_section,
    most_wanted_section,
    said_section,
    goals_section,
    contact_section,
  },
}
</script>
