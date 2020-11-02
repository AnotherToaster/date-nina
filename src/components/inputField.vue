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
         v-for="(addFriend, counter) in addFriends"
         v-bind:key="counter">
      <div class="form-group col-6">
        <label for="friendName" class="sr-only"></label>
        <input type="text" class="form-control m-0"
               id="friendName"
               placeholder="Name deines Freundes"
               v-model="$store.state.friendsData.friendName">
      </div>
      <div class="form-group col-6">
        <label for="friendEmail" class="sr-only"></label>
        <input type="text" class="form-control m-0"
               id="friendEmail"
               placeholder="Email deines Freundes"
               v-model="$store.state.friendsData.friendEmail">
      </div>
    </div>
    <!--<div class="form-row">
      <div class="form-group justify-content-center col-6">
        <button type="button" class="form-group btn btn-outline-light"
                id="addFriendsBtn" v-on:click="addInput($store.state.counter + 1)">Weitere
          Freunde hinzufügen
        </button>
      </div>
    </div>-->
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
    msg: String,
  },
  data() {
    return {
      addFriends: [
        {
          friendName: '',
          friendEmail: '',
        }
      ]
    }
  },

  methods: {
    addInput() {
      const counter = store.state.counter
      if (counter >= 5) {
        alert('Sie haben das Maximum erreicht')

      } else {
        this.addFriends.push({
        friendEmail: '',
        friendName: '',
      })
      }
    },

    submitForm() {
      this.$store.dispatch('sendingContactForm', true);
    }
  }
}
</script>

<style scoped>

</style>