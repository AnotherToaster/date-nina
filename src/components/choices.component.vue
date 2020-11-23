<template>
  <div class="row">
    <div class="col-6">
      <button id="decA" @click="nextVideo(decAB = 'a' )"
              class="btn btn-secondary choice_btn">{{ decAText }}
      </button>
    </div>
    <div class="col-6">
      <button id="decB" @click="nextVideo(decAB = 'b' )"
              class="btn btn-secondary choice_btn">{{ decBText }}
      </button>
    </div>
  </div>
</template>

<script lang="ts">
import {Component, Vue} from "vue-property-decorator";

@Component
export default class StartComponent extends Vue {
  videoSteps: string;
  video: any;
  currentVideoID: any;
  currentLanguage: string;
  decAB: string;
  nextVideoID: string;
  videoSrc: string;
  decAText: string;
  decBText: string;
  decABtn: any;
  decBBtn: any;

  constructor() {
    super();
    this.videoSteps = this.$store.state.siteData.steps;
    this.video = this.$store.state.video;
    this.decAB = this.video.decision;
    this.currentVideoID = this.$store.state.video.Id;
    this.currentLanguage = this.$store.state.currentLanguage;
    this.nextVideoID = this.videoSteps[this.video.Id]['next'].step;
    this.currentVideoID = this.nextVideoID;
    this.nextVideoID = this.videoSteps[this.currentVideoID]['next'].step;

    this.videoSrc = this.video.videoUrl;
    this.decAText = this.videoSteps[this.video.Id]['content'][this.currentLanguage].decAText;
    this.decBText = this.videoSteps[this.video.Id]['content'][this.currentLanguage].decBText;
  }

  mounted() {
    this.decABtn = document.getElementById('decA');
    this.decBBtn = document.getElementById('decB');
  }

  nextVideo(decAB: string) {
    this.decAB = decAB;
    this.$store.dispatch('setDecision', this.decAB)
    this.$store.dispatch('setVideoId', this.currentVideoID);
    this.$store.dispatch('setVideoUrl', this.videoSteps[this.currentVideoID]['content'][this.currentLanguage][this.decAB].videoURL)
    setTimeout(() => {
      this.$store.dispatch('playVideo');
    }, 150)
  }
}
</script>

<style scoped>

</style>