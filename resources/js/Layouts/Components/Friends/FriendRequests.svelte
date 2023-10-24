<script lang="ts">
    import { router } from "@inertiajs/svelte";

    import { getContext } from "svelte";
    import type { FriendStore, Friends } from "../../../stores/friendStore";

    let friendStore = getContext<FriendStore<Friends>>('friends');

    function cancelFriendRequest(username: string) {
        router.delete("/cancel-friend-request/" + username)
    }

    function answerFriendRequest(username: string, accepted: boolean) {
        router.post("/answer-friend-request", {username, accepted});
    }


</script>
<div class="section">
    <h1 class="title">Pending</h1>
    {#each $friendStore.pending_sent as user}
        <div class="user-result">
            <img src="/storage/profile/{user.profile_pic}" alt="" class="search-profile-pic">
            <div class="user-box">
                {user.username}
                <div class="btn">
                    <button on:click={() => cancelFriendRequest(user.username)} class="btn-inner">
                        <i class="fa-solid fa-user-xmark"></i>
                    </button>
                </div>
            </div>
        </div>
    {:else}
        <p class="text">
            No requests currently pending...
        </p>
    {/each}
</div>
<div class="section">
    <h1 class="title">Received</h1>
    {#each $friendStore.pending_received as user}
        <div class="user-result">
            <img src="/storage/profile/{user.profile_pic}" alt="" class="search-profile-pic">
            <div class="user-box">
                {user.username}
                <div class="btns">
                    <div class="btn">
                        <button on:click={() => answerFriendRequest(user.username, true)} class="btn-inner">
                            <i class="fa-solid fa-user-plus"></i>
                        </button>
                    </div>
                    <div class="btn">
                        <button on:click={() => answerFriendRequest(user.username, false)} class="btn-inner">
                            <i class="fa-solid fa-user-xmark"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    {:else}
        <p class="text">
            No requests currently pending...
        </p>
    {/each}
</div>
<style>
    .section {
        width: 100%;
        height: 45%;
        min-height: 45%;
        overflow-y: auto;
        color: var(--main-color);
        border-bottom: solid 2px var(--border-color);
        height: 20%;
    }

    .title {
        margin: 0 5px;
    }

    .text {
        margin-left: 5px;
    }

    .user-result {
        display: flex;
        background-color: var(--main-color);
        width: calc(100% - 8px);
        margin: 1px 0;
        align-items: center;
        padding: 3px 5px 3px 3px;
        color: var(--font-color);
    }

    .user-box {
        flex-grow: 1;
        display: flex;
        justify-content: space-between;
    }

    .search-profile-pic {
        width: 40px;
        height: 40px;
        margin-right: 5px;
    }

    .btns {
        display: flex;
    }

    .btn {
        margin-right: 10px;
    }

    .btn-inner {
        border: none;
        cursor: pointer;

    }
</style>