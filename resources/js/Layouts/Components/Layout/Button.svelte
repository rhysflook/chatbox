<script>
    export let onClick;
    export let size;
</script>
<button on:click={onClick} class="btn {size}">
    <slot />
</button>
<style>
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

    .btn-l {
        width: 75px;
    }

    .btn-m {
        width: 50px;
    }
</style>