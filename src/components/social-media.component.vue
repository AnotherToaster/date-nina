<template>
  <div class="col-12" id="socialMedia">
    <i class="fab fa-facebook-square mr-2" @click="shareBtn()"></i>

    <a class="mb-3 mr-2" target="_blank" id="tweet">
      <i class="fab fa-twitter-square"></i>
    </a>
    <i class="fab fa-whatsapp"></i>
  </div>
</template>

<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';
import store from '@/store';


@Component
export default class SocialMedia extends Vue {
  tweetElm: any;
  currentVideoIdStore: number;

  constructor() {
    super();
    this.tweetElm = document.getElementById('tweet');
    this.currentVideoIdStore = store.state.currentVideoIdStore;
  }

  mounted() {

    this.tweetElm = document.getElementById('tweet');
    const tweetUrl = 'Ich%20wurde%20beim%20Rasen%20erwischt!%20Und%20das%20beim%20Date%20mit%20Nina...%20:(%20Vielleicht%20machst%20du%20es%20ja%20besser?';
    const strLink = "https://twitter.com/intent/tweet?text=" + tweetUrl + '';
    this.tweetElm.setAttribute("href", strLink);
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
</style>