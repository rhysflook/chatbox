<script>
import { router } from "@inertiajs/svelte";
export let user;
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

<style>

.about-form {
    width: 60%;
    display: flex;
    flex-direction: column;
}

.profile-label {
    font-size: 1.2rem;
    color: var(--heading-color);
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
    border-radius: 5px;
    height: calc(100% - 10px);
    cursor: pointer;
    padding: 5px 10px;
}

.btn:hover {
    background-color: var(--alt-color);
}
</style>