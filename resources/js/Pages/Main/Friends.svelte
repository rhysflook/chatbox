<script>
    import {user} from '../../stores/userStore';
    import NavBar from '../../Layouts/Components/Layout/NavBar.svelte';
    import Container from '../../Layouts/Components/Layout/Container.svelte';
    import FriendList from '../../Layouts/Components/Friends/FriendList.svelte';
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

    }

</script>
<NavBar totalUnread={total_unread}/>
<Container>
    <FriendList {friends} friendMethod={getFriendProfile} />
</Container>
<style>

</style>