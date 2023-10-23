<script>
    import { router } from '@inertiajs/svelte'
    import { chatStore, joinMessageChannel } from '../../stores/chatStore';
    import NavBar from '../../Layouts/Components/Layout/NavBar.svelte';
    import Container from '../../Layouts/Components/Layout/Container.svelte';
    import FriendList from '../../Layouts/Components/Friends/FriendList.svelte';
    import Chatbox from '../../Layouts/Components/Chat/Chatbox.svelte';
    import { onMount } from 'svelte';

    export let chat;
    export let recipient;

    onMount(() => {
        joinMessageChannel();
    });

    $: {
        chatStore.setChat(chat, recipient);
    }

    function getChatHistory(friend) {
        router.get(`/chat?friend=${friend.username}`);
    }


</script>
<NavBar />
<Container>

   <FriendList friendMethod={getChatHistory} />
   <Chatbox />
</Container>
