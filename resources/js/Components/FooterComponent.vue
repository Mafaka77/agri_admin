<template>
    <q-footer>
        <div style="background-color: #302e2a" class="text-white">

            <div class="row justify-center q-pt-md q-pb-md">
                <div class="col-xs-12 col-md-5 text-center links">
                    <img src="storage/images/argi_logo.png" style="height: 45px">
                </div>
                <div class="col-xs-12 col-md-5 text-center links">
                    <div  @click="e=>$inertia.get(route('terms'))">Design and Developed by</div>
                    <div  @click="e=>$inertia.get(route('terms'))">Mizoram State e-Governance Society</div>
                </div>

            </div>
        </div>
    </q-footer>
</template>

<script setup>

</script>

<style scoped>

</style>
