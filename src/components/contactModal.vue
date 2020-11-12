<template>
  <div class="modal_inner" id="contact_modal">
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
            <input-field></input-field>
          </div>
        </div>
      </div>
      <div v-if="showThanks && !sentContactFormError">
        <h4>Vielen Dank {{ $store.state.userData.clientName }}!</h4>
        <p class="big">Anfage wurde erfolgreich gesendet</p>
      </div>
      <div v-if="sentContactFormError">
        <h4>Tut mir Leid {{ $store.state.userData.clientName }}!</h4>
        <p class="big">Etwas scheint nicht in Ordnung zu sein!</p>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import {Component, Vue, Watch} from 'vue-property-decorator';
import InputField from '@/components/inputField.vue'

@Component({
  components: {
    InputField
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
  text: string;
  maxFieldsFriends: number;
  formModel = {};

  constructor() {
    super();
    this.content = this.$store.state.siteData;
    this.userData = this.$store.state.userData;
    this.friendsData = this.$store.state.friendsData;
    this.contactModal = this.$store.state.siteData.modal.contactModal;
    this.title = this.contactModal.title;
    this.text = this.contactModal.text;
    this.maxFieldsFriends = this.$store.state.maxFieldNumber;
  }

  closeModal(modal: string) {
    this.$modal.hide('contact-modal')
    this.$store.dispatch('show' + modal + 'Modal', false);
    this.$store.dispatch('showContactSuccess', false);
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

<style lang="less">
.modal_inner {
  background-image: linear-gradient(#292929, #000, #000 40%);
  padding: 30px;

  .modal_wrapper {

    p, h2, ul, h3, h4 {
      color: #fff;
      font-weight: bold;
    }

    h2 {
      font-size: 20px;
      line-height: 22px;
    }

    h3 {
      font-size: 16px;
      margin: 20px 0 10px 0;
    }

    p {
      font-size: 14px;
      line-height: 16px;
    }

    a {
      line-break: anywhere;
    }
  }

  .icn_close {
    top: -20px;
    right: 0;
    position: absolute;
    height: 25px;
    width: 25px;
    border: none;
    background: url('http://127.0.0.1:8080/img/icn_close.png') no-repeat;
    cursor: pointer;
  }
}
</style>