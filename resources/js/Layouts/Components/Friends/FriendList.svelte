<script>
    export let friends;
    export let friendMethod;

</script>
<div class="friendlist">
    {#each friends as friend}
    <div class="friend-container">
        {#if friend.unread_count}
        <div class="unread-icon">
            <i class="fa-solid fa-envelope icon"></i>{friend.unread_count}
        </div>
        {/if}
        <div class="pic-container">
            <img class="profile-pic" src="/storage/profile/{friend.pic}" alt="">
        </div>
        <button class="friend-chat" on:click={() => friendMethod(friend)}>{friend.username}</button>
    </div>
    {/each}
</div>
<style>


    .friendlist {
        width: 20%;
        display: flex;
        flex-direction: column;
        overflow-y: auto;
        overflow-x: hidden;
        height: 90%;
    }

    .friend-container {
        display: flex;
        border: 2px solid var(--border-color);
        /* box-shadow: 2px 3px var(--accent-color); */
        position: relative;
        margin-bottom: 2px;

        width: 100%;
        background: linear-gradient(to right, var(--highlight-color) 50%, var(--main-color) 50%);
        background-size: 200% 100%;
        background-position: right bottom;
        transition: all .5s ease-out;
        height: 75px;

    }

    .friend-chat:hover {
        background-position: left bottom;
    }

    .pic-container {
        width: 30%;

    }

    .profile-pic {
        margin: 0;
        width: 100%;
        height: 75px;
        object-fit: cover;

    }

    .friend-chat {
        background: linear-gradient(to right, var(--highlight-color) 50%, var(--main-color) 50%);
        background-size: 200% 100%;
        background-position: right bottom;
        transition: all .5s ease-out;
        width: 70%;
    }

    .unread-icon {
        color: var(--border-color);
        /* color: var(--secondary-color); */
        position: absolute;
        right: 5px;
        top: 5px;
        z-index: 99;
        border-radius: 50px;
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 5px;
    }
    .icon {
        margin-right: 3px;
    }

</style>