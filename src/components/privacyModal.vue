<template>
  <div class="modal_inner">
    <div class="row">
      <div class="col-12 d-flex justify-content-end">
        <button class="btn btn-light icn_close" @click="closeModal('Privacy')"></button>
      </div>
    </div>
    <div class="container">
      <div class="modal_wrapper">
        <div class="row">
          <div class="col-12">
            <h2>Privacy Policy / Datenschutz</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h3>Cookies</h3>
            <p>Lorem</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';

@Component
export default class PrivacyModal extends Vue {
  closeModal(modal: string) {
    this.$modal.hide('privacy-modal')
    this.$store.dispatch('show' + modal + 'Modal', false);
  }
}

</script>

<style scoped>

</style>