<template>
  <div class="row control">
    <div class="col-12 d-flex justify-content-center">
      <p class="intro_text">{{ introText }}</p>
    </div>
    <div class="col-12 d-flex justify-content-center">
      <button class="btn start_btn" v-on:click="startDate()">
        <i class="fas fa-play"></i>
        <img src="/favicon.ico" class="share_btn_heart">
        <p class="start_btn_text">{{ linkText }}</p>
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
  currentLanguage: any;
  introText: string;
  linkText: string;

  constructor() {
    super();
    this.videoSteps = this.$store.state.siteData.steps;
    this.currentVideoID = this.$store.state.video.Id;
    this.currentLanguage = this.$store.state.currentLanguage;

    this.introText = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage].introText;
    this.linkText = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage].linkText;
  }

  startDate() {
    this.$store.dispatch('startDate');
    this.$store.dispatch('setVideoContent', this.videoSteps[this.currentVideoID]['content'][this.currentLanguage]);
    setTimeout(() => {
      this.$store.dispatch('playVideo');
    }, 25)
  }
}
</script>

<style scoped lang="less">


.start_btn_text {
  padding: 0;
  margin: 0;
  font-size: 18px;
  @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
    font-size: 16px;
  }
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    font-size: 14px;
    margin: 0;
    padding: 0;
  }
  @media (max-width: 375px) and (-webkit-min-device-pixel-ratio: 2) {
    font-size: 11px;
  }
}

.control {
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    width: 80%;
  }
}

.fas {
  transition: all 0.15s ease-in-out;
  position: absolute;
  top: 37%;
  left: 35px;
  font-size: 14px;
  transform-origin: left center;
  @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
    top: 33%;
    left: 30px;
  }
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    top: 36%;
    left: 30px;
  }
  @media (max-width: 375px) and (-webkit-min-device-pixel-ratio: 2) {
    top: 33%;
  }
}

.start_btn {
  background-color: #dd2e44;
  border: 1px solid #dd2e44;
  color: #fff;
  padding-left: 40px;
  margin-top: 40px;
  transition: .6s ease-out;
  width: 260px;
  height: 60px;
  position: relative;

  &:hover {
    color: #000;
    background-color: #f8f9fa;
    box-shadow: 10px 5px 15px #dd2e44;

    .fas {
      opacity: 0;
      color: #fff;

    }

    .share_btn_heart {
      opacity: 1;
    }
  }

  @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
    max-width: 220px;
    height: 40px;
    font-size: 12px;
    margin-top: 20px;
  }
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    margin: 0 0 0 0;
    width: 200px;
    height: 50px;
  }

  @media (max-width: 375px) and (-webkit-min-device-pixel-ratio: 2) {
    height: 40px;
    font-size: 10px;
  }
}

.intro_text {
  color: #FFF;
  font-size: 25px;
  width: 50%;
  @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
    font-size: 22px;
    width: 75%;
  }
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    font-size: 16px;
    margin-bottom: 30px;
  }
  @media (max-width: 375px) and (-webkit-min-device-pixel-ratio: 2) {
    font-size: 12px;
    margin-bottom: 15px;
    width: 100%;
  }
}

.share_btn_heart {
  height: 25px;
  opacity: 0;
  position: absolute;
  left: 25px;
  transition: 1s ease-out;
  animation: heartPulse infinite 1.2s;
  animation-delay: 1s;
  @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
    height: 20px;
    bottom: 9px;
  }
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    height: 20px;
    bottom: 13px;
    left: 18px;
  }

  @media (max-width: 375px) and (-webkit-min-device-pixel-ratio: 2) {
    bottom: 9px;
    left: 25px;
  }
}

@keyframes heartPulse {
  0% {
    transform: scale(1);
  }
  25% {
    transform: scale(1.2);
  }
  50% {
    transform: scale(1);
  }
  100% {
    transform: scale(1);
  }
}
</style>