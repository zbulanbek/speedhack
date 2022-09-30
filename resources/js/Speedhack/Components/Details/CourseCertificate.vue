<template>
    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="img">
                        <img :src="certificate.image">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="content">
                        <span class="title">{{ certificate.title }}</span>
                        <span class="text">{{ certificate.body }}</span>
                        <button class="btn-main" @click="$modal.show('getTrialLesson')">Записаться</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    props: {
        certificate: Object,
    },
}
</script>
<style scoped>
.banner {
    background-image: url(/images/bg/yellow-bg.jpg);
    background-repeat: no-repeat;
    background-position: top center;
    background-size: cover;
    padding-top: 60px;
    padding-bottom: 60px;
}

.content {
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 100%;
    align-items: flex-start;
}

.content .title {
    font-family: 'Inter-Bold', sans-serif;
    color: #050A1C;
    font-size: 32px;
    display: block;
    line-height: 62px;
    margin-bottom: 8px;
}

.text {
    color: #050A1C;
    font-size: 16px;
    display: block;
    margin-bottom: 40px;
}

.title img {
    width: 22px;
    height: 22px;
    margin-right: 16px;
}

.btn-main {
    padding: 12px 40px;
}

.img {
    width: 510px;
    height: 360px;

}

.img img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

@media only screen and (max-width: 767px) {
    .img {
        width: 100%;
        height: 220px;
    }
}
</style>
