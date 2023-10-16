<script>
    export let sender;
    export let message;
    export let sentByUser;
    export let pic;
    export let attachments;
</script>

<div class="message {sentByUser ? 'message-sent' : 'message-recieved'}">
    <div class="message-inner  {sentByUser ? 'user-inner' : 'friend-inner'}">
        {#if !sentByUser}
            <img class="profile-pic friend-pic" src="/storage/profile/{pic}" alt="">
        {/if}
        <div>
            <p class="message-sender">{sender}</p>
        </div>
        {#if sentByUser}
            <img class="profile-pic user-pic" src="/storage/profile/{pic}" alt="">
        {/if}
    </div>
    <!-- need to make sure I am sanitising the messages on the backend -->
    <p class="message-content">{@html message}</p>
    {#if attachments}
        <div class="sent-imgs {sentByUser ? 'user-pics' : 'friend-pics'}">
            {#each attachments as img}
                <img src="storage/{img.file}" alt="" class="sent-img">
            {/each}
        </div>
    {/if}

</div>

<style>
    .message {
        display: flex;
        flex-direction: column;
        width: 100%;
        margin-bottom: 20px;
    }

    .message-inner {
        width: 30%;
        display: flex;
        margin-bottom: 10px;
    }

    .user-inner {
        justify-content: end;
    }

    .message-sent {
        text-align: right;
        align-items: end;
    }

    .message-sender {
        font-size: 1.4rem;
        margin: 10px 0 5px;
    }

    .message-content {
        font-size: 1.1rem;
        margin: 0 0 10px;
    }

    .profile-pic {
        margin: 0;
        width: 75px;
        height: 75px;
        object-fit: cover;

    }
    .user-pic {
        margin-left: 10px;
    }

    .friend-pic {
        margin-right: 10px;
    }

    .sent-imgs {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        width: 100%;
    }

    .sent-img {
        width: 200px;
        height: 200px;
        object-fit: cover;
    }

    .user-pics {
        justify-content: end;
    }
</style>