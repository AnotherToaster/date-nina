<template>
  <div class="col-12">
    <p class="endText">{{ endText }}</p>
    <p class="endText_fail mb-sm-5">{{ endTextFail }}</p>
    <button id="goBack" class="btn btn-secondary end_btn mb-3" @click="goBack()"><i
        class="fas fa-angle-double-left"></i>
      {{ altFinishBtnText }}
    </button>
  </div>
</template>

<script lang="ts">
import {Component, Vue} from "vue-property-decorator";

@Component
export default class BadFinishComponent extends Vue {
  videoSteps: string;
  video: any;
  currentVideoID: any;
  currentLanguage: string;
  endText: string;
  endTextFail: string;
  altFinishBtnText: string;
  nextVideoID: string;
  backLink: string;
  videoSrc: string;
  decAText: string;
  decBText: string;
  videoELm: any;
  backFromFinish: boolean;

  constructor() {
    super();
    this.videoSteps = this.$store.state.siteData.steps;
    this.currentVideoID = this.$store.state.video.Id;
    this.currentLanguage = this.$store.state.currentLanguage;
    this.videoSrc = this.$store.state.video.videoUrl;
    this.backFromFinish = this.$store.state.video.backFromFinish;
    this.endText = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage]['b'].endText;
    this.altFinishBtnText = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage].altFinishBtnText;
    this.endTextFail = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage]['b'].endTextFail;
    this.decAText = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage].decAText;
    this.decBText = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage].decBText;
    this.nextVideoID = this.currentVideoID;
    this.backLink = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage].backLink;
  }

  mounted() {
    this.videoELm = document.getElementById('video');
  }

  goBack() {
    this.currentVideoID = this.backLink.charAt(0);
    this.$store.dispatch('setVideoId', this.currentVideoID);
    this.$store.dispatch('setVideoUrl', this.videoSteps[this.currentVideoID]['content'][this.currentLanguage]['a'].videoURL)
    this.$store.dispatch('backFromFinish', true);
    this.$store.dispatch('showVideoControls', false);
    this.$store.dispatch('showChoices', false);
    this.$store.dispatch('goodEnd', false);
    this.$store.dispatch('badEnd', false);
    this.$store.dispatch('setDecision', 'a');
    setTimeout(() => {
      this.$store.dispatch('playVideo', true);
    }, 150)
  }
}

</script>

<style scoped lang="less">

.endText {
  color: #FFF;
  line-height: 40px;
  font-size: 40px;
  font-family: Arial, Verdana, sans-serif;
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    line-height: 30px;
    font-size: 16px;
  }
}

.endText_fail {
  color: #c61b26;
  font-size: 26px;
  font-family: Arial, Verdana, sans-serif;
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    font-size: 14px;
  }
}

.end_btn {
  background-image: linear-gradient(#4702fb, #3402b6);
  color: #fff3cd;
  border-radius: 10px;
  max-width: 400px;
  height: 60px;
  font-size: 20px;
  position: relative;
  border: none;
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    width: 220px;
    height: 40px;
    font-size: 14px;
  }

  .fas {
    font-size: 20px;
    padding-right: 15px;
    padding-left: 15px;
    transition: all 0.15s ease-in-out;
    @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
      padding-right: 10px;
      font-size: 15px;
    }
  }

  &:hover {
    color: #d48888;

    .fas {
      transform: scale(1.3);
    }
  }
}
</style>