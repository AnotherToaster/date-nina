<template>
  <div class="modal_inner">
    <div class="row">
      <div class="col-12 d-flex justify-content-end">
        <button class="btn btn-light icn_close" @click="closeModal('Imprint')"></button>
      </div>
    </div>
    <div class="container">
      <div class="modal_wrapper">
        <div class="row">
          <div class="col-12">
            <h2>Impressum</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h3>Verantwortlich für den Inhalt:</h3>
            <p>RoadCross Schweiz kämpft gegen die zu hohe Zahl von jugendlichen Verkehrstoten – nicht mit Regeln und
              Verboten, sondern durch
              Aufklärung und Diskussion. Denn leider zeigen auch die neuesten Verkehrsunfallzahlen, dass junge Leute mit
              Abstand
              das höchste Risiko verzeichnen, bei einem Unfall in Zusammenhang mit Geschwindigkeit, Alkohol oder Drogen
              schwer
              verletzt oder getötet zu werden.
            </p>
            <p>Wenn du Fragen zu und über RoadCross Schweiz hast, hier findest du die Antworten:</p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <p class="client_address">
              RoadCross Schweiz<br>
              8004 Zürich<br>
              Tel. 044 737 48 29<br>
              Fax 044 737 28 08<br>
              E-Mail: <a href="mailto:info@roadcross.ch">info@roadcross.ch</a>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h3>Copyright</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <p>Die Weiterverwendung von Bild und Text bedarf der ausdrücklichen Erlaubnis von RoadCross Schweiz.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';

@Component
export default class InfoModal extends Vue {
  closeModal(modal: string) {
    this.$modal.hide('imprint-modal')
    this.$store.dispatch('show' + modal + 'Modal', false);
  }
}

</script>

<style scoped>

</style>