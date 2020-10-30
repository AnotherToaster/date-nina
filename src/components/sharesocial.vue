<template>
  <div class="row">
    <div class="col-12 align-items-center justify-content-end d-flex share_btn_wrapper">
      <button class="btn social_btn">
        <i class="fab fa-whatsapp"></i>
      </button>
      <button class="btn social_btn">
        <i class="fab fa-facebook-square"></i>
      </button>
      <button class="btn btn-light share_btn" data-toggle="modal" data-target="#contact_modal" @click="showModal('Contact')">Freunde Verkuppeln</button>
    </div>
  </div>
</template>

<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';

@Component
export default class ShareSocial extends Vue {
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