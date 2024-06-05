<template>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Editar Post
    </h2>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form @submit.prevent="submit" class="mb-6">
                    <div
                        class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7"
                    >
                        <div class="grid grid-cols-1">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold"
                                >Title</label
                            >
                            <input
                                id="title"
                                v-model="form.title"
                                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                type="text"
                                placeholder="Descripción"
                            />
                        </div>
                        <div class="grid grid-cols-1">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold"
                                >Author</label
                            >
                            <input
                                id="author"
                                v-model="form.author"
                                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                type="text"
                                placeholder="Autor"
                            />
                        </div>
                    </div>

                    <div class="flex justify-end md:gap-8 gap-4 pt-5 pb-5 pr-5">
                        <Link
                            :href="route('posts.index')"
                            class="w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2"
                            type="button"
                        >
                            Cancelar
                        </Link>
                        <button
                            type="submit"
                            class="w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2"
                        >
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { useForm, Link } from "@inertiajs/vue3";

const props = defineProps(["post"]);

const form = useForm({
    title: props.post.title,
    author: props.post.author,
});

const errors = ref(props.errors);

const submit = () => {
    console.log(props);
    form.put(route("posts.update", props.post.id));
};
</script>
