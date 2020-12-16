<template>
  <div class="col-12">
    <p class="endText">{{ endText }}</p>
    <p class="endText_fail mb-lg-5">{{ endTextFail }}</p>
    <button id="goBack" class="btn end_btn mb-3 mb-lg-5" @click="goBack()">
      <i class="fas fa-chevron-left firstArrow ml-3 p-0"></i>
      <i class="fas fa-chevron-left secondArrow mr-3 p-0"></i>
      {{ altFinishBtnText }}
    </button>
    <SocialMedia/>
  </div>
</template>

<script lang="ts">
import {Component, Vue} from "vue-property-decorator";
import SocialMedia from "@/components/social-media.component.vue";

@Component({
  components: {
    SocialMedia
  }
})
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
  videoDuration: number;

  constructor() {
    super();
    this.videoSteps = this.$store.state.siteData.steps;
    this.currentVideoID = this.$store.state.video.Id;
    this.currentLanguage = this.$store.state.currentLanguage;
    this.videoSrc = this.$store.state.video.videoUrl;
    this.videoDuration = this.$store.state.video.videoCurrentTime;
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
    this.$store.dispatch('setDecision', 'a');
    setTimeout(() => {
      this.$store.dispatch('playVideo', true);
    }, 150);
  }
}

</script>

<style scoped lang="less">

.endText {
  color: #FFF;
  line-height: 40px;
  font-size: 40px;
  font-family: Arial, Verdana, sans-serif;
  @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
    font-size: 20px;
    line-height: 30px;

  }
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    line-height: 26px;
    font-size: 20px;
  }

  @media (max-width: 375px) and (-webkit-min-device-pixel-ratio: 2) {
    line-height: 20px;
    font-size: 16px;
    margin-bottom: 7px;
  }
}

.endText_fail {
  color: #c61b26;
  font-size: 26px;
  font-family: Arial, Verdana, sans-serif;
  @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
    font-size: 20px;
  }
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    font-size: 14px;
    margin-bottom: 5px;
  }
}

.end_btn {
  background-color: #dd2e44;
  border: 1px solid #dd2e44;
  color: #fff;
  border-radius: 10px;
  max-width: 400px;
  height: 60px;
  font-size: 20px;
  position: relative;

  &:hover {
    color: #000;
    background-color: #f8f9fa;
    box-shadow: 10px 5px 15px #dd2e44;
    .fas {
      transform: scale(1.3);
    }
    .firstArrow {
      animation: color_anim 1s infinite 0.4s;
    }
    .secondArrow {
      animation: color_anim 1s infinite 0.2s;
    }
  }
  @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
    height: 50px;
    font-size: 15px;
  }
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    width: 220px;
    height: 40px;
    font-size: 12px;
  }

  .fas {
    font-size: 20px;
    padding-right: 15px;
    padding-left: 15px;
    transition: all 0.15s ease-in-out;
    @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
      font-size: 14px;
    }
    @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
      padding-right: 10px;
      font-size: 13px;
    }
  }
}

@keyframes color_anim {
  0% {
    color: #000;
  }
  50% {
    color: #dd2e44;
  }
  100% {
    color: #000;
  }
}
</style>