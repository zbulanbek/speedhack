<template>
    <div class="drag-wrap" :class="{'green': currect }">
        <draggable v-model="list" @end="onEnd">
            <transition-group>
                <div v-for="(element, index) in list" :key="`${question.id}.${index}`">
                    <div class="item-drag"
                         :class="{'error': 0, 'success-item': 0}">
                        {{ element }}
                    </div>
                </div>
            </transition-group>
        </draggable>
        <button class="check-btn" @click="checkMove" v-if="!currect">
            <img src="/images/icons/check.svg">
        </button>
        <div class="progress">
            <div class="procent" :style="{height: percent + '%' }"></div>
        </div>
    </div>
</template>
<script>
import draggable from 'vuedraggable'

export default {
    props: {
        question: Object
    },
    components: {
        draggable,
    },
    data() {
        return {
            list: [],
            mine_list: [],
            currect: false,
            percent: 0,
        }
    },
    mounted() {
        this.list = this.question.question.split(' ').sort((a, b) => 0.5 - Math.random());
        this.correct_list = this.question.question.split(' ');
    },
    methods: {
        onEnd({newIndex}) {
            //
        },
        checkMove() {
            //
        },
    },

}
</script>
<style scoped>
.drag-wrap {
    background: #D4EAFF;
    border-radius: 8px;
    padding: 10px;
    width: 100%;
    display: flex;
    justify-content: space-between;
}

.drag-wrap.green {
    pointer-events: none;
    background: #EEFADE;
}

.drag-wrap div span {
    display: flex;
}

.drag-wrap div span div {
    margin-right: 8px;
}

.drag-wrap div span div:hover {
    cursor: pointer;
}

.drag-wrap div span div:active {
    cursor: grabbing;
}

.progress {
    width: 5px;
    height: 100%;
    background: #BAC9DF;
    border-radius: 8px;
    height: 31px;
    display: flex;
    justify-content: space-between;
}

.progress .procent {
    display: block;
    width: 100%;
    background: #E46E67;
    margin-top: auto;
}

.item-drag {
    padding: 2px 16px;
    border-radius: 8px;
    background: #A9D3FB;
    font-family: 'Inter', sans-serif;
    font-size: 18px;
    color: #050A1C;
}

.drag-wrap .item-drag.error {
    background: #EEA5A5;
    border: 1px solid #D06666;
}

.drag-wrap.green .progress {
    background: #A5C579;
}

.drag-wrap.green .item-drag {
    background: #D5F0B0;
    border: none;
    justify-content: flex-end;
    padding-right: 40px;
}

.item-drag.success-item {
    border-color: #D5F0B0;
    background-color: #D5F0B0;
}

.check-btn {
    margin-left: 10px;
    background-color: #A9D3FB;
    border-radius: 8px;
    font-family: 'Inter', sans-serif;
    font-size: 18px;
    color: #050A1C;
    height: 31px;
    width: 31px;
    margin-right: auto;
    display: flex;
    align-items: center;
    justify-content: center;
}

.check-btn img {
    width: 16px;
    height: 16px;
    margin-bottom: -2px;
}
</style>
