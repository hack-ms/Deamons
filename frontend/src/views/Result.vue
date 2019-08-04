<template>
  <div class="result">
    <h1 class="result__title">
      Identificação
    </h1>
    <div
      v-for="item in list"
      :key="item.cnes"
      class="result__list"
    >
      <h3>{{ item.nome }}</h3>
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
          cnes: '2134',
          nome: 'Aero Rancho',
          endereco: 'Av. Rachel de Queiroz, 995',
          cidade: 'Campo Grande',
        },
      ],
    };
  },
};
</script>

<style lang="scss" scoped>
.result {
  padding: 2.4rem;
  background-color: #fff;
}
</style>
