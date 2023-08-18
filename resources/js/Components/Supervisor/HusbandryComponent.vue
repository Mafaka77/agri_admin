<template>
    <div v-for="husban in husbandry">
        <q-expansion-item label="Animal Husbandry Details" expand-separator>
            <div class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Husbandry ID</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{husban.husbandry_id}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Location</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{husban.location}}</div>
                </div>
            </div>
            <div class="row justify-start q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Livestock</div>
                </div>
                <div class="row col-xs-6 col-md-3">
                    <div v-for="livestock in husban.livestock">
                        <q-chip text-color="white" style="background-color: #588052">
                            {{livestock.livestock_name}}
                        </q-chip>
                    </div>
                </div>
            </div>
            <div class="row justify-start q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Type of Breed</div>
                </div>
                <div class="row col-xs-6 col-md-3">
                    <div v-for="breed in husban.husbandry_type_breed">
                        <q-chip text-color="white" style="background-color: #588052">
                            {{breed.name}}
                        </q-chip>
                    </div>
                </div>
            </div>
            <div class="row justify-start q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Type of Farm</div>
                </div>
                <div class="row col-xs-6 col-md-3">
                    <div v-for="breed in husban.type_of_farm">
                        <q-chip text-color="white" style="background-color: #588052">
                            {{breed.name}}
                        </q-chip>
                    </div>
                </div>
            </div>
            <div class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Adult Male</div>
                </div>
                <div class="row col-xs-6 col-md-2">
                    <div>{{husban.adult_male}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Adult Female</div>
                </div>
                <div class="row col-xs-6 col-md-2">
                    <div>{{husban.adult_female}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Total Livestock</div>
                </div>
                <div class="row col-xs-6 col-md-2">
                    <div>{{husban.total}}</div>
                </div>
            </div>
            <div class="row justify-start q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Poultry Farm Type</div>
                </div>
                <div class="row col-xs-6 col-md-3">
                    <div v-for="breed in husban.poultry_farm">
                        <q-chip text-color="white" style="background-color: #588052">
                            {{breed.name}}
                        </q-chip>
                    </div>
                </div>
            </div>
            <div class="row justify-start q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Poultry Farm Breed</div>
                </div>
                <div class="row col-xs-6 col-md-3">
                    <div v-for="breed in husban.type_of_breed">
                        <q-chip text-color="white" style="background-color: #588052">
                            {{breed.name}}
                        </q-chip>
                    </div>
                </div>
            </div>
            <div class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Poultry Total</div>
                </div>
                <div class="row col-xs-6 col-md-3">
                    <div>{{husban.no_of_poultry}}</div>
                </div>
                <div class="col-xs-6 col-md-2">

                </div>
                <div class="row col-xs-6 col-md-3">

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
    'husbandry':Object,
});
</script>

<style scoped>

</style>
