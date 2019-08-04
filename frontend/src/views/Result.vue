<template>
  <div class="result">
    <div class="container">
      <h1 class="result__title">
        Identificação
      </h1>
      <div
        v-for="item in listUbs"
        :key="item.co_cnes"
        class="result__item"
        @click="showDetails(item.co_cnes)"
      >
        <header-und :und="item" />
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapMutations } from 'vuex';
import HeaderUnd from '@/components/HeaderUnd.vue';

export default {
  name: 'Result',
  components: {
    HeaderUnd,
  },
  computed: {
    ...mapState(['listUbs']),
  },
  methods: {
    ...mapMutations(['setUbsSelected']),
    showDetails(ubsId) {
      this.setUbsSelected(ubsId);
      this.$router.push({ name: 'details' });
    },
  },
};
</script>

<style lang="scss" scoped>
.result {
  height: 100vh;
  overflow: auto;
  padding: 2.4rem;
  background-color: #fff;

  &__item {
    padding-bottom: 2.6rem;
    border-bottom: 0.2rem solid $border-color;

    & + & {
      margin-top: 3.2rem;
    }
  }

  &__title {
    color: $text-light;
    text-transform: uppercase;
    font-family: $font-head;
    font-size: 2rem;
    text-align: center;
    margin: 2.4rem 0 4rem;
  }
}
</style>
