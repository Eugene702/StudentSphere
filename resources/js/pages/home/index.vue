<template>
    <Head>
        <title>Student Sphere</title>
    </Head>

    <div class="h-screen w-full flex justify-center items-center bg-gray-100">
        <div class="w-8/12 h-[95%] p-10 rounded-box bg-white shadow-xl overflow-auto">
            <formComponent />
            <div class="mt-5">
                <tableData :data="student" />
            </div>
        </div>
    </div>

    <deletionConfirmationDialog v-if="store.getters.getStudentAction" />
</template>

<script lang="ts" setup>
    import { Head } from '@inertiajs/vue3';
    import store from '../../stores/store';
    import { defineAsyncComponent } from 'vue'

    defineProps({
        student: {
            type: Array<{
                nim: Number,
                nama_siswa: String,
                tahun_angkatan: String,
                fakultas: String,
                jurusan: String,
                kelas: String
            }>
        }
    })

    const formComponent = defineAsyncComponent(() => import('./form.vue'))
    const tableData = defineAsyncComponent(() => import('./tableData.vue'))
    const deletionConfirmationDialog = defineAsyncComponent(() => import('./deletionConfirmationDialog.vue'))
</script>