<script>
    import FriendSearch from "./FriendSearch.svelte";

    let tab = 'search';
    function toggleTab(e) {
        tab = e.target.getAttribute('data-tab');
    }
</script>
<div class="interface-container">
    <div class="interface-tabs">
        <button data-tab="search" class="tab-button {tab == 'search' ? 'is_active' : ''}" on:click={toggleTab}>Find</button>
        <button data-tab="request" class="tab-button {tab == 'request' ? 'is_active' : ''}" on:click={toggleTab}>Requests</button>
    </div>
    {#if tab == 'search'}
        <FriendSearch />

    {:else}
         <!-- else content here -->
    {/if}
</div>

<style>
    .interface-container {
        border: solid 5px var(--border-color);
        height: 90%;
        width: 55%;
    }

    .interface-tabs {
        width: 100%;
        height: 10%;
        border-bottom: solid 2px var(--border-color);
        display: flex;
        align-items: center;
    }

    .tab-button {
        height: 90%;
        width: 20%;
        margin: 0 2px 1px;
        margin-bottom: 1px;
        margin-right: 2px;
        background-color: var(--main-color);
        opacity: 0.7;
        cursor: pointer;
    }

    .is_active {
        opacity: 1;
        cursor: initial;
    }
</style>