import { ref } from "vue";
import type { ChatMessage } from "../interfaces/chat-message.interface";
import type { YesNoResponse } from "../interfaces/yes-no-response.interface";
import { sleep } from "../helpers/sleep";

export const useChat = (  ) => { 

    const messages = ref<ChatMessage[]>([
    ]);

    const getResponse = async():Promise<YesNoResponse> => {
        const response = await fetch('https://yesno.wtf/api');
        const data = await response.json();
        return data;
    }   

    const onMessage = async( text: string ) => {
        if (text.length === 0) return;

        messages.value.push({
            id: new Date().getTime(),
            message: text,
            itsMine: true,
        });

        // evaluate if the text ends with a question mark
        if ( !text.endsWith('?') ) return;

        await sleep(1.5);

        const { answer, image } = await getResponse();

        messages.value.push({
            id: new Date().getTime(),
            message: answer,
            itsMine: false,
            image: image,
        });
    }


    return {
        // properties
        messages,

        // methods
        onMessage,
    };
};