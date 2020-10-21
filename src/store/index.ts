import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    showVideoControls: true,
    videoUrl: 'videos/step_1.mp4',
    showChoices: false,
    siteData: [],
  },
  mutations: {
    siteContent(state, data) {
      state.siteData = data;
    },
  },
  actions: {
    siteContent(context, data) {
      context.commit('siteContent', data);
    }
  },
  modules: {
  }
})
