<template>
    <AppLayout>
        <template v-slot:nav>
            <button
                class="flex items-center px-8 py-2 text-black transition-colors duration-200 bg-white hover:bg-lightGreen"
                @click="handleSubmit"
            >
                Save & Close
            </button>
        </template>

        <div v-if="loading">
            <h1>Loading ...</h1>
        </div>

        <section
            v-else
            class="flex items-stretch w-full mt-12"
        >
            <!-- Q Nav -->
            <aside class="w-1/4 border-r border-gray-200 pr-10">
                <h3 class="text-gray-600">Assessment Details</h3>
                <ul class="text-gray-600">
                    <li
                        v-for="subscale in qData"
                        class="my-2 list-decimal"
                    >
                        <div>
                            <h3 :class="currentSubscaleIndex !== qData.length && currentSubscale === subscale.id ? 'text-black font-bold' : ''">{{ subscale.name }}</h3>
                            <ul
                                v-if="currentSubscale === subscale.id"
                                class="ml-4"
                            >
                                <li
                                    v-for="item in subscale.items"
                                    class="my-2"
                                    :class="currentSubscaleIndex !== qData.length && currentItem === item.id ? 'list-disc underline text-black' : ''"
                                >
                                    {{ item.name }}
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="my-2 list-decimal">
                        <h3 :class="currentSubscaleIndex === this.qData.length ? 'font-bold' : ''">Summary</h3>
                    </li>
                </ul>
            </aside>

            <!-- Item Questions Display -->
            <div class="flex flex-col w-full">
                <div
                    v-if="this.currentSubscaleIndex < this.qData.length"
                    class="w-full px-10"
                >
                    <div class="mb-4">
                        <h3 class="text-xl font-bold">{{ itemTitle }}</h3>
                    </div>

                    <div class="flex justify-end">
                        <div class="w-14 flex justify-center gap-6">
                            <span class="font-bold">Y</span>
                            <span class="font-bold">N</span>
                        </div>
                    </div>
                    <ul>
                        <li
                            v-for="(question, index) in questionsForCurrentItem"
                            class="flex my-4"
                        >
                            <div class="flex-1 pr-2">
                                <span class="mr-2 text-bold">{{ question.number }}</span>
                                <span>{{ question.description }}</span>
                            </div>

                            <AnswerCheckboxes
                                :id="`checkbox-${question.id}`"
                                :checked="question.checked"
                                v-on:checkChange="handleAnswerSelection(index, $event)"
                            />
                        </li>
                    </ul>
                </div>

                <div
                    v-if="this.currentSubscaleIndex === this.qData.length"
                    class="w-full px-10"
                >
                    <h3 class="text-xl font-bold">Assessment Summary</h3>

                    <ul>
                        <li>
                            Assessment Status:
                            <span
                                class="text-xl font-bold"
                                :class="allQuestionsAnswered ? 'text-darkGreen' : 'text-red-500'"
                                >{{ applicationStatus }}</span
                            >
                        </li>
                        <li>{{ numberOfQuestionsAnswered }} Questions out of {{ totalNumberOfQuestions }} answered</li>
                    </ul>
                </div>

                <div class="flex gap-8 flex-shrink-0 justify-end my-10 pr-10">
                    <button
                        class="bg-darkGreen text-white py-1 px-3 q_nav__button hover:bg-lightGreen hover:text-darkGreen"
                        :class="showPreviousBtn ? '' : 'hidden'"
                        @click="handlePrev"
                    >
                        &larr; Previous
                    </button>

                    <button
                        v-if="this.currentSubscaleIndex < this.qData.length"
                        class="bg-darkGreen text-white py-1 px-3 q_nav__button hover:bg-lightGreen hover:text-darkGreen"
                        @click="handleNext"
                    >
                        Next &rarr;
                    </button>

                    <button
                        v-else
                        class="bg-darkGreen text-white py-1 px-3 q_nav__button hover:bg-lightGreen hover:text-darkGreen"
                        @click="handleSubmit"
                    >
                        Finish Assessment
                    </button>
                </div>
            </div>
        </section>
    </AppLayout>
</template>
<script>
    import AnswerCheckboxes from "./components/AnswerCheckboxes";
    import AppLayout from "../components/AppLayout";

    export default {
        name: "Assessment",
        props: ["assessmentId"],
        components: {
            AppLayout,
            AnswerCheckboxes,
        },

        data: () => {
            return {
                loading: true,
                qData: {},
                currentSubscaleIndex: false,
                currentSubscale: false,
                currentItemIndex: false,
                currentItem: false,
                assessmentAnswers: {},
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

            showPreviousBtn() {
                return this.currentSubscaleIndex || this.currentItemIndex;
            },

            allQuestionsAnswered() {
                return this.qData.every(subscale => {
                    return subscale.items.every(item => {
                        return item.questions.every(question => question.checked !== null);
                    });
                });
            },

            applicationStatus() {
                return this.allQuestionsAnswered ? "Complete" : "In Progress";
            },

            totalNumberOfQuestions() {
                return this.qData.reduce((acc, subscale) => {
                    return (
                        acc +
                        subscale.items.reduce((acc, item) => {
                            return acc + item.questions.length;
                        }, 0)
                    );
                }, 0);
            },

            numberOfQuestionsAnswered() {
                return this.qData.reduce((acc, subscale) => {
                    return (
                        acc +
                        subscale.items.reduce((acc, item) => {
                            return acc + item.questions.filter(question => question.checked !== null).length;
                        }, 0)
                    );
                }, 0);
            },
        },

        methods: {
            handleNext() {
                if (this.currentItemIndex < this.qData[this.currentSubscaleIndex].items.length - 1) {
                    this.currentItem = this.qData[this.currentSubscaleIndex].items[++this.currentItemIndex].id;
                } else if (this.currentSubscaleIndex < this.qData.length - 1) {
                    this.currentSubscale = this.qData[++this.currentSubscaleIndex].id;
                    this.currentItemIndex = 0;
                    this.currentItem = this.qData[this.currentSubscaleIndex].items[0].id;
                } else {
                    this.currentSubscaleIndex = this.qData.length;
                }
            },

            handlePrev() {
                if (this.currentSubscaleIndex === this.qData.length) {
                    return (this.currentSubscaleIndex = this.qData.length - 1);
                }

                if (this.currentItemIndex > 0) {
                    this.currentItem = this.qData[this.currentSubscaleIndex].items[--this.currentItemIndex].id;
                } else if (this.currentSubscaleIndex > 0) {
                    this.currentSubscale = this.qData[--this.currentSubscaleIndex].id;
                    this.currentItemIndex = this.qData[this.currentSubscaleIndex].items.length - 1;
                    this.currentItem = this.qData[this.currentSubscaleIndex].items[this.currentItemIndex].id;
                }
            },

            handleAnswerSelection(index, val) {
                console.log({ index, val });
                const question = this.qData[this.currentSubscaleIndex].items[this.currentItemIndex].questions[index];
                question.checked = val;
            },

            handleSubmit() {
                console.log("submit");
                axios
                    .put(`/api/${this.assessmentId}/perform`, this.qData)
                    .then(res => {
                        if (res.data.success) {
                            window.location.href = "/";
                        }
                    })
                    .catch(err => console.log(err));
            },
        },

        created() {
            axios.get(`/api/${this.assessmentId}/assessmentQuestions`).then(res => {
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

<style scoped>
    .q_nav__button {
        min-width: 150px;
    }
</style>
