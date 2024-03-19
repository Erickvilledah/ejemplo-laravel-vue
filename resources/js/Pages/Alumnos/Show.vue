<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import { Link } from '@inertiajs/vue3';

defineProps ({alumnos: Array});

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mis Alumnos - Erick Villeda
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h1>Show</h1><br>
                            <h3 class="text-lg text-black">Listado mis Alumnos</h3>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="border px-4 py-2">Nombre</th>
                                        <th class="border px-4 py-2">Apellido</th>
                                        <th class="border px-4 py-2">Teléfono</th>
                                        <th class="border px-4 py-2">Email</th>
                                    </tr>
                                </thead>
                                <tr v-for="alumno in alumnos">
                                    <td class="border px-4 py-2">
                                        {{ alumno.name }}
                                    </td>
                                    <td class="border px-4 py-2">
                                        {{ alumno.lastName }}
                                    </td>
                                    <td class="border px-4 py-2">
                                        {{ alumno.phone }}
                                    </td>
                                    <td class="border px-4 py-2">
                                        {{ alumno.email }}
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>