<template>
    <aside class="menu-wrap">
        <div class="ball-wrap">
            <span class="number">{{ homeWorkScore }}</span>
            <span class="title">score</span>
            <button class="mobile-btn" @click="toggleMenu">
                Progress bar <img src="/images/icons/arraw-blue.svg">
            </button>
        </div>
        <div class="main-lists" :class="{'active': mobileMenu}">
            <div class="lists-wrap">
                <span class="title-main">Trainer To Do:</span>
                <ul class="lists">
                    <template v-for="(task, index) in tasks">
                        <li
                            @click="$emit('select-task', index)"
                            class="item"
                            :class="[
                                task.status === 'no-access' ? 'no-access':'',{
                                'current': selectedTask === index,
                                'success-item': homeWorkTaskCorrectAnswersCount[task.id] === task.correct_options.length,
                                }
                            ]">
                            <icon
                                :icon-name="homeWorkTaskCorrectAnswersCount[task.id] === task.correct_options.length ? 'success-check':'check'"></icon>
                            <span class="title"> {{ task.name }}</span>
                            <b class="ball">{{ homeWorkTaskScore[task.id] }}</b>
                        </li>
                    </template>
                </ul>
            </div>
        </div>
    </aside>
</template>
<script>
import {mapGetters} from "vuex";

export default {
    props: {
        tasks: Array,
        selectedTask: Number
    },
    data() {
        return {
            mobileMenu: false,
        }
    },
    computed: {
        ...mapGetters([
            'homeWorkTaskCorrectAnswersCount',
            'homeWorkTaskScore',
            'homeWorkScore',
        ])
    },
    methods: {
        toggleMenu() {
            this.mobileMenu = !this.mobileMenu;
        },
    }
}
</script>
<style scoped lang="scss">
.menu-wrap {
    width: 340px;
    height: 100%;
    background-color: #fff;
}

.ball-wrap {
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: left;
    border-bottom: 1px solid #E0E3EB;
    padding-bottom: 20px;
}

.ball-wrap .number {
    color: #003ECB;
    font-size: 78px;
    line-height: 80px;
    font-family: 'Inter', sans-serif;
}

.ball-wrap .title {
    color: #7B838B;
    font-size: 20px;
    font-family: 'Inter', sans-serif;
}

.lists-wrap {
    padding: 20px 15px;
}

.lists-wrap .title-main {
    font-family: 'Inter-Bold', sans-serif;
    font-size: 20px;
    color: #050A1C;
    display: inline-block;
    margin-bottom: 20px;
}

.lists .item {
    display: flex;
    margin-bottom: 16px;
}

.lists .item img {
    margin-right: 8px;
}

.lists .item .title {
    color: #979797;
    font-size: 14px;
    font-family: 'Inter', sans-serif;
    margin-right: auto;
}

.lists .item .ball {
    font-family: 'Inter', sans-serif;
    color: #979797;
    font-size: 14px;
}

.item.current {
    .title {
        color: #050A1C;
    }

    .ball {
        color: #050A1C;
    }
}

.item.success-item {
    .title {
        color: #3BA972;
    }

    .ball {
        color: #050A1C;
    }
}

.mobile-btn {
    display: none;
}

@media only screen and (max-width: 768px) {
    .mobile-btn {
        display: flex;
        width: 100%;
        border: none;
        background-color: #fff;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #E0E3EB;
        padding: 14px 20px;
        margin-top: 16px;
    }

    .mobile-btn img {
        width: 16px;
        height: 16px;
    }

    .menu-wrap {
        width: 100%;
    }

    .ball-wrap {
        height: auto;
        padding-bottom: 0px;
        padding-top: 10px;
    }

    .ball-wrap .number {
        font-size: 42px;
        line-height: 52px;
    }

    .main-lists {
        display: none;
    }

    .main-lists.active {
        display: block;
        animation: fade-in 1s;
    }

    @keyframes fade-in {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
}
</style>
