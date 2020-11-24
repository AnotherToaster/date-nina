<template>
  <div class="modal_inner">
    <div class="row">
      <div class="col-12 d-flex justify-content-end">
        <button class="btn btn-light icn_close" @click="closeModal('Imprint')"></button>
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
            <h3>{{ introText }}</h3>
            <p class="client_address">
              {{ addressTitle }}<br>
              {{ addressCity }}<br>
              {{ addressTel }}<br>
              {{ addressFax }}<br>
              E-Mail: <a href="mailto:info@roadcross.ch">{{ email }}</a>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h3>{{ subtitle }}</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <p>{{ subtitleText }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';

@Component
export default class ImprintModal extends Vue {
  contact: Array<string>;
  imprintModal: any;
  title: string;
  subtitle: string;
  subtitleText: string;
  introText: string;
  addressTitle: string;
  addressCity: string;
  addressTel: string;
  addressFax: string;
  email: string;
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
    this.imprintModal = this.$store.state.siteData.modal.imprintModal;
    this.title = this.imprintModal[this.currentLanguage].title;
    this.subtitle = this.imprintModal[this.currentLanguage].subtitle;
    this.subtitleText = this.imprintModal[this.currentLanguage].subtitleText;
    this.introText = this.imprintModal[this.currentLanguage].introText;
  }

  closeModal(modal: string) {
    this.$modal.hide('imprint-modal')
    this.$store.dispatch('show' + modal + 'Modal', false);
  }
}

</script>

<style scoped>

</style>