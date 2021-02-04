<template>
  <div class="share-button btn base_btn_wrapper d-flex justify-content-center align-items-center">
    <span class="d-flex justify-content-center align-items-center" onclick="">Share Me<i class="fas fa-share-alt ml-3"></i></span>

    <a class="ml-4 m-md-0 p-md-0">
      <i class="fab fa-facebook-square" @click="shareBtn()"></i>
    </a>

    <a class="m-md-0 p-md-0" target="_blank" id="tweet">
      <i class="fab fa-twitter-square"></i>
    </a>

    <a class="m-md-0 p-md-0" id="whatsapp-message" :href="'whatsapp://send?text='+this.shareText+' https://datenina.ch/'" target="_blank">
      <i class="fab fa-whatsapp"></i>
    </a>
  </div>
</template>
<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';


@Component
export default class SocialMedia extends Vue {
  videoSteps: any;
  video: any;
  tweetElm: any;
  currentVideoID: any;
  currentLanguage: string;
  shareText: string;
  shareTextFB: string;
  videoDecision: string;

  constructor() {
    super();
    this.videoSteps = this.$store.state.siteData.steps;
    this.video = this.$store.state.video;
    this.currentVideoID = this.video.Id;
    this.videoDecision = this.video.decision;
    this.currentLanguage = this.$store.state.currentLanguage;
    this.shareText = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage]['shareText'];
    this.shareTextFB = this.videoSteps[this.currentVideoID]['content'][this.currentLanguage]['shareTextFB'];
    this.tweetElm = document.getElementById('tweet');
  }

  mounted() {
    if (this.currentVideoID == '9' && this.videoDecision == 'a') {
      if(this.currentLanguage == 'de') {
        this.shareText = 'Dieses Wochenende habe ich die richtigen Entscheidungen getroffen und hatte ein super Date mit Nina. Alle Entscheidungen richtig getroffen. Was meinst du? Kriegst du das auch hin?'
      } else if (this.currentLanguage == 'fr') {
        this.shareText = 'J\'ai pris les bonnes décisions ce week-end! Et toi? Tu penses pouvoir arriver?'
      }else if (this.currentLanguage == 'it') {
        this.shareText = 'Questo fine settimana ho preso le decisioni giuste e ho avuto un grande date con Nina. Allora, cosa ne pensi? Riuscirai anche tu?'
      }
    }
    this.tweetElm = document.getElementById('tweet');
    const tweetSite = 'https://datenina.ch/';
    const tweetUrl = 'https://twitter.com/intent/tweet?text=' + this.shareText + ' ' + tweetSite;
    this.tweetElm.setAttribute('href', tweetUrl);
  }

  shareBtn() {
    if (this.currentVideoID == '9' && this.videoDecision == 'a') {
      if(this.currentLanguage == 'de') {
        this.shareText = 'Dieses Wochenende habe ich die richtigen Entscheidungen getroffen und hatte ein super Date mit Nina. Alle Entscheidungen richtig getroffen. Was meinst du? Kriegst du das auch hin?'
      } else if (this.currentLanguage == 'fr') {
        this.shareText = 'J\'ai pris les bonnes décisions ce week-end! Et toi? Tu penses pouvoir arriver?'
      }else if (this.currentLanguage == 'it') {
        this.shareText = 'Questo fine settimana ho preso le decisioni giuste e ho avuto un grande date con Nina. Allora, cosa ne pensi? Riuscirai anche tu?'
      }
    }
    this.$store.dispatch('shareBtn', this.shareText);
  }
}

</script>

<style scoped lang="less">

.share-button {
  background: #dfe6e9;
  padding: 0 50px;
  overflow: hidden;
  position: absolute;
  transition: .3s linear;
  width: 230px;
  border: none;

  &:hover {
    a {
      opacity: 1;
      transform: translateX(0);
    }

    span {
      transform: translateX(-100%);
    }
  }
  @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {

  }
  @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
    width: 160px;
    height: 30px;
  }

  @media (max-width: 375px) and (-webkit-min-device-pixel-ratio: 2) {

  }
}

span {
  position: absolute;
  width: 100%;
  height: 100%;
  background: #6c757d;
  color: #f1f1f1;
  line-height: 80px;
  z-index: 999;
  transition: .3s linear;

}

a {
  flex: 1;
  font-size: 26px;
  margin-right: 20px;
  color: #2d3436;
  text-align: center;
  transform: translateX(-100%);
  opacity: 0;
  transition: .15s linear;

  &:nth-of-type(1) {
    transition-delay: .25s;
  }
  &:nth-of-type(2) {
    transition-delay: .2s;
  }
  &:nth-of-type(3) {
    transition-delay: .15s;
  }
}

.fab {
  font-size: 26px;
  cursor: pointer;
}

.fa-twitter-square {
  color: #1da1f2;
  transition: 0.5s;

  &:hover {
    color: #545252;
  }
}

.fa-facebook-square {
  color: #1877f2;
  transition: 0.5s;

  &:hover {
    color: #545252;
  }
}


#whatsapp-message {
  @media (min-width: 850px) {
    display: none;
  }

  .fa-whatsapp {
    color: #49a235;
    transition: 0.5s;
    @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
      font-size: 25px;
    }

    &:hover {
      color: #545252;
    }
  }
}
</style>