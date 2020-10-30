<template>
  <div class="row footer_wrapper align-items-center">
    <div class="col-lg-2 col-md-3 col-12 logo_wrapper">
      <a href="https://www.roadcross.ch/" target="_blank">
        <img src="img/logo_raodcross.png" class="logo_redCross">
      </a>
    </div>
    <div class="col-lg-7 col-md-7 col-12">
      <div class="row">
        <div class="col-md-3 col-sm-2 col-auto d-flex justify-content-center">
          <a @click="showModal('Info')" id="info">INFO</a>
        </div>
        <div class="col-md-3 col-sm-2 col-auto d-flex justify-content-start">
          <a @click="showModal('Imprint')" id="imprint">IMPRESSUM</a>
        </div>
        <div class="col-md-3 col-sm-2 col-auto d-flex justify-content-start">
          <a @click="showModal('Privacy')" id="privacy">DATENSCHUTZ</a>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-2 col-12 justify-content-end d-flex align-items-center">
      <div class="col-md-2 col-sm-1 col-auto">
        <a id="de">DE</a>
      </div>
      <div class="col-md-2 col-sm-1 col-auto">
        <a id="fr">FR</a>
      </div>
      <div class="col-md-2 col-sm-1 col-auto">
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