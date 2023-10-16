import { get, writable } from 'svelte/store';
import { user } from './userStore';
import { router } from '@inertiajs/svelte';

const createChatStore = () => {
    const { subscribe, set, update } = writable({messages: [], message: '', id: null, recipient_id: null});
    return {
        subscribe,
        setChat: (chat => update(() => {
            window.Echo.private(`message.${user.id}`)
            .listen('.message', function (e) {
                chat = {...chat, messages: [...chat.messages, e.message]};
            });
            return {...chat}
        })),
    }
}

export const chatStore = createChatStore();

export const createMessage = (content ) => {
    dispatch('messageSent');
    router.post('/send-message', {message: toSend, id: chat.id, friend_id: targetFriend.friend_id, files: $fileStore.files});
}
