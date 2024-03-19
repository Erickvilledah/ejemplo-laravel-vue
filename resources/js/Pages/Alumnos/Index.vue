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
                            <h1>Index</h1><br>
                            <h3 class="text-lg text-black">Programa para colocar tu nombre.</h3>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <h1>¡Bienvenido a mi sistema!</h1>
                            <div>
                                <p v-if = "!statusName">
                                    <br>
                                    <h2>Escribe tu nombre aqui:</h2>
                                    <br>
                                    <input type="text" v-model="name" placeholder="Escribe tu nombre" :disabled="statusName"><br><br>
                                    <button @click="showName" class="btn btn-primary">Mostrar nombre</button><br><br><br>
                                </p>
                                <p v-if="statusName">
                                    <br>
                                    <h1>Hola, bienvenido: {{ name }}.</h1><br> 
                                    <button @click="editName" class="btn btn-secondary">Editar nombre</button><br><br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
export default {
    data() {
        return {
            name: '',
            statusName: false,
        };
    },
    methods: {
        showName() {
            if (this.name) {
                this.statusName = true;
            }
        },
        editName() {
            this.statusName = false;
        },
    }
};
</script>

<style>
    .btn {
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 16px;
        }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
    }

    .btn-secondary{
        background-color: #2bc433;
        color: #000000;
    }

</style>