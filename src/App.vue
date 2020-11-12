<template>
  <div id="main">
    <div class="bg_wrapper">
    </div>
    <div class="main_wrapper">

        <header>
        </header>

        <main class="container align-content-center">
            <div id="videoComponent" class="video_grid">
              <VideoComponent/>
            </div>

            <div id="shareSocial" class="shareSocial_grid">
              <ShareSocial/>
              <contact-form/>
            </div>
        </main>

        <footer class="container align-content-end">
            <div id="siteFooter" class="siteFooter_grid">
              <SiteFooter/>
            </div>
        </footer>

        <aside>
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
        </aside>

        <aside>
          <modal name="imprint-modal"
                 :adaptive="true"
                 width="80%"
                 :height="'auto'"
                 :maxWidth="640" :minHeight="450"
                 @before-close="beforeModalClose('imprint')">
            <imprint-modal/>
          </modal>
        </aside>

        <aside>
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
        </aside>

        <aside>
          <modal name="contact-modal"
                 :adaptive="true"
                 :scrollable="true"
                 width="80%"
                 :height="'auto'"
                 :maxWidth="760"
                 :styles="'overflow-y: scroll; background-image: linear-gradient(#292929, #000, #000 40%);'"
                 @before-close="beforeModalClose('contact')">
            <contact-modal/>
          </modal>
        </aside>

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

<style lang="less">
html {
  background: #000;
}

body {
  background: #000;
}

header {
  grid-area: header;
  min-height: 20vh;
  @media (max-width: 1024px) and (-webkit-min-device-pixel-ratio: 2) {
    min-height: 30vh;
  }
  @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
    min-height: 25vh;
  }
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    min-height: calc((100vh - 356px) / 2);
  }
}

.bg_wrapper {
  width: 100%;
  background: url('http://127.0.0.1:8080/img/bg_main.jpg') no-repeat top center;
  background-position-y: -15vh;
  background-size: 75%;
  min-height: 110vh;
  position: absolute;
  @media (max-width: 1024px) and (-webkit-min-device-pixel-ratio: 2) {
    background-position-y: 0;
    min-height: 100vh;
    background-size: 170%;
    background-position-x: -17vh;
  }
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    background-position-y: 1vh;
    background-size: 170%;
    background-position-x: -14vh;
  }
}


.main_wrapper {
  display: grid;
  grid-template-areas:
    'header'
    'main'
    'footer';
  padding: 0;
  min-height: 100vh;
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    padding: 0 10px;
  }
}

.video_grid {
  grid-area: main;
}

.shareSocial_grid {
  grid-area: video;
  min-height: 13vh;
  display: flex;
  justify-content: flex-end;
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    min-height: 19vh;

  }


}


</style>
