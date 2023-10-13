<script>
    import { remember } from '@inertiajs/svelte'
    import NavBar from '../../Layouts/Components/Layout/NavBar.svelte';
    import Container from '../../Layouts/Components/Layout/Container.svelte';
    import FriendList from '../../Layouts/Components/Friends/FriendList.svelte';
    import Chatbox from '../../Layouts/Components/Chat/Chatbox.svelte';

    export let user;
    export let friends;
    export let chat;

    let targetFriend = remember(null);
    let friendHelper;

    window.Echo.private(`message.${user.id}`)
    .listen('.message', function (e) {
        chat = {...chat, messages: [...chat.messages, e.message]};
    });

</script>
<NavBar user={user ?? null}/>
<Container>

   <FriendList friends={friends} on:friendTyping={friendHelper.setFriendTyping} bind:targetFriend={targetFriend}/>
   <Chatbox chat={chat} user={user} bind:targetFriend={targetFriend} bind:this={friendHelper}/>
</Container>
