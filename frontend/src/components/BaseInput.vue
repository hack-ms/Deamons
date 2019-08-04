<template>
  <div class="base-input">
    <label class="base-input__label">{{ label }}</label>
    <input
      type="text"
      class="base-input__entry"
      :placeholder="placeholder"
    >
  </div>
</template>

<script>
export default {
  name: 'BaseInput',
  props: {
    label: {
      type: String,
      default: '',
    },
    placeholder: {
      type: String,
      default: '',
    },
  },
};
</script>

<style lang="scss" scoped>
.base-input {
  margin-bottom: 2.4rem;

  &__label {
    color: $text-dark;
    display: inline-block;
    font-weight: bold;
    font-size: 1.4rem;
    margin-bottom: 0.4rem;
  }

  &__entry {
    border: 0.2rem solid $border-color;
    width: 100%;
    height: 5.6rem;
    border-radius: 0.8rem;
    padding: 1.6rem 2.4rem;
    font-size: 1.8rem;

    &::placeholder {
      color: $text-light;
    }
  }
}

</style>
