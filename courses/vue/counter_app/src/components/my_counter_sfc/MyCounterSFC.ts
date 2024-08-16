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
