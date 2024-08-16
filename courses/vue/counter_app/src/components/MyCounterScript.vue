<template>
  <section>
    <h1>counter: {{ counter }}</h1>
    <h1>square: {{ square_counter }}</h1>

    <button v-on:click="counter++">+1</button>
    <button @click="counter--">-1</button>
  </section>
</template>

<script lang="ts">
import { defineComponent, ref, computed } from 'vue';

export default defineComponent({
  props: {
    value: { type: Number, required: true },
  },
  setup(props) {
    const counter = ref(props.value);
    const square_counter = computed(() => counter.value * counter.value);

    return {
      counter,
      square_counter,
    };
  },
});
</script>
