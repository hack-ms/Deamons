<template>
  <div class="details">
    <div
      v-if="ubs"
      class="container"
      style="display: flex; flex-direction: column; height: 100%"
    >
      <header class="details__header">
        <span class="details__sigla">UBS</span>
        <span>Unidade básica de saúde</span>
      </header>
      <header-und :und="ubs" />
      <!-- <div class="details__gestor">
        <div class="label">
          Gestor Responsável
        </div>
        <div class="info">
          Marcelo Silva
        </div>
      </div> -->
      <div class="details__more-actions">
        <div>
          <div class="label">
            Avalicações
          </div>
          <div class="info">
            {{ ubs.avaliacao.media_avaliacao }}
            <span class="fa fa-fw fa-star" />
          </div>
        </div>
        <div>
          <div class="label">
            Participações
          </div>
          <div class="info">
            {{ ubs.avaliacao.qtd_avaliacoes }}
          </div>
        </div>
      </div>
      <div class="details__more-actions">
        <div>
          <div class="label">
            Média espera
          </div>
          <div class="info">
            {{ ubs.avaliacao.media_espera }}
          </div>
        </div>
        <div>
          <div class="label">
            Funcionários
          </div>
          <div class="info">
            {{ ubs.funcionarios.length }}
          </div>
        </div>
      </div>
      <div class="details__more-actions">
        <div>
          <div class="label">
            Principal frustação
          </div>
          <div class="info">
            {{ principalFrustracao }}
          </div>
        </div>
      </div>
      <div style="margin-top: auto">
        <base-button
          type="primary"
          block
          @click="analisar"
        >
          Analisar
        </base-button>
        <base-button
          type="outline"
          block
          @click="voltar"
        >
          Voltar
        </base-button>
      </div>
    </div>
    <div v-else>
      Nenhum registro encontrado
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex';
import HeaderUnd from '@/components/HeaderUnd.vue';
import BaseButton from '@/components/BaseButton.vue';

export default {
  name: 'Details',
  components: {
    HeaderUnd,
    BaseButton,
  },
  data() {
    return {
      frustracoes: {
        faltaMaterial: 'Falta de materiais',
        superlotacao: 'Superlotação',
        dificuldadeAcesso: 'Dificuldade de acesso',
      },
    };
  },
  computed: {
    ...mapState(['listUbs', 'ubsSelected']),
    principalFrustracao() {
      return this.ubsSelected.avaliacao
      && this.frustracoes[this.ubsSelected.avaliacao.principal_frustracao];
    },
    ubs() {
      return this.listUbs.find(ubs => ubs.co_cnes === this.ubsSelected);
    },
  },
  methods: {
    analisar() {
      this.$router.push({ name: 'rating' });
    },
    voltar() {
      this.$router.go(-1);
    },
  },
};
</script>

<style lang="scss" scoped>
.details {
  padding: 2.4rem;
  background-color: #fff;
  height: 100vh;

  &__header {
    text-transform: uppercase;
    color: $text;
    letter-spacing: 0.2rem;
    font-size: 1.2rem;
    display: flex;
    align-items: center;
    margin-bottom: 1.8rem;
  }

  &__sigla {
    color: $text-light;
    letter-spacing: 0;
    font-size: 1.6rem;
    margin-right: 1.6rem;
    font-weight: 900;
  }

  &__gestor {
    margin: 3.2rem 0 2.4rem;
  }

  &__more-actions {
    display: flex;
    margin-bottom: 2.4rem;

    & > div {
      flex: 1;
    }
  }
}
.label {
  color: $text-dark;
  font-weight: bold;
  font-size: 1.4rem;

  & + .info {
    margin-top: 0.4rem;
  }
}

.info {
  color: $text-light;
  font-size: 1.8rem;
}
</style>
