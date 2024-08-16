<template>
  <h1 className="text-3xl font-bold underline">Hello world!</h1>
  <h1>my first vue app</h1>

  <hr />

  <MyCounter v-bind:value="5"></MyCounter>
  <MyCounter :value="10"></MyCounter>
  <MyCounter2 :value="2"></MyCounter2>
  <MyCounterScript :value="20"></MyCounterScript>
  <MyCounterSFC :value="300"></MyCounterSFC>
</template>

<script lang="ts" setup>
import MyCounter from './components/MyCounter.vue';
import MyCounter2 from './components/MyCounter2.vue';
import MyCounterScript from './components/MyCounterScript.vue';
import MyCounterSFC from './components/my_counter_sfc/MyCounterSFC.vue';
</script>
