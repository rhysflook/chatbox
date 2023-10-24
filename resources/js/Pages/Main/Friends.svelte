<script lang="ts">
    import NavBar from '../../Layouts/Components/Layout/NavBar.svelte';
    import Container from '../../Layouts/Components/Layout/Container.svelte';
    import FriendList from '../../Layouts/Components/Friends/FriendList.svelte';
    import { router } from '@inertiajs/svelte';
    import FriendInterface from '../../Layouts/Components/Friends/FriendInterface.svelte';
    import { friendStore } from '../../stores/friendStore';
    import type { Friend, User } from '../../types/types';
    import { setCustomWritableContext } from '../../context/context';

    export let user_search: User[];
    export let pending_sent: User[];
    export let pending_received: User[];

    let store = friendStore();
    setCustomWritableContext('friends', store);
    $: store.setQueryResult(user_search);
    $: store.setPendingSent(pending_sent);
    $: store.setPendingReceived(pending_received);

    function getFriendProfile(friend: Friend)
    {
        router.get('/profile?user=' + friend.username);
    }

</script>
<NavBar />
<Container>
    <FriendList friendMethod={getFriendProfile} />
    <FriendInterface />
</Container>
<style>

</style>