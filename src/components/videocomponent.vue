<template>
  <div class="embed-responsive embed-responsive-16by9" id="video_container">
    <video id="video" class="embed-responsive-item" width="auto" height="100%"
           :src="videoSrc"
           @ended="videoEnded()">
      Your browser does not support the video tag.
    </video>
    <div class="video_controls_wrapper">
      <div id="control" class="control" v-if="$store.state.showVideoControls">
        <p class="intro_text" id="intro_text">{{ content.text }}</p>
        <button class="btn btn-secondary start_btn" id="start_btn" v-on:click="startDate()">
          <i class="fas fa-play"></i>
          {{ content.linktext }}
        </button>
      </div>
    </div>
    <div id="choices" class="choices_wrapper row" v-if="$store.state.showChoices">
      <div class="col-6">
        <button id="decA" @click="nextVideo(videoUrl = 'a' )"
                class="btn btn-secondary choice_btn">{{ decAText }}
        </button>
      </div>
      <div class="col-6">
        <button id="decB" @click="nextVideo(videoUrl = 'b' )"
                class="btn btn-secondary choice_btn">{{ decBText }}
        </button>
      </div>
    </div>
  </div>

</template>

<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';
import axios from 'axios';
import store from "@/store";

@Component
export default class VideoComponent extends Vue {
  content: Array<string>;
  videoELm: any;
  decABtn: any;
  decBBtn: any;
  videoSrc: string;
  decAText: string;
  decBText: string;
  responseString: any;


  constructor() {
    super();
    this.content = this.$store.state.siteData;
    this.videoSrc = 'videos/step_1.mp4';
    this.videoELm = document.getElementById('video');
    this.decABtn = document.getElementById('decA');
    this.decBBtn = document.getElementById('decB');
    this.decAText = this.$store.state.siteData.decGoodText;
    this.decBText = this.$store.state.siteData.decBadText;
    this.responseString = 'url2a';
  }

  mounted() {
    this.videoELm = document.getElementById('video');
  }


  playVideo() {
    this.videoELm.play();
  }

  startDate() {
    this.$store.state.showChoices = false;
    this.$store.state.showVideoControls = false;
    this.playVideo();
  }

  nextVideo(videoUrl: string) {
    this.videoSrc = 'videos/step_2' + videoUrl + '.mp4';
    axios.get('http://localhost:8080/appConfigs.json')
        .then((response) => {
          store.dispatch('siteContent', response.data.url2a);
          this.decAText = this.$store.state.siteData.decGoodText;
          this.decBText = this.$store.state.siteData.decBadText;
        }, (error) => {
          console.log(error);
        });
    this.$store.state.showChoices = false;
    setTimeout(() => {
      this.playVideo();
    }, 500)
  }


  videoEnded() {
    this.$store.state.showChoices = true;
  }


}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
