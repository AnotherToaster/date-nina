<template>
  <div class="row">
    <div class="embed-responsive embed-responsive-16by9" id="video-container">
      <video id="video" class="embed-responsive-item" :poster="this.video.videoPosterUrl" playsinline width="auto"
             height="100%"
             :src="this.video.videoUrl"
             @ended="videoEnded()">
        Your browser does not support the video tag.
      </video>

      <div class="start_wrapper d-flex justify-content-center" v-if="$store.state.showVideoControls">
        <StartComponent/>
      </div>

      <div class="btnFullScreen_wrapper" v-bind:class="{ btnFullScreen_isFullScreen: this.video.isFullScreen }">
        <FullScreenComponent/>
      </div>

      <div id="choices" class="choices_wrapper" v-if="$store.state.showChoices">
        <ChoicesComponent/>
      </div>

      <div id="bad-finish" class="badFinish_wrapper row" v-if="$store.state.badEnd">
        <BadFinishComponent/>
      </div>

      <div id="good-finish" class="goodFinish_wrapper row" v-if="$store.state.goodEnd">
        <GoodFinishComponent/>
      </div>

    </div>
  </div>
</template>

<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';
import BadFinishComponent from "@/components/bad-finish.component.vue";
import FullScreenComponent from "@/components/fullScreen.component.vue";
import GoodFinishComponent from "@/components/good-finish.component.vue";
import StartComponent from "@/components/start.component.vue";
import ChoicesComponent from '@/components/choices.component.vue';

@Component({
  components: {
    BadFinishComponent,
    FullScreenComponent,
    GoodFinishComponent,
    StartComponent,
    ChoicesComponent,
  },
})
export default class VideoComponent extends Vue {
  video: any;
  videoSteps: any;
  videoElm: any;
  currentLanguage: string;
  videoPoster: string;
  currentVideoID: string;
  introText: string;
  linkText: string;
  decAText: string;
  decBText: string;

  constructor() {
    super();
    this.videoSteps = this.$store.state.siteData.steps;
    this.video = this.$store.state.video;
    this.currentLanguage = this.$store.state.currentLanguage;
    this.currentVideoID = this.$store.state.video.Id;
    this.videoPoster = this.video.videoPosterUrl;
    this.introText = this.videoSteps['1']['content'][this.currentLanguage].introText;
    this.linkText = this.videoSteps['1']['content'][this.currentLanguage].linkText;
    this.decAText = '';
    this.decBText = '';

  }

  mounted() {
    this.videoElm = document.getElementById('video');
  }

  videoEnded() {
    if (this.videoSteps[this.video.Id]['content'][this.currentLanguage][this.video.decision].badEnd && !this.video.backFromFinish) {
      this.$store.dispatch('setVideoId', this.video.Id)
      this.$store.dispatch('badEnd', true);
    } else if (this.videoSteps[this.video.Id]['content'][this.currentLanguage][this.video.decision].goodEnd == true) {
      this.$store.dispatch('goodEnd', true);
    } else {
      if (this.video.backFromFinish) {
        this.$store.dispatch('backFromFinish', false)
        this.decAText = this.videoSteps[this.video.Id]['content'][this.currentLanguage].decAText;
        this.decBText = this.videoSteps[this.video.Id]['content'][this.currentLanguage].decBText;
      }
      this.$store.state.showChoices = true;
    }
  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="less">

video::-webkit-media-controls {
  display: none !important;
}

.btnFullScreen_wrapper {
  position: relative;
  width: 100%;
  bottom: 5%;
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    width: 100%;
    bottom: 10%;
  }
  @supports (-webkit-touch-callout: none) {
    //disable FS button for IPHONE only
    /* iPhone Portrait */
    @media screen and (max-device-width: 480px) {
      display: none;
    }
  }
}


.btnFullScreen_isFullScreen {
  width: 98%;
  position: absolute;
  bottom: 5%;
/*
  @media (max-width: 1400px) and (-webkit-min-device-pixel-ratio: 1) {
    width: 95%;
  }
  @media (max-width: 1024px) and (-webkit-min-device-pixel-ratio: 2) {
    width: 98%;
    bottom: -5%;
    @media screen and (orientation: landscape) {
      width: 90%;
      bottom: 35%;
    }
  }
  @media (max-width: 1024px) and (-webkit-min-device-pixel-ratio: 1) {
    width: 96%;
  }
  @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
    width: 96%;
    @media (min-height: 320px) {
      width: 100%;
      bottom: 5%;
    }
  }
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    width: 96%;
    @media screen and (orientation: landscape) {
      width: 98%;
      bottom: 10%;
    }
  }
  @media (max-width: 375px) and (-webkit-min-device-pixel-ratio: 2) {
    width: 95%;
  }
  @supports (-webkit-touch-callout: none) {
    bottom: 5%;
  }*/
}

.start_wrapper {
  position: absolute;
  top: 50%;
  left: 0;
  text-align: center;
  width: 100%;
  transform: translateY(-50%);
  padding: 40px;
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    top: 50%;
    padding: 20px;
  }

}


.choices_wrapper {
  position: absolute;
  top: 50%;
  left: 0;
  text-align: center;
  width: 100%;
  transform: translateY(-50%);
  @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
    margin: 0 0 0 0;
  }

}

.badFinish_wrapper {
  position: absolute;
  top: 50%;
  left: 10%;
  width: 60%;
  transform: translateY(-50%);
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    top: 50%;
    left: 5%;
    width: 100%;
  }
}

.goodFinish_wrapper {
  position: absolute;
  top: 42%;
  left: 10%;
  width: 60%;
  transform: translateY(-50%);
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    top: 45%;
    left: 5%;
    width: 100%;
  }
}

</style>
