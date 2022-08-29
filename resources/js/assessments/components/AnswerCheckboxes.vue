<template>
    <div class="flex gap-2">
        <div
            class="yes border-2 border-darkGreen w-6 h-6 flex justify-center align-middle cursor-pointer"
            :class="this.checked && 'bg-darkGreen text-white'"
            @click="
                () => {
                    $emit('checkChange', true);
                }
            "
        >
            {{ checked ? "&check;" : "" }}
        </div>
        <div
            class="no border-2 border-darkGreen w-6 h-6 flex justify-center align-middle cursor-pointer"
            :class="this.checked === false && 'bg-darkGreen text-white'"
            @click="
                () => {
                    $emit('checkChange', false);
                }
            "
        >
            {{ checked === false ? "&check;" : "" }}
        </div>
    </div>
</template>

<script>
    export default {
        name: "AnswerCheckboxes",
        props: ["id", "checked"],
    };
</script>
