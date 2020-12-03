<template>
  <div class="col-12">
<!--    <div class="logo_wrapper">
      <img src="img/bg_finish.png" class="bg_finish">
    </div>-->
    <p class="endText">{{ endText }}</p>
    <p class="endTextSmall mb-lg-5">{{ endTextSmall }}</p>
    <button id="decBack" @click="startDate()"
            class="btn end_btn mb-3 mb-lg-5"><i class="fas fa-arrow-right"></i>
      {{ btnText }}
    </button>
    <SocialMedia/>
  </div>
</template>

<script lang="ts">
import {Component, Vue} from "vue-property-decorator";
import SocialMedia from "@/components/social-media_basic.component.vue";


@Component({
  components: {
    SocialMedia
  }
})
export default class GoodFinishComponent extends Vue {
  videoSteps: string;
  video: any;
  currentVideoID: any;
  currentLanguage: string;
  endText: string;
  endTextSmall: string;
  btnText: string;

  constructor() {
    super();
    this.videoSteps = this.$store.state.siteData.steps;
    this.currentVideoID = this.$store.state.video.Id;
    this.currentLanguage = this.$store.state.currentLanguage;

    this.endText = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage]['a'].endText;
    this.endTextSmall = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage]['a'].endTextSmall;
    this.btnText = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage]['a'].btnText;
  }

  startDate() {
    this.$store.dispatch('startDate');
    setTimeout(() => {
      this.$store.dispatch('playVideo');
    }, 150)
  }
}
</script>

<style scoped lang="less">

/*.bg_finish {
  position: absolute;
  transform: translate(-25%, -19%);
  z-index: -1;
  width: 180%;
  left: 180px;
  top: 25px;
  @media (max-width: 1024px) and (-webkit-min-device-pixel-ratio: 2) {

  }
  @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {

  }
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    width: 150%;
    top: 20px;
  }
  @media (max-width: 375px) and (-webkit-min-device-pixel-ratio: 2) {
    width: 160%;
    left: 50px;
  }
}*/

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
    font-size: 13px;
  }
}

.endTextSmall {
  color: white;
  font-size: 19px;
  line-height: 25px;
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    font-size: 12px;
    line-height: normal;
  }
}

.end_btn {
  background-color: #dd2e44;
  border: 1px solid #dd2e44;
  color: #fff;
  border-radius: 10px;
  width: 350px;
  height: 60px;
  font-size: 20px;
  position: relative;

  &:hover {
    color: #000;
    background-color: #f8f9fa;
    box-shadow: 10px 5px 15px #dd2e44;
    .fas {
      transform: scale(1.3);
      color: #dd2e44;
    }
  }
  @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
    height: 50px;
    font-size: 15px;
    width: 250px;
  }
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    height: 35px;
    font-size: 12px;
    width: 160px;
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
</style>