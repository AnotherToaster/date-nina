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
            <h2>{{ Title }}</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h3>{{ IntroText }}</h3>
            <p class="client_address">
              {{ AddressTitle }}<br>
              {{ AddressCity }}<br>
              {{ AddressTel }}<br>
              {{ AddressFax }}<br>
              E-Mail: <a href="mailto:info@roadcross.ch">{{ Email }}</a>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h3>{{ Subtitle }}</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <p>{{ SubtitleText }}</p>
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
  Contact: Array<string>;
  ImprintModal: any;
  Title: string;
  Subtitle: string;
  SubtitleText: string;
  IntroText: string;
  AddressTitle: string;
  AddressCity: string;
  AddressTel: string;
  AddressFax: string;
  Email: string;

  constructor() {
    super();
    this.Contact = this.$store.state.siteData.contact;
    this.AddressTitle = this.$store.state.siteData.contact.addressTitle;
    this.AddressCity = this.$store.state.siteData.contact.addressCity;
    this.AddressTel = this.$store.state.siteData.contact.addressTel;
    this.AddressFax = this.$store.state.siteData.contact.addressFax;
    this.Email = this.$store.state.siteData.contact.email;
    this.ImprintModal = this.$store.state.siteData.modal.imprintModal;
    this.Title = this.ImprintModal.title;
    this.Subtitle = this.ImprintModal.subtitle;
    this.SubtitleText = this.ImprintModal.subtitleText;
    this.IntroText = this.ImprintModal.introText;
  }

  closeModal(modal: string) {
    this.$modal.hide('imprint-modal')
    this.$store.dispatch('show' + modal + 'Modal', false);
  }
}

</script>

<style scoped>

</style>