<script setup>
import {ref} from "vue";

const heightAttribute = ref(380)
function deleteHeight(attributesDataLength) {
    console.log(attributesDataLength)
    switch (attributesDataLength) {
        case 1:
        case 0:
        case 2:
            heightAttribute.value -= 57;
            console.log(heightAttribute)
            break;

    }
}
function addHeight(attributesDataLength) {

    let issetAttr = attributesDataLength ? attributesDataLength.length : attributesData.value = []

    switch (issetAttr) {
        case 1:
            heightAttribute.value += 57;
            break;
        case 2:
            if (heightAttribute.value === 437)
                heightAttribute.value += 57;
            else
                heightAttribute.value += 114;
            break;
        case 0:
            heightAttribute.value
            break
    }
}

</script>

<template>

</template>

<style scoped>

</style>
