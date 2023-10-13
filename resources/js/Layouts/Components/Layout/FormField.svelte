<script>
    export let id;
    export let label;
    export let value;
</script>
<label class="form-label" for="{id}">{label}</label>
<input class="form-input" id="{id}" bind:value={value}/>
<style>
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