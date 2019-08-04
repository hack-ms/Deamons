<template>
  <div class="input-action">
    <span :class="classIcon" />
    <input
      class="input-action__entry"
      type="text"
      :placeholder="placeholder"
    >
    <span
      :class="classIconButton"
      @click="handler"
    />
  </div>
</template>

<script>
export default {
  name: 'InputAction',
  props: {
    placeholder: {
      type: String,
      default: '',
    },
    classIcon: {
      type: String,
      default: '',
    },
    classIconButton: {
      type: String,
      default: '',
    },
    handler: {
      type: Function,
      default: () => () => {},
    },
  },
};
</script>

<style lang="scss" scoped>
.input-action {
  background-color: #fff;
  width: 100%;
  height:7.2rem;
  display: flex;
  border-radius: 0.8rem;
  box-shadow: $box-shadow-level-1;
  padding: 1.6rem;
  font-size: 1.8rem;
  align-items: center;

  &__entry {
    border: 0;
    width: 100%;
    padding: 0 1.6rem;
    font-size: 1.8rem;

    &::placeholder {
      color: $text-light;
    }
  }
}
</style>
