<template>
  <div class="row">
    <div class="embed-responsive embed-responsive-16by9" id="video_container">
      <video id="video" class="embed-responsive-item" :poster="videoPoster" playsinline width="auto" height="100%"
             :src="videoSrc"
             @ended="videoEnded()">
        Your browser does not support the video tag.
      </video>
      <div class="video_controls_wrapper d-flex justify-content-center">
        <div id="control" class="control" v-if="$store.state.showVideoControls">
          <p class="intro_text" id="intro_text">{{ introText }}</p>
          <button class="btn btn-secondary base_btn_wrapper start_btn" id="start_btn" v-on:click="startDate()">
            <i class="fas fa-play"></i>
            <p class="start_btn_text">{{ linkText }}</p>
          </button>
        </div>
      </div>
      <div id="choices" class="choices_wrapper row" v-if="$store.state.showChoices">
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
      <div id="end" v-if="$store.state.isEnd" class="end_wrapper row">
        <div class="col-12">
          <p class="endText">{{ endText }}</p>
          <p class="endText_fail mb-sm-5">{{ endTextFail }}</p>
          <button id="goBack" class="btn btn-secondary end_btn" @click="goBack()"><i class="fas fa-angle-double-left"></i>
            ZURÜCK ZUR ENTSCHEIDUNG
          </button>
        </div>
      </div>
      <div id="happyEnd" class="happyEnd_wrapper row" v-if="$store.state.isHappyEnd">
        <div class="col-12">
          <div class="logo_wrapper">
            <img src="img/bg_finish.png" class="bg_finish">
          </div>
          <p class="endText">{{ endText }}</p>
          <p class="endTextSmall mb-sm-5">{{ endTextSmall }}</p>
          <button id="decBack" @click="startDate()"
                  class="btn btn-secondary end_btn"><i class="fas fa-arrow-right"></i>
            Neues Date
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';

@Component
export default class VideoComponent extends Vue {
  content: Array<string>;
  videoELm: any;
  videoPoster: any;
  introText: string;
  linkText: string;
  endText: string;
  endTextFail: string;
  decABtn: any;
  decBBtn: any;
  videoSrc: string;
  decAText: string;
  decBText: string;
  videoSteps: any;
  currentVideoID: string;
  nextVideoID: string;
  decAB: string;
  endTextSmall: string;
  backLink: string;
  videoTimer: boolean;

  constructor() {
    super();
    this.content = this.$store.state.siteData;
    this.videoSteps = this.$store.state.siteData.steps;
    this.videoSrc = '';
    this.currentVideoID = '1';
    this.nextVideoID = '2';
    this.decAB = 'a';
    this.videoELm = document.getElementById('video');
    this.decABtn = document.getElementById('decA');
    this.decBBtn = document.getElementById('decB');
    this.videoPoster = this.$store.state.videoPosterUrl;
    this.videoSrc = this.videoSteps[this.currentVideoID]['a'].videoURL;
    this.decAText = this.videoSteps[this.currentVideoID].decAText;
    this.decBText = this.videoSteps[this.currentVideoID].decBText;
    this.introText = this.videoSteps[this.currentVideoID].introText;
    this.linkText = this.videoSteps[this.currentVideoID].linkText;
    this.endText = '';
    this.endTextFail = '';
    this.endTextSmall = '';
    this.videoTimer = false;
    this.backLink = this.videoSteps[this.currentVideoID].backLink;
  }

  mounted() {
    this.videoELm = document.getElementById('video');
    this.videoSrc = this.videoSteps[this.currentVideoID]['a'].videoURL;
    this.videoPoster = this.$store.state.videoPosterUrl;
  }


  playVideo() {
    if (this.videoTimer) {
      this.videoELm.currentTime =  (this.videoELm.duration / 100) * 90;
    }
    this.videoTimer = false;
    this.$store.state.showChoices = false;
    this.$store.state.showVideoControls = false;
    this.$store.state.isHappyEnd = false;
    this.$store.state.isEnd = false;
    this.videoELm.play();
  }

  startDate() {
    this.videoPoster = '';
    this.nextVideoID = '2';
    this.decAB = 'a';
    this.$store.state.isEnd = false;
    this.$store.state.isHappyEnd = false;
    this.$store.state.showChoices = false;
    this.$store.state.showVideoControls = false;
    this.videoSrc = 'videos/step_1.mp4';
    this.currentVideoID = '1';
    this.decAText = this.videoSteps[this.currentVideoID].decAText;
    this.decBText = this.videoSteps[this.currentVideoID].decBText;
    setTimeout(() => {
      this.playVideo();
    }, 150)
  }

  nextVideo(decAB: string) {
    this.decAB = decAB;
    this.nextVideoID = this.videoSteps[this.currentVideoID].next.step;
    this.videoSrc = this.videoSteps[this.currentVideoID][this.decAB].videoURL
    this.decAText = this.videoSteps[this.currentVideoID].decAText;
    this.decBText = this.videoSteps[this.currentVideoID].decBText;
    this.$store.state.showChoices = false;
    setTimeout(() => {
      this.playVideo();
    }, 150)
  }

  isEnd() {
    this.$store.state.showChoices = false;
    this.$store.state.isEnd = true;
  }

  videoEnded() {
    if (this.videoSteps[this.currentVideoID][this.decAB].isEnd == true) {
      this.$store.state.isEnd = true;
      this.endText = this.videoSteps[this.currentVideoID][this.decAB].endText;
      this.endTextFail = this.videoSteps[this.currentVideoID][this.decAB].endTextFail;
    } else if (this.videoSteps[this.currentVideoID][this.decAB].isHappyEnd == true) {
      this.$store.state.isHappyEnd = true;
      this.endText = this.videoSteps[this.currentVideoID][this.decAB].endText;
      this.endTextSmall = this.videoSteps[this.currentVideoID][this.decAB].endTextSmall;
    }
    else {
      this.currentVideoID = this.nextVideoID;
      this.$store.state.showChoices = true;
    }
  }

  goBack() {
    this.nextVideoID = this.currentVideoID;
    this.decAB = 'a';
    this.backLink = this.videoSteps[this.currentVideoID].backLink;
    this.currentVideoID = this.backLink.charAt(0);
    this.videoSrc = this.videoSteps[this.currentVideoID][this.decAB].videoURL;
    this.decAText = this.videoSteps[this.currentVideoID].decAText;
    this.decBText = this.videoSteps[this.currentVideoID].decBText;
    setTimeout(() => {
      this.videoTimer = true
      this.playVideo();
    }, 500)
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
