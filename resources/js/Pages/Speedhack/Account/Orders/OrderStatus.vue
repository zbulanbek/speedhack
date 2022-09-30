<template>
    <account-layout>
        <section class="bg-account">
            <div class="success-wrap">
                <p v-html="text"></p>
            </div>
        </section>
    </account-layout>
</template>
<script>
export default {
    props: {
        text: String
    }
}
</script>
<style scoped>
.bg-account {
    background: #F5F7F8;
    width: 100%;
    height: 100%;
}

.account-title {
    font-family: "Inter-Bold", sans-serif;
    padding: 30px 20px;
    font-weight: 600;
    color: #050A1C;
    font-size: 24px;
    border-bottom: 1px solid #E0E3EB;
}

.account-title img {
    margin-right: 16px;
}

.item-news {
    margin-bottom: 20px;
}

.item-news .wrap-news-slider-item {
    padding: 0px;
    margin-bottom: 16px;
}

.news-wrap {
    padding-left: 60px;
    padding-right: 60px;
    padding-top: 40px;
}

.success-wrap {
    display: flex;
    align-items: center;
    height: 80%;
    justify-content: center;
}

.success-wrap p {
    font-family: "Inter", sans-serif;
    font-size: 40px;
    line-height: 140.62%;
    text-align: center;
    color: #003ECB;
}

.success-wrap p b {
    color: #F2994A;
}

@media only screen and (max-width: 767px) {
    .news-wrap {
        padding-left: 20px;
        padding-right: 20px;
    }

    .success-wrap p {
        font-size: 22px;
        line-height: inherit;
        padding: 80px 16px 60px;
    }
}

</style>
