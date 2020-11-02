<template>
  <form id="contact_form" @submit.prevent="submitForm()">
    <div class="form-row">
      <div class="form-group col-6">
        <label for="name" class="sr-only">ClientName</label>
        <input type="text" class="form-control m-0"
               name="name"
               required="required"
               minlength="3"
               id="name"
               v-model="$store.state.userData.clientName"
               placeholder="Dein Name">

      </div>
      <div class="form-group col-6">
        <label for="email" class="sr-only">ClientEmail</label>
        <input type="text" class="form-control m-0"
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
      <div class="form-group col-6">
        <label for="friendName" class="sr-only"></label>
        <input type="text" class="form-control m-0"
               id="friendName"
               placeholder="Name deines Freundes"
               v-model="friend.friendName">
      </div>
      <div class="form-group col-6">
        <label for="friendEmail" class="sr-only"></label>
        <input type="text" class="form-control m-0"
               id="friendEmail"
               placeholder="Email deines Freundes"
               v-model="friend.friendEmail">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group justify-content-center col-6">
        <button type="button" class="form-group btn btn-outline-light" v-bind="{disabled: $store.state.disableBtnActive}"
                id="addFriendsBtn" v-on:click="addInput()">Weitere
          Freunde hinzufügen
        </button>
        <button type="button" class="form-group btn btn-outline-light ml-5" v-if="$store.state.counter >= 2"
                id="removeFriendsBtn" v-on:click="removeInput()">Feld löschen
        </button>
      </div>
    </div>
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

<script>
import store from '@/store'

export default {
  name: "inputField",
  props: {
  },

  methods: {
    addInput() {
      store.dispatch('addInput')
    },

    removeInput() {
      store.dispatch('removeInput')

    },

    submitForm() {
      this.$store.dispatch('sendingContactForm', true);
    }
  }
}
</script>

<style scoped>

</style>