import { writable } from 'svelte/store';


const createFileStore = () => {
    const { subscribe, set, update } = writable({files: [], fileData: []});
    return {
        subscribe,
        setFiles: (files) => update(f => {
            for (const file of files) {
                const fileReader = new FileReader();
                fileReader.addEventListener('load', () => {
                    fileStore.addFile(fileReader.result);
                });
                fileReader.readAsDataURL(file);
            }
            return {...f, files: files}
        }),
        resetFileData: () => set({files: [], fileData: []}),
        addFile: (file) => update(f => ({...f, fileData: [...f.fileData, file]})),
    }
}

const fileStore = createFileStore();

export {fileStore};