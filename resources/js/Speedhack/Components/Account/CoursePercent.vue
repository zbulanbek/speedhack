<template>
    <a :href="route('account.courses.show', course.id)" class="course">
        <div class="img">
            <img :src="course.image">
            <!-- <b-progress :value="course.percent" :max="100" class="mb-3"></b-progress> -->
        </div>
        <div class="content-wrap">
            <span class="subtitle">Название курса</span>
            <span class="title">{{ course.title }}</span>
            <!-- <div class="lesson"><img src="/images/icons/book-open.svg"> {{ course.lessons_count }} уроков</div> -->
        </div>
    </a>
</template>
<script>
export default {
    props: {
        course: Object,
    },
}
</script>
<style scoped>
.course {
    display: block;
    background: #FFFFFF;
    box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 30px;
}

.course .progress {
    width: 100%;
    margin-bottom: 0px;
    height: 7px;
    border-radius: 0px;
    background-color: #E0E3EB;
}

.course .img {
    height: 230px;
    width: 100%;
}

.course .img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.content-wrap {
    padding: 20px 20px 25px;
    display: flex;
    flex-direction: column;
}

.content-wrap .subtitle {
    font-size: 14px;
    color: #7B838B;
    font-family: "Inter", sans-serif;
    margin-bottom: 8px;
}

.content-wrap .title {
    font-family: "Inter-Bold", sans-serif;
    font-size: 18px;
    line-height: 16px;
    color: #050A1C;
    margin-bottom: 16px;
}

.content-wrap .lesson {
    display: flex;
    align-items: center;
    font-size: 14px;
    line-height: 17px;
    color: #003ECB;
}

.content-wrap .lesson img {
    margin-right: 8px;

}
</style>
