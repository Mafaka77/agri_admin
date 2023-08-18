<template>
    <div v-for="land in landWater">
        <q-expansion-item label="Land Resource, Soil & Water Conservation Details">
            <div class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Owner ID No.</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{land.owner_id}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Location</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{land.location}}</div>
                </div>
            </div>
            <div class="row justify-start q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Crops Grown</div>
                </div>
                <div class="row col-xs-6 col-md-10">
                    <div v-for="crops in land.land_crops">
                        <q-chip text-color="white" style="background-color: #588052">{{crops.crop_name}}</q-chip>
                    </div>
                </div>

            </div>
            <div class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Area Sown</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{land.total_area}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                </div>
                <div class="col-xs-6 col-md-3">
                </div>
            </div>
        </q-expansion-item>
    </div>
</template>

<script setup>
import {ref} from 'vue';
import {useQuasar} from "quasar";
import {router, useForm} from "@inertiajs/vue3";
const q=useQuasar();
const props=defineProps({
    'landWater':Object,
});
</script>

<style scoped>

</style>
