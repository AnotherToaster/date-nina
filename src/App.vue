<template>
  <div id="main">
    <div class="bg_wrapper" v-bind:class="{screenBlur: $store.state.showContactModal || $store.state.showPrivacyModal || $store.state.showImprintModal || $store.state.showInfoModal}">
    </div>
    <div class="main_wrapper">

      <header>
      </header>

      <main class="container align-content-center">

        <div class="video_wrapper" v-bind:class="{screenBlur: $store.state.showContactModal || $store.state.showPrivacyModal || $store.state.showImprintModal || $store.state.showInfoModal}">
          <VideoComponent/>
        </div>

        <div class="social_wrapper">
          <ShareComponent/>
          <ContactForm/>
        </div>

      </main>

      <footer class="container">

        <div class="footer_wrapper" v-bind:class="{screenBlur: $store.state.showContactModal || $store.state.showPrivacyModal || $store.state.showImprintModal || $store.state.showInfoModal}">
          <FooterComponent/>
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
               @before-close="beforeModalClose('Info')">
          <info-modal/>
        </modal>
      </aside>

      <aside>
        <modal name="imprint-modal"
               :adaptive="true"
               width="80%"
               :height="'auto'"
               :maxWidth="640" :minHeight="450"
               @before-close="beforeModalClose('Imprint')">
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
               @before-close="beforeModalClose('Privacy')">
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
               @before-close="beforeModalClose('Contact')">
          <contact-modal/>
        </modal>
      </aside>

    </div>
  </div>
</template>

<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';
import VideoComponent from './components/video.component.vue';
import FooterComponent from './components/footer.component.vue';
import ShareComponent from './components/share.component.vue';
import InfoModal from "@/components/modale/info.modal.vue";
import ImprintModal from "@/components/modale/imprint.modal.vue";
import PrivacyModal from "@/components/modale/privacy.modal.vue";
import ContactModal from "@/components/modale/contact.modal.vue";
import store from '@/store'

@Component({
  components: {
    VideoComponent,
    FooterComponent,
    ShareComponent,
    InfoModal,
    ImprintModal,
    PrivacyModal,
    ContactModal,
  },
})

export default class App extends Vue {
  isFullScreen: boolean;
  videoELm: any;
  currentLanguage: string;

  constructor() {
    super();
    this.isFullScreen = this.$store.state.video.isFullScreen;
    this.videoELm = document.getElementById('video');
    this.currentLanguage = this.$store.state.currentLanguage;
  }

  mounted() {
    this.$modal.hideAll();
    if (this.showInfoModal) {
      this.$modal.show('info-modal')
    }
    if (this.showImprintModal) {
      this.$modal.show('imprint-modal')
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
    document.addEventListener('fullscreenchange', function () {
      if (!document.fullscreenElement && !document.webkitIsFullScreen && !document.mozFullScreen && !document.msFullscreenElement) {
        store.dispatch('isFullScreen');
      }
    })
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
    this.$store.dispatch('show' + modal + 'Modal', false);
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

//Variables

@transition-duration-blur: 0.2s;
@blur-depth: 10px;

header {
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
  background: url('/img/bg_main.jpg') no-repeat top center;
  background-position-y: -15vh;
  background-size: 75%;
  min-height: 110vh;
  position: absolute;
  transition: @transition-duration-blur;

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
.video_wrapper {
  transition: @transition-duration-blur;

}

.main_wrapper {
  padding: 0;
  min-height: 100vh;
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    padding: 0 10px;
  }
}

.modal_inner {
  background-image: linear-gradient(#292929, #000, #000 40%);
  padding: 30px;

  .modal_wrapper {

    p, h2, ul, h3, h4 {
      color: #fff;
      font-weight: bold;
    }

    h2 {
      font-size: 20px;
      line-height: 22px;
    }

    h3 {
      font-size: 16px;
      margin: 20px 0 10px 0;
    }

    p {
      font-size: 14px;
      line-height: 16px;
    }

    a {
      line-break: anywhere;
    }
  }

  .icn_close {
    top: -20px;
    right: 0;
    position: absolute;
    height: 25px;
    width: 25px;
    border: none;
    background: url('/img/icn_close.png') no-repeat;
    cursor: pointer;
  }
}

.footer_wrapper {
  vertical-align: top;
  padding-top: 15px;
  transition: @transition-duration-blur;
  border-top: #666 2px solid;

  a {
    font-size: 16px;
    margin: 5px 0 5px 0;
    cursor: pointer;
    text-decoration: none;
    color: #666;
    transition: @transition-duration-blur;

    @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
      font-size: 12px;
    }

    &:hover {
      color: #fff;
    }
  }

  a:not([href]) {
    text-decoration: none;
    color: #666;
    transition: @transition-duration-blur;

    &:hover {
      color: #fff;
    }
  }

  .logo_redCross {
    @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
      margin: 5px 0;
    }
  }

}

.screenBlur {
  filter: blur(6px);
}
</style>
