require("./bootstrap");

require("alpinejs");

import { createApp } from "vue";
import Example from "./components/Example.vue";

const app = createApp({
    components: {
        Example,
    },
});

app.mount("#app");
