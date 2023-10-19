<script>
    import { router } from '@inertiajs/svelte'

    export let friends;

    function getChatHistory(friend) {
        router.get(`/chat?friendship=${friend.id}`);
    }

</script>
<div class="friendlist">
    {#each friends as friend}
    <div class="friend-container">
        <div class="pic-container">
            <img class="profile-pic" src="/storage/profile/{friend.pic}" alt="">
        </div>
        <button class="friend-chat" on:click={getChatHistory(friend)}>{friend.friend}</button>
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
</style>