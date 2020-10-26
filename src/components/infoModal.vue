<template>
  <div class="modal_inner">
    <div class="row">
      <div class="col-12 d-flex justify-content-end">
        <button class="btn btn-light icn_close" @click="closeModal('Info')"></button>
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
            <p>{{ IntroText1 }}</p>
            <p>{{ IntroText2 }}</p>
            <p>{{ IntroText3 }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <a href="http://www.facebook.com/roadcross" target="_blank">{{ link1 }}</a>
          </div>
          <div class="col-lg-12 mb-3">
            <a href="http://www.roadcross.ch" target="_blank">{{ link2 }}</a>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <p>{{ TextList }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul>
              <li v-for="helper in helpers" :key="helper">
                {{ helper }}
              </li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <a href="https://www.roadcross.ch/" target="_blank">
              <img src="img/logo_raodcross.png" class="logo_redCross">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';

@Component
export default class InfoModal extends Vue {
  content: Array<string>;
  infoModal: any;
  title: string;
  IntroText1: string;
  IntroText2: string;
  IntroText3: string;
  link1: string;
  link2: string;
  TextList: string;
  helpers: Array<object>;

  constructor() {
    super();
    this.content = this.$store.state.siteData;
    this.infoModal = this.$store.state.siteData.modal.infoModal;
    this.helpers = this.$store.state.siteData.modal.infoModal.helpers;
    this.title = this.infoModal.title;
    this.IntroText1 = this.infoModal.intro_text1;
    this.IntroText2 = this.infoModal.intro_text2;
    this.IntroText3 = this.infoModal.intro_text3;
    this.link1 = this.infoModal.link1;
    this.link2 = this.infoModal.link2;
    this.TextList = this.infoModal.text_list;
  }

  closeModal(modal: string) {
    this.$modal.hide('info-modal')
    this.$store.dispatch('show' + modal + 'Modal', false);
  }
}

</script>

<style scoped>

</style>