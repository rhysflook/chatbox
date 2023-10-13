<div class="container">
    <div class="inner-container">
        <slot />
    </div>
</div>
<style>
    :global(:root) {
        --main-color: #fff;
        --secondary-color: #ffffff;
        --accent-color: #000;
        --highlight-color: #b6b6b6;
        --alt-color: #e7e7e7;
        --heading-color: #000000;
        --font-color: #000000;
        --border-color: #a1a1a1;
        --icon-color: #000000;
        /* --main-color: #141E46;
        --secondary-color: #FF6969;
        --accent-color: #141E46;
        --highlight-color: #C70039;
        --alt-color: #FF6969;
        --font-color: #FFF5E0;
        --heading-color: #FFF5E0;
        --border-color: #FFF5E0;
        --icon-color: #141E46;
        --nav-color: #FFF5E0; */
    }

    :global(body) {
        background-color: var(--secondary-color);
        font-family: 'AR One Sans', sans-serif;
        color: var(--font-color);
        margin: 0;
    }

    :global(::-webkit-scrollbar) {
        width: 0.35em;
    }

    :global(::-webkit-scrollbar-track) {
        box-shadow: inset 0 0 6px var(--border-color);
    }

    :global(::-webkit-scrollbar-thumb) {
        background-color: var(--border-color);
        outline: 1px solid var(--highlight-color);
        border-radius: 3px;
    }

    :global(button) {
        color: var(--font-color);
    }
     .container {
        display: flex;
        justify-content: center;
        width: 100%;
        height: calc(85vh - 50px);
    }

    .inner-container {
        padding-top: 20px;
        display: flex;
        width: 85%;
        justify-content: space-evenly;
        height: 100%;
    }
</style>