<template>
  <div class="col-12 d-flex align-self-end justify-content-end">
    <div class="btnFS btn" v-on:click="switchFS()"><span class="icon-fullscreen"></span></div>
  </div>
</template>

<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';

@Component
export default class FullScreenComponent extends Vue {
  videoContainer: any;
  video: any;

  constructor() {
    super();
    this.video = this.$store.state.video;

  }

  mounted() {
    this.videoContainer = document.getElementById('video-container');
  }

  switchFS() {
    if (!this.video.isFullScreen) {
      if (this.videoContainer.requestFullscreen) {
        this.videoContainer.requestFullscreen();
      } else if (this.videoContainer.msRequestFullscreen) {
        this.videoContainer.msRequestFullscreen();
      } else if (this.videoContainer.mozRequestFullScreen) {
        this.videoContainer.mozRequestFullScreen();
      } else if (this.videoContainer.webkitRequestFullscreen) {
        this.videoContainer.webkitRequestFullscreen();
      }
      this.$store.dispatch('isFullScreen', true)
    } else if (this.video.isFullScreen) {
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
      }
      this.$store.dispatch('isFullScreen', false)
    }
  }

}

</script>

<style scoped lang="less">

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

.icon-fullscreen {
  transform: scale(1.2);
}
</style>