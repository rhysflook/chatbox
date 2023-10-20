<script>
    import { router } from '@inertiajs/svelte'
    import LargeLogo from '../../Layouts/Components/Layout/LargeLogo.svelte';
    import NavBar from '../../Layouts/Components/Layout/NavBar.svelte';

    let values = {
        username: null,
        password: null,
    }
    function handleSubmit(event) {
        router.post('/login', values)
    }
</script>
<NavBar />
<div class="container">
    <LargeLogo>
        Login
    </LargeLogo>
    <div class="form-container">
        <form on:submit|preventDefault={handleSubmit} class="form">
            <label class="form-label" for="username">Username</label>
            <input type='text' class="form-input" id="username" bind:value={values.username}/>
            <label class="form-label" for="password">Password</label>
            <input type='password' class="form-input" id="password" bind:value={values.password}/>
            <div class="btn-container">
                <button type="submit" class="btn">
                    Login <i class="fa-solid fa-right-to-bracket fas"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .container {
        width: 100%;
        display: flex;
        justify-content: center;
        height: calc(90vh - 50px);
    }

    .form-container {
        display: flex;
        justify-content: center;
        width: 35%;
    }

    .form {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        column-gap: 10px;
        grid-template-rows: repeat(9, 40px);
        margin-top: 100px;
        width: 55%;
    }

    .btn-container {
        margin-top: 15px;
        text-align: center;
        height: 50px;
    }

    .form-label {
        font-size: 1.5rem;
        color: var(--accent-color);
    }

    .form-input {
        padding: 3px;
        border-radius: 5px;
        height: 30px;
        width: 100%;
        font-size: 1.4rem;
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