<script>
    import Container from "../../Layouts/Components/Layout/Container.svelte";
    import NavBar from "../../Layouts/Components/Layout/NavBar.svelte";
    import { loadTheme } from "../../helpers"
    export let user;
    export let schemes;
    let selectedTheme = JSON.parse(localStorage.getItem('theme'));

    function setTheme(event) {
        let scheme = schemes.find((s) => s.id == event.target.value);
        localStorage.setItem('theme', JSON.stringify(scheme))
        loadTheme();
    }
</script>

<NavBar user={user}/>
<Container>
    <div class="settings">
        <h1 class="setting-header">Select theme</h1>
        <select on:change={setTheme} name="theme" id="theme" class="theme-select">
            {#each schemes as scheme}
                <option class="theme" value="{scheme.id}" selected="{selectedTheme.id == scheme.id ? 'selected' : ''}">
                    {scheme.name}
                </option>
            {/each}
        </select>
    </div>

</Container>
<style>

    .settings {
        display: flex;
        height: 10%;
        align-items: center;
        width: 100%;
        justify-content: space-evenly;
        margin-top: 20px;
    }

    .setting-header {
        color: var(--heading-color);
        margin-right: 20px;
        font-size: 2.5rem;
    }


    .theme-select {
        /* height: 50%; */
        width: 30%;
        border-radius: 5px;
        background-color: var(--secondary-color);
        color: var(--accent-color);
        border: 2px solid var(--accent-color);
        padding: 10px 5px;
        font-size: 1.5rem;
    }

    .theme {
        color: var(--accent-color);
    }
</style>