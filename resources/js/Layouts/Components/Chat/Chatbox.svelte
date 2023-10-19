<script>
    import { user } from '../../../stores/userStore';
    import { chatStore } from '../../../stores/chatStore';
    import Message from './Message.svelte';
    import Toolbar from './Toolbar.svelte';
    import ChatEntryBox from './ChatEntryBox.svelte';

    function scrollToBottom(ele) {
        const scroll = () => ele.scroll({
            top: ele.scrollHeight,
        });
        scroll();

        return { update: scroll }
    };

</script>
<div class="chatbox">
    <div class="chatbox-display" use:scrollToBottom={$chatStore.messages} id="chat">
            {#if $chatStore.messages}
                {#each $chatStore.messages as message}
                    <Message
                        sender={message.sender.name}
                        message={message.content}
                        sentByUser={message.sender_id == $user.id}
                        pic={message.sender.profile_pic}
                        attachments={message.message_attachments}
                    />
                {/each}
            {/if}

        <p class="typing-message">
            {$chatStore.friendTyping}
        </p>

    </div>
    <div class="chatbox-input">
        <Toolbar />
            <ChatEntryBox />
    </div>
</div>
<style>
    .chatbox {
        width: 65%;
        border: 5px solid var(--border-color);
        display: grid;
        grid-template-rows: auto auto;
        grid-template-columns: 1fr;
        position: relative;
        background-color: var(--secondary-color);
        height: 90%;
    }

    .chatbox-display {
        /* height: auto; */
        padding: 10px;
        overflow: auto;
        background-color: var(--main-color);
        position: relative;
        min-height: 30%;
    }


    .chatbox-input {
        /* height: 36%; */
        /* max-height: 60%; */
        overflow: auto;
        border-color: var(--border-color);
    }

    .typing-message {
        margin-bottom: 5px;
        margin-right: 3px;
        line-height: 1rem;
        position: sticky;
        min-height: 1rem;
        /* bottom: 1px;
        right: 1px; */
    }
</style>