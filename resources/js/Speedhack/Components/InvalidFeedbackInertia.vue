<template>
  <span class="invalid-feedback" v-if="error">
    {{ error }}
  </span>
</template>

<script>
export default {
  name: "InvalidFeedbackInertia",
  props: {
    errors: {
      type: Object,
    },
    input: {
      type: String
    },
    bag: {
      type: String
    }
  },
  computed: {
    error() {
      return this.bag ? (this.errors[this.bag] ? this.errors[this.bag][this.input]: '') : this.errors[this.input];
    }
  }
}
</script>
