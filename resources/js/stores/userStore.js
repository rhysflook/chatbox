import { writable } from 'svelte/store';

const createUserStore = () => {
    const { subscribe, set, update } = writable(null);
    return {
        subscribe,
        login: (user) => set(user)
    }
}

export const user = createUserStore();