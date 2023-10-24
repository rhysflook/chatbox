<script lang="ts">
    import { page, router } from "@inertiajs/svelte";
    import { getContext } from "svelte";
    import type { FriendStore, Friends } from "../../../stores/friendStore";
    let searchTerm: string;
    let isTyping: boolean;
    let friendStore = getContext<FriendStore<Friends>>('friends');

    function queryUsers(): void {
        if (!isTyping) {
            setTimeout(() => {
                isTyping = false
                router.visit(`/friends?search=${searchTerm}`, {only: ['user_search']});
            }, 200);
        }
        isTyping = true;
    }

    function sendFriendRequest(username: string) {
        router.post(`/add-friend`, {username, searchTerm});
    }

</script>

<div class="recommended">
    <h1 class="title">Recommendations</h1>
        <!-- Recommendations will show people based on other friends or maybe on interests if I can get around to implementing such a feature -->
    <p class="text">
        There are currently no recommendations for you...

    </p>
    </div>
<div class="search-container">
    <div class="input-container">
        <span class="search-label">User search:</span>
        <input type="text" class="user-search" bind:value={searchTerm} on:keyup={queryUsers}>
    </div>
    <div class="search-result">
        {#each $friendStore.user_search as user}
            <div class="user-result">
                <img src="/storage/profile/{user.profile_pic}" alt="" class="search-profile-pic">
                <div class="user-box">
                    {user.username}
                    <div class="add-btn">
                        <button on:click={() => sendFriendRequest(user.username)} class="add-btn-inner">
                            <i class="fa-solid fa-user-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        {/each}
    </div>
</div>

<style>
    .recommended {
        width: 100%;
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

    .search-container {
        height: calc(70% - 5px);
    }

    .input-container {
        height: 10%;
        display: flex;
        align-items: center;
        justify-content: end;
    }

    .user-search {
        height: 80%;
        border-radius: 10px;
        padding: 0 5px;
        font-size: 1.2rem;
    }

    .search-label {
        color: var(--main-color);
        margin-right: 5px;
        font-size: 1.2rem;
    }

    .search-result {
        height: 90%;
        overflow-y: auto;
    }


    .user-result {
        display: flex;
        background-color: var(--main-color);
        width: calc(100% - 8px);
        margin: 1px 0;
        align-items: center;
        padding: 3px 5px 3px 3px;
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

    .add-btn {
        margin-right: 10px;
    }

    .add-btn-inner {
        border: none;
        cursor: pointer;

    }
</style>