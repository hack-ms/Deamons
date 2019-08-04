<template>
  <div class="result">
    <h1 class="result__title">
      Identificação
    </h1>
    <div
      v-for="item in list"
      :key="item.co_cnes"
      class="result__item"
    >
      <h3 class="result__name">
        {{ item.no_fantasia }}
      </h3>
      <div class="result__info">
        <span class="result__icon fa fa-map-marker" />
        <span>
          {{ item.no_logradouro }},
          {{ item.nu_endereco }},
          {{ item.no_bairro }}
        </span>
      </div>
      <div class="result__info">
        <span class="result__icon fa fa-map-marker" />
        <span>
          {{ item.cidade }} - {{ item.uf }}
        </span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Result',
  data() {
    return {
      list: [
        {
          gid: 1,
          co_cnes: 2735180,
          lat: '-23.7792527675622',
          long: '-52.3512911796555',
          no_fantasia: 'POSTO DE SAUDE DE FIGUEIRA DO OESTE',
          no_logradouro: 'AVENIDA PIQUIRI',
          nu_endereco: 'S/N',
          no_bairro: 'DISTRITO',
          nu_telefone: '(44)3533-1180',
          co_cep: '87270000',
          uf: 'PR',
          cidade: 'Engenheiro Beltrão',
        },
        {
          gid: 1,
          co_cnes: 424233,
          lat: '-23.7792527675622',
          long: '-52.3512911796555',
          no_fantasia: 'AERO RANCHO',
          no_logradouro: 'AVENIDA PIQUIRI',
          nu_endereco: '280',
          no_bairro: 'DISTRITO',
          nu_telefone: '(44)3533-1180',
          co_cep: '87270000',
          uf: 'MS',
          cidade: 'Campo Grande',
        },
      ],
    };
  },
};
</script>

<style lang="scss" scoped>
.result {
  height: 100vh;
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
    color: $primary;
    font-family: $font-head;
    font-size: 2.4rem;
    text-align: center;
    margin: 2.4rem 0 4rem;
  }

  &__name {
    font-size: 2.2rem;
    font-weight: 900;
    color: $text-dark;
    margin-bottom: 2.4rem;
  }

  &__info {
    margin-bottom: 0.8rem;
  }

  &__icon {
    margin-right: 0.8rem;
  }

}
</style>
