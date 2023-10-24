import { getContext, setContext } from "svelte"
import type { Writable } from "svelte/store";

export function setCustomWritableContext<T>(key: string, store: T) {
    return setContext(key, store)
}

export function getCustomWritableContext<T>(key: string) {
    return getContext<Writable<T>>(key);
}