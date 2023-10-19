<script>
    import { remember } from '@inertiajs/svelte'
    import { user } from '../../stores/userStore';
    import { chatStore } from '../../stores/chatStore';
    import NavBar from '../../Layouts/Components/Layout/NavBar.svelte';
    import Container from '../../Layouts/Components/Layout/Container.svelte';
    import FriendList from '../../Layouts/Components/Friends/FriendList.svelte';
    import Chatbox from '../../Layouts/Components/Chat/Chatbox.svelte';

    export let friends;
    export let chat;
    export let recipient;
    export let loginUser;

    $: {
        if (loginUser) {
            user.login(loginUser);
        }

        if (chat) {
            chatStore.setChat(chat, recipient);
        }
    }
</script>
<NavBar />
<Container>

   <FriendList friends={friends} />
   <Chatbox />
</Container>
