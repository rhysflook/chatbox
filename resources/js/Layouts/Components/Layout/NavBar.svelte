<script lang="ts">
    import { inertia, page } from '@inertiajs/svelte'
    import Logo from './Logo.svelte';

    $: ({user, total_unread} = $page.props);
</script>
<div class="navbar">
    <a href="/">
        <Logo />
    </a>
    <div class="nav-items">
        {#if user}
            <a use:inertia href="/chat" class="nav-item chat-nav">
                {#if total_unread}
                    <div class="unread-icon">
                        <i class="fa-solid fa-envelope icon"></i>{total_unread}
                    </div>
                {/if}
                Chat <i class="fa-regular fa-comment-dots"></i>
            </a>
            <a use:inertia href="/friends" class="nav-item">
                Friends <i class="fa-solid fa-user-group"></i>
            </a>
            <a use:inertia href="/profile" class="nav-item">
                Profile <i class="fa-solid fa-user"></i>
            </a>
        {/if}
        <a use:inertia href={user ? '/logout' : '/login'} class="nav-item">
            {user ? 'Logout' : 'Login'} <i class="fa-solid fa-right-from-bracket"></i>
        </a>
        <a use:inertia href="/settings" class="nav-item">
            Settings <i class="fa-solid fa-gear"></i>
        </a>

    </div>
</div>
<style>
    .navbar {
        font-size: 1.6rem;
        width: calc(100% - 40px);
        height: 10vh;
        padding: 10px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        cursor: pointer;
        background-color: var(--nav-color);
        margin-bottom: 30px;
    }

    .nav-items {
        color: var(--accent-color);
        width:30%;
        display: flex;
        justify-content: end;
    }

    :global(a) {
        color: var(--accent-color);
        text-decoration: none;
    }

    .nav-item {
        display: flex;
        flex-direction: column;
        font-size: 1.2rem;
        width: 23%;
        text-align: center;

    }

    .nav-item:hover {
        color: var(--highlight-color);
    }

    .chat-nav {
        position: relative;
    }

    .unread-icon {
        background-color: var(--border-color);
        color: var(--secondary-color);
        position: absolute;
        right: -5px;
        top: -10px;
        z-index: 99;
        border-radius: 50px;
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 5px;
    }
    .icon {
        margin-right: 3px;
    }
</style>