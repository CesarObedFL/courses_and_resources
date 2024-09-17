<template>
     <div class="text-center">
        <h1 class="text-4xl font-bold tracking-tighter sm:text-5xl">
            Bienvenido a nuestro sitio web
        </h1>
        <p class="mx-auto max-w-[600px] text-gray-500 md:text-xl">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </p>
        <p class="mx-auto max-w-[600px] text-gray-500 md:text-xl">
            Counter: {{ counter }}
        </p>
        <button @click="counter++" class="m-2 p-2 bg-sky-300 text-white rounded-md">+1</button>

    
      </div>
</template>

<scrip lang="ts" src="./HomeView.ts" />