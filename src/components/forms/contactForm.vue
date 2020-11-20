<template>
  <form id="contact_form" @submit.prevent="submitForm()">
    <div class="form-row">
      <div class="form-group col-sm-6">
        <label for="name" class="sr-only">ClientName</label>
        <input type="text" class="form-control m-0"
               name="name"
               required="required"
               minlength="3"
               id="name"
               v-model="$store.state.userData.clientName"
               placeholder="Dein Name">

      </div>
      <div class="form-group col-sm-6">
        <label for="email" class="sr-only">ClientEmail</label>
        <input type="email" class="form-control m-0"
               name="email"
               required="required"
               minlength="3"
               id="email"
               v-model="$store.state.userData.clientEmail"
               placeholder="Deine Email">
      </div>
    </div>
    <div class="form-row" id="addFriends"
         v-for="(friend, key) in $store.state.friendsData"
         v-bind:key="key">
      <div class="form-group col-sm-6">
        <label for="friendName" class="sr-only"></label>
        <input type="text" class="form-control m-0"
               id="friendName"
               required="required"
               placeholder="Name deines Freundes"
               v-model="friend.friendName">
      </div>
      <div class="form-group col-sm-6">
        <label for="friendEmail" class="sr-only"></label>
        <input type="email" class="form-control m-0"
               id="friendEmail"
               required="required"
               placeholder="Email deines Freundes"
               v-model="friend.friendEmail">
      </div>
    </div>
    <div class="form-row" id="friendsBtn">
      <div class="form-group col-sm-6">
        <button type="button" class="btn btn-outline-light mb-sm-3 mb-0 base_btn_wrapper"
                v-bind="{disabled: $store.state.disableBtnActive}"
                v-on:click="addInput()">Weitere
          Freunde hinzufügen
        </button>
      </div>
      <div class="form-group col-sm-6" id="submitBtn">
        <button type="button" class="btn btn-outline-light base_btn_wrapper" v-if="$store.state.counter >= 2"
                v-on:click="removeInput()">Feld löschen
        </button>
      </div>
    </div>

    <SocialMedia/>

    <div class="form-row mt-4">
      <div class="form-group col-12">
        <button type="submit"
                class="btn btn-secondary base_btn_wrapper"
                id="input-send">
          Senden
        </button>
      </div>
    </div>
  </form>
</template>

<script lang="ts">
import store from '@/store'
import {Component, Vue} from 'vue-property-decorator';
import SocialMedia from "@/components/social-media.component.vue";


@Component({
  components: {
  SocialMedia,
  },
})

export default class InputField extends Vue {

  constructor() {
    super();

  }

    addInput() {
      store.dispatch('addInput')
    }

    removeInput() {
      store.dispatch('removeInput')
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

</style>