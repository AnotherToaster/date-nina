<template>
  <div class="row align-items-center">
    <div class="col-lg-2 col-md-3 col-12 logo_wrapper">
      <a href="https://www.roadcross.ch/" target="_blank">
        <img src="img/logo_roadcross.png" class="logo_redCross">
      </a>
    </div>
    <div class="col-lg-7 col-md-7 col-12">
      <div class="row">
        <div class="col-md-3 col-sm-2 col-auto d-flex justify-content-center">
          <a @click="showModal('Info')" id="info">{{ infoTitle }}</a>
        </div>
        <div class="col-md-3 col-sm-3 col-auto d-flex justify-content-start">
          <a @click="showModal('Imprint')" id="imprint">{{ imprintTitle }}</a>
        </div>
        <div class="col-md-5 col-sm-6 col-auto d-flex justify-content-start">
          <a @click="showModal('Privacy')" id="privacy">{{ privacyTitle }}</a>
        </div>
      </div>
    </div>
    <nav class="col-lg-3 col-md-2 col-12 justify-content-end d-flex align-items-center">
      <div class="col-md-2 col-sm-1 col-auto">
        <a id="de" href="/de">DE</a>
      </div>
      <div class="col-md-2 col-sm-1 col-auto">
        <a id="fr" href="/fr">FR</a>
      </div>
      <div class="col-md-2 col-sm-1 col-auto">
        <a id="it" href="/it">IT</a>
      </div>
    </nav>
  </div>
</template>

<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';

@Component
export default class FooterComponent extends Vue {
  content: any;
  currentLanguage: string;
  infoTitle: string;
  imprintTitle: string;
  privacyTitle: string;

  constructor() {
    super();
    this.content = this.$store.state.siteData.content;
    this.currentLanguage = this.$store.state.currentLanguage;
    this.infoTitle = this.content[this.currentLanguage]['footer'].info;
    this.imprintTitle = this.content[this.currentLanguage]['footer'].imprint;
    this.privacyTitle = this.content[this.currentLanguage]['footer'].privacy;
  }

  showModal(ModalType: string) {
    this.$store.dispatch('show' + ModalType + 'Modal', true);
  }
}
</script>

<style scoped lang="less">
</style>