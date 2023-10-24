import {type Invalidator, type Unsubscriber, type Subscriber } from "svelte/store";


export interface User {
    id: number;
    username: string;
    name: string;
    email: string;
    date_of_birth: string;
    about: string;
    relationship_status: number;
    is_visible: boolean;
    profile_pic: string;
}

export type Friend = User;

export interface Store<T> {
    subscribe: (this: void, run: Subscriber<T>, invalidate?: Invalidator<T> | undefined) => Unsubscriber;
    set: (this: void, value: T) => void;
}

