<script>
    import { createEventDispatcher } from 'svelte';
    export let message;

    const dispatch = createEventDispatcher();
    function setEmoji(event) {
        if (event.target.nodeName == 'P') {
            if (message == undefined) {
                message = event.target.innerText;
            } else {
                message = message + event.target.innerText;
            }
            dispatch('btnClick', {type: 'chat'});
        }
    }
</script>
<div class="emoji-container">
    <div class="emoji-list" on:click={setEmoji}>
        <p class="selection">😀</p>
        <p class="selection">😁</p>
        <p class="selection">😂</p>
        <p class="selection">😃</p>
        <p class="selection">😄</p>
        <p class="selection">😅</p>
        <p class="selection">😆</p>
        <p class="selection">😇</p>
        <p class="selection">😈</p>
        <p class="selection">😉</p>
        <p class="selection">😊</p>
        <p class="selection">😋</p>
        <p class="selection">😌</p>
        <p class="selection">😍</p>
        <p class="selection">😎</p>
        <p class="selection">😏</p>
        <p class="selection">😐</p>
        <p class="selection">😑</p>
        <p class="selection">😒</p>
        <p class="selection">😓</p>
        <p class="selection">😔</p>
        <p class="selection">😕</p>
        <p class="selection">😖</p>
        <p class="selection">😗</p>
        <p class="selection">😘</p>
        <p class="selection">😙</p>
        <p class="selection">😚</p>
        <p class="selection">😛</p>
        <p class="selection">😜</p>
        <p class="selection">😝</p>
        <p class="selection">😞</p>
        <p class="selection">😟</p>
        <p class="selection">😠</p>
        <p class="selection">😡</p>
        <p class="selection">😢</p>
        <p class="selection">😣</p>
        <p class="selection">😤</p>
        <p class="selection">😥</p>
        <p class="selection">😦</p>
        <p class="selection">😧</p>
        <p class="selection">😨</p>
        <p class="selection">😩</p>
        <p class="selection">😪</p>
        <p class="selection">😫</p>
        <p class="selection">😬</p>
        <p class="selection">😭</p>
        <p class="selection">😮</p>
        <p class="selection">😯</p>
        <p class="selection">😰</p>
        <p class="selection">😱</p>
        <p class="selection">😲</p>
        <p class="selection">😳</p>
        <p class="selection">😴</p>
        <p class="selection">😵</p>
        <p class="selection">😶</p>
        <p class="selection">😷</p>
        <p class="selection">🙁</p>
        <p class="selection">🙂</p>
        <p class="selection">🙃</p>
        <p class="selection">🙄</p>
        <p class="selection">🤐</p>
        <p class="selection">🤑</p>
        <p class="selection">🤒</p>
        <p class="selection">🤓</p>
        <p class="selection">🤔</p>
        <p class="selection">🤕</p>
        <p class="selection">🤗</p>
        <p class="selection">🤠</p>
        <p class="selection">🤢</p>
        <p class="selection">🤣</p>
        <p class="selection">🤤</p>
        <p class="selection">🤥</p>
        <p class="selection">🤧</p>
        <p class="selection">🤨</p>
        <p class="selection">🤩</p>
        <p class="selection">🤪</p>
        <p class="selection">🤫</p>
        <p class="selection">🤭</p>
        <p class="selection">🤮</p>
        <p class="selection">🤯</p>
        <p class="selection">🥰</p>
        <p class="selection">🥱</p>
        <p class="selection">🥳</p>
        <p class="selection">🥴</p>
        <p class="selection">🥵</p>
        <p class="selection">🥶</p>
        <p class="selection">🥺</p>
        <p class="selection">🧐</p>
        <p class="selection">😸</p>
        <p class="selection">😹</p>
        <p class="selection">😺</p>
        <p class="selection">😻</p>
        <p class="selection">😼</p>
        <p class="selection">😽</p>
        <p class="selection">😾</p>
        <p class="selection">😿</p>
        <p class="selection">🙀</p>
        <p class="selection">🙈</p>
        <p class="selection">🙉</p>
        <p class="selection">🙊</p>
        <p class="selection">👿</p>
        <p class="selection">💀</p>
        <p class="selection">🤬</p>
    </div>
</div>
<style>
    .emoji-container {
        height: 67.5%;
    }

    .emoji-list {
        /* display: flex; */
        /* flex-wrap: wrap; */
        font-size: 1.4rem;
        height: 100%;
        padding: 5px;
        width: calc(100% - 10px);
        border: none;
        background-color: var(--main-color);
        overflow: auto;
        cursor: default;
        user-select: none;
    }

    .selection {
        display: inline-block;
        line-height: 0;
        margin: 0;
        cursor: pointer;
    }
</style>