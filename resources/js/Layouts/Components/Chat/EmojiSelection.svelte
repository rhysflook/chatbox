<script>
    import { message } from '../../../stores/chatStore'

    function setEmoji(event) {
        if (event.target.nodeName == 'P') {
            const emoji = event.target.innerText;
            let range = document.getSelection().getRangeAt(0);
            const input = document.getElementById('message-input');
            if (!input.contains(range.startContainer)) {
                message.update(m => m + emoji);
            } else {
                range.deleteContents();
                range.insertNode(document.createTextNode(emoji));
                range.collapse();
                message.update(() => input.innerHTML);
            }
        }
    }
</script>
<div id="emoji-choices" class="emoji-container">
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
        position: absolute;
        overflow-y: auto;
        height: 30%;
        background-color: var(--main-color);
        left: 5px;
        bottom: 5px;
        width: 50%;
        border: solid 5px var(--border-color);
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