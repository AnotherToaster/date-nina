<template>
  <div id="main">
    <div class="main_wrapper">
      <div class="container">

        <VideoComponent/>

        <ShareSocial/>

        <SiteFooter/>

        <modal name="info-modal"
               :adaptive="true"
               width="80%"
               :height="'auto'"
               :scrollable="true"
               :maxWidth="640" :minHeight="450">
          <info-modal/>
        </modal>

        <modal name="imprint-modal"
               :adaptive="true"
               width="80%"
               :height="'auto'"
               :maxWidth="640" :minHeight="450">
          <imprint-modal/>
        </modal>

        <modal name="privacy-modal"
               :adaptive="true"
               width="80%"
               :height="'auto'"
               :maxWidth="640" :minHeight="450">
          <privacy-modal/>
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
import store from '@/store'

@Component({
  components: {
    VideoComponent,
    SiteFooter,
    ShareSocial,
    InfoModal,
    ImprintModal,
    PrivacyModal,
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
