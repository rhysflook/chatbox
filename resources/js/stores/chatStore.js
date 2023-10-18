import { get, writable } from 'svelte/store';
import { user } from './userStore';
const message = writable('');

const createChatStore = () => {
    const { subscribe, set, update } = writable({messages: [], message: '', id: null, recipient: null});
    return {
        subscribe,
        setChat: ((chat, recipient) => update(() => {
            window.Echo.private(`message.${get(user).id}`)
            .listen('.message', function (e) {
                chat = {...chat, messages: [...chat.messages, e.message]};
            });
            return {...chat, message: '', recipient}
        })),
    }
}

const chatStore = createChatStore();
export {chatStore, message};
