import { get, writable } from 'svelte/store';
import { user } from './userStore';

const message = writable('');
const createChatStore = () => {
    const { subscribe, set, update } = writable({messages: [], id: null, recipient: null, whisperChannel: null, friendTyping: ""});
    return {
        subscribe,
        setChat: ((chat, recipient) => update(() => {
            window.Echo.private(`message.${get(user).id}`)
            .listen('.message', function (e) {
                update(() => ({...chat, messages: [...chat.messages, e.message]}));
            });

            const whisperChannel = window.Echo.private(`friendship.${chat.id}`);
            whisperChannel.listenForWhisper( 'typing', e => {
                update(() => ({...chat, friendTyping: `${recipient.name} is typing a message...` }));
            }
            ).listenForWhisper('stopped-typing', e => {
                update(() => ({...chat, friendTyping: ""}));
            });

            return {...chat, friendTyping: "", recipient, whisperChannel}
        })),
    }
}

const chatStore = createChatStore();
export {chatStore, message};
