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
            <form id="contact_form" @submit.prevent="submitForm()">
              <div class="form-row">
                <div class="form-group col-6">
                  <label for="client-name" class="sr-only">ClientName</label>
                  <input type="text" class="form-control m-0 form-top-row"
                         name="clientName"
                         required="required"
                         minlength="3"
                         id="client-name"
                         v-model="clientName"
                         placeholder="Dein Name">
                </div>
                <div class="form-group col-6">
                  <label for="client-email" class="sr-only">ClientEmail</label>
                  <input type="text" class="form-control m-0 form-top-row"
                         name="clientEmail"
                         required="required"
                         minlength="3"
                         id="client-email"
                         v-model="clientEmail"
                         placeholder="Deine Email">
                  <!--@TODO: change type to mail

                  -->
                </div>
              </div>
              <div class="form-row mb-3">
                <div class="form-group col-6">
                  <label for="friend-name" class="sr-only">FriendName</label>
                  <input type="text" class="form-control m-0 form-top-row"
                         name="friendName"
                         required="required"
                         minlength="3"
                         id="friend-name"
                         v-model="friendName"
                         placeholder="Name deines Freundes">
                </div>
                <div class="form-group col-6">
                  <label for="friend-email" class="sr-only">FriendEmail</label>
                  <input type="text" class="form-control m-0 form-top-row"
                         name="friendEmail"
                         required="required"
                         minlength="3"
                         id="friend-email"
                         v-model="friendEmail"
                         placeholder="Email deines Freundes">
                  <!--@TODO: change type to mail

               -->
                </div>
              </div>
              <div class="form-row mb-3">
                <div class="col-6">
                  <button type="button" class="form-group btn btn-outline-light"
                          id="addFriends" @click="addInput()">Weitere
                    Freunde hinzufügen
                  </button>
                </div>
              </div>
              <div class="form-row justify-content-center my-3">
                <div class="form-group col-auto">
                  <button type="submit"
                          class="btn btn-secondary base_btn_wrapper submit_btn"
                          id="input-send">
                    Senden
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div v-if="showThanks && !sentContactFormError">
        <h4>Vielen Dank {{ $store.state.userData.clientName }}!</h4>
        <p class="big">Anfage wurde erfolgreich gesendet (Es werden keine echten Mails versandt)</p>
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

@Component
export default class ContactModal extends Vue {

  @Watch('formModel', {immediate: true, deep: true})
  onFormModelChange(val: string, oldVal: string) {
    this.$store.dispatch('setContactFormData', val)
  }

  content: Array<string>;
  userData: Array<string>;
  contactModal: any;
  title: string;
  text: string;
  maxFieldsFriends: number;
  formModel = {};
  modalWrapper: any;
  addFriends: any;
  friendName: any;
  clientName: any;
  friendEmail: any;
  clientEmail: any;
  inputs: any;

  constructor() {
    super();
    this.content = this.$store.state.siteData;
    this.userData = this.$store.state.userData;
    this.clientName = this.$store.state.userData.clientName;
    this.friendName = this.$store.state.userData.friendName;
    this.clientEmail = this.$store.state.userData.clientEmail;
    this.friendEmail = this.$store.state.userData.friendEmail;
    this.contactModal = this.$store.state.siteData.modal.contactModal;
    this.title = this.contactModal.title;
    this.text = this.contactModal.text;
    this.maxFieldsFriends = 5;
    this.modalWrapper = document.getElementById('modalWrapper');
    this.inputs = document.getElementById('friends-row');
    this.addFriends = document.getElementById('addFriends')
  }

  closeModal(modal: string) {
    this.$modal.hide('contact-modal')
    this.$store.dispatch('show' + modal + 'Modal', false);
    this.$store.dispatch('showContactSuccess', false);
  }

  submitForm() {
    this.$store.dispatch('sendingContactForm', true);
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

<style scoped>

</style>