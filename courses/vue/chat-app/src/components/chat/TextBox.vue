<template>
    <div ref="chatRef" class="flex-1 overflow-y-auto p-4">
        <div class="flex flex-col space-y-2">
            <!-- Messages go here -->
            
            <!--
            <ChatBubble
                v-for="message in messages"
                :key="message.id" 
                :itsMine="message.itsMine" 
                :message="message.message"
                :image="message.image"
            /> 
            -->

            <ChatBubble
                v-for="message in messages"
                :key="message.id" 
                v-bind="message"
            />

        </div>
    </div>
</template>

<script lang="ts" setup>
import { ref, watch } from 'vue';
import { ChatMessage } from '../../interfaces/chat-message.interface';
import ChatBubble from './ChatBubble.vue';


interface Props {
    messages: ChatMessage[];
}

const { messages } = defineProps<Props>();

const chatRef = ref<HTMLDivElement|null>(null);

watch(() => messages, () => {
    console.log(messages.length);
    setTimeout(() => { 
        chatRef.value?.scrollTo({
            top: chatRef.value.scrollHeight,
            behavior: 'smooth',
        });
    }, 100);
});

</script>