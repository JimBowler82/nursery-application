<template>
    <div
        v-if="loading"
        draggable="true">
        <h1>Loading ...</h1>
    </div>

    <div
        v-else
        class="flex items-stretch w-full mt-12">
        <!-- Q Nav -->
        <div class="w-1/4 border-r border-gray-200 pr-10">
            <ul>
                <li
                    v-for="subscale in qData"
                    class="my-2">
                    <div>
                        <h3 :class="currentSubscale === subscale.id ? 'font-bold' : ''">{{ subscale.name }}</h3>
                        <ul
                            v-if="currentSubscale === subscale.id"
                            class="ml-4">
                            <li
                                v-for="item in subscale.items"
                                class="my-2"
                                :class="currentItem === item.id ? 'list-disc underline' : ''">
                                {{ item.name }}
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

            <button
                class="bg-gray-800 hover:bg-gray-600 text-white rounded px-5 py-3 mt-8"
                @click="handleClick">
                Next
            </button>
        </div>

        <!-- Item Questions Display -->
        <div class="w-full px-10">
            <h3 class="text-xl font-bold mb-4">{{ itemTitle }}</h3>
            <ul>
                <li v-for="question in questionsForCurrentItem">
                    <span class="mr-2 text-bold">{{ question.number }}</span>
                    <span>{{ question.description }}</span>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    export default {
        name: "Assessment",
        props: ["assessmentId"],

        data: () => {
            return {
                loading: true,
                qData: {},
                currentSubscaleIndex: false,
                currentSubscale: false,
                currentItemIndex: false,
                currentItem: false,
            };
        },

        computed: {
            questionsForCurrentItem() {
                const item = this.qData[this.currentSubscaleIndex].items[this.currentItemIndex];

                if (!item) return [];

                return item.questions;
            },
            itemTitle() {
                return this.qData[this.currentSubscaleIndex].items[this.currentItemIndex].name;
            },
        },

        methods: {
            handleClick() {
                if (this.currentItemIndex < this.qData[this.currentSubscaleIndex].items.length - 1) {
                    this.currentItem = this.qData[this.currentSubscaleIndex].items[++this.currentItemIndex].id;
                } else if (this.currentSubscaleIndex < this.qData.length - 1) {
                    this.currentSubscale = this.qData[++this.currentSubscaleIndex].id;
                    this.currentItemIndex = 0;
                    this.currentItem = this.qData[this.currentSubscaleIndex].items[0].id;
                } else {
                    this.currentSubscaleIndex = 0;
                    this.currentSubscale = this.qData[0].id;
                    this.currentItemIndex = 0;
                    this.currentItem = this.qData[this.currentSubscaleIndex].items[0].id;
                }
            },
        },

        created() {
            axios.get("/api/assessmentQuestions").then(res => {
                this.loading = false;

                if (res.data.success) {
                    this.qData = res.data.payload;
                    this.currentSubscaleIndex = 0;
                    this.currentSubscale = res.data.payload[0].id;
                    this.currentItemIndex = 0;
                    this.currentItem = res.data.payload[0].items[0].id;
                }
            });
        },
    };
</script>
