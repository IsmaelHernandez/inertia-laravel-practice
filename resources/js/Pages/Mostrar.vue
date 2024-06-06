<template>
    <h1
        class="text-center text-2xl font-bold leading-7 text-gray-300 sm:text-3xl sm:truncate py-4 bg-gradient-to-l from-indigo-500 to-indigo-800"
    >
        MOSTRAR LOS POST
    </h1>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <Link
                    :href="route('posts.create')"
                    class="flex-shrink-0 bg-blue-500 text-white text-base font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-blue-200"
                    as="button"
                >
                    Nuevo
                </Link>
                <table
                    class="rounded-t-lg mt-5 min-w-full mx-auto bg-gray-800 text-gray-100"
                >
                    <thead>
                        <tr class="text-left border-b border-gray-300">
                            <th
                                scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider"
                            >
                                Title
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider"
                            >
                                Author
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-100 uppercase tracking-wider"
                            >
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody
                        class="bg-gray-700 border-b border-gray-600 text-gray-200"
                    >
                        <tr v-for="post in posts" :key="post.id">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium">
                                            {{ post.title }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm">
                                    {{ post.author }}
                                </div>
                            </td>
                            <td class="flex m-2">
                                    <Link
                                        :href="
                                            route('posts.edit', post.id)
                                        "
                                        class="flex-shrink-0 bg-purple-600 text-white text-base font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200"
                                        as="button"
                                    >
                                        Editar
                                    </Link>
                                    <Link
                                        method="delete"
                                        :href="
                                            route(
                                                'posts.destroy',
                                                post.id
                                            )
                                        "
                                        class="flex-shrink-0 bg-pink-500 text-white text-base font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-pink-200"
                                        as="button"
                                    >
                                        Borrar
                                    </Link>
                                </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    posts: {
        type: Array,
        required: true,
    },
});

</script>
