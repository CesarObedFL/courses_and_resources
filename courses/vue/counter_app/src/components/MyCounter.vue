<template>
  <section>
    <h1>counter: {{ counter }}</h1>
    <h1>square: {{ square_counter }}</h1>

    <button v-on:click="add" class="btn btn-success">+1</button>
    <button @click="sub" class="btn btn-warning">-1</button>
  </section>
</template>

<script lang="ts" setup>
import { ref, computed } from 'vue';

const props = defineProps({
  value: { type: Number, required: true },
});

const counter = ref(props.value);
const square_counter = computed(() => counter.value * counter.value);

const add = () => {
  counter.value++;
};

const sub = () => {
  counter.value--;
};
</script>

<style scoped>
.btn {
  @apply p-2 m-1 w-20 h-10 rounded text-white;
}

.btn-success {
  @apply bg-green-400 hover:bg-green-700;
}

.btn-warning {
  @apply bg-yellow-400 hover:bg-yellow-700;
}
</style>
