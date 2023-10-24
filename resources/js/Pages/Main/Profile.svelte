<script>
    import NavBar from '../../Layouts/Components/Layout/NavBar.svelte';
    import Container from '../../Layouts/Components/Layout/Container.svelte';
    import ProfileForm from '../../Layouts/Components/Profile/ProfileForm.svelte';
    import { useUser } from '../../stores/userStore';
    import UserProfile from '../../Layouts/Components/Profile/UserProfile.svelte';
    export let user;
    export let total_unread;
    export let relationship_statuses;
    export let loginUser;
    export let is_friend;

    $: {
        if (loginUser) {
            useUser().login(loginUser);
        }
    }

</script>

<NavBar totalUnread={total_unread}/>
<Container>
<div class="left-half">
    <div class="pic-container">
        <img src="/storage/profile/{user.profile_pic}" alt="" class="profile-pic">
    </div>
    <div class="public-details">
        <p class="user-detail">
            {user.username}
        </p>
        <p class="user-detail email">
            {user.email}
        </p>
    </div>

</div>
<div class="right-half" >
    {#if loginUser.id == user.id}
        <ProfileForm user={user} relationship_statuses={relationship_statuses} />
    {:else}
        <UserProfile user={user} relationship_statuses={relationship_statuses} isFriend={is_friend}/>
    {/if}
</div>
</Container>
<style>
    .left-half {
        width: 50%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: end;
        margin-right: 5em;
    }

    .right-half {
        width: 50%;
        height: 100%;
        margin-left: 5em;

    }


    .pic-container {
        display: flex;
        flex-direction: column;
        width: 50%;
        align-items: end;
    }

    .profile-pic {
        width: 100%;
        border: 5px solid var(--border-color);
    }

    .public-details {
        width: calc(50% + 10px);
        text-align: center;
        font-size: 1.4rem;
    }

    .user-detail {
        color: var(--heading-color);
    }



    .email {
        font-size: 1rem;
    }
</style>