<template>
    <section>
        <div class="anwers-wrap">
            <span class="info">Выберите слова и перетащите к нужному предложению</span>
            <div class="anwers" style="display: flex;">
                <draggable
                    class="dragArea list-group"
                    :list="answers_all"
                    group="people">
                    <div v-for="element in answers_all"
                         :key="block.id + '.' + element.name"
                         class="item-anwer"
                         :class="{ 'false': !element.currect, 'true': element.currect}">
                        <div>{{ element.name }}</div>
                    </div>
                </draggable>
            </div>
        </div>

        <template v-for="(item, key) in block.questions">
            <div class="wrap-question">
                <span class="key">{{ ++key }}.</span>
                <item-drag
                    :item="item"
                    :id="item.id"
                    :answers_all="answers_all"
                    :block_id="block.id"
                    @on-true="PushCorrect"
                    @on-false="FalseCorrect"
                >
                </item-drag>
            </div>
        </template>

    </section>
</template>
<script>
import draggable from 'vuedraggable';
import ItemDrag from '@/Speedhack/Components/Metodist/Test/FourDragItem';

export default {
    props: {
        test: Array,
        answers: Array,
        block: Object,
    },
    components: {
        draggable,
        ItemDrag,
    },
    data() {
        return {
            questions: [],
            answers_all: [],
            indexItem: null,
            transWord: '...',
            srcWord: '...',
            src: '',
            x: 0,
            y: 0,
            matched: false,
        }
    },
    mounted() {
        this.answers_all = this.answers;
        this.questions = this.test;
        this.getAnswers();

        let vm = this;
        window.Echo.private('four-answers-drag.' + this.block.id)
            .listen('.four.answers.drag', function ({item}) {
                vm.answers_all = item.answers_all;
            });
    },
    methods: {
        async getAnswers(e) {
            const {data} = await window.axios.post('/test/question/metodist/answers', {id: this.block.id});
            this.answers_all = data['answers'];
        },
        PushCorrect(evt) {
            this.answers_all.splice(this.indexItem, 0, {name: evt.added.element.name, currect: true});

            let item = {
                id: this.block.id,
                answers_all: this.answers_all,
            }
            window.axios.post('/test/question/four/answers/drag', {item});
        },
        FalseCorrect(evt) {
            this.answers_all.splice(this.indexItem, 0, {name: evt.added.element.name, currect: false});

            let item = {
                id: this.block.id,
                answers_all: this.answers_all,
            }
            window.axios.post('/test/question/four/answers/drag', {item});
        },
    },
}
</script>
<style scoped>
.anwers-wrap {
    border: 2px solid rgba(0, 62, 203, 0.69);
    border-radius: 10px;
    padding: 20px 40px 20px;
    margin-bottom: 40px;
}

.anwers-wrap .info {
    font-family: 'Inter', sans-serif;
    color: #979797;
    font-size: 14px;
    display: inline-block;
    margin-bottom: 16px;
}

.anwers .list-group {
    flex-direction: row;
    flex-wrap: wrap;
}

.item-anwer {
    background: #FFFFFF;
    box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
    border-radius: 4px;
    margin-right: 20px;
    margin-bottom: 0px;
    padding: 6px 12px;
}

.item-anwer:hover {
    cursor: pointer;
}

.item-anwer div:hover {
    cursor: pointer;
}

.true {
    pointer-events: none;
    opacity: 0.2;
}

.false {
    /*background-color: red;*/
    border: 1px solid #EEA5A5;
}

.wrap-question {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.wrap-question .key {
    margin-right: 16px;
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #050A1C;
}

@media only screen and (max-width: 768px) {
    .item-anwer {
        margin-bottom: 16px;
    }
}
</style>
