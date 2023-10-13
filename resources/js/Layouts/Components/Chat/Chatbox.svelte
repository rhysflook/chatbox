<script>
    import Message from './Message.svelte';
    import Toolbar from './Toolbar.svelte';
    import ChatEntryBox from './ChatEntryBox.svelte';
    import EmojiSelection from './EmojiSelection.svelte';

    export let chat;
    export let user;
    export let targetFriend;

    let nowTypingMessage = "";
    let chatBoxView = 'chat';
    let message;
    let messageSent;
    let files = [];

    export const setFriendTyping = (e) => {
        if (e.detail.stopped) {
            nowTypingMessage = "";
        } else {
            nowTypingMessage = `${targetFriend.friend} is typing a message...`;
        }
    }


    function scrollToBottom(ele) {
        const scroll = () => ele.scroll({
            top: ele.scrollHeight,
        });
        scroll();

        return { update: scroll }
    };

    function handleEvent(event) {
        chatBoxView = event.detail.type;
    }

</script>
<div class="chatbox">
    <div class="chatbox-display" use:scrollToBottom={chat} id="chat">
            {#if chat && chat.messages}
                {#each chat.messages as message}
                    <Message sender={message.sender.name} message={message.content} sentByUser={message.sender_id == user.id} pic={message.sender.profile_pic}/>
                {/each}
            {/if}

        <p class="typing-message">
            {nowTypingMessage}
        </p>

    </div>
    <div class="chatbox-input">
        <Toolbar
            on:messageSent={messageSent.stoppedTyping}
            on:btnClick={handleEvent}
            bind:message={message}
            bind:chatBoxView={chatBoxView}
            bind:files={files}
            chat={chat}
            targetFriend={targetFriend}
        />
        {#if chatBoxView == 'chat'}
            <ChatEntryBox bind:files={files} bind:this={messageSent} bind:message={message} friendship_id={chat.id}/>
        {:else if chatBoxView == 'emoji'}
            <EmojiSelection on:btnClick={handleEvent} bind:message={message}/>
        {:else if chatBoxView == 'attach'}
             <!-- else content here -->
        {/if}
    </div>
</div>
<style>
    .chatbox {
        width: 65%;
        border: 5px solid var(--border-color);
        display: flex;
        flex-direction: column;
        background-color: var(--secondary-color);
        height: 90%;
    }

    .chatbox-display {
        height: 60%;
        padding: 10px;
        overflow: auto;
        background-color: var(--main-color);
        position: relative;
    }


    .chatbox-input {
        height: 36%;
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