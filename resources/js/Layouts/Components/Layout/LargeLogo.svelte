<script>
    import Logo from "./Logo.svelte";

</script>
<section class="signup-prompt">
    <h1 class="welcome">
        <div class="logo">
            <p class="logo-text">
                ChatBox
            </p>
            <i class="fa-regular fa-comment-dots fa-lg g-item-1 logo-icon"></i>
            <i class="fa-solid fa-box fa-lg  g-item-2 logo-icon"></i>
        </div>
    </h1>
    <h2 class="call-to-action">
        <slot />
    </h2>
</section>

<style>
    .signup-prompt {
        width: 35%;
        display: flex;
        flex-direction: column;
        align-items: center;
        /* justify-content: center; */
        color: var(--accent-color)
    }

    .welcome {
        margin-top: 100px;
        margin-bottom: 0;
        font-size: 5rem;
    }

    .call-to-action {
        font-size: 2rem;
    }

    .logo {
        color: var(--accent-color);
        text-align: center;

    }

    .logo-text {
        margin: 0;
    }
</style>