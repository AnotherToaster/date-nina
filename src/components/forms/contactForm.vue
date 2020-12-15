<template>
  <form id="contact_form" @submit.prevent="submitForm()">
    <div class="form-row justify-content-start">
      <div class="form-group col-10 col-md-5 mb-1 mb-md-0">
        <label for="name" class="sr-only">ClientName</label>
        <input type="text" class="form-control m-0"
               name="name"
               required="required"
               minlength="3"
               id="name"
               v-model="$store.state.userData.clientName"
               :placeholder="clientNamePlaceholder">
      </div>
      <div class="form-group col-10 col-md-5 mb-4">
        <label for="email" class="sr-only">ClientEmail</label>
        <input type="email" class="form-control m-0"
               name="email"
               required="required"
               minlength="3"
               id="email"
               v-model="$store.state.userData.clientEmail"
               :placeholder="clientEmailPlaceholder">
      </div>
      <div class="form-group col-2 mb-1 d-flex justify-content-start" id="friendsBtn">
        <button type="button" class="btn icons"
                v-bind="{disabled: $store.state.disableBtnActive}"
                v-on:click="addInput()"><i class="far fa-plus-square"></i>
        </button>
      </div>
    </div>
    <div class="form-row justify-content-start" :id="key"
         v-for="(friend, key) in $store.state.friendsData"
         v-bind:key="key">
      <div class="form-group col-10 col-md-5 mb-1">
        <label for="friendName" class="sr-only"></label>
        <input type="text" class="form-control m-0"
               id="friendName"
               required="required"
               :placeholder="friendNamePlaceholder"
               v-model="friend.friendName">
      </div>

      <div class="form-group col-10 col-md-5 mb-4">
        <label for="friendEmail" class="sr-only"></label>
        <input type="email" class="form-control m-0"
               id="friendEmail"
               required="required"
               :placeholder="friendEmailPlaceholder"
               v-model="friend.friendEmail">
      </div>
      <div class="form-group col-2 mb-1" id="submitBtn">
        <button type="button" class="btn icons" v-bind="{disabled: $store.state.counter <= 1}"
                v-on:click="removeInput(InputKey = key)"><i class="far fa-minus-square"></i>
        </button>
      </div>
    </div>
    <div class="form-row mt-4 justify-content-md-between justify-content-center d-flex">
      <div class="form-group col-12 col-md-6">
        <button type="submit"
                class="btn btn-secondary base_btn_wrapper"
                id="input-send">
          {{ sendBtn }}
        </button>
      </div>
      <div class="col-12 col-md-6 mb-5">
        <SocialMedia/>
      </div>
    </div>
  </form>
</template>

<script lang="ts">
import store from '@/store'
import {Component, Vue} from 'vue-property-decorator';
import SocialMedia from "@/components/social-media_basic.component.vue";


@Component({
  components: {
    SocialMedia,
  },
})

export default class InputField extends Vue {
  contactModal: any;
  currentLanguage: string;
  sendBtn: string;
  clientNamePlaceholder: string;
  clientEmailPlaceholder: string;
  friendNamePlaceholder: string;
  friendEmailPlaceholder: string;
  InputKey: number;

  constructor() {
    super();
    this.contactModal = this.$store.state.siteData.modal.contactModal;
    this.currentLanguage = this.$store.state.currentLanguage;
    this.sendBtn = this.contactModal[this.currentLanguage].sendBtn;
    this.InputKey = 0;
    this.clientNamePlaceholder = this.contactModal[this.currentLanguage]['inputField'].clientNamePlaceholder;
    this.clientEmailPlaceholder = this.contactModal[this.currentLanguage]['inputField'].clientEmailPlaceholder;
    this.friendNamePlaceholder = this.contactModal[this.currentLanguage]['inputField'].friendNamePlaceholder;
    this.friendEmailPlaceholder = this.contactModal[this.currentLanguage]['inputField'].friendEmailPlaceholder;
  }

  addInput() {
    store.dispatch('addInput')
  }

  removeInput(InputKey: number) {
    this.InputKey = InputKey;
    store.dispatch('removeInput', this.InputKey);
  }

  submitForm() {
    this.$store.dispatch('sendingContactForm', true);
  }

}
</script>

<style scoped lang="less">
.base_btn_wrapper {
  width: 230px;
  height: 45px;
  font-size: 14px;
}

.icons {
  color: #ffffff;
  font-size: 24px;
  transition: 0.3s;

  &:hover {
    color: #696969;
  }
}

.btn:disabled {
  opacity: 0.5;
  color: #3b3a3a;
}

#friendsBtn, #submitBtn {
  top: -5px;
  @media (max-width: 768px) {
    top: -50px;
  }
}

</style>