import { get, writable } from 'svelte/store';
import { useUser } from './userStore';

const message = writable('');

const createChatStore = () => {
    const { subscribe, set, update } = writable({messages: [], id: null, recipient: null, messageChannel: null, whisperChannel: null, friendTyping: ""});
    return {
        subscribe,
        setChat: ((chat, recipient) => update(() => {
            const whisperChannel = window.Echo.private(`friendship.${chat.id}`);
            whisperChannel.listenForWhisper( 'typing', e => {
                update((chat) => ({...chat, friendTyping: `${recipient.username} is typing a message...` }));
            }
            ).listenForWhisper('stopped-typing', e => {
                update((chat) => ({...chat, friendTyping: ""}));
            });
            return {...chat, friendTyping: "", recipient, whisperChannel}
        })),

        handleMessage: (message => update(chat => {
            // Need to set up is_read field and handle flaging as read before implementing message counts.
        })),

        handleCurrentConvoMessage: (message => update(chat => {
            return {...chat, messages: [...chat.messages, message], friendTyping: ""};
        })),
    }
}

const chatStore = createChatStore();

const joinMessageChannel = () => {
    window.Echo.private(`message.${useUser().id}`)
    .listen('.message', function (e) {
        const chat = get(chatStore);
        if (chat.recipient && e.message.sender_id == chat.recipient.id) {
            chatStore.handleCurrentConvoMessage(e.message);
        } else {
            chatStore.handleMessage(e.message);
        }
    })
}



export {chatStore, message, joinMessageChannel};
