import { get, writable } from 'svelte/store';
import { user } from './userStore';
const message = writable('');

const createChatStore = () => {
    const { subscribe, set, update } = writable({messages: [], message: '', id: null, recipient: null, chatBoxView: 'chat', range: null});
    return {
        subscribe,

        setChat: ((chat, recipient) => update(() => {
            window.Echo.private(`message.${get(user).id}`)
            .listen('.message', function (e) {
                update(() => ({...chat, messages: [...chat.messages, e.message]}));
            });
            return {...chat, message: '', recipient}
        })),

        setRange: (range => update((chat) => ({...chat, range}))),

        insertEmoji: (emoji => update((chat) => {
            let range = chat.range;
            range.deleteContents();
            range.insertNode(document.createTextNode(emoji));
            return {...chat, range};
        })),
    }
}

const chatStore = createChatStore();
export {chatStore, message};
