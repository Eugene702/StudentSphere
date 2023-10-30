<template>
    <form class="grid grid-cols-2 gap-3" @submit.prevent="onSubmit">
        <div class="form-control">
            <label for="nim" class="label">
                <span class="label-text">NIM</span>
            </label>

            <input type="text" class="input input-primary rounded-box input-md" placeholder="4112xxxxx" id="nim"
                v-model="form.nim" maxlength="10">
            <span v-if="form.errors.nim" class="text-error">{{ form.errors.nim }}</span>
        </div>

        <div class="form-control">
            <label for="name" class="label">
                <span class="label-text">Nama Mahasiswa</span>
            </label>

            <input type="text" class="input input-primary rounded-box input-md" placeholder="John Doe" id="name"
                v-model="form.nama_siswa" maxlength="35">
            <span v-if="form.errors.nama_siswa" class="text-error">{{ form.errors.nama_siswa }}</span>
        </div>

        <div class="form-control">
            <label for="class_year" class="label">
                <span class="label-text">Tahun Angkatan</span>
            </label>
            <input type="number" class="input input-primary rounded-box input-md" placeholder="2020" id="class_year"
                v-model="form.tahun_angkatan" maxlength="4">
            <span v-if="form.errors.tahun_angkatan" class="text-error">{{ form.errors.tahun_angkatan }}</span>
        </div>

        <div class="form-control">
            <label for="faculty" class="label">
                <span class="label-text">Fakultas</span>
            </label>
            <input type="text" class="input input-primary rounded-box input-md" placeholder="STEI" id="faculty"
                v-model="form.fakultas" maxlength="5">
            <span v-if="form.errors.fakultas" class="text-error">{{ form.errors.fakultas }}</span>
        </div>

        <div class="form-control">
            <label for="major" class="label">
                <span class="label-text">Jurusan</span>
            </label>
            <input type="text" class="input input-primary rounded-box input-md" placeholder="Teknik Informatika" id="major"
                v-model="form.jurusan" maxlength="20">
            <span v-if="form.errors.jurusan" class="text-error">{{ form.errors.jurusan }}</span>
        </div>

        <div class="form-control">
            <label for="class" class="label">
                <span class="label-text">Kelas</span>
            </label>
            <input type="text" class="input input-primary rounded-box input-md" placeholder="IFXXX" id="class"
                v-model="form.kelas" maxlength="6">
            <span v-if="form.errors.kelas" class="text-error">{{ form.errors.kelas }}</span>
        </div>

        <button type="submit" class="btn btn-primary rounded-box btn-wide" :disabled="form.processing">
            <template v-if="!form.processing">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6" v-if="!store.getters.getStudentAction">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6" v-else>
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                </svg>


                <span>{{ store.getters.getStudentAction ? 'Ubah data' : 'Tambah Data' }}</span>
            </template>

            <div class="loading loading-dots" v-else></div>
        </button>
    </form>
</template>

<script lang="ts" setup>
import store from '../../stores/store';
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    nim: null,
    nama_siswa: null,
    tahun_angkatan: null,
    fakultas: null,
    jurusan: null,
    kelas: null
})

store.subscribe((mutation, state) => {
    if (state.studentAction != null) {
        form.nim = mutation.payload.nim
        form.nama_siswa = mutation.payload.nama_siswa
        form.tahun_angkatan = mutation.payload.tahun_angkatan
        form.fakultas = mutation.payload.fakultas
        form.jurusan = mutation.payload.jurusan
        form.kelas = mutation.payload.kelas
    } else {
        form.nim = null
        form.nama_siswa = null
        form.tahun_angkatan = null
        form.fakultas = null
        form.jurusan = null
        form.kelas = null
    }
})

const onSubmit = async () => {
    if (store.getters.getStudentAction) {
        form.patch(`/${store.getters.getStudentAction.nim}`, {
            preserveScroll: true,
            onSuccess() {
                form.reset("nim")
                form.reset("nama_siswa")
                form.reset("tahun_angkatan")
                form.reset("fakultas")
                form.reset("jurusan")
                form.reset("kelas")

                store.commit("resetStudentAction")
            }
        })
    } else {
        form.post("/", {
            preserveScroll: true,
            onSuccess() {
                form.reset("nim")
                form.reset("nama_siswa")
                form.reset("tahun_angkatan")
                form.reset("fakultas")
                form.reset("jurusan")
                form.reset("kelas")
            }
        })
    }
}
</script>