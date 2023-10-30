<template>
    <dialog id="deletionConfirmationDialog" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Hapus mahasiswa!</h3>
            <p class="py-4">Apakah kamu yakin ingin menghapus mahasiswa <b>{{ store.getters.getStudentAction.nama_siswa }}</b> dengan nim <b>{{ store.getters.getStudentAction.nim }}</b>?</p>

            <div class="modal-action">
                <button class="btn btn-primary rounded-box" @click="onDelete" :disabled="isLoading">
                    <div class="loading" v-if="isLoading"></div>
                    <span v-else>Ya, saya yakin!</span>
                </button>
                <button class="btn btn-error rounded-box" @click="store.commit('resetStudentAction')" :disabled="isLoading">Tidak, batalkan!</button>
            </div>
        </div>
    </dialog>
</template>

<script lang="ts" setup>
    import { Ref, ref } from 'vue'
    import store from '../../stores/store'
    import { router } from '@inertiajs/vue3'

    const isLoading: Ref<boolean> = ref(false)

    const onDelete = () => {
        router.delete(`/${store.getters.getStudentAction.nim}`, {
            onStart(){
                isLoading.value = true
            },
            onFinish(){
                isLoading.value = false
                store.commit("resetStudentAction")
            }
        })
    }
</script>