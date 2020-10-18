<template>
  <div class="embed-responsive embed-responsive-16by9" id="video_container">
    <video ref="video" id="video" class="embed-responsive-item" width="auto" height="100%" @play="playing()"
           @ended="nextVideo()">
      Your browser does not support the video tag.
    </video>
    <div class="video_controls_wrapper">

      <div id="control" class="control" v-if="$store.state.showVideoControls">
        <p class="intro_text" id="intro_text">{{ $store.state.videoMessages.message1 }}</p>
        <button class="btn btn-secondary start_btn" id="start_btn" v-on:click="playVideo()">
          <i class="fas fa-play"></i>
          JETZT NINA DATEN
        </button>
      </div>
      <div id="choices" class="choices_wrapper row" v-if="$store.state.showChoices">
        <div class="col-6">
          <button id="decGood" class="btn btn-secondary start_btn choice_left">Küsschen geben</button>
        </div>
        <div class="col-6">
          <button id="decBad" class="btn btn-secondary start_btn choice_right">Hand geben</button>
        </div>
      </div>
    </div>
  </div>

</template>

<script lang="ts">
import {Component, Prop, Vue} from 'vue-property-decorator';

@Component
export default class VideoComponent extends Vue {
  @Prop() private msg!: string;

  mounted() {
    this.$refs.video.src = this.$store.state.videoUrl;
  }

  playVideo() {
    this.$refs.video.play();
    return this.$store.state.showVideoControls = false;
  }

  nextVideo() {
    this.$refs.video.src = "videos/step_2a.mp4";
    return this.$store.state.showChoices = true;
  }


}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
