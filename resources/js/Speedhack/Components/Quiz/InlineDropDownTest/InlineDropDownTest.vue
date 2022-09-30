<template>
    <div>
        <template v-for="(question, index) in task.questions">
            <div class="wrap-test-item">
                <span class="key"> {{ index + 1 }}. </span>
                <InlineDropDownTestItem :question="question"  @handle-interactive-control="handleInteractiveControl"></InlineDropDownTestItem>
            </div>
        </template>
    </div>
</template>
<script>
import InlineDropDownTestItem from "@/Speedhack/Components/Quiz/InlineDropDownTest/InlineDropDownTestItem";
import {mapActions} from "vuex";

export default {
    props: {
        task: Object,
    },
    components: {
        InlineDropDownTestItem,
    },
    methods: {
        ...mapActions(['handleInteractiveControl']),
    }
}
</script>
<style scoped>
.account-title {
    font-family: "Inter-Bold", sans-serif;
    padding: 30px 20px;
    font-weight: 600;
    color: #050A1C;
    font-size: 24px;
}

.account-title img {
    margin-right: 16px;
}

.tab-wrap {
    border-bottom: 1px solid #E0E3EB;
    display: flex;
    padding-right: 60px;
    padding-left: 60px;
    margin-bottom: 26px;
}

.tab-wrap .item {
    padding: 8px 0px;
    font-size: 18px;
    font-family: "Inter", sans-serif;
    color: rgb(123, 131, 139);
    margin-right: 60px;
    margin-bottom: -1px;
}

.tab-wrap .item.active {
    color: #003ECB;
    border-bottom: 1px solid #003ECB;
}

.test {
    padding-left: 60px;
    padding-right: 60px;
}

.bg-account {
    background: #F5F7F8;
    width: 100%;
    height: 100%;
    display: flex;
}

.content-wrap {
    width: 100%;
}

.text-test {
    font-family: 'Inter', sans-serif;
    font-weight: 500;
    font-size: 16px;
    color: #003ECB;
    margin-left: 60px;
    margin-bottom: 20px;
}

.example {
    background: #EEFADE;
    border-radius: 8px;
    padding: 16px;
    margin-left: 60px;
    margin-right: 100px;
    font-family: 'Inter', sans-serif;
    font-size: 18px;
    color: #050A1C;
    margin-bottom: 30px;
}

.wrap-test-item {
    display: flex;
    margin-bottom: 20px;
    align-items: center;
}

.wrap-test-item .key {
    font-family: 'Inter', sans-serif;
    font-size: 18px;
    color: #050A1C;
    margin-right: 6px;
}

.example i {
    font-style: italic;
}

.example b {
    display: inline-block;
    padding: 2px 11px;
    background: #D5F0B0;
    border-radius: 8px;
    margin-right: 16px;
    margin-left: 30px;
}

.buttons-wrap {
    display: flex;
    align-items: flex-end;
    justify-content: flex-end;
    padding-right: 60px;
    font-size: 14px;
    color: #fff;
}

.btn-prev img {
    margin-right: 10px;
}

.btn-prev {
    background-color: #F2994A;
    border-radius: 12px;
    margin-right: 24px;
    padding: 6px 20px;
    color: #fff;

}

.btn-next img {
    margin-left: 10px;
}

.btn-next {
    background-color: rgba(208, 208, 208, 0.56);
    border-radius: 12px;
    margin-left: 24px;
    padding: 6px 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 118px;
}

@media only screen and (max-width: 768px) {

    .tab-wrap {
        padding-right: 20px;
        padding-left: 20px;
    }

    .tab-wrap .item:last-child {
        margin: 0px;
    }

    .text-test {
        margin-left: 20px;
    }

    .example {
        margin-left: 20px;
        margin-right: 20px;
    }

    .test {
        padding-left: 20px;
        padding-right: 20px;
    }

    .bg-account {
        padding-bottom: 100px;
        flex-direction: column;
    }
}
</style>
