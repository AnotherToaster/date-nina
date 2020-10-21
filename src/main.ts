import Vue from 'vue';
import App from './App.vue';
import store from './store';
import axios from 'axios';

Vue.config.productionTip = false

//load Config Json First
async function getSiteContent() {
  return await axios.get('http://localhost:8080/appConfigs.json');
}

getSiteContent().then(r => {
  new Vue({
    store,
    beforeCreate() {
      store.dispatch('siteContent', r.data.url1);
    },
    render: h => h(App)
  }).$mount('#app')
});