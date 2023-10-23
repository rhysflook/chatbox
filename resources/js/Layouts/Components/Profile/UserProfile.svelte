<script>
    import { inertia } from '@inertiajs/svelte'
    export let user;
    export let relationship_statuses;
    export let isFriend;
     let userRelationshipStatus = relationship_statuses.find(status => status.id = user.relationship_status);
</script>
    {#if user.is_visible}

        <div class="user-info">
            <label for="about" class="profile-label">About Me</label>
            <div class="user-description">
                <p class="user-detail">{user.about ?? 'Unknown'}</p>
            </div>
            <label for="date_of_birth" class="profile-label">Date of Birth</label>
            <div class="user-description">
                <p class="user-detail">{user.date_of_birth ?? 'Unknown'}</p>
            </div>
                <label for="relationship_status" class="profile-label">Relationship Status</label>
                <div class="user-description">
                    <p class="user-detail">{userRelationshipStatus ? userRelationshipStatus.status : 'Unknown'}</p>
                </div>
        </div>

    {:else}
        <div class="hidden-container">
            <p class="hidden-msg">
                This user is currently not allowing others to view their information
            </p>
        </div>
    {/if}
    <div class="btn-container">
    {#if isFriend}
        <!-- <button class="btn"> -->
            <a use:inertia href="/chat?friend={user.username}" class="btn">
                Send Message
            </a>
        <!-- </button> -->
    {:else}
        <button class="btn">
            Send Friend Request
        </button>
    {/if}
    </div>
<style>

    .user-info {
        /* display: flex; */
        width: 70%;
    }

    .hidden-msg {
        color: var(--heading-color);
        text-align: center;
        width: 60%;
        margin-top: 5rem;
    }

    .form-field {
        width: 100%;
        display: flex;
    }

    .profile-label {
        font-size: 1.2rem;
        color: var(--heading-color);
    }

    .user-description {
        max-height: 150px;
        margin-bottom: 20px;
        overflow: auto;
    }

    .user-detail {
        color: var(--heading-color);
        padding-right: 5px;
    }

    .btn-container {
        width: 60%;
        text-align: center;
    }

    .btn {
        background-color: white;
        color: var(--icon-color);
        border: none;
        font-size: 1.2em;
        /* box-shadow: 2px 3px var(--accent-color); */
        margin: 5px 0;
        border-radius: 5px;
        height: calc(100% - 10px);
        cursor: pointer;
        padding: 5px 10px;
    }

    .btn:hover {
        background-color: var(--alt-color);
    }



</style>