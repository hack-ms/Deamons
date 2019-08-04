<template>
  <header class="header-und">
    <h3 class="header-und__name">
      {{ und.no_fantasia }}
    </h3>
    <div class="header-und__info">
      <span class="header-und__icon fa fa-map-marker fa-fw" />
      <span>
        {{ und.no_logradouro }},
        {{ und.nu_endereco }},
        {{ und.no_bairro }}
      </span>
    </div>
    <div class="header-und__info">
      <span class="header-und__icon fa fa-globe fa-fw" />
      <span>{{ und.cidade }} - {{ und.uf }}</span>
    </div>
  </header>
</template>

<script>
export default {
  name: 'HeaderUnd',
  props: {
    und: {
      type: Object,
      default: () => ({}),
    },
  },
};
</script>

<style lang="scss" scoped>
.header-und {
  &__name {
    font-size: 2rem;
    font-weight: 900;
    color: $text-dark;
    font-family: $font-head;
    margin-bottom: 1.6rem;
  }

  &__info {
    margin-bottom: 0.8rem;
    text-transform: uppercase;
  }

  &__icon {
    margin-right: 0.8rem;
    font-size: 1.6rem;
  }
}
</style>
