<template>
  <div class="row">
    <div class="embed-responsive embed-responsive-16by9" v-bind:class="{ videoContainerFS: $store.state.isFS }"
         id="video_container">
      <video id="video" class="embed-responsive-item" :poster="videoPoster" playsinline width="auto"
             height="100%"
             :src="videoSrc"
             @ended="videoEnded()">
        Your browser does not support the video tag.
      </video>
      <div class="video_controls_wrapper d-flex justify-content-center">
        <div id="control" class="row" v-if="$store.state.showVideoControls">
          <div class="col-12 d-flex justify-content-center">
            <p id="intro_text">{{ introText }}</p>
          </div>
          <div class="col-12 d-flex justify-content-center">
            <button class="btn btn-secondary base_btn_wrapper" id="start_btn" v-on:click="startDate()">
              <i class="fas fa-play"></i>
              <p class="start_btn_text">{{ linkText }}</p>
            </button>
          </div>
        </div>
      </div>
      <div class="btnFS_wrapper" v-bind:class="{ btnFS_FS: $store.state.isFS }">
        <div class="col-12 d-flex justify-content-end">
          <div class="btnFS btn" v-on:click="switchFS()"><span class="icon-fullscreen"></span></div>
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
      <div id="altFinish" v-if="$store.state.isEnd" class="end_wrapper row">
        <div class="col-12">
          <p class="endText">{{ endText }}</p>
          <p class="endText_fail mb-sm-5">{{ endTextFail }}</p>
          <button id="goBack" class="btn btn-secondary end_btn" @click="goBack()"><i
              class="fas fa-angle-double-left"></i>
            {{ altFinishBtnText }}
          </button>
        </div>
      </div>
      <div id="finish" class="finish_wrapper row" v-if="$store.state.isFinish">
        <div class="col-12">
          <div class="logo_wrapper">
            <img src="img/bg_finish.png" class="bg_finish">
          </div>
          <p class="endText">{{ endText }}</p>
          <p class="endTextSmall mb-sm-5">{{ endTextSmall }}</p>
          <button id="decBack" @click="startDate()"
                  class="btn btn-secondary end_btn"><i class="fas fa-arrow-right"></i>
            {{ linkText }}
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
  videoPoster: string;
  currentLanguage: string;
  introText: string;
  linkText: string;
  endText: string;
  endTextFail: string;
  altFinishBtnText: string;
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
  videoContainer: any;
  isFS: boolean;

  constructor() {
    super();
    this.content = this.$store.state.siteData;
    this.videoSteps = this.$store.state.siteData.steps;
    this.currentLanguage = this.$store.state.currentLanguage;
    this.videoSrc = '';
    this.currentVideoID = '1';
    this.nextVideoID = '2';
    this.decAB = 'a';
    this.videoContainer = document.getElementById('video_container');
    this.videoELm = document.getElementById('video');
    this.decABtn = document.getElementById('decA');
    this.decBBtn = document.getElementById('decB');
    this.videoPoster = this.$store.state.videoPosterUrl;
    this.videoSrc = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage]['a'].videoURL;
    this.decAText = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage].decAText;
    this.decBText = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage].decBText;
    this.introText = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage].introText;
    this.linkText = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage].linkText;
    this.altFinishBtnText = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage].altFinishBtnText;
    this.endText = '';
    this.endTextFail = '';
    this.endTextSmall = '';
    this.videoTimer = false;
    this.isFS = this.$store.state.isFS;
    this.backLink = this.videoSteps[this.currentVideoID].backLink;
  }

  mounted() {
    this.videoELm = document.getElementById('video');
    this.videoContainer = document.getElementById('video_container');
    this.videoSrc = 'videos/de/step_1.mp4';
    this.videoPoster = this.$store.state.videoPosterUrl;
  }


  playVideo() {
    if (this.videoTimer) {
      this.videoELm.currentTime = (this.videoELm.duration / 100) * 90;
    }
    this.videoTimer = false;
    this.$store.state.showChoices = false;
    this.$store.state.showVideoControls = false;
    this.$store.state.isFinish = false;
    this.$store.state.isEnd = false;
    this.videoELm.play();
  }

  startDate() {
    this.videoPoster = '';
    this.nextVideoID = '2';
    this.decAB = 'a';
    this.$store.state.isEnd = false;
    this.$store.state.isFinish = false;
    this.$store.state.showChoices = false;
    this.$store.state.showVideoControls = false;
    this.videoSrc = 'videos/de/step_1.mp4';
    this.currentVideoID = '1';
    this.decAText = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage].decAText;
    this.decBText = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage].decBText;
    setTimeout(() => {
      this.playVideo();
    }, 150)
  }

  nextVideo(decAB: string) {
    this.decAB = decAB;
    this.nextVideoID = this.videoSteps[this.currentVideoID].next.step;
    this.videoSrc = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage][this.decAB].videoURL
    this.decAText = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage].decAText;
    this.decBText = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage].decBText;
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
    if (this.videoSteps[this.currentVideoID]['content'][this.currentLanguage][this.decAB].isEnd == true) {
      this.$store.state.isEnd = true;
      this.endText = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage][this.decAB].endText;
      this.endTextFail = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage][this.decAB].endTextFail;
    } else if (this.videoSteps[this.currentVideoID]['content'][this.currentLanguage][this.decAB].isFinish == true) {
      this.$store.state.isFinish = true;
      this.endText = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage][this.decAB].endText;
      this.endTextSmall = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage][this.decAB].endTextSmall;
    } else {
      this.currentVideoID = this.nextVideoID;
      this.$store.state.showChoices = true;
    }
  }

  goBack() {
    this.nextVideoID = this.currentVideoID;
    this.decAB = 'a';
    this.backLink = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage].backLink;
    this.currentVideoID = this.backLink.charAt(0);
    this.videoSrc = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage][this.decAB].videoURL;
    this.decAText = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage].decAText;
    this.decBText = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage].decBText;
    setTimeout(() => {
      this.videoTimer = true
      this.playVideo();
    }, 500)
  }

  switchFS() {
    if (!this.$store.state.isFS) {
      if (this.videoContainer.requestFullscreen) {
        this.videoContainer.requestFullscreen();
      } else if (this.videoContainer.msRequestFullscreen) {
        this.videoContainer.msRequestFullscreen();
      } else if (this.videoContainer.mozRequestFullScreen) {
        this.videoContainer.mozRequestFullScreen();
      } else if (this.videoContainer.webkitRequestFullscreen) {
        this.videoContainer.webkitRequestFullscreen();
      }
      this.$store.dispatch('isFS', true)
    } else if (this.$store.state.isFS) {
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
      }
      this.$store.dispatch('isFS', false)
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="less">

.videoContainerFS {
/*  @supports (-webkit-touch-callout: none) {
    position: fixed;
    height: 100vh;
    width: 100vw;
    left: 0;
    top: 0;
    z-index: 99;
  }*/
}

video::-webkit-media-controls {
  display: none !important;
}

.video_controls_wrapper {
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

  #control {
    @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
      width: 80%;
    }

    #start_btn {
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

    .start_btn_text {
      padding: 0;
      margin: 0;
      @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
        font-size: 14px;
        margin: 0;
        padding: 0;
      }
      @media (max-width: 375px) and (-webkit-min-device-pixel-ratio: 2) {
        font-size: 11px;
      }
    }

    #intro_text {
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
}

.btnFS_wrapper {
  position: relative;
  width: 100%;
  bottom: 5%;
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    width: 100%;
    bottom: 10%;
  }
  @supports (-webkit-touch-callout: none) { //disable FS button for IPHONE only
    /* iPhone Portrait */
    @media screen and (max-device-width: 480px) {
      display: none;
    }
  }

  .btnFS {
    width: 30px;
    height: 30px;
    border-radius: 5px;
    background: rgba(0, 0, 0, 0.5);
    border: 1px solid rgba(0, 0, 0, 0.7);

    .icon-fullscreen {
      background: url('https://s.cdpn.io/6035/vp_sprite.png') no-repeat 0 0;
      width: 10px;
      height: 10px;
      display: block;
      margin: 3px 0 0 -2px;
    }
  }

}

.btnFS_FS {
  width: 98%;
  @media (max-width: 1400px) and (-webkit-min-device-pixel-ratio: 1) {
    width: 95%;
    top: 17%;
  }
  @media (max-width: 1024px) and (-webkit-min-device-pixel-ratio: 2) {
    width: 98%;
    bottom: -5%;
    top: unset;
    @media screen and (orientation: landscape) {
      width: 90%;
      bottom: 35%;
    }
  }
  @media (max-width: 1024px) and (-webkit-min-device-pixel-ratio: 1) {
    width: 96%;
    top: 20%;
  }
  @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
    width: 96%;
    top: 23%;
    @media (min-height: 320px) {
      top: unset;
      bottom: 15%;
    }
  }
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    width: 96%;
    top: 28%;
    @media screen and (orientation: landscape) {
      width: 98%;
      bottom: 10%;
    }
  }
  @media (max-width: 375px) and (-webkit-min-device-pixel-ratio: 2) {
    width: 95%;
    top: 40%;
  }
  @supports (-webkit-touch-callout: none) {
    position: absolute;
    bottom: 5%;
    top: unset;
  }
}


.icon-fullscreen {
  transform: scale(1.2);
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

  .choice_btn {
    background-image: linear-gradient(#4702fb, #3402b6);
    color: #fff3cd;
    border-radius: 10px;
    width: 260px;
    height: 60px;
    font-size: 1.1rem;
    position: relative;
    border: none;
    @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
      font-size: 0.75rem;
      width: 150px;
      height: 50px;
    }
  }
}

.end_wrapper {
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

  .endText {
    color: #FFF;
    line-height: 40px;
    font-size: 40px;
    font-family: Arial, Verdana, sans-serif;
    @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
      line-height: 30px;
      font-size: 20px;
    }
  }

  .endText_fail {
    color: #c61b26;
    font-size: 26px;
    font-family: Arial, Verdana, sans-serif;
    @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
      font-size: 16px;
    }
  }

  .end_btn {
    background-image: linear-gradient(#4702fb, #3402b6);
    color: #fff3cd;
    border-radius: 10px;
    width: 400px;
    height: 60px;
    font-size: 1.1rem;
    position: relative;
    border: none;
    @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
      width: 245px;
      height: 50px;
      font-size: 14px;
    }

    .fas {
      font-size: 20px;
      padding-right: 25px;
      transition: all 0.15s ease-in-out;
      @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
        padding-right: 10px;
      }
    }

    &:hover {
      color: #d48888;

      .fas {
        transform: scale(1.5);
      }
    }
  }
}

.finish_wrapper {
  position: absolute;
  top: 40%;
  left: 10%;
  width: 60%;
  transform: translateY(-50%);
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    top: 45%;
    left: 5%;
    width: 100%;
  }

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
    background-image: linear-gradient(#4702fb, #3402b6);
    color: #fff3cd;
    border-radius: 10px;
    width: 400px;
    height: 60px;
    font-size: 1.1rem;
    position: relative;
    border: none;
    @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
      top: 20px;
      width: 210px;
      height: 40px;
    }

    .fas {
      font-size: 20px;
      padding-right: 25px;
      transition: all 0.15s ease-in-out;
    }

    &:hover {
      color: #d48888;

      .fas {
        transform: scale(1.5);
      }
    }
  }
}

.base_btn_wrapper {
  background-image: linear-gradient(#4702fb, #3402b6);
  color: #fff3cd;
  border-radius: 10px;
  width: 260px;
  height: 60px;
  font-size: 1.1rem;
  position: relative;
  border: none;
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    width: 230px;
    height: 50px;
  }

  &:hover {
    color: #d48888;

    .fas {
      transform: scale(1.5);
    }
  }

  .fas {
    transition: all 0.15s ease-in-out;
    position: absolute;
    top: 40%;
    left: 35px;
    transform-origin: left center;
  }
}

.fa {
  font-size: 10px;
  padding-right: 10px;
}

.fas {
  font-size: 10px;
  padding-right: 10px;
}

</style>
