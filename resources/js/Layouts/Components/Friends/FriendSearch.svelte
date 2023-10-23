<script>
    import { page, router } from "@inertiajs/svelte";
    let searchTerm;
    let isTyping;
    function queryUsers(e) {
        if (!isTyping) {
            setTimeout(() => {
                isTyping = false
                router.visit(`/friends?search=${searchTerm}`);
            }, 200);
        }
        isTyping = true;
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
        {#each $page.props.user_search as user}
            <div class="user-result">
                <img src="/storage/profile/{user.profile_pic}" alt="" class="search-profile-pic">
                {user.name} - {user.username}
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
        width: 100%;
        margin: 1px 0;
        align-items: center;
        padding: 3px 0;
    }

    .search-profile-pic {
        width: 40px;
        height: 40px;
        margin-right: 5px;
    }
</style>