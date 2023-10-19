<script>
    import { createEventDispatcher } from 'svelte';
    import { chatStore } from '../../../stores/chatStore'

    const dispatch = createEventDispatcher();
    function setEmoji(event) {
        if (event.target.nodeName == 'P') {

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
        overflow-y: auto;
        height: calc(100% - 50px);
        background-color: var(--main-color);

    }

    .emoji-list {
        /* display: flex; */
        /* flex-wrap: wrap; */
        font-size: 1.4rem;
        height: 100%;
        padding: 5px;
        width: calc(100% - 10px);
        border: none;
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