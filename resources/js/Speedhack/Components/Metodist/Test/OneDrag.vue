<template>
    <div class="drag-wrap" :class="{'green': currect }">
        <draggable v-model="list" @end="onEnd">
            <transition-group>
                <div v-for="(element, index) in list" :key="`${id}.${index}`">
                    <div class="item-drag"
                         :class="{'error': mine_list[index].currect == false, 'success-item': mine_list[index].currect}">
                        {{ element.item }}
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
        id: Number,
        task_id: Number,
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
        this.list = JSON.parse(this.question.question);
        this.mine_list = this.question.question;

        let vm = this;
        window.Echo.private('one-drag.' + this.id)
            .listen('.one.drag', function ({item}) {
                vm.list = item.all_list;
                vm.mine_list = item.mine_list;
                vm.currect = item.currect;
                vm.percent = item.percent;
            });
    },
    methods: {
        onEnd({newIndex}) {
            let item = {
                id: this.id,
                all_list: this.list,
                mine_list: this.mine_list,
                currect:  this.currect,
                percent: this.percent
            }

            window.axios.post('/test/question/one/drag', {item})
        },
        async checkMove(e) {
            const {data} = await window.axios.post('/test/question/one/check', {id: this.id, question: this.list});

            this.mine_list = data['answers'];
            this.currect = data['currect'];
            this.percent = data['percent'];

            let item = {
                id: this.id,
                all_list: this.list,
                mine_list: this.mine_list,
                currect:  this.currect,
                percent: this.percent
            }

            window.axios.post('/test/question/one/drag', {item})
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
    padding: 2px 10px;
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
    padding-right: 10px;
}

.item-drag.success-item {
    border-color: #D5F0B0;
    background-color: #D5F0B0;
}

.check-btn {
    /*margin-left: 10px;*/
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
