<script setup>
import {ref, watch} from "vue";

const id = ref(0)

const attributes = ref()
const AttributeName = ref(null)
const AttributeValue = ref(null)
const heightAttribute = ref(380)
const props = defineProps(['product']);
const emit = defineEmits(['editVisible', 'addVisible'])
const attributesData = ref(JSON.parse(props.product.DATA))
const data = ref({
    article: props.product.article,
    name: props.product.name,
    status: props.product.status,
})


function deleteHeight(attributesDataLength) {
    console.log(attributesDataLength)
    switch (attributesDataLength) {
        case 1:
        case 0:
        case 2:
            heightAttribute.value -= 57;
            console.log(heightAttribute.value)
            break;

    }
}

function addHeight(attributesDataLength) {

    let issetAttr=attributesDataLength?attributesDataLength.length:attributesData.value=[]

    switch (issetAttr) {
        case 1:
            heightAttribute.value += 57;
            break;
        case 2:
            if(heightAttribute.value===437)
                heightAttribute.value += 57;
            else
                heightAttribute.value += 114;
            break;
        case 0:
            heightAttribute.value
            break
    }
}
function addAttributes() {
    console.log(data.value)
    let attrIsset = attributesData.value.length !== 0 ? attributesData.value : null;
    axios.patch(`api/products/${props.product.id}`, {data: data.value, attributes: attrIsset}).then(res => {
        console.log(res)
        AttributeName.value = ''
        AttributeValue.value = ''
        emit('editVisible',false)
    });
}
function addAttribute() {
    attributesData.value.push({id: id.value++, name: AttributeName.value, value: AttributeValue.value})
    addHeight(attributesData.value)

}
function deleteAttr(attribute) {

    attributesData.value = attributesData.value.filter(a => a !== attribute)
    deleteHeight(attributesData.value.length)
}

addHeight(attributesData.value)

</script>

<template>

    <div class="addComponent" :style="{height:heightAttribute + 'px'}">
        <div class="flex justify-end" @click="emit('editVisible',false)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor"

                 class="w-6 h-6  stroke-white cursor-pointer ">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </div>
        <div>
            <div style="margin-left: 10px">

                <h1 class="text-white text-lg mb-3">Редактировать {{data.article}}</h1>
                <p class="TextStyle mb-2" style=" color: white;">Артикул</p>
                <input class="mb-2" style="background: white;width: 500px;height: 34px; border-radius: 10px"
                       v-model="data.article">
                <p class="TextStyle mb-2" style=" color: white;">Название</p>
                <input class="mb-2" style="background: white;width: 500px; height: 34px;border-radius: 10px"
                       v-model="data.name">
                <p class="TextStyle mb-2" style=" color: white;">Статус</p>
                <select class="mb-2" style="background: white;width: 500px; height: 40px;border-radius: 10px"
                        v-model="data.status">
                    <option :value="data.status">
                        Доступен
                    </option>
                    <option value="NotAvailable">
                        Не доступен
                    </option>
                </select>
                <p class="text-white mb-2"> Атрибуты</p>

                <div v-if="attributesData" v-for="attribute in attributesData" :key="attribute.id">
                    <div class="grid gap-2  grid-cols-3 gap-x-64   w-32 mb-2">
                        <div>
                            <p class="TextStyle  " style=" color: white;">Название</p>
                            <input style="background: white;width: 250px; height: 34px;border-radius: 10px"
                                   v-model=" attribute.name">
                        </div>

                        <div>
                            <p class="TextStyle " style=" color: white;">Значение</p>
                            <input style="background: white;width: 250px; height: 34px;border-radius: 10px"
                                   v-model="attribute.value">
                        </div>
                        <div class="mt-6">
                            <svg @click="deleteAttr(attribute)" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                            </svg>

                        </div>


                    </div>
                </div>
            </div>
            <p class="text-sm text-sky-500 mt-2 ml-2 cursor-pointer" @click="addAttribute">+Добавить аттрибут</p>
            <button class="bg-sky-500 text-white text-sm rounded-lg w-24 h-6 ml-2 mt-5" @click="addAttributes()">
                Добавить
            </button>
        </div>
    </div>
</template>

<style scoped>


</style>
