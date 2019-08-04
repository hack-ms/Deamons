<template>
  <div class="home">
    <div class="intro">
      <img
        class="intro__logo"
        alt="Vue logo"
        src="../assets/logo.png"
      >
      <h1 class="intro__title">
        Compartilhe sua experiência sobre a saúde básica
      </h1>
    </div>
    <div class="main-actions">
      <input-action
        class-icon="fa fa-fw fa-search"
        :class-icon-button="actionIcon"
        placeholder="Busque uma unidade"
        style="margin-bottom: 1.6rem;"
        :value="searchText"
        @click="search"
        @input="setSearchText"
      />
      <base-button
        block
        class-icon="fa fa-fw fa-map-marker"
      >
        Quero me localizar agora
      </base-button>
    </div>
  </div>
</template>

<script>
import { mapActions } from 'vuex';

import InputAction from '@/components/InputAction.vue';
import BaseButton from '@/components/BaseButton.vue';

export default {
  name: 'Home',
  components: {
    InputAction,
    BaseButton,
  },
  data() {
    return {
      searchText: '',
      loadingIcon: 'fa fa-spinner fa-spin fa-fw',
      buttonIcon: 'fa fa-fw fa-arrow-right',
      actionIcon: 'fa fa-fw fa-arrow-right',
    };
  },
  methods: {
    ...mapActions(['fetchListUbs']),
    async search() {
      if (this.searchText) {
        try {
          this.actionIcon = this.loadingIcon;
          await this.fetchListUbs(this.searchText);
          this.actionIcon = this.buttonIcon;
        } catch (err) {
          console.log(err);
        }
        this.$router.push({ name: 'result' });
      }
    },
    setSearchText(value) {
      this.searchText = value;
    },
  },
};
</script>

<style lang="scss" scoped>
.home {
  height: 100vh;
  background: $gradient-primary;
  color: #fff;
}

.intro {
  text-align: center;
  padding: 0 2.4rem;

  &__logo {
    margin: 0 auto;
    padding: 5.6rem 0;
    height: auto;
    max-width: 20rem;
    display: block;
  }

  &__title {
    padding-bottom: 6.4rem;
    font-size: 2rem;
    font-family: $font-head;
    line-height: 1.5;
    text-transform: uppercase;
  }
}

.main-actions {
  padding: 0 2.4rem;
}
</style>
