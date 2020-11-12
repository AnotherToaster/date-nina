<template>
  <div class="row">
    <div class="col-12 align-items-center d-flex share_btn_wrapper mb-3 mb-sm-0">
      <button class="btn social_btn">
        <i class="fab fa-whatsapp"></i>
      </button>
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
export default class ShareSocial extends Vue {
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
.row {
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    align-items: flex-end;
  }
}

.share_btn {
  color: #000;
  text-transform: uppercase;
  margin-left: 10px;
  height: 45px;
  width: 250px;
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    font-size: 11px;
    height: 40px;
    width: 175px;
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
    @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
      height: 16px;
    }
  }
}

.social_btn {
  margin: 0 10px 0 0;
  color: #fff;
  font-size: 30px;
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    font-size: 25px;
  }
}


</style>