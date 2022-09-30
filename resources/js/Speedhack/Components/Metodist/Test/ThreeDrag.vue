<template>
    <div class="test-item" :class="{'green': currect }">
        <span class="first_word"> {{ first_word }} </span>
        <div class="wrap-form">
            <div class="input_wrap">
                <div class="form-group">
                    <select class="form-control" v-model="input" @change="onChange($event)">
                        <option value=""></option>
                        <template v-for="item in options">
                            <option :value="item">{{ item }}</option>
                        </template>
                    </select>
                </div>
            </div>
            <div class="progress">
                <div class="procent" :style="{height: percent + '%' }"></div>
            </div>
        </div>
        <span class="last_word"> {{ last_word }} </span>
    </div>
</template>
<script>
import {mapGetters, mapActions} from 'vuex';

export default {
    props: {
        task_id: Number,
        id: Number,
        question: Object
    },
    data() {
        return {
            ex: '',
            first_word: '',
            last_word: '',
            input: '',
            percent: 0,
            options: [],
            currect: false,
        }
    },
    mounted() {
        let text = this.question.question;
        this.options = JSON.parse(this.question.options);

        var first_symbol = text.indexOf('#??#', 0);
        this.first_word = text.slice(0, first_symbol);
        first_symbol = first_symbol + 4;
        this.last_word = text.slice(first_symbol);
        const vm = this;
        window.Echo.private('three-drag.' + this.id)
            .listen('.three.drag', function ({item}) {
                vm.input = item.value;
                vm.percent = item.percent;
                vm.currect = item.currect;
            });

    },
    methods: {
        ...mapGetters([
            'getQuestion'
        ]),
        async onChange(e) {
            const {data} = await window.axios.post('/test/question/three/check', {id: this.id, question: this.input});
            this.percent = data['percent'];
            this.currect = data['currect'];
            

            let item = {
                id: this.id,
                value: this.input,
                percent: this.percent,
                currect: this.currect
            }
            window.axios.post('/test/question/three/drag', {item})
        },

    },

}
</script>
<style scoped>
.first_word {
    margin-right: 4px;
}

.last_word {
    margin-left: 4px;
}

.test-item {
    display: flex;
    align-items: center;
    font-family: "Inter", sans-serif;
    color: #050A1C;
    font-size: 18px;
    line-height: 20px;
    color: #050A1C;

    padding: 5px 10px;
    border-radius: 10px;
    overflow: hidden;
}

.test-item.green {
    pointer-events: none;
    background: #EEFADE;
}

.test-item .input_wrap {
    display: flex;
    align-items: center;
    background: #FFFFFF;
    box-shadow: 0px 4px 6px rgba(110, 120, 130, 0.18);
    border-radius: 4px;
    padding: 5px;
    align-items: flex-end;
    margin-right: 6px;
    width: 130px;
}

.test-item .input_wrap input {
    width: 100%;
    border-bottom: 1px solid rgba(196, 196, 196, 0.58);
}

.wrap-form {
    display: flex;
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

.help-btn {
    background-color: transparent;
    padding: 0px;
    margin-left: 5px;
}

.help-btn img {
    width: 25px;
    height: 25px;
}

.form-group {
    margin-bottom: 0px;
    width: 100%;
    border: none;
}

.test-item .input_wrap {
    padding: 0px;
}

.form-control {
    border: none;
}

@media only screen and (max-width: 768px) {
    .test-item .input_wrap {
        width: 90px;
    }

    .last_word {
        font-size: 16px;
    }

    .first_word {
        font-size: 16px;
    }
}
</style>
