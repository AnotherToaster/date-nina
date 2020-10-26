import Vue from 'vue';
import App from './App.vue';
import store from './store';
import axios from 'axios';
import VModal from 'vue-js-modal'

Vue.config.productionTip = false

//load Config Json First
async function getSiteContent() {
  return await axios.get('./appConfigs.json');
}

getSiteContent().then(r => {
  Vue.use(VModal);
  new Vue({
    store,
    beforeCreate() {
      store.dispatch('siteContent', r.data);
    },
    render: h => h(App)
  }).$mount('#app')
});