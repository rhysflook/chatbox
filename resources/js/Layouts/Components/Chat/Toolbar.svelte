<script>
    import { router } from '@inertiajs/svelte'
    import { fileStore } from '../../../stores/fileStore';
    import { chatStore, message } from '../../../stores/chatStore';
    import EmojiSelection from './EmojiSelection.svelte';
    export let chatBoxView;

    let selectingEmoji = false;

    function sendMessage() {
        console.log($message);
        router.post(
            '/send-message',
            {
                message: $message,
                id: $chatStore.id,
                friend_id: $chatStore.recipient.id,
                files: $fileStore.files
            },
        );
        $message = '';
        fileStore.resetFileData();
    }

    function showEmojiOptions(event) {
        selectingEmoji = true;
        setTimeout(() => {
            window.addEventListener('click', () => {
                if (!document.getElementById('emoji-choices').contains(event.target)) {
                    selectingEmoji = false;
                }
            }, {once: true});
        }, 0)
    }

    function handleChange(e) {
        const files = e.target.files;
        fileStore.resetFileData();
        fileStore.setFiles(files);
    }




</script>
<div class="chatbox-toolbar">
    <div>
        <button class="chatbox-toolbar-btn btn-m" on:click={showEmojiOptions}>
            <i class="{chatBoxView == 'emoji' ? 'fa-solid fa-xmark' : 'fa-regular fa-face-smile'}"></i>
        </button>
        <button
            class="chatbox-toolbar-btn btn-m"
            on:click={() => {document.getElementById('fileInput').click()}}
        >
            <i class="fa-solid fa-paperclip"></i>
        </button>
        <input
            id="fileInput"
            type="file"
            style="position: fixed; top: -100em"
            accept="image/png, image/jpeg"
            multiple
            on:change={handleChange}
        >
        <button class="chatbox-toolbar-btn btn-m">
            <i class="fa-solid fa-quote-left"></i>
        </button>
    </div>

    <button on:click={sendMessage} class="chatbox-toolbar-btn btn-l">Send</button>
    {#if selectingEmoji}
        <EmojiSelection />
    {/if}
</div>
<style>
    .chatbox-toolbar {
        /* height: 28%; */
        height: 50px;
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