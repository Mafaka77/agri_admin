<template>
    <q-layout view="hHh Lpr lff">
        <q-header class="bg-white text-black header" bordered  style="border-bottom-color: green;">
            <q-toolbar>
                <q-btn dense flat icon="menu" round @click="toggleLeftDrawer" class="drawer" />
                <div class="col q-pl-lg q-pt-sm">
                    <q-toolbar-title>
<!--                        <div class="col items-center">-->
                            <img src="/images/agri.png" style="height: 30px">
<!--                        </div>-->

                    </q-toolbar-title>

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
            <q-scroll-area style="height: calc(100% - 150px); margin-top: 150px; border-right: 1px solid #ddd">
                <q-list padding>
                    <q-item clickable v-ripple  @click="e=>$inertia.get(route('dashboard'))">
                        <q-item-section avatar>
                            <q-icon name="inbox" />
                        </q-item-section>

                        <q-item-section>
                            Dashboard
                        </q-item-section>
                    </q-item>

                    <q-item  clickable v-ripple @click="e=>$inertia.get(route('manage-farmer'))">
                        <q-item-section avatar>
                            <q-icon name="star" />
                        </q-item-section>

                        <q-item-section>
                            Manage Farmers
                        </q-item-section>
                    </q-item>

                   <SideNav/>
                </q-list>
            </q-scroll-area>

            <q-img class="absolute-top" src="https://cdn.quasar.dev/img/material.png" style="height: 150px">
                <div class="absolute-bottom bg-transparent">
                    <q-avatar size="56px" class="q-mb-sm">
                        <img src="https://cdn.quasar.dev/img/boy-avatar.png">
                    </q-avatar>
                    <div class="text-weight-bold">Welcome,</div>
                    <div>{{$page.props.auth.user.name}}</div>
                </div>
            </q-img>

            <!--            <SideNav class="drawer">-->
<!--                <template #miniBtn>-->
<!--                    <div class="flex justify-end">-->
<!--                        <q-btn @click="miniState=true" flat round icon="chevron_left"/>-->
<!--                    </div>-->

<!--                </template>-->
<!--            </SideNav>-->

        </q-drawer>
        <q-page-container style="background-color: #f1f1f1">
            <AdminControls/>
            <q-page style="width: 100%">
                <br/>
                <div class=" q-pa-sm">
                    <slot>

                    </slot>
                </div>
            </q-page>

        </q-page-container>
        <FooterComponent/>
    </q-layout>
</template>

<script setup>
import SideNav from "@/Components/SideNav.vue";
import {ref} from 'vue'
import {router, useForm} from "@inertiajs/vue3";
import {useQuasar} from "quasar";
import {AdminStore} from "@/Store/AdminStore.js";
import FooterComponent from "@/Components/FooterComponent.vue";
import AdminControls from "@/Components/Admin/AdminControls.vue";

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
