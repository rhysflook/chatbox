<script>
    import { fileStore } from '../../../stores/fileStore';
    import { chatStore } from '../../../stores/chatStore';

    export const stoppedTyping = () => {
        isTyping = false;
        channel.whisper('stopped-typing', {});
    }
    let isTyping = false;
    let typingTimeout;
    let channel = window.Echo.private(`friendship.${$chatStore.id}`);

    function setIsTyping() {
        if (!isTyping) {
            isTyping = true;
            channel.whisper('typing', {});
        }
        setTimer();
    }

    function setTimer() {
        if (typingTimeout) {
            clearTimeout(typingTimeout);
        }
        typingTimeout = setTimeout(() => {
            isTyping = false;
            channel.whisper('stopped-typing', {})
        }, 5000);
    }

    function handleInput(e) {
        setIsTyping();
    }

</script>
    <div class="chatbox-message">
        <!-- svelte-ignore a11y-no-static-element-interactions -->
        <div
            contenteditable="true"
            class="chatbox-textarea"
            id="message-input"
            on:keypress={handleInput}
            aria-roledescription="message-content"
        >
            {$chatStore.message}
        </div>
        <div class="selected-imgs">
            {#each $fileStore.fileData as file}
                <img src="{file}" alt="" class="selected-img">
            {/each}
        </div>
    </div>

<style>

    .chatbox-message {
        height: calc(100% - 50px);
        overflow-y: auto;
        background-color: var(--main-color);

    }
    .chatbox-textarea {
        color: var(--font-color);
        background-color: var(--main-color);
        font-size: 1.4rem;
        width: 100%;
        border: none;
        padding: 0;
    }

    .selected-imgs {
        display: grid;
        margin: 5px;
        column-gap: 5px;
        row-gap: 5px;
        grid-template-columns: 50px 50px 50px 50px 50px;
    }

    .selected-img {
        object-fit: cover;
        width: 50px;
        height: 50px;
    }
</style>