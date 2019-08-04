<template>
  <button
    class="base-button"
    :class="[
      { 'base-button--has-icon': classIcon, 'base-button--block': block },
      `base-button--${type}`
    ]"
    @click="$emit('click')"
  >
    <span
      v-if="classIcon"
      class="base-button__icon"
      :class="classIcon"
    />
    <span class="base-button__text">
      <slot />
    </span>
  </button>
</template>

<script>
export default {
  name: 'BaseButton',
  props: {
    classIcon: {
      type: String,
      default: '',
    },
    block: {
      type: Boolean,
      default: false,
    },
    type: {
      type: String,
      default: '',
      validator(value) {
        return ['primary', 'outline', ''].includes(value);
      },
    },
  },
};
</script>

<style lang="scss" scoped>
.base-button {
  height: 6.8rem;
  display: inline-block;
  text-align: center;
  font-size: 1.6rem;
  background-color: #fff;
  box-shadow: $box-shadow-level-1;
  border-radius: 0.8rem;
  border: 0.2rem solid #fff;
  transition: all 0.2s ease-in-out;
  padding: 0 2.4rem;
  color: $text;

  &:hover,
  &:active,
  &:focus {
    box-shadow: $box-shadow-level-2;
    background-color: darken(#fff, 4%);
  }

  &--has-icon {
    text-align: left;
  }

  &--block {
    display: block;
    width: 100%;

    & + & {
      margin-top: 1.6rem;
    }
  }

  &--primary {
    background-color: $primary;
    border: 2px solid $primary;
    color: #fff;

    &:hover,
    &:active,
    &:focus {
      background-color: darken($primary, 10%);
    }
  }

  &--outline {
    background-color: #fff;
    border: 2px solid $gray;
    color: $text;
  }

  &__icon {
    font-size: 3.2rem;
    margin-right: 1.6rem;
    vertical-align: middle;
  }

  &__text {
    font-weight: 700;
    vertical-align: middle;
  }
}
</style>
