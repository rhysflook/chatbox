<script>
    import { router } from '@inertiajs/svelte'
    import NavBar from '../../Layouts/Components/Layout/NavBar.svelte';
    import Logo from '../../Layouts/Components/Layout/Logo.svelte';
    import Button from '../../Layouts/Components/Layout/Button.svelte';
    import LargeLogo from '../../Layouts/Components/Layout/LargeLogo.svelte';
    import FormField from '../../Layouts/Components/Layout/FormField.svelte';
    let values = {
        name: null,
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
        <form form on:submit|preventDefault={handleSubmit} class="form">
            <FormField id={'name'} label={'Username'} bind:value={values.name}/>
            <FormField id={'email'} label={'Email'} type={'email'} bind:value={values.email}/>
            <FormField id={'password'} label={'Password'} type={'password'} bind:value={values.password}/>
            <FormField id={'password_confirmation'} label={'Confirm Password'} type={'password'} bind:value={values.password_confirmation}/>
            <div class="btn-container">
                <Button onClick={handleSubmit}>Sign Up <i class="fa-solid fa-user-plus fas"></i></Button>
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
</style>