<template>
  <div class="modal_inner" id="privacyModal">
    <div class="row">
      <div class="col-12 d-flex justify-content-end">
        <button class="btn btn-light icn_close" @click="closeModal('Privacy')"></button>
      </div>
    </div>
    <div class="container">
      <div class="modal_wrapper">
        <div class="row">
          <div class="col-12">
            <h2>{{ title }}</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h3>{{ subtitle1 }}</h3>
            <p>{{ subtitle1Text }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h3>{{ subtitle2 }}</h3>
            <p>{{ subtitle2Text1 }}</p>
            <p>{{ subtitle2Text2 }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h3>{{ infoLinkText1 }}</h3>
            <a target="_blank" v-bind:href="infoLink1">{{ infoLink1 }}</a>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h3>{{ infoLinkText2 }}</h3>
            <a target="_blank" v-bind:href="infoLink2">{{ infoLink2 }}</a>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h3>{{ logFileTitle }}</h3>
            <p>{{ logFileText }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h3>Kontakt:</h3>
            <p class="client_address">
              {{ addressTitle }}<br>
              {{ addressCity }}<br>
              {{ addressTel }}<br>
              {{ addressFax }}<br>
              E-Mail: <a href="mailto:info@roadcross.ch">{{ email }}</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';

@Component
export default class PrivacyModal extends Vue {
  contact: Array<string>;
  privacyModal: any;
  title: string;
  subtitle1: string;
  subtitle2: string;
  subtitle1Text: string;
  addressTitle: string;
  addressCity: string;
  addressTel: string;
  addressFax: string;
  email: string;
  subtitle2Text1: string;
  subtitle2Text2: string;
  infoLinkText1: string;
  infoLink1: string;
  infoLinkText2: string;
  infoLink2: string;
  logFileTitle: string;
  logFileText: string;
  currentLanguage: string;

  constructor() {
    super();
    this.currentLanguage = this.$store.state.currentLanguage;
    this.contact = this.$store.state.siteData.contact;
    this.addressTitle = this.contact[this.currentLanguage].addressTitle;
    this.addressCity = this.contact[this.currentLanguage].addressCity;
    this.addressTel = this.contact[this.currentLanguage].addressTel;
    this.addressFax = this.contact[this.currentLanguage].addressFax;
    this.email = this.contact[this.currentLanguage].email;
    this.privacyModal = this.$store.state.siteData.modal.privacyModal;
    this.title = this.privacyModal.title;
    this.subtitle1 = this.privacyModal.subtitle1;
    this.subtitle2 = this.privacyModal.subtitle2;
    this.subtitle1Text = this.privacyModal.subtitle1Text;
    this.subtitle2Text1 = this.privacyModal.subtitle2Text1;
    this.subtitle2Text2 = this.privacyModal.subtitle2Text2;
    this.infoLinkText1 = this.privacyModal.infoLinkText1;
    this.infoLink1 = this.privacyModal.infoLink1;
    this.infoLinkText2 = this.privacyModal.infoLinkText2;
    this.infoLink2 = this.privacyModal.infoLink2;
    this.logFileTitle = this.privacyModal.logFileTitle;
    this.logFileText = this.privacyModal.logFileText;
  }

  closeModal(modal: string) {
    this.$modal.hide('privacy-modal')
    this.$store.dispatch('show' + modal + 'Modal', false);
  }
}

</script>

<style scoped>

</style>