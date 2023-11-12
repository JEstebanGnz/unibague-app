<script setup>

import MainLayout from '@/Layouts/MainLayout.vue';
import {computed} from 'vue'
import {usePage} from '@inertiajs/vue3'
import ComplexRedirect from "@/Components/Module/ComplexRedirect.vue";
import InternalRedirect from "@/Components/Module/InternalRedirect.vue";
import SimpleRedirect from "@/Components/Module/SimpleRedirect.vue";


const page = usePage()
const user = computed(() => page.props.auth.user)
const props = defineProps({modules: Array});
console.log(props.modules)
</script>

<template>
    <div class="h-screen">
        <MainLayout>
            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-x-0.1 gap-y-10 py-6 px-5 justify-items-center place-items-center md:px-16 ">
                <template v-for="module in modules">
                    <ComplexRedirect v-if="module.type  === 'ExternalComplexRedirect'" :moduleName="module.name"
                                     :icon="module.icon" :payload="module.payload"/>
                    <InternalRedirect v-if="module.type === 'InternalRedirect'" :moduleName="module.name"
                                      :icon="module.icon" :payload="module.payload"/>
                    <SimpleRedirect v-if="module.type === 'ExternalSimpleRedirect'" :moduleName="module.name"
                                    :icon="module.icon" :payload="module.payload"/>
                </template>
            </div>

        </MainLayout>
<!--            <div class="w-full h-20 bg-unibague-blue overflow-hidden flex items-center justify-between px-8 bottom-0">-->
<!--                <div class="relative text-gray-300 text-md font-normal  capitalize">{{ user.name }}</div>-->
<!--                <div class="relative text-gray-300 text-md font-normal italic"> Version 1.0</div>-->
<!--            </div>-->



    </div>


</template>

