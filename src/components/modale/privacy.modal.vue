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
            <h2>{{ Title }}</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h3>{{ Subtitle1 }}</h3>
            <p>{{ Subtitle1Text }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h3>{{ Subtitle2 }}</h3>
            <p>{{ Subtitle2Text1 }}</p>
            <p>{{ Subtitle2Text2 }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h3>{{ InfoLinkText1 }}</h3>
            <a target="_blank" v-bind:href="InfoLink1">{{ InfoLink1 }}</a>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h3>{{ InfoLinkText2 }}</h3>
            <a target="_blank" v-bind:href="InfoLink2">{{ InfoLink2 }}</a>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h3>{{ LogFileTitle }}</h3>
            <p>{{ LogFileText }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h3>Kontakt:</h3>
            <p class="client_address">
              {{ AddressTitle }}<br>
              {{ AddressCity }}<br>
              {{ AddressTel }}<br>
              {{ AddressFax }}<br>
              E-Mail: <a href="mailto:info@roadcross.ch">{{ Email }}</a>
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
  Contact: Array<string>;
  PrivacyModal: any;
  Title: string;
  Subtitle1: string;
  Subtitle2: string;
  Subtitle1Text: string;
  AddressTitle: string;
  AddressCity: string;
  AddressTel: string;
  AddressFax: string;
  Email: string;
  Subtitle2Text1: string;
  Subtitle2Text2: string;
  InfoLinkText1: string;
  InfoLink1: string;
  InfoLinkText2: string;
  InfoLink2: string;
  LogFileTitle: string;
  LogFileText: string;

  constructor() {
    super();
    this.Contact = this.$store.state.siteData.contact;
    this.AddressTitle = this.$store.state.siteData.contact.addressTitle;
    this.AddressCity = this.$store.state.siteData.contact.addressCity;
    this.AddressTel = this.$store.state.siteData.contact.addressTel;
    this.AddressFax = this.$store.state.siteData.contact.addressFax;
    this.Email = this.$store.state.siteData.contact.email;
    this.PrivacyModal = this.$store.state.siteData.modal.privacyModal;
    this.Title = this.PrivacyModal.title;
    this.Subtitle1 = this.PrivacyModal.subtitle1;
    this.Subtitle2 = this.PrivacyModal.subtitle2;
    this.Subtitle1Text = this.PrivacyModal.subtitle1Text;
    this.Subtitle2Text1 = this.PrivacyModal.subtitle2Text1;
    this.Subtitle2Text2 = this.PrivacyModal.subtitle2Text2;
    this.InfoLinkText1 = this.PrivacyModal.infoLinkText1;
    this.InfoLink1 = this.PrivacyModal.infoLink1;
    this.InfoLinkText2 = this.PrivacyModal.infoLinkText2;
    this.InfoLink2 = this.PrivacyModal.infoLink2;
    this.LogFileTitle = this.PrivacyModal.logFileTitle;
    this.LogFileText = this.PrivacyModal.logFileText;
  }

  closeModal(modal: string) {
    this.$modal.hide('privacy-modal')
    this.$store.dispatch('show' + modal + 'Modal', false);
  }
}

</script>

<style scoped>

</style>