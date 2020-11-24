<template>
  <div class="col-12" id="socialMedia">
    <i class="fab fa-facebook-square mr-2" @click="shareBtn()"></i>

    <a class="mb-3 mr-2" target="_blank" id="tweet">
      <i class="fab fa-twitter-square"></i>
    </a>

    <a id="whatsapp-message" href="whatsapp://send?text=DateNina!" target="_blank">
      <i class="fab fa-whatsapp"></i>
    </a>

  </div>
</template>

<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';
import store from '@/store';


@Component
export default class SocialMedia extends Vue {
  tweetElm: any;
  currentVideoId: any;
  tweetMsg: any;
  goodEnd: boolean;
  badEnd: boolean;

  constructor() {
    super();
    this.tweetElm = document.getElementById('tweet');
    this.badEnd = store.state.badEnd;
    this.goodEnd = store.state.goodEnd;
    this.currentVideoId = store.state.video.Id;
    this.tweetMsg = store.state.twitter;
  }

  mounted() {
    if (store.state.goodEnd){
      this.currentVideoId = 10;
    }
    this.tweetElm = document.getElementById('tweet');
    const tweetSite = 'https://date-nina.rum.dev/';
    const tweetUrl = 'https://twitter.com/intent/tweet?text=' +  this.tweetMsg[this.currentVideoId] + ' ' + tweetSite;
    this.tweetElm.setAttribute('href', tweetUrl);
  }

  shareBtn() {
    this.$store.dispatch('shareBtn', true);
  }
}

</script>

<style scoped lang="less">

.fab {
  font-size: 26px;
  cursor: pointer;
}

.fa-twitter-square {
  color: #1da1f2;
  transition: 0.5s;

  &:hover {
    color: #ffffff;
  }
}

.fa-facebook-square {
  color: #1877f2;
  transition: 0.5s;

  &:hover {
    color: #ffffff;
  }
}


#whatsapp-message {
  @media (min-width: 500px) {
    display: none;
  }
  .fa-whatsapp {
    color: #49a235;
    transition: 0.5s;
    @media (max-width: 567px) and (-webkit-min-device-pixel-ratio: 2) {
      font-size: 25px;
    }

    &:hover {
      color: #ffffff;
    }
  }
}
</style>