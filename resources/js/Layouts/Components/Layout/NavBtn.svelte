<script>
    import { inertia } from '@inertiajs/svelte'
    export let text;
    export let icon;
    export let href;
</script>
<a use:inertia href={href} class="nav-item">
    {text} <i class="fa-regular {icon}"></i>
</a>

<style>
    .nav-item {
        display: inline-block;
        font-size: 1.2rem;
        width: 23%;
        text-align: center;
    }

    .nav-item:hover {
        color: var(--highlight-color);
    }
</style>