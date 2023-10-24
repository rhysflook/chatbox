import { writable } from 'svelte/store';
import type { User } from '../types/types';
import { useSharedStore } from "./use-shared-store";

export const userStore = (value: User | undefined) => {
    const { subscribe, set, update } = writable(value);
    return {
        subscribe,
        login: (user: User) => set(user)
    }
}

export const useUser = () =>
    useSharedStore('friend-store', userStore);