<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <router-link :to="{ name: 'qr' }" class="navbar-brand">
                QR App
            </router-link>
            <button
                class="navbar-toggler"
                data-toggle="collapse"
                data-target="#navbarCollapse"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link
                            class="nav-link"
                            data-toggle="collapse"
                            :to="{ name: 'qr' }"
                        >
                            QR
                        </router-link>
                    </li>

                    <li class="nav-item">
                        <router-link
                            class="nav-link"
                            data-toggle="collapse"
                            :to="{ name: 'login' }"
                        >
                            Login
                        </router-link>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
export default {
    name: "App"
}
</script>

<style scoped>

</style>
