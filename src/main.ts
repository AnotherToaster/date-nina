import Vue from 'vue';
import App from './App.vue';
import store from './store';
import axios from 'axios';
import VModal from 'vue-js-modal'
import Contact from '@/components/contact.vue'

Vue.config.productionTip = false

//load Config Json First
async function getSiteContent() {
  store.commit('currentLanguage', document.documentElement.lang ? document.documentElement.lang : 'de');
  return await axios.get('./appConfigs.json');
}
getSiteContent().then(r => {
  Vue.use(VModal);
  Vue.component("contact-form", Contact);
  new Vue({
    store,
    beforeCreate() {
      store.dispatch('siteContent', r.data);
    },
    render: h => h(App)
  }).$mount('#app')
});

