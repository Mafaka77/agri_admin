<template>
    <q-layout view="hHh Lpr lff">
        <q-header class="bg-white text-black header" bordered  style="border-bottom-color: green;">
            <q-toolbar>
                <q-btn dense flat icon="menu" round @click="toggleLeftDrawer" class="drawer" />
                <div class="col q-pl-lg q-mb-sm">
                    <q-toolbar-title>
                        <div class="col text-green text-bold">
                            FARMER REGISTRATION
                        </div>

                    </q-toolbar-title>
                        <div class="text-subtitle3"> Agriculture Department,Mizoram</div>
                </div>
                <q-btn dense flat icon="person" round>
                    <q-menu persistent>
                        <div class="row no-wrap q-pa-md">
                            <div class="column items-center">
                                <div class=" q-mt-md q-mb-xs">{{ $page.props.auth.user.name }}</div>
                                <q-btn
                                    color="red"
                                    label="Logout"
                                    size="sm"
                                    v-close-popup
                                    @click.prevent="logout"
                                />
                            </div>
                        </div>
                    </q-menu>
                </q-btn>
            </q-toolbar>

        </q-header>

        <q-drawer v-model="leftDrawerOpen"
                  :width="300"
                  :breakpoint="500"
                  bordered
                  class="bg-grey-3 drawer">
            <template v-slot:mini>
                <div class="column justify-center  text-color text-bold full-height">

                    <div class="column q-gutter-sm">
                        <q-btn flat color="primary" icon="o_dashboard"/>
                        <q-btn flat icon="o_feed"/>
                        <q-btn flat icon="o_storage"/>
                        <q-btn flat icon="o_settings"/>
                    </div>
                    <q-btn class="absolute-bottom" @click="miniState=false" flat round icon="chevron_right"/>
                </div>
            </template>
            <SideNav class="drawer">
                <template #miniBtn>
                    <div class="flex justify-end">
                        <q-btn @click="miniState=true" flat round icon="chevron_left"/>
                    </div>

                </template>
            </SideNav>

        </q-drawer>
        <q-page-container style="background-color: #f1f1f1">
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
                                    <q-item clickable @click="e=>$inertia.get(route('manage-user.index'))">
                                        <q-item-section>Manage Users</q-item-section>
                                    </q-item>

                                </q-list>
                            </q-menu>
                        </q-tab>
                    </q-tabs>
                </div>
            </div>
            <q-page style="width: 100%">
                <br/>
                <div class=" q-pa-sm">
                    <slot>

                    </slot>
                </div>
            </q-page>
        </q-page-container>

    </q-layout>
</template>

<script setup>
import SideNav from "@/Components/SideNav.vue";
import {ref} from 'vue'
import {router, useForm} from "@inertiajs/vue3";
import {useQuasar} from "quasar";
import {AdminStore} from "@/Store/AdminStore.js";

const form = useForm({})
const confirm = ref(false)
const leftDrawerOpen = ref(false)
const miniState = ref(false);
const tabs=ref('mails')
const q=useQuasar();
const store=AdminStore();

function toggleLeftDrawer() {
    leftDrawerOpen.value = !leftDrawerOpen.value
}
const logout=e=>{
    q.dialog({
        title: 'Confirm Logout',
        message: 'Are you sure?',
        ok: 'Yes',
        cancel: 'No'
    }).onOk(() => {
        router.get(route('logout'),{
            onStart:()=>q.loading.show(),
            onFinish:()=>q.loading.hide(),
        })
    }).onCancel(() => {

    })
}
</script>
<style>
@media only screen and (min-width: 1026px) {
    .loginModal{
        width: 400px;
    }
    .drawer {
        display: none;
    }
    .header{
        padding-left: 7.5%;
        padding-right: 7.5%;
    }
    .tabs{
        padding-left: 15%;
        padding-right: 15%;
    }
}
@media (max-width: 1026px) {
    .loginModal{
        width: inherit;
    }
    .largeScreen {
        display: none;
    }
}
</style>
