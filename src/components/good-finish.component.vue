<template>
  <div class="col-12">
    <div class="logo_wrapper">
      <img src="img/bg_finish.png" class="bg_finish">
    </div>
    <p class="endText">{{ endText }}</p>
    <p class="endTextSmall mb-sm-5">{{ endTextSmall }}</p>
    <button id="decBack" @click="startDate()"
            class="btn btn-secondary end_btn mb-5"><i class="fas fa-arrow-right"></i>
      {{ btnText }}
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

.logo_wrapper {
  position: absolute;
  transform: translate(-25%, -19%);
  z-index: -1;
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    width: 80%;
    top: 10%;
  }

  .bg_finish {
    width: 180%;
  }
}

.endText {
  font-size: 40px;
  color: white;
  line-height: 50px;
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    font-size: 20px;
    line-height: normal;
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
  color: #fff3cd;
  border-radius: 10px;
  width: 400px;
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
    padding-right: 25px;
    transition: all 0.15s ease-in-out;
    @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
      font-size: 14px;
    }
  }

  &:hover {
    color: #d48888;

    .fas {
      transform: scale(1.5);
    }
  }
}

</style>