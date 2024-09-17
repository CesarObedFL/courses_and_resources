<template>
    <div class="bg-gray-100 h-screen flex flex-col max-w-lg mx-auto">
        <div class="bg-blue-500 p-4 text-white flex justify-between items-center">
            <span>Mi esposa</span>
        </div>

        <TextBox :messages="messages"/>

        <MessageBox @send-message="onMessage"/>
    </div>
</template>

<script lang="ts" setup> 
import TextBox from '../components/chat/TextBox.vue';
import MessageBox from '../components/chat/MessageBox.vue';
import { useChat } from '../composables/useChat';

const { messages, onMessage } = useChat();


</script>
