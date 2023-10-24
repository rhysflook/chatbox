import { writable} from "svelte/store";
import { useSharedStore } from "./use-shared-store";
import type { Friend, Store, User } from "../types/types";
export interface Friends {
    friends: Friend[];
    user_search: User[];
    pending_sent: User[];
    pending_received: User[];
}

export interface FriendStore<T> extends Store<T> {
      setQueryResult: (users: User[]) => void;
    setFriends: (friends: Friend[]) => void;
    setPendingSent: (users: User[]) => void;
    setPendingReceived: (users: User[]) => void;
}

export const friendStore = (): FriendStore<Friends> => {
    const { set, update, subscribe } = writable<Friends>();
    return {
      subscribe,
      set,
      setQueryResult: ((users: User[]) => update((store) => ({...store, user_search: users}))),
      setFriends: ((friends: Friend[]) => update((store) => ({...store, friends}))),
      setPendingSent: ((users: User[]) => update((store) => ({...store, pending_sent: users}))),
      setPendingReceived: ((users: User[]) => update((store) => ({...store, pending_received: users})))
    }
  };
