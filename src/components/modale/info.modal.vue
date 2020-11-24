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
            <p>{{ introText1 }}</p>
            <p>{{ introText2 }}</p>
            <p>{{ introText3 }}</p>
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
            <p>{{ textList }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul>
              <li v-for="supporter in supporters" :key="supporter">
                {{ supporter }}
              </li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <a href="https://www.roadcross.ch/" target="_blank">
              <img src="img/logo_roadcross.png" class="logo_redCross">
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
  currentLanguage: string;
  introText1: string;
  introText2: string;
  introText3: string;
  link1: string;
  link2: string;
  textList: string;
  supporters: Array<object>;

  constructor() {
    super();    
    this.infoModal = this.$store.state.siteData.modal.infoModal;
    this.currentLanguage = this.$store.state.currentLanguage;
    this.supporters = this.infoModal[this.currentLanguage].supporters;
    this.title = this.infoModal[this.currentLanguage].title;
    this.introText1 = this.infoModal[this.currentLanguage].intro_text1;
    this.introText2 = this.infoModal[this.currentLanguage].intro_text2;
    this.introText3 = this.infoModal[this.currentLanguage].intro_text3;
    this.link1 = this.infoModal[this.currentLanguage].link1;
    this.link2 = this.infoModal[this.currentLanguage].link2;
    this.textList = this.infoModal[this.currentLanguage].text_list;
  }

  closeModal(modal: string) {
    this.$modal.hide('info-modal')
    this.$store.dispatch('show' + modal + 'Modal', false);
  }
}

</script>

<style scoped>

</style>