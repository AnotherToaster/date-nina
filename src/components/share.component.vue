<template>
  <div class="row share_btn_wrapper align-items-center" v-bind:class="{screenBlur: $store.state.showContactModal || $store.state.showPrivacyModal || $store.state.showImprintModal || $store.state.showInfoModal}">
    <div class="col-12 mb-3 mb-md-0 col-sm-12 col-md-7 col-lg-7 align-items-center d-flex">
      <iframe
          src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Froadcrossschweiz&width=320&layout=button&action=like&size=large&share=false&height=65&appId=3201352483304550"
          width="175" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
          allowfullscreen="true"
          allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
    </div>
    <div class="col-12 col-sm-12 justify-content-sm-start col-md-5 align-items-center justify-content-md-end col-lg-5 d-flex justify-content-start mb-3">
      <button class="btn btn-light share_btn" data-toggle="modal"
              data-target="#contact_modal" @click="showModal('Contact')">
        <img src="/favicon.ico" class="share_btn_heart">
        {{ shareBtnTitle }}
      </button>
    </div>
  </div>
</template>

<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';

@Component
export default class ShareComponent extends Vue {
  siteContent: Array<string>;
  content: any;
  currentLanguage: string;
  shareBtnTitle: string;

  constructor() {
    super();
    this.siteContent = this.$store.state.siteData;
    this.content = this.$store.state.siteData.content;
    this.currentLanguage = this.$store.state.currentLanguage;
    this.shareBtnTitle = this.content[this.currentLanguage]['ShareBtn'];
  }

  showModal(ModalType: string) {
    this.$store.dispatch('show' + ModalType + 'Modal', true);
  }
}
</script>

<style scoped lang="less">

//Variables

@transition-duration-blur: 0.2s;
@blur-depth: 10px;


.row {
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    align-items: flex-end;
  }
}


.share_btn_wrapper {
  min-height: 6vh;
  transition: @transition-duration-blur;
  @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
    min-height: 11vh;

  }
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    min-height: 15vh;

  }
}


.share_btn {
  color: #000;
  text-transform: uppercase;
  margin-left: 10px;
  height: 45px;
  max-width: 320px;
  @media (max-width: 1200px) and (-webkit-min-device-pixel-ratio: 2) {
    font-size: 11px;
    height: 40px;
    margin-left: 0;
  }
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    font-size: 11px;
    height: 40px;
    max-width: 210px;
    margin-left: 0;
  }

  &:hover {
    .share_btn_heart {
      transform: scale(1.1);
    }
  }

  .share_btn_heart {
    padding: 0 10px 0 0;
    height: 25px;
    transition: 0.5s;
    @media (max-width: 1200px) and (-webkit-min-device-pixel-ratio: 2) {
      height: 18px;
    }
    @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
      height: 16px;
    }
  }
}


</style>