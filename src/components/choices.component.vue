<template>
  <div class="row">
    <div class="col-6">
      <button id="decA" @click="nextVideo(decAB = 'a' )"
              class="btn choice_btn">{{ decAText }}
      </button>
    </div>
    <div class="col-6">
      <button id="decB" @click="nextVideo(decAB = 'b' )"
              class="btn choice_btn">{{ decBText }}
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
  videoContent: any;

  constructor() {
    super();
    this.videoSteps = this.$store.state.siteData.steps;
    this.videoContent = this.$store.state.video.videoContent;
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
    this.$store.dispatch('setDecision', this.decAB);
    this.$store.dispatch('setVideoId', this.currentVideoID);
    this.$store.dispatch('setVideoUrl', this.videoSteps[this.currentVideoID]['content'][this.currentLanguage][this.decAB].videoURL);
    this.$store.dispatch('setVideoContent', this.videoSteps[this.currentVideoID]['content'][this.currentLanguage]);
    setTimeout(() => {
      this.$store.dispatch('playVideo');
    }, 150)
  }
}
</script>

<style scoped lang="less">

.choice_btn {
  background-color: #dd2e44;
  border: 1px solid #dd2e44;
  color: #fff;
  width: 260px;
  height: 60px;
  font-size: 1.1rem;
  position: relative;
  transition: .3s  ease-out;
  &:hover {
    color: #000;
    background-color: #f8f9fa;
    box-shadow: 10px 5px 15px #dd2e44;
  }
    @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
    font-size: 0.75rem;
    width: 150px;
    height: 50px;
  }
}

</style>