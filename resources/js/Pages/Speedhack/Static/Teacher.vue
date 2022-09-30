<template>
    <welcome-layout>
        <section class="welcome-banner">
            <div class="container" ref="infoBox">
                <header-welcome></header-welcome>
                <div class="wrap">
                    <div class="content-banner">
                        <h1 class="title">Наши двери всегда
                        открыты для особенных</h1>
                        <span class="subtile">Начните онлайн-обучение вместе с нами. Уже 2300 учеников прошли профессиональное обучение.</span>
                        <div class="button-wrap">
                            <a @click="showFormReguestModal" class="btn-main">Оставить заявку на вакансию</a>
                            <a @click="scrollToCourses" class="link-main">Посмотреть направления</a>
                        </div>
                    </div> 
                    <div class="banner-img">
                        <img src="/images/ilustration/banner-2.png">
                    </div>  
                </div>
            </div>
        </section>
        <section class="look_for pt-100">
            <div class="container">
                <span class="title">Направления</span>
                <span class="subtitle">Вся наша работа направлена на улучшение качества образования</span>
                <div class="row">
                     <div class="col-12 col-md-3 col-lg-5">
                        <div class="img">
                            <img src="/images/bg/banner-10.jpg">
                        </div>
                    </div>

                    <div class="col-12 col-md-9 col-lg-7">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="look-for-item">
                                    <span class="title">Английский язык</span>
                                    <span class="text">Ты сможешь решать по-настоящему интересные задачи и делать онлайн-образование чуточку лучше.Это текст о компании. Он необходим для дальнейшего продвижения Вашего сайта.</span>
                                </div>    
                            </div> 
                            <div class="col-12 col-md-6">
                                <div class="look-for-item">
                                    <span class="title">Казахский язык</span>
                                    <span class="text">Ты сможешь решать по-настоящему интересные задачи и делать онлайн-образование чуточку лучше.Это текст о компании. Он необходим для дальнейшего продвижения Вашего сайта.</span>
                                </div>    
                            </div> 
                            <div class="col-12 col-md-6">
                                <div class="look-for-item">
                                    <span class="title">Математика</span>
                                    <span class="text">Ты сможешь решать по-настоящему интересные задачи и делать онлайн-образование чуточку лучше.Это текст о компании. Он необходим для дальнейшего продвижения Вашего сайта.</span>
                                </div>    
                            </div> 
                            <div class="col-12 col-md-6">
                                <div class="look-for-item">
                                    <span class="title">Физика</span>
                                    <span class="text">Ты сможешь решать по-настоящему интересные задачи и делать онлайн-образование чуточку лучше.Это текст о компании. Он необходим для дальнейшего продвижения Вашего сайта.</span>
                                </div>    
                            </div> 
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>
        <section class="about_page">
            <div class="container">
                <span class="title">SpeedHack занимается online-обучением
                основных предметов</span>
                <span class="subtitle">Вся наша работа направлена на улучшение качества образования, расширение программ обучения и возможностей дать необходимых материалов. Мы создаем современное место, в котором не только интересно учиться также интересно преподавать.</span>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3" style="margin-bottom: 20px;">
                        <div class="fact-item">
                            <div class="count">1</div>
                            <span class="heading">Гибкий график</span>
                            <span class="text">Ты сможешь решать по-настоящему интересные задачи и делать онлайн-образование чуточку лучше.</span>
                        </div>
                    </div>

                     <div class="col-12 col-md-6 col-lg-3" style="margin-bottom: 20px;">
                        <div class="fact-item">
                            <div class="count">2</div>
                            <span class="heading">Онлайн-обучение</span>
                            <span class="text">Мы не привязаны к формальному графику и даем тебе право планировать свое время.</span>
                        </div>
                    </div>

                     <div class="col-12 col-md-6 col-lg-3" style="margin-bottom: 20px;">
                        <div class="fact-item">
                            <div class="count">3</div>
                            <span class="heading">Саморазвитие</span>
                            <span class="text">Ты сможешь решать по-настоящему интересные задачи и делать онлайн-образование чуточку лучше.</span>
                        </div>
                    </div>

                     <div class="col-12 col-md-6 col-lg-3" style="margin-bottom: 20px;">
                        <div class="fact-item">
                            <div class="count">4</div>
                            <span class="heading">Драйв</span>
                            <span class="text">Мы ставим амбициозные цели и никогда не останавливаемся на достигнутом.</span>
                        </div>
                    </div>
                </div>    
            </div>
        </section>

        <section class="look_for">
            <div class="container">
                <span class="title">Кого мы ищем?</span>
                <span class="subtitle">Вся наша работа направлена на улучшение качества образования</span>
                <div class="row">
                    <div class="col-12 col-md-9 col-lg-7">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="look-for-item">
                                    <span class="title">Уверенность в знаний</span>
                                    <span class="text">Ты сможешь решать по-настоящему интересные задачи и делать онлайн-образование чуточку лучше.Это текст о компании. Он необходим для дальнейшего продвижения Вашего сайта.</span>
                                </div>    
                            </div> 
                            <div class="col-12 col-md-6">
                                <div class="look-for-item">
                                    <span class="title">Высшее образование</span>
                                    <span class="text">Ты сможешь решать по-настоящему интересные задачи и делать онлайн-образование чуточку лучше.Это текст о компании. Он необходим для дальнейшего продвижения Вашего сайта.</span>
                                </div>    
                            </div> 
                            <div class="col-12 col-md-6">
                                <div class="look-for-item">
                                    <span class="title">Работа с детьми</span>
                                    <span class="text">Ты сможешь решать по-настоящему интересные задачи и делать онлайн-образование чуточку лучше.Это текст о компании. Он необходим для дальнейшего продвижения Вашего сайта.</span>
                                </div>    
                            </div> 
                            <div class="col-12 col-md-6">
                                <div class="look-for-item">
                                    <span class="title">Пунктуальность</span>
                                    <span class="text">Ты сможешь решать по-настоящему интересные задачи и делать онлайн-образование чуточку лучше.Это текст о компании. Он необходим для дальнейшего продвижения Вашего сайта.</span>
                                </div>    
                            </div> 
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-5">
                        <div class="img">
                            <img src="/images/bg/look.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <form-request></form-request>
    </welcome-layout>
</template>

<script>
import HeaderWelcome from '@/Speedhack/Components/Details/HeaderBanner';
import FormRequest from '@/Speedhack/Components/Details/FormRequest';

export default {
    components: {
        HeaderWelcome,
        FormRequest
       
    },
    methods: {
        showFormReguestModal(){
            this.$modal.show('formReguestTeacher');
        },
        scrollToCourses() {
            let height = this.$refs.infoBox.clientHeight;
            window.scrollTo({
                top: height,
                behavior: 'smooth'
            });
        }
    }
}
</script>
<style scoped>
    .about_page{
        padding-top: 100px;
        padding-bottom: 120px;
    }
    .about_page .title{
        font-family: "Inter-Bold", sans-serif;  
        font-size: 45px;
        line-height: 58px;
        display: block;
        width: 70%;
        margin: 0 auto;
        text-align: center;
        margin-bottom: 12px;
    }
    .about_page .subtitle{
        font-family: "Inter", sans-serif; 
        font-size: 22px;
        color: #050A1C;
        display: block;
        width: 80%;
        margin: 0 auto;
        text-align: center;
        margin-bottom: 60px;
    }
    .fact-item{
        background: #FFFFFF;
        box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
        border-radius: 8px;
        padding: 25px;
        position: relative;
        height: 100%;
    }
    .fact-item .count{
        position: absolute;
        top: 25px;
        right: 25px;
        color: #FFFFFF;
        opacity: .9;
        font-size: 16px;
        font-family: "Inter", sans-serif;
        width: 25px;
        height: 25px;
        background: #F2994A;
        border-radius: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .fact-item .heading{
        font-family: "Inter-Bold", sans-serif; 
        font-size: 20px;
        display: inline-block;
        margin-bottom: 12px;
        color: #050A1C;
    }
    .fact-item .text{
        font-family: "Inter", sans-serif; 
        font-size: 16px;
        color: #050A1C;
        opacity: 0.9;
        display: block;
    }


    .look_for{
        padding-bottom: 100px;
    }

    .look_for .img{
        width: 100%;
        height: 100%;
    }
    .look_for .img img{
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
    .look_for .title{
        font-family: "Inter-Bold", sans-serif;
        font-size: 40px;
        line-height: 58px;
        margin-bottom: 12px;
        color: #050A1C;
    }
    .look_for .subtitle{
        font-family: "Inter", sans-serif;   
        font-size: 18px;
        line-height: 22px;
        color: #050A1C;
        margin-bottom: 50px;
        display: block;
    }

    .look-for-item{
        border-left: 4px solid #F2994A;
        padding: 12px 24px;
        margin-bottom: 40px;
    }
    .look-for-item .title{
        font-family: "Inter-Bold", sans-serif;
        font-size: 24px;
        line-height: 32px;
        margin-bottom: 10px;
        color: #050A1C;
        display: block;
    }
    .look-for-item .text{
        font-family: "Inter", sans-serif;
        font-size: 16px;
        line-height: 20px;
        color: #050A1C;
        opacity: 0.9;
        display: block;
    }
    .pt-100{
        padding-top: 100px;
    }

    .welcome-banner .content-banner{
        width: 80%;
    }
    @media only screen and (max-width: 767px) {
        .about_page .title{
            font-size: 32px;
            line-height: 42px;
            margin: 0px;
            width: 100%;
            margin-bottom: 40px;
        }
        .about_page .subtitle{
            width: 100%;
            font-size: 18px;
        }
        .fact-item{
            margin-bottom: 20px;
        }
    }
</style>