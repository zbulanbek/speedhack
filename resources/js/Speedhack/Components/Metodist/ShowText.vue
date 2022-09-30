<template>
    <div>
        <template v-if="$page.props.user.role_id === '4' || active == true">
            <div class="show-text">
			<span class="title-man">
                <b>{{ index + 1 }}. </b>
                <img src="/images/icons/reading-book.svg"> {{ block.title }}
            </span>
                <div class="wrap">
                    <p class="text" :class="{'active': active}">
                        {{ block.text }}
                    </p>
                    <template v-if="$page.props.user.role_id === '4'">
                        <template v-if="block.is_show == 0">
                            <button class="btn-show" :class="{'active': active}" @click="toggleText">
                                <img src="/images/icons/eye-grey.svg" class="grey">
                                <img src="/images/icons/eye-blue.svg" class="blue">
                            </button>
                        </template>
                    </template>
                </div>
            </div>
        </template>
    </div>
</template>
<script>
export default {
    props: {
        block: Object,
        index: Number,
    },
    data() {
        return {
            active: false,
        }
    },
    mounted() {
        if (this.block.is_show == 1) {
            this.active = true;
        }

        let vm = this;
        window.Echo.private('show-topic-block.' + this.block.id)
            .listen('.show.topic.block', function ({item}) {
                vm.active = item.active;
            });
    },
    methods: {
        toggleText() {
            this.active = !this.active;

            let item = {
                id: this.block.id,
                active: this.active,
            }
            window.axios.post('/metodist/show/topic/block', {item})

        },

    },
}
</script>
<style scoped>
.wrap {
    display: flex;
    align-items: flex-start;
    margin-bottom: 16px;
}

.text {
    font-size: 18px;
    line-height: 22px;
    color: #050A1C;
    opacity: 0.3;
    font-family: Inter;
    margin-right: 10px;
}

.text.active {
    opacity: 1;
}

.btn-show {
    background-color: transparent;
}

.btn-show .blue {
    display: none;
}

.btn-show.active .grey {
    display: none;
}

.btn-show.active .blue {
    display: block;
}

.title-man {
    display: flex;
    align-items: center;
    font-family: "Inter-Bold", sans-serif;
    font-size: 18px;
    color: #050A1C;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
}

.title-man b {
    color: #F2994A;
    font-size: 24px;
    display: block;
    padding-right: 8px;
}

.title-man img {
    margin-right: 6px;
}

.show-text {
    padding-left: 24px;
    padding-right: 24px;
}
</style>
