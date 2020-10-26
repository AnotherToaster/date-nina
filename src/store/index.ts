import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    showVideoControls: true,
    videoUrl: 'videos/step_1.mp4',
    showChoices: false,
    isEnd: false,
    isHappyEnd: false,
    showInfoModal: false,
    showImprintModal: false,
    showPrivacyModal: false,
    siteData: [],
  },
  mutations: {
    siteContent(state, data) {
      state.siteData = data;
    },
    showInfoModal(state, data) {
      state.showInfoModal = data;
    },
    showImprintModal(state, data) {
      state.showImprintModal = data;
    },
    showPrivacyModal(state, data) {
      state.showPrivacyModal = data;
    },
  },
  actions: {
    siteContent(context, data) {
      context.commit('siteContent', data);
    },
    showInfoModal(context, data) {
      context.commit('showInfoModal', data)
    },
    showImprintModal(context, data) {
      context.commit('showImprintModal', data)
    },
    showPrivacyModal(context, data) {
      context.commit('showPrivacyModal', data)
    },
  },
  modules: {
  }
})
