<script>

    export let message;
    export let friendship_id;
    export let files;

    export const stoppedTyping = () => {
        isTyping = false;
        channel.whisper('stopped-typing', {});
    }

    let isTyping = false;
    let typingTimeout;
    let channel = window.Echo.private(`friendship.${friendship_id}`);
    let reader = new FileReader();
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

</script>

<div class="chatbox-container">
    <textarea
        class="chatbox-message"
        id="message-input"
        bind:value={message}
        on:keypress={setIsTyping}
    ></textarea>
    {#each files as file}
        {file.name}
         <img src="{reader.readAsDataURL(file).result ?? ''}" alt="">
    {/each}
</div>

<style>
    .chatbox-container {
        height: 67.5%;
        line-height: 1.4rem;
    }
    .chatbox-message {
        color: var(--font-color);
        font-size: 1.4rem;
        height: 100%;
        padding: 5px;
        width: calc(100% - 10px);
        border: none;
        background-color: var(--main-color);
        resize: none;
        overflow-y: scroll;
    }

</style>