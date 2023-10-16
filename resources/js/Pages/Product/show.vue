<script setup>
import {ref, watch} from "vue";
import Edit from "@/Pages/Product/edit.vue";


const attributes = ref([])
const heightAttribute = ref(390)
const editVisible = ref(false)
const emit = defineEmits(['showVisible','editVisible'])
const props = defineProps(['productShow'])
console.log(props.productShow)

</script>

<template>

    <div class="addComponent" :style="{height:heightAttribute + 'px'}">
        <div class="flex justify-end mt-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                 class=" w-5 h-5  cursor-pointer stroke-white hover:fill-white" @click="emit('editVisible',true) , emit('showVisible',false) ">
                <path
                    d="M2.695 14.763l-1.262 3.154a.5.5 0 00.65.65l3.155-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                 class="stroke-white cursor-pointer  w-5 h-5 hover:fill-white" @click="">
                <path fill-rule="evenodd"
                      d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                      clip-rule="evenodd"/>
            </svg>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor"

                 class=" w-6 h-6  stroke-white cursor-pointer" @click="emit('showVisible',false)">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </div>


        <div class=" flex">
            <div class="ml-3 mt-10 text-sm text-gray-400 ">
                <p>Артикул</p>
                <p>Название</p>
                <p>Статус</p>
                <p>Аттрибуты</p>
            </div>

            <div class=" ml-3 mt-10 text-white text-sm ">
                <p>{{ props.productShow.article }}</p>
                <p>{{ props.productShow.name }} </p>
                <p>{{ props.productShow.status }}</p>
                <div v-for="res in JSON.parse(props.productShow.DATA)">
                    <p> name:{{ res.name }}</p>
                    <p> value:{{ res.value }}</p>
                </div>

            </div>

        </div>
<!--        <div v-if="editVisible">-->
<!--            <edit @editVisible="(msg) => editVisible = msg" :product="props.productShow"/>-->
<!--        </div>-->
    </div>


</template>

<style scoped>


</style>
