<template>
    <div class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            <header
                class="w-full h-32"
                style="background: linear-gradient(180deg, #296036 75%, #9dbe42 75%)"
            >
                <div class="flex items-center justify-between h-full px-20">
                    <a
                        href="/"
                        class="flex"
                    >
                        <div
                            id="logo"
                            class="self-center w-20 h-20 p-3 bg-white rounded-full shadow-xl"
                        ></div>

                        <h1 class="self-center ml-8 text-2xl text-white">{{ "Nursery App" }}</h1>
                    </a>

                    <div
                        id="nav"
                        class="flex w-1/2 justify-end"
                    >
                        <slot name="nav"></slot>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="w-full px-20">
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AppLayout",
    };
</script>
