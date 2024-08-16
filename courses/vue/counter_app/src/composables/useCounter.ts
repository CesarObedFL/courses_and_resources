import { ref, computed } from 'vue';

export const useCounter = (initial_value: number = 2) => {
  const counter = ref(initial_value);

  const add = () => {
    counter.value++;
  };

  const sub = () => {
    counter.value--;
  };

  return {
    counter,
    square_counter: computed(() => counter.value * counter.value),
    add,
    sub,
  };
};
