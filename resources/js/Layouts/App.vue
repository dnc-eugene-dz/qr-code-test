<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item text-center">
                    <router-link :to="{ name: 'qr' }" class="navbar-brand">
                        QR Code content app
                    </router-link>
                </li>
            </ul>
        </nav>

        <div class="container">
            <div class="row justify-content-md-center">
                    <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "App"
}
</script>
