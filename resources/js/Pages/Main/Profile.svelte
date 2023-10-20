<script>
    import NavBar from '../../Layouts/Components/Layout/NavBar.svelte';
    import Container from '../../Layouts/Components/Layout/Container.svelte';
    import { router } from '@inertiajs/svelte';
    export let user;
    export let total_unread;
    export let relationship_statuses;

    let values = {
        about: user.about,
        date_of_birth: user.date_of_birth,
        relationship_status: user.relationship_status,
        is_visible: user.is_visible,
    }

    function handleSubmit() {
        router.post('/update-profile', values);
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
            {user.name}
        </p>
        <p class="user-detail">
            {user.email}
        </p>
    </div>

</div>
<div class="right-half" >
    <form on:submit|preventDefault={handleSubmit} class="about-form">
        <label for="about" class="profile-label">About Me</label>
        <textarea class="about-me bottom-margin" name="about" id="about" cols="30" rows="7" bind:value={values.about}></textarea>
        <div class="form-field bottom-margin">
            <label for="date_of_birth" class="profile-label">Date of Birth</label>
            <input class="form-input" type="date" id="date_of_birth"  bind:value={values.date_of_birth}>
        </div>
        <div class="form-field bottom-margin">
            <label for="relationship_status" class="profile-label">Relationship Status</label>
            <select class="form-input" id="relationship_status"  bind:value={values.relationship_status}>
                {#each relationship_statuses as status}
                    <option value="{status.id}">{status.status}</option>
                {/each}
            </select>
        </div>
        <div class=" bottom-margin">
            <label for="is_visible" class="profile-label public-check">Allow other users to see the above details</label>
            <input type="checkbox" id="is_visible"  bind:checked={values.is_visible}>
        </div>
        <div class="btn-container">
            <button type="submit" class="btn">
                Update
            </button>
        </div>
    </form>


</div>
</Container>
<style>
    .left-half {
        width: 50%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: end;
        margin-right: 70px;
    }

    .right-half {
        width: 50%;
        height: 100%;
        margin-left: 70px;

    }

    .about-form {
        width: 60%;
        display: flex;
        flex-direction: column;
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
        color: var(--alt-color);
    }

    .profile-label {
        font-size: 1.2rem;
        color: var(--alt-color);
    }

    .form-field {
        width: 100%;
        display: flex;
    }

    .form-input {
        height: 1.6rem;
        border-radius: 5px;
        margin-left: 20px;
        flex-grow: 1;
        font-size: 1.2rem;
    }

    .about-me {
        border-radius: 5px;
        font-size: 1.2rem;
    }

    .bottom-margin {
        margin-bottom: 30px;
    }

    .public-check {
        font-size: 1rem;
    }

    .btn-container {
        width: 100%;
        text-align: center;
    }

    .btn {
        background-color: white;
        color: var(--icon-color);
        border: none;
        font-size: 1.2em;
        /* box-shadow: 2px 3px var(--accent-color); */
        margin: 5px 0;
        border-radius: 10px;
        height: calc(100% - 10px);
        cursor: pointer;
    }

    .btn:hover {
        background-color: var(--alt-color);
    }
</style>