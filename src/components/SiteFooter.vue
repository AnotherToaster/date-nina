<template>
  <div class="row footer_wrapper align-items-center">
    <div class="col-sm-2 logo_wrapper">
      <a href="https://www.roadcross.ch/" target="_blank">
        <img src="img/logo_raodcross.png" class="logo_redCross">
      </a>
    </div>
    <div class="col-2 d-flex justify-content-center">
      <a @click="showModal('Info')" id="info">INFO</a>
    </div>
    <div class="col-2 d-flex justify-content-center">
      <a @click="showModal('Imprint')" id="imprint">IMPRESSUM</a>
    </div>
    <div class="col-2 d-flex justify-content-center">
      <a @click="showModal('Privacy')" id="privacy">DATENSCHUTZ</a>
    </div>
    <div class="col-4 justify-content-end d-flex align-items-center">
      <div class="col-2">
        <a id="de">DE</a>
      </div>
      <div class="col-2">
        <a id="fr">FR</a>
      </div>
      <div class="col-2">
        <a id="it">IT</a>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';

@Component
export default class Sitefooter extends Vue {
  constructor() {
    super();
  }
  showModal(ModalType: string) {
    this.$store.dispatch('show' + ModalType + 'Modal', true);
  }
}
</script>

<style scoped>

</style>