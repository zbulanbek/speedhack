<template>
    <div class="text-wrap">
        <template v-for="time_line in lesson.time_lines">
            <div class="title">{{lesson.time_lines[0].title}}</div>
            <div v-for="(block, index) in time_line.blocks">
                <div class="show-text">
                    <div class="title-man">
                        <b>{{ index + 1 }}.</b>
                        <icon v-if="block.type" :icon-name="block.type+ '-icon'"></icon>
                        {{ block.title }}
                    </div>
                </div>
                <section class="trial-lesson-container" v-for="content in block.content">
                    <div class="wrap-h" v-if="content.pictures">
                        <div class="row">
                            <template v-for="img in content.pictures">
                                <div class="col-12" :class="{'col-md-6':content.pictures.length > 1}">
                                    <div class="wrap-image" :class="{'big':content.pictures.length < 2}">
                                        <img :src="img">
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <div class="wrap-h" v-if="content.subtitle">
                        <div class="text-test">
                            {{ content.subtitle }}
                        </div>
                    </div>

                     <div class="wrap-h" v-if="content.text">
                        <div class="text-test">
                            {{ content.text }}
                        </div>
                    </div>

                    <vue-plyr v-if="content.audio">
                        <audio controls crossorigin playsinline>
                            <source :src="content.audio" type="audio/mp3"/>
                        </audio>
                    </vue-plyr>

                    <vue-plyr v-if="content.video" style="width: 600px;">
                        <div class="plyr__video-embed" v-if="content.video.indexOf('youtube') !== -1">
                            <iframe :src="content.video" allowfullscreen allowtransparency allow="autoplay"></iframe>
                        </div>
                        <video v-else controls crossorigin playsinline>
                            <source :src="content.video"/>
                        </video>
                    </vue-plyr>

                    <div class="example" v-if="content.vocabularies">
                        <ul class="vocabulary-list">
                            <li class="vocabulary-list__item" v-for="vocabulary in content.vocabularies">
                                <span>{{ vocabulary.word }}</span> - {{ vocabulary.translate }}
                            </li>
                        </ul>
                    </div>

                    <section v-if="content.task">
                        <div class="wrap-h" v-if="content.task.type !== 'four'" :task="content.task">
                            <div class="text-test">
                                {{ content.task.name }}
                            </div>
                        </div>

                        <div class="row">
                            <img class="img-fluid" width="600" :src="content.task.image_url" alt="">
                        </div>

                        <component v-if="content.task.questions" :is="content.task.type" :task="content.task"></component>

                    </section>

                </section>

            </div>
        </template>

    </div>
</template>

<script>
import CommonTest from "@/Speedhack/Components/Quiz/CommonTest/CommonTest";
import DragFillEmptySpace from "@/Speedhack/Components/Quiz/DragFillEmptySpace/DragFillEmptySpace";
import InsertWordsSentences from "@/Speedhack/Components/Quiz/InsertWordsSentences/InsertWordsSentences";
import SelectImages from "@/Speedhack/Components/Quiz/SelectImages/SelectImages";
import ArrangeWordsCorrectOrder from "@/Speedhack/Components/Quiz/ArrangeWordsCorrectOrder/ArrangeWordsCorrectOrder";
import JoinTwoHalves from "@/Speedhack/Components/Quiz/JoinTwoHalves/JoinTwoHalves";
import DropDownTest from "@/Speedhack/Components/Quiz/DropDownTest/DropDownTest";
import InlineDropDownTest from "@/Speedhack/Components/Quiz/InlineDropDownTest/InlineDropDownTest";
import DragWordToPictures from "@/Speedhack/Components/Quiz/DragWordToPictures/DragWordToPictures";
import EmojiTest from "@/Speedhack/Components/Quiz/EmojiTest/EmojiTest";
import ImageSelect from "@/Speedhack/Components/Quiz/ImageSelect/ImageSelect";

export default {
    name: "TrialLessonBlocks",
    props: {
        lesson_id: Number,
    },
    components: {
        CommonTest,
        DragFillEmptySpace,
        InsertWordsSentences,
        SelectImages,
        ArrangeWordsCorrectOrder,
        JoinTwoHalves,
        DropDownTest,
        InlineDropDownTest,
        DragWordToPictures,
        EmojiTest,
        ImageSelect
    },
    data() {
        return {
            lesson: {},
            isStoppingVideo: true,
        }
    },
    mounted() {
        this.getTrialLesson();
    },
    methods: {
        async getTrialLesson() {
            const {data} = await window.axios.get(route('api.lessons.show', this.lesson_id));
            this.lesson = data.lesson;
        }
    },
}
</script>

<style scoped>
.big-title img {
    margin-right: 10px;
}

.big-title__text {
    font-weight: 600;
    font-size: 18px;
    line-height: 140.62%;
    color: #050A1C;
}

.video-wrap {
    margin-bottom: 35px;
    position: relative;
}

.small-title {
    font-weight: 600;
    font-size: 18px;
    line-height: 140.62%;
    color: #003ECB;
    margin-bottom: 20px;
}

.vocabulary-list {
    list-style: dot;
}

.vocabulary-list__item {
    font-size: 20px;
    line-height: 140.62%;
    color: #000000;
}

.vocabulary-list__item span {
    font-weight: 600;
}


.audio-wrap {
    margin-bottom: 45px;
    position: relative;
}

.audio-wrap audio {
    display: block;
}

.drag-wrap {
    border: 2px solid rgba(0, 62, 203, 0.69);
    box-sizing: border-box;
    border-radius: 10px;
    padding: 13px;
    margin-bottom: 45px;
}

.drag-title {
    font-size: 16px;
    line-height: 140.62%;
    color: #979797;
}

.drag-inner {
    display: flex;
    justify-content: space-around;
}

.drag-item {
    font-weight: 500;
    font-size: 16px;
    line-height: 140.62%;
    color: #050A1C;
    background: #FFFFFF;
    box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
    border-radius: 4px;
    padding: 5px;
}

.conversations {
    position: relative;
}

.eye-button {
    position: absolute;
    right: 100px;
    cursor: pointer;
}

.conversations-item {
    margin-bottom: 10px;
}

.conversations-item div {
    margin: 5px 0;
}

.empty-word {
    width: 100px;
    border: none;
    outline: none;
    font-size: 16px;
    line-height: 140.62%;
    color: #A2A2A2;
    text-align: center;
    border-bottom: 1px solid #000;
}

.show-text {
    padding-left: 24px;
    padding-right: 24px;
}

.title-man {
    display: flex;
    align-items: center;
    font-family: "Inter-Bold", sans-serif;
    font-size: 16px;
    color: #050A1C;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
}

.title-man svg {
    margin-right: 10px;
    /*margin-bottom: 25px;*/
    height: 22px;
    min-width: 22px;
}

.wrap {
    display: flex;
    align-items: flex-start;
    margin-bottom: 16px;
}

.title-man b {
    color: #F2994A;
    font-size: 24px;
    display: block;
    padding-right: 8px;
}

.text-wrap .title {
    background-image: linear-gradient(105deg, #F2994A 0%, #F2994A 50%, transparent 50%);
    display: inline-flex;
    font-family: "Inter", sans-serif;
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
    color: #FFFFFF;
    padding: 16px 40px 16px 20px;
    margin-bottom: 20px;
    max-width: 538px;
    width: 100%;
    border-radius: 8px 0px 8px 0px;
}

.trial-lesson-container {
    padding-left: 24px;
    padding-right: 24px;
    margin-bottom: 30px
}

.wrap-h {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.text-test {
    font-weight: 600;
    font-size: 16px;
    line-height: 140.62%;
   /* color: #003ECB;*/
    margin-bottom: 20px;
}

.wrap-image{
    width: 100%;
    height: 200px;
    margin-bottom: 32px;
}
.wrap-image img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.wrap-image.big img{
    object-fit: contain;
}   
@media (max-width: 680px) {
    .drag-item {
        font-weight: 500;
        font-size: 14px;
        line-height: 140.62%;
        color: #050A1C;
        background: #FFFFFF;
        box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
        border-radius: 4px;
        padding: 5px;
    }
}

@media (max-width: 537px) {
    .drag-item {
        font-weight: 500;
        font-size: 10px;
        line-height: 140.62%;
        color: #050A1C;
        background: #FFFFFF;
        box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
        border-radius: 4px;
        padding: 5px;
    }
}
</style>
