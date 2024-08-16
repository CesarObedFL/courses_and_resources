<template>
  <section>
    <h1>counter: {{ counter }}</h1>
    <h1>square: {{ square_counter }}</h1>

    <button v-on:click="counter++">+1</button>
    <button @click="counter--">-1</button>
  </section>
</template>

<script lang="ts" src="./MyCounterSFC.ts"></script>
