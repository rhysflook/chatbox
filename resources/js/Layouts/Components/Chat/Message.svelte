<script>
    export let sender;
    export let message;
    export let sentByUser;
    export let pic;
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
    <p class="message-content">{message}</p>
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
</style>