<template>
  <div id="app">
    <transition name="fade">
      <router-view class="child-view" />
    </transition>
  </div>
</template>

<script>
export default {
  name: 'App',
  data() {
    return {
      transitionName: 'slide-left',
    };
  },
};
</script>


<style lang="scss">
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  outline: 0
}

html {
  font-size: 62.5%;
  height: 100%;
}

body {
  font-family: $font-body;
  font-size: 1.4rem;
  background-color: $bg-color;
  color: $text;
  height: 100vh;
}

.fade-enter-active, .fade-leave-active {
  transition: opacity .2s ease;
}
.fade-enter, .fade-leave-active {
  opacity: 0;
}
</style>
