
import { createApp } from 'vue'
import App from './App.vue'
import store from './store'
import router from './router'
import FileUpload from 'v-file-upload'
import VueTilt from 'vue-tilt.js'
import Bootstrap from 'bootstrap'
import jquery from 'jquery'
import vmApp from './App.vue'
import '../src/assets/js/head.js';
let url = 'https://app.passionplatforms.com';
export default url;

createApp(App).config.productionTip = false


createApp(App).use(vmApp).use(router).use(store).use(VueTilt).use(Bootstrap).use(jquery).use(FileUpload).mount('#app');
