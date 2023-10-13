<script>
    import { createEventDispatcher } from 'svelte';
    import { router } from '@inertiajs/svelte'
    export let message;
    export let chat;
    export let targetFriend;
    export let chatBoxView;
    export let files;


    const dispatch = createEventDispatcher();

    function sendMessage() {
        let toSend = message;
        message = '';
        dispatch('messageSent');
        router.post('/send-message', {message: toSend, id: chat.id, friend_id: targetFriend.friend_id});
    }

    function triggerEvent(type) {
        if (type == chatBoxView) {
            chatBoxView = 'chat';
        } else {
            chatBoxView = type;
        }
        dispatch('btnClick', {
            type: chatBoxView
        });
    }

</script>
<div class="chatbox-toolbar">
    <div>
        <button class="chatbox-toolbar-btn btn-m" on:click={() => triggerEvent('emoji')}>
            <i class="fa-regular {chatBoxView == 'emoji' ? 'fa-xmark' : 'fa-face-smile'}"></i>
        </button>
        <button
            class="chatbox-toolbar-btn btn-m"
            on:click={() => {document.getElementById('fileInput').click()}}
        >
            <i class="fa-solid fa-paperclip"></i>
        </button>
        <input
            bind:files
            id="fileInput"
            type="file"
            style="position: fixed; top: -100em"
            accept="image/png, image/jpeg"
        >
        <button class="chatbox-toolbar-btn btn-m">
            <i class="fa-solid fa-quote-left"></i>
        </button>
    </div>

    <button on:click={sendMessage} class="chatbox-toolbar-btn btn-l">Send</button>
</div>
<style>
    .chatbox-toolbar {
        height: 28%;
        display: flex;
        justify-content: space-between;
        background-color: var(--border-color);
    }

    .chatbox-toolbar-btn {
        background-color: white;
        color: var(--icon-color);
        border: none;
        font-size: 1.2em;
        /* box-shadow: 2px 3px var(--accent-color); */
        margin: 5px 0;
        border-radius: 10px;
        height: calc(100% - 10px);
        cursor: pointer;
    }

    .chatbox-toolbar-btn:hover {
        background-color: var(--alt-color);
    }

    .btn-l {
        width: 75px;
    }

    .btn-m {
        width: 50px;
    }
</style>