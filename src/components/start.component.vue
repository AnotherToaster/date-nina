<template>
  <div class="row control">
    <div class="col-12 d-flex justify-content-center">
      <p class="intro_text">{{ introText }}</p>
    </div>
    <div class="col-12 d-flex justify-content-center">
      <button class="btn btn-secondary base_btn_wrapper start_btn" v-on:click="startDate()">
        <i class="fas fa-play"></i>
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
  content: any;

  constructor() {
    super();
    this.content = 'content';
    this.videoSteps = this.$store.state.siteData.steps;
    this.currentVideoID = this.$store.state.video.Id;
    this.currentLanguage = this.$store.state.currentLanguage;

    this.introText = this.videoSteps[this.currentVideoID][this.content][this.currentLanguage].introText;
    this.linkText = this.videoSteps[this.currentVideoID][this.content][this.currentLanguage].linkText;
  }

  startDate() {
    this.$store.dispatch('startDate');
    setTimeout(() => {
      this.$store.dispatch('playVideo');
    }, 150)  }
}
</script>

<style scoped lang="less">
.control {
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    width: 80%;
  }

  .start_btn {
    padding-left: 40px;
    margin-top: 40px;
    @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
      width: 200px;
      height: 40px;
      font-size: 12px;
      margin-top: 20px;
    }
    @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
      margin: 0 0 0 0;
      width: 200px;
      height: 50px;
      .fas {
        left: 25px;
        top: 40%;
        @media (max-width: 375px) and (-webkit-min-device-pixel-ratio: 2) {
          top: 35%;
        }
      }

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
    @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
      font-size: 16px;
      margin-bottom: 30px;
      width: 75%;
    }
    @media (max-width: 375px) and (-webkit-min-device-pixel-ratio: 2) {
      font-size: 12px;
      margin-bottom: 15px;
      width: 100%;
    }

  }
}
</style>