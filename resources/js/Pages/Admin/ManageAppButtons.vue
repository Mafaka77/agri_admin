<template>
    <div class="container">
        <div>App Controls</div>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <q-checkbox
                    v-model="download_button"
                    label="Enable Download Button"
                    @update:model-value="ontoggle"
                />
            </div>
            <div class="col-xs-12 col-md-6">
                <q-checkbox
                    v-model="permission_button"
                    label="Enable Permission Controls"
                    @update:model-value="permissionToggle"
                />
            </div>
        </div>

    </div>

</template>

<script setup>
import {ref} from 'vue';
import {router} from "@inertiajs/vue3";
import {useQuasar} from "quasar";

const q=useQuasar();
const props=defineProps({
    'downloadBtn':Object,
})
const download_button=ref(props.downloadBtn.download_button===0?false:true);
const permission_button=ref(props.downloadBtn.permission_button===0?false:true);
const ontoggle=()=>{
    router.put(route('update-download-btn'), {
        'data':download_button.value === true ? 1 : 0},{
        onStart:()=>q.loading.show(),
        onSuccess:()=>q.loading.hide(),
    });
}
const permissionToggle=()=>{
    router.put(route('update-permission-btn'), {
        'data':permission_button.value === true ? 1 : 0},{
        onStart:()=>q.loading.show(),
        onSuccess:()=>q.loading.hide(),
    });
}
</script>

<style scoped>

</style>
