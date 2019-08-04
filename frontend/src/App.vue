<template>
  <div id="app">
    <router-view />
  </div>
</template>

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
  height: 100%;
}
</style>
