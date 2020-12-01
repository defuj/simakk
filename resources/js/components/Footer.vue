<template>
    <div class="footer bg-white py-4 d-flex flex-lg-column " id="kt_footer">
        <div class=" container  d-flex flex-column flex-md-row align-items-center justify-content-between">
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted font-weight-bold mr-2">2020&copy;</span>
                <router-link to="/home" target="_blank" class="text-dark-75 text-hover-primary">SIMAKK - Sistem Manajemen Kuesioner Kampus</router-link>
            </div>

            <div class="nav nav-dark order-1 order-md-2">
                <router-link to="/about" target="_blank" class="nav-link pr-3 pl-0">About</router-link>
                <router-link to="/team" target="_blank" class="nav-link px-3">Team</router-link>
                <router-link to="/contact" target="_blank" class="nav-link pl-3 pr-0">Contact</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Layout mounted.')
        }
    }
</script>