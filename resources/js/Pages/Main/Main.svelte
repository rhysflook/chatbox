<script>
    import { router } from '@inertiajs/svelte'
    import NavBar from '../../Layouts/Components/Layout/NavBar.svelte';
    import Button from '../../Layouts/Components/Layout/Button.svelte';
    import LargeLogo from '../../Layouts/Components/Layout/LargeLogo.svelte';
    import FormField from '../../Layouts/Components/Layout/FormField.svelte';
    let values = {
        name: null,
        username: null,
        email: null,
        password: null,
        password_confirmation: null
    }
    function handleSubmit() {
        router.post('/users', values)
    }
</script>
<NavBar />
<div class="container">
    <LargeLogo>
        Make an account!
    </LargeLogo>
    <div class="form-container">
        <form on:submit|preventDefault={handleSubmit} class="form">
            <FormField id={'name'} label={'Name'} bind:value={values.name}/>
            <FormField id={'username'} label={'Username'} bind:value={values.username}/>
            <FormField id={'email'} label={'Email'} type={'email'} bind:value={values.email}/>
            <label class="form-label" for="password">Password</label>
            <input type='password' class="form-input" id="password" bind:value={values.password}/>
            <label class="form-label" for="password_confirmation">Confirm Password</label>
            <input type='password' class="form-input" id="password_confirmation" bind:value={values.password_confirmation}/>
            <div class="btn-container">
                <Button >Sign Up <i class="fa-solid fa-user-plus fas"></i></Button>
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
        margin-top: 60px;
        width: 55%;
    }

    .btn-container {
        /* margin-top: 15px; */
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
</style>