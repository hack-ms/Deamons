<template>
  <div class="conclusion">
    <div
      class="container"
      style="width: 100%;"
    >
      <h1 class="conclusion__title">
        Obrigado!
      </h1>
      <p class="conclusion__text">
        Recebemos sua avaliação.
      </p>
      <base-button
        type="outline"
        block
        @click="goToHome"
      >
        Página Inicial
      </base-button>
    </div>
  </div>
</template>

<script>
import BaseButton from '@/components/BaseButton.vue';

export default {
  name: 'Conclusion',
  components: {
    BaseButton,
  },
  methods: {
    goToHome() {
      this.$router.push({ name: 'home' });
    },
  },
};
</script>

<style lang="scss" scoped>
.conclusion {
  display: flex;
  height: 100vh;
  align-items: center;
  justify-content: center;
  background-color: #fff;
  text-align: center;
  color: $text;
  padding: 2.4rem;

  &__title {
    font-size: 3.2rem;
    margin-bottom: 0.8rem;
  }

  &__text {
    font-size: 1.8rem;
    margin-bottom: 4.8rem;
  }
}
</style>
