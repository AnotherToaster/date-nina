<template>
  <div id="main">

    <div class="main_wrapper">
      <div class="container">
        <div class="row">
          <VideoComponent/>
        </div>
        <ShareSocial/>

          <SiteFooter/>

      </div>
    </div>
  </div>
</template>

<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';
import VideoComponent from './components/videocomponent.vue';
import SiteFooter from './components/sitefooter.vue';
import ShareSocial from './components/sharesocial.vue';

@Component({
  components: {
    VideoComponent,
    SiteFooter,
    ShareSocial
  },
})

export default class App extends Vue {

}

</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
