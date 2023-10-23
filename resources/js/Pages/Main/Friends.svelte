<script>
    import {user} from '../../stores/userStore';
    import NavBar from '../../Layouts/Components/Layout/NavBar.svelte';
    import Container from '../../Layouts/Components/Layout/Container.svelte';
    import FriendList from '../../Layouts/Components/Friends/FriendList.svelte';
    import { router } from '@inertiajs/svelte';
    import FriendInterface from '../../Layouts/Components/Friends/FriendInterface.svelte';
    export let loginUser;
    export let friends;
    export let total_unread

    $: {
        if (loginUser) {
            user.login(loginUser);
        }
    }

    function getFriendProfile(friend)
    {
        router.get('/profile?user=' + friend.username);
    }

</script>
<NavBar totalUnread={total_unread}/>
<Container>
    <FriendList {friends} friendMethod={getFriendProfile} />
    <FriendInterface />
</Container>
<style>

</style>