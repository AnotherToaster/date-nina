<template>
  <div class="modal_inner" id="contact_modal" v-bind:class="{ThxModalHeight: showThanks && !sentContactFormError}">
    <div class="modal_wrapper" id="modalWrapper">
      <div v-if="!showThanks && !sentContactFormError">
        <div class="row">
          <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-light icn_close" data-dismiss="modal" @click="closeModal('Contact')"></button>
          </div>
        </div>
        <div class="row">
          <div class="col-12 mb-2">
            <h4>{{ title }}</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-12 mb-2">
            <p>{{ text }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <ContactForm/>
          </div>
        </div>
      </div>
      <div v-if="showThanks && !sentContactFormError" class="backgroundThanks">
        <h4 class="pt-3 pl-4 pt-sm-5 pl-sm-5">{{ thanksMessageTitle }} {{ $store.state.userData.clientName }}!</h4>
        <p class="pl-4 pl-sm-5">{{ thanksMessage }}</p>
      </div>
      <div v-if="sentContactFormError">
        <h4>{{ thanksMessageTitleFail }} {{ $store.state.userData.clientName }}!</h4>
        <p>{{ thanksMessageFail }}</p>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import {Component, Vue, Watch} from 'vue-property-decorator';
import ContactForm from '@/components/forms/contactForm.vue'

@Component({
  components: {
    ContactForm,
  }
})
export default class ContactModal extends Vue {

  @Watch('formModel', {immediate: true, deep: true})
  onFormModelChange(val: string, oldVal: string) {
    this.$store.dispatch('setContactFormData', val)
  }

  content: Array<string>;
  userData: Array<string>;
  friendsData: Array<string>;
  contactModal: any;
  title: string;
  thanksMessageTitle: string;
  thanksMessage: string;
  thanksMessageFail: string;
  thanksMessageTitleFail: string;
  currentLanguage: string;
  text: string;
  maxFieldsFriends: number;
  formModel = {};

  constructor() {
    super();
    this.content = this.$store.state.siteData;
    this.currentLanguage = this.$store.state.currentLanguage;
    this.userData = this.$store.state.userData;
    this.friendsData = this.$store.state.friendsData;
    this.contactModal = this.$store.state.siteData.modal.contactModal;
    this.title = this.contactModal[this.currentLanguage].title;
    this.text = this.contactModal[this.currentLanguage].text;
    this.maxFieldsFriends = this.$store.state.maxFieldNumber;
    this.thanksMessageTitle = this.contactModal[this.currentLanguage].thanksMessageTitle;
    this.thanksMessage = this.contactModal[this.currentLanguage].thanksMessage;
    this.thanksMessageFail = this.contactModal[this.currentLanguage].thanksMessageFail;
    this.thanksMessageTitleFail = this.contactModal[this.currentLanguage].thanksMessageTitleFail;
  }

  closeModal(modal: string) {
    this.$modal.hide('contact-modal')
    this.$store.dispatch('show' + modal + 'Modal', false);
  }

  get showThanks() {
    return this.$store.state.showContactSuccess
  }

  set showThanks(value) {
    this.$store.dispatch('showContactSuccess', value)
  }

  get sentContactFormError() {
    return this.$store.state.sentContactFormError
  }

  set sentContactFormError(value) {
    this.$store.dispatch('sentContactFormError', value)
  }

}


</script>

<style scoped lang="less">

.ThxModalHeight {
  height: 300px;
  padding: 0;
  margin: 0;
  @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
    height: 220px;

  }
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    height: 250px;
  }
}

.backgroundThanks {
  position: absolute;
  background: url(/img/bg_finish.png) no-repeat top center;
  background-position-y: -8vh;
  background-size: 100%;
  width: 100%;
  height: 300px;
  @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
    background-position-y: -7vh;
    background-size: 125%;
  }
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    background-position-y: -2vh;
  }

  @media (max-width: 375px) and (-webkit-min-device-pixel-ratio: 2) {
    background-position-y: -2vh;
    background-size: 140%;
    background-position-x: -9vh;
  }
}

</style>