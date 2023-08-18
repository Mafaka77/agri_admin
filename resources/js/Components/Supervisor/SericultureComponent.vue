<template>
    <div v-for="seri in sericulture">
        <q-expansion-item label="Sericulture Details">
            <div class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Sericulture ID</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{seri.sericulture_id}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Location</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{seri.location}}</div>
                </div>
            </div>
            <div class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Total Farm Area</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{seri.total_area}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Size of Rearing Unit</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{seri.size_of_rearing_unit}}</div>
                </div>
            </div>
            <div class="row justify-start q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Silkworms Reared</div>
                </div>
                <div class="row col-xs-6 col-md-3">
                    <div v-for="worms in seri.silkworm">
                        <q-chip text-color="white" style="background-color:#588052 ">{{worms.silkworm_name}}</q-chip>
                    </div>
                </div>
            </div>
            <div class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Silkworm Feed Area</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{seri.plantation_total_area}}</div>
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
    'sericulture':Object,
});
</script>

<style scoped>

</style>
