<template>
    <div class="translate-modal"
         :style="{'margin-top': y + 'px', 'margin-left': x + 'px' }">
        <div class="d-flex justify-content-center p-3">
            <strong>{{ (srcWord) ? srcWord : '...' }}</strong>
        </div>
        <div  class="d-flex justify-content-between"
        style="align-items: center;">
            <div class="line"></div>
            <img @click="playAudio()" class="volume-img" src="/images/icons/volume.svg" alt="vol">
            <audio id="audio" class="d-none" :src="'/'+src" controls='controls' autoplay>
            </audio>
            <div class="line"></div>
        </div>
        <div class="d-flex justify-content-center p-3">
            <strong>{{ (transWord) ? transWord : '...' }}</strong>
        </div>
        <div class="save d-flex justify-content-center">
            <div>
                <div class="d-inline-block circle"></div>
                <span class="text-white font-weight-normal">Сохранить</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
name: "Modal",
    props: {
        srcWord: String,
        transWord: String,
        x: Number,
        y: Number,
        src: String,
    },
    methods: {
        playAudio: function (){
            document.getElementById('audio').play();
        }
    }
}
</script>

<style scoped>
.translate-modal {
    position: absolute;
    height: 178px !important;
    width: 165px !important;
    background: #FFFFFF;
    box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
    border-radius: 8px;
}
.volume-img {
    cursor: pointer;
    background: #FFFFFF;
    border: 1.6px solid #F2994A;
    box-sizing: border-box;
    border-radius: 50%;
    padding: 3px;
}
.line {
    background: rgba(196, 196, 196, 0.64);
    height: 1px;
    width: 63px;
}
.save {
    padding: .8rem;
    background: #F2994A;
    cursor: pointer;
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
}
.circle {
    vertical-align: middle;
    margin-right: .4rem;
    margin-bottom: 3px;
    border-radius: 50%;
    padding: 6px;
    border: 1.6px solid #FFFFFF;
}
</style>
