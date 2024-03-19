<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import { Link } from '@inertiajs/vue3';
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
                            <h1>Example</h1><br>
                            <h3 class="text-lg text-black">Programa para realizar operaciones.</h3>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <h1>¡Bienvenido a mi sistema!</h1>
                            <!-- <div>
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
                            </div> -->
                            <br><br>
                            <h1>Calculadora:</h1>
                            <br>
                            <p v-if = "statusNumber1">
                                <input type="text" v-model="number1" :placeholder="number1 ? '' : 'Ingresa los datos'">
                            </p>
                            <p v-if = "statusSymbol">
                                <input type="text" v-model="symbol" placeholder="{{ symbol }}">
                            </p>
                            <p v-if = "statusNumber2">
                                <input type="text" v-model="number2" placeholder="{{ number2 }}">
                            </p>
                            <p v-if = "statusResult">
                                <input type="text" v-model="result" placeholder="{{ result }}">
                            </p>
                            <br>
                            <div class="buttons">
                                <button @click="addNumber(1)" class="btn btn-num">1</button>
                                <button @click="addNumber(2)" class="btn btn-num">2</button>
                                <button @click="addNumber(3)" class="btn btn-num">3</button>
                                <br>
                                <button @click="addNumber(4)" class="btn btn-num">4</button>
                                <button @click="addNumber(5)" class="btn btn-num">5</button>
                                <button @click="addNumber(6)" class="btn btn-num">6</button>
                                <br>
                                <button @click="addNumber(7)" class="btn btn-num">7</button>
                                <button @click="addNumber(8)" class="btn btn-num">8</button>
                                <button @click="addNumber(9)" class="btn btn-num">9</button>
                                <br>
                                <button @click="addNumber(0)" class="btn btn-num">0</button>
                                <br>
                                <button @click="operation('+')" class="btn btn-symbol">+</button>
                                <button @click="operation('-')" class="btn btn-symbol">-</button>
                                <button @click="operation('*')" class="btn btn-symbol">*</button>
                                <button @click="operation('/')" class="btn btn-symbol">/</button>
                                <button @click="operation('%')" class="btn btn-symbol">%</button>
                                <button @click="operation('^')" class="btn btn-symbol">^</button>
                                <br>
                                <button @click="equal('=')" class="btn btn-res">=</button>
                                <button @click="restart()" class="btn btn-restart">Restart</button>
                            </div>
                            <br>
                            <p>Resultado: {{ result }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
export default {
    data () {
        return {
            number1: null,
            number2: null,
            symbol: null,
            result: null,
            statusNumber1: true,
            statusNumber2: false,
            statusSymbol: false,
            statusResult: false,
        };
  },
  methods: {
    addNumber(number) {
      if (this.symbol === null) {
        this.number1 = this.number1 === null ? number : this.number1 * 10 + number;
      } else {
        this.statusNumber2 = true;
        this.statusSymbol = false;
        this.number2 = this.number2 === null ? number : this.number2 * 10 + number;
      }
    },
    operation(op) {
        if (this.number1 != null){           
                this.statusNumber1 = false;
                this.statusSymbol = true;
                this.symbol = op;
        } else{
            this.symbol = null;
        }
    },
    equal(eq) {
        if(this.number1 != null && this.number2 != null && this.symbol != null){
            this.statusNumber2 = false;
            this.statusResult = true;
            this.calculateResult();
        }
    },
    calculateResult() {
        switch (this.symbol) {
            case '+':
            this.result = this.number1 + this.number2;
            break;
            case '-':
            this.result = this.number1 - this.number2;
            break;
            case '*':
            this.result = this.number1 * this.number2;
            break;
            case '/':
            this.result = this.number1 / this.number2;
            break;
            case '%':
            this.result = this.number1 % this.number2;
            break;
            case '^':
            this.result = this.number1 ** this.number2;
            break;
        }
        this.number1 = null;
        this.number2 = null;
        this.symbol = null;
    },
    restart(){
        this.number1 = null;
        this.number2 = null;
        this.symbol = null;
        this.result = null;
        this.statusNumber1 = true;
        this.statusNumber2 = false;
        this.statusSymbol = false;
        this.statusResult = false;
    },
  },
};
</script>

<style>
    .btn {
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 25px;
        margin:4px;
        
    }
    .btn-primary {
        background-color: #007bff;
        color: #fff;
    }

    .btn-secondary{
        background-color: #2bc433;
        color: #000000;
    }

    .btn-num{
        background-color: #56d363;
        color: #000000;
    }

    .btn-symbol{
        background-color: #df5c5c;
        color: #000000;
    }

    .btn-res{
        background-color: #4dabdb;
        color: #000000;
    }

    .btn-restart{
        background-color: #de2c2c;
        color: #000000;
    }

</style>