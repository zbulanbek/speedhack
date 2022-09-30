<template>
    <div class="text-wrap">
        <div class="title">Hello !</div>
        <div>
            <div class="show-text">
                <div class="title-man">
                    <b>1.</b>
                    <img src="/images/icons/video_orange.svg" alt="">
                    Answer the question: What do you do? Do you like your job? Why/why not?
                </div>

                <video-player class="video-wrap" video-src="/videos/routine.mp4"></video-player>
            </div>
            <section class="test-wrap">
                <div class="wrap-h">
                    <div class="text-test">
                        Vocabulary
                    </div>
                </div>
                <div class="example">
                    <ul class="vocabulary-list">
                        <li class="vocabulary-list__item"><span>to wake up</span> - просыпаться</li>
                        <li class="vocabulary-list__item"><span>to survive</span>- выживать</li>
                        <li class="vocabulary-list__item"><span>to climb the mountains</span> - взбираться на горы</li>
                        <li class="vocabulary-list__item"><span>to savor memories</span> - наслаждаться воспоминаниями
                        </li>
                        <li class="vocabulary-list__item"><span>to discover</span>- открывать в битвах</li>
                        <li class="vocabulary-list__item"><span>to fight the battles</span> - сражаться</li>
                        <li class="vocabulary-list__item"><span>on my own</span> - сам/сама</li>
                        <li class="vocabulary-list__item"><span>path</span> - тропа/дорога</li>
                        <li class="vocabulary-list__item"><span>to seem</span> - казаться</li>
                        <li class="vocabulary-list__item"><span>to complete a cycle</span> - завершить цикл</li>
                        <li class="vocabulary-list__item"><span>scorching sun</span> - палящее солнце</li>
                        <li class="vocabulary-list__item"><span>to meet new people</span> - встречать новых людей</li>
                    </ul>
                </div>
            </section>
            <section class="test-wrap">
                <div class="wrap-h">
                    <div class="text-test">
                        1.1 Watch the video and answer the decide whether the statements are True or False
                    </div>
                </div>
                <div class="example">
                    <div class="question-wrap" v-for="question in questions">
                        <span class="question-title">{{ question.id }}. {{ question.question }}</span>
                        <div class="custom-control custom-radio" v-for="value in question.values">
                            <input class="custom-control-input input_one" :id="value + '-' + question.id" type="radio" :name="'q-'+question.id" :value="value">
                            <label class="answer_label custom-control-label" :for="value + '-' + question.id">{{ value }}</label><br>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div>
            <div class="show-text">
                <div class="title-man">
                    <b>2.</b>
                    <img src="/images/icons/volume.svg" alt="">
                    Answer the question: What do you do? Do you like your job? Why/why not?
                </div>
                <audio-player audio-src="/audios/audio.mp3"></audio-player>
            </div>
            <div class="test-wrap">
                <div class="example">
                    <div class="drag-wrap">
                        <span class="drag-title">Выберите слова и перетащите к нужному предложению</span>
                        <div class="drag-inner">
                            <div class="drag-item">do</div>
                            <div class="drag-item">does</div>
                            <div class="drag-item">don't</div>
                            <div class="drag-item">like</div>
                            <div class="drag-item">likes</div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="test-wrap">
                <div class="wrap-h">
                    <div class="text-test">
                        1.1 Watch the video and answer the decide whether the statements are True or False
                    </div>
                </div>
                <div class="example">
                    <div class="conversations">
                        <div class="eye-button"><img src="media/eye.svg" alt=""></div>
                        <div class="conversations-item">
                            <div>1 A: <input class="empty-word" type="text" value="Do"> you <input class="empty-word" type="text" value="like">pasta</div>
                            <div>B: No, I <input class="empty-word" type="text" value="don't"></div>
                        </div>
                        <div class="conversations-item">
                            <div>2 A: <input class="empty-word" type="text" value="Does"> your boyfriend <input class="empty-word" type="text" value="like">Chinese food?</div>
                            <div>B: No, he <input class="empty-word" type="text" value="doesn't"> but he <input class="empty-word" type="text" value="likes"> Japanese food.</div>
                        </div>
                        <div class="conversations-item">
                            <div>3 A: <input class="empty-word" type="text" value="Do"> your parents <input class="empty-word" type="text" value="like">sushi?</div>
                            <div>B: My mother <input class="empty-word" type="text" value="likes"> it but my father <input class="empty-word" type="text" value="do">.</div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
export default {
    name: "TempStaticTest",
    data() {
        return {
            isStoppingVideo: true,
            questions: [
                {
                    id: 1,
                    question: 'Her days are simple.',
                    values: ['True', 'False']
                },
                {
                    id: 2,
                    question: 'She wakes up, works, has parties, sleeps.',
                    values: ['True', 'False']
                },
                {
                    id: 3,
                    question: 'She wants to walk into the horizon.',
                    values: ['True', 'False']
                },
                {
                    id: 4,
                    question: 'She doesn’t want to discover her own battles.',
                    values: ['True', 'False']
                },
                {
                    id: 5,
                    question: 'Most importantly, she wants to find herself.',
                    values: ['True', 'False']
                },
            ]
        }
    },
    methods: {
        play_video(){
            this.$refs['video'].play();
            this.isStoppingVideo = false;
        },
        handleClick(){
            console.log(this.isStoppingVideo);
            if (this.$refs['video'].paused) {
                this.isStoppingVideo = false;
            }
            else if(this.$refs['video'].played) {
                this.isStoppingVideo = true;
            }
        },
    },
}
</script>

<style scoped>
.block-wrap {
    width: 600px;
}

.big-title {
    margin-bottom: 25px;
}

.big-title__digit {
    font-weight: 600;
    font-size: 26px;
    line-height: 140.62%;
    color: #F2994A;
}

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
    margin-bottom: 30px;
}

.vocabulary-list__item {
    font-size: 20px;
    line-height: 140.62%;
    color: #000000;
}

.vocabulary-list__item span {
    font-weight: 600;
}

.question-wrap {
    margin-bottom: 10px;
}

.question-title {
    margin-bottom: 15px;
}

.question-inputs {
    display: block;
}

.question-inputs div {
    display: block;
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
    font-size: 18px;
    color: #050A1C;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
}
.title-man img {
    margin-right: 10px;
    margin-bottom: 25px;
    height: 22px;
}

.wrap {
    display: flex;
    align-items: flex-start;
    margin-bottom: 16px;
}

.title-man b {
    color: #F2994A;
    font-size: 26px;
    display: block;
    padding-right: 8px;
}

.text-wrap .title{
     background-image: linear-gradient(105deg, #F2994A 0%, #F2994A 50%, transparent 50%);
     display: inline-flex;
     font-family: "Inter", sans-serif;
     font-style: normal;
     font-weight: 600;
     font-size: 16px;
     color: #FFFFFF;
     padding: 20px;
     padding-right: 40px;
     margin-bottom: 20px;
     max-width: 538px;
     width: 100%;
     border-radius: 8px;
     border-bottom-left-radius: 0px;
     border-top-right-radius: 0px;
 }

.test-wrap {
    padding-left: 24px;
    padding-right: 24px;
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
    /*color: #003ECB;*/
    margin-bottom: 20px;
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
