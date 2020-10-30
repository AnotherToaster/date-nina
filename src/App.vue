<template>
  <div id="main">
    <div class="main_wrapper">
      <div class="container">

        <contact-form/>

        <VideoComponent/>

        <ShareSocial/>

        <SiteFooter/>

        <modal name="info-modal"
               :adaptive="true"
               width="80%"
               :scrollable="true"
               :height="'auto'"
               :maxWidth="760"
               :styles="'overflow-y: scroll'"
               @before-close="beforeModalClose('info')">
          <info-modal/>
        </modal>

        <modal name="imprint-modal"
               :adaptive="true"
               width="80%"
               :height="'auto'"
               :maxWidth="640" :minHeight="450"
               @before-close="beforeModalClose('imprint')">
          <imprint-modal/>
        </modal>

        <modal name="privacy-modal"
               :adaptive="true"
               width="80%"
               :scrollable="true"
               :height="720"
               :maxWidth="760"
               :styles="'overflow-y: scroll'"
               @before-close="beforeModalClose('privacy')">
          <privacy-modal/>
        </modal>

        <modal name="contact-modal"
               :adaptive="true"
               width="80%"
               :height="'auto'"
               :maxWidth="760"
               @before-close="beforeModalClose('contact')">
          <contact-modal/>
        </modal>

      </div>
    </div>
  </div>
</template>

<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';
import VideoComponent from './components/videocomponent.vue';
import SiteFooter from './components/SiteFooter.vue';
import ShareSocial from './components/sharesocial.vue';
import InfoModal from "@/components/infoModal.vue";
import ImprintModal from "@/components/imprintModal.vue";
import PrivacyModal from "@/components/privacyModal.vue";
import ContactModal from "@/components/contactModal.vue";
import store from '@/store'

@Component({
  components: {
    VideoComponent,
    SiteFooter,
    ShareSocial,
    InfoModal,
    ImprintModal,
    PrivacyModal,
    ContactModal,
  },
})

export default class App extends Vue {

  mounted() {
    this.$modal.hideAll();
    if (this.showInfoModal) {
      this.$modal.show('info-modal')
    }
    if (this.showImprintModal) {
      this.$modal.show('contact-modal')
    }
    if (this.showPrivacyModal) {
      this.$modal.show('privacy-modal')
    }
    if (this.showContactModal) {
      this.$modal.show('contact-modal')
    }
    store.watch(
        (state) => {
          return state.showInfoModal
        }, () => {
            this.showModal('info')
          }
    )
    store.watch(
        (state) => {
          return state.showImprintModal
        }, () => {
            this.showModal('imprint')
        }
    )
    store.watch(
        (state) => {
          return state.showPrivacyModal
        }, () => {
            this.showModal('privacy')
        }
    )
    store.watch(
        (state) => {
          return state.showContactModal
        }, () => {
            this.showModal('contact')
        }
    )
    store.watch(
        (state) => {
          return state.sentContactForm
        }, (newValue, oldValue) => {
          if (newValue) {
            this.$store.dispatch('showContactSuccess', true);
          }
        }
    )
  }

  showModal(modal: string) {
    this.$modal.show(modal + '-modal')
  }

  get showInfoModal() {
    return this.$store.state.showInfoModal
  }

  get showImprintModal() {
    return this.$store.state.showImprintModal
  }

  get showPrivacyModal() {
    return this.$store.state.showPrivacyModal
  }

  get showContactModal() {
    return this.$store.state.showContactModal
  }
  beforeModalClose(modal: string) {
    if (modal === 'info') {
      this.$store.dispatch('showInfoModal', false);
    }
    if (modal === 'imprint') {
      this.$store.dispatch('showImprintModal', false);
    }
    if (modal === 'privacy') {
      this.$store.dispatch('showPrivacyModal', false);
    }
    if (modal === 'contact') {
      this.$store.dispatch('showContactModal', false);
    }
  }

}


</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
