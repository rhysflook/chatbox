<script>
    import { remember } from '@inertiajs/svelte'
    import { user } from '../../stores/userStore';
    import { chatStore, joinMessageChannel } from '../../stores/chatStore';
    import NavBar from '../../Layouts/Components/Layout/NavBar.svelte';
    import Container from '../../Layouts/Components/Layout/Container.svelte';
    import FriendList from '../../Layouts/Components/Friends/FriendList.svelte';
    import Chatbox from '../../Layouts/Components/Chat/Chatbox.svelte';
    import { onMount } from 'svelte';

    export let friends;
    export let chat;
    export let recipient;
    export let loginUser;
    export let total_unread

    onMount(() => {
        joinMessageChannel();
    });

    $: {
        if (loginUser) {
            user.login(loginUser);
        }

        chatStore.setChat(chat, recipient);
    }


</script>
<NavBar totalUnread={total_unread}/>
<Container>

   <FriendList friends={friends} />
   <Chatbox />
</Container>
