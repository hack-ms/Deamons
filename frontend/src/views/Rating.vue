<template>
  <div class="rating">
    <h1 class="rating__title">
      Sua avalição
    </h1>
    <base-input
      label="Quando foi sua visita?"
      placeholder="00/00/00"
    />
    <base-input
      label="Você recebeu atendimento?"
      placeholder="Escolha uma opção"
    />
    <base-input
      label="Quanto tempo você esperou até ser atendido?"
      placeholder="Escolha uma opção"
    />
    <base-input
      label="Houve falta de material?"
      placeholder="Escolha uma opção"
    />
    <base-input
      label="Havia superlotação na espera?"
      placeholder="Escolha uma opção"
    />
    <base-input
      label="Você teve dificuldade no acesso?"
      placeholder="Escolha uma opção"
    />
    <base-input
      label="Avalie o atendimento"
      placeholder="Escolha uma opção"
    />
    <base-button
      type="primary"
      block
      @click="enviar"
    >
      Enviar avalição
    </base-button>
    <base-button
      type="outline"
      block
      @click="voltar"
    >
      Voltar
    </base-button>
  </div>
</template>

<script>
import BaseInput from '@/components/BaseInput.vue';
import BaseButton from '@/components/BaseButton.vue';


export default {
  name: 'Rating',
  components: { BaseInput, BaseButton },
  methods: {
    voltar() {
      this.$router.go(-1);
    },
    enviar() {
      this.$router.push({ name: 'conclusion' });
    },
  },
};
</script>

<style lang="scss" scoped>
.rating {
  height: 100vh;
  padding: 2.4rem;
  overflow: auto;
  background-color: #fff;

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
