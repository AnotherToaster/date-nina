import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    showVideoControls: true,
    videoUrl: 'videos/step_1.mp4',
    videoMessages: {
      message1: 'NINA WARTET AUF EIN DATE MIT DIR. OB ES GUT LÄUFT ODER NICHT, ENTSCHEIDEST DU SELBST ...'
    },
    showChoices: false
  },
  mutations: {
  },
  actions: {
  },
  modules: {
  }
})
