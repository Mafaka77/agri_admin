<template>
        <div v-if="$page.props.auth.user.roles_id===1">
            <q-list>
                <q-expansion-item expand-separator icon="person" label="Admin Controls">
                    <q-item clickable @click="e=>$inertia.get(route('district.index'))">
                        <q-item-section avatar>
                            <q-icon name="dot"/>
                        </q-item-section>
                        <q-item-section>
                            <q-item-label class="text-blue-4">Add/View District</q-item-label>
                        </q-item-section>
                    </q-item>
                    <q-item clickable @click="e=>$inertia.get(route('sub-division.index'))">
                        <q-item-section avatar>
                            <q-icon name="dot"/>
                        </q-item-section>
                        <q-item-section>
                            <q-item-label class="text-blue-4">Add/View Sub-Division</q-item-label>
                        </q-item-section>
                    </q-item>

                    <q-item clickable @click="e=>$inertia.get(route('kharif-crops.index'))">
                        <q-item-section avatar>
                            <q-icon name="dot"/>
                        </q-item-section>
                        <q-item-section>
                            <q-item-label class="text-blue-4">Add Kharif Crops</q-item-label>
                        </q-item-section>
                    </q-item>
                    <q-item clickable @click="e=>$inertia.get(route('rabi-crops.index'))">
                        <q-item-section avatar>
                            <q-icon name="dot"/>
                        </q-item-section>
                        <q-item-section>
                            <q-item-label class="text-blue-4">Add Rabi Crops</q-item-label>
                        </q-item-section>
                    </q-item>
                    <q-item clickable @click="e=>$inertia.get(route('livestock.index'))">
                        <q-item-section avatar>
                            <q-icon name="dot"/>
                        </q-item-section>
                        <q-item-section>
                            <q-item-label class="text-blue-4">Add Livestock</q-item-label>
                        </q-item-section>
                    </q-item>
                    <q-item clickable @click="e=>$inertia.get(route('manage-user.index'))">
                        <q-item-section avatar>
                            <q-icon name="dot"/>
                        </q-item-section>
                        <q-item-section>
                            <q-item-label class="text-blue-4">Manage Users</q-item-label>
                        </q-item-section>
                    </q-item>
                </q-expansion-item>


            </q-list>
        </div>
</template>
<script setup>

</script>
