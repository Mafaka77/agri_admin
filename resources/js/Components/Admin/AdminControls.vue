<template>
    <div class="row justify-start">
        <div class="col-md-5">
            <q-tabs inline-label class="largeScreen text-green-9" v-model="store.tabs">
                <q-tab name="dashboard" icon="home" label="Dashboard" clickable @click="e=>$inertia.get(route('dashboard'))"/>
                <q-tab name="farmers" icon="person" label="Farmers List" clickable @click="e=>$inertia.get(route('manage-farmer'))"/>
                <q-tab  v-if="$page.props.auth.user.roles_id===1" name="movies" icon="movie" label="Admin Controls" >
                    <q-menu
                        transition-show="scale"
                        transition-hide="scale"
                    >
                        <q-list style="max-width: 100%">
                            <q-item clickable @click="e=>$inertia.get(route('manage-user.index'))">
                                <q-item-section>Manage Users</q-item-section>
                            </q-item>
                            <q-item  clickable @click="e=>$inertia.get(route('district.index'))">
                                <q-item-section>Manage District</q-item-section>
                            </q-item>
                            <q-item clickable @click="e=>$inertia.get(route('sub-division.index'))">
                                <q-item-section>Manage Sub-Division</q-item-section>
                            </q-item>
                            <q-separator />
                            <q-item clickable @click="e=>$inertia.get(route('kharif-crops.index'))">
                                <q-item-section>Manage Kharif Crops</q-item-section>
                            </q-item>
                            <q-item clickable @click="e=>$inertia.get(route('rabi-crops.index'))">
                                <q-item-section>Manage Rabi Crops</q-item-section>
                            </q-item>
                            <q-item clickable @click="e=>$inertia.get(route('livestock.index'))">
                                <q-item-section>Manage Livestock</q-item-section>
                            </q-item>
                            <q-item clickable @click="e=>$inertia.get(route('manage-greenhouse-plants.index'))">
                                <q-item-section>Manage Greenhouse Plants</q-item-section>
                            </q-item>

                        </q-list>
                    </q-menu>
                </q-tab>
            </q-tabs>
        </div>
    </div>
</template>

<script setup>
import {AdminStore} from "@/Store/AdminStore.js";

const store=AdminStore();
</script>

<style scoped>

</style>
