<template>
    <account-layout>
        <section class="profile">
            <div class="profile-title"><span>Мой профиль</span></div>
            <div class="profile-inner">
                <div class="profile-img-wrap">
                    <img :src="user.profile_photo_url" alt="">
                    <a :href="route('account.profile.edit')" class="profile-img-btn" >Редактировать</a>
                </div>
                <div class="profile-data">
                    <div class="profile-data-info">
                        <div class="profile-data-info-title">
                            <span>{{user.surname}} {{user.name}}</span>
                        </div>
                        <div class="profile-data-info-body">
                            <p class="profile-data-info-body-text">День рождения: <span>{{ user.birth_day | dateFormatForHuman }}</span></p>
                            <p class="profile-data-info-body-text">Возраст: <span>{{ user.birth_day | age }} {{ user.birth_day ? 'лет' : '' }} </span></p>
                            <p class="profile-data-info-body-text">Город: <span>{{ user.city }}</span></p>
                            <p class="profile-data-info-body-text">Цель: <span>{{ user.purpose }}</span></p>
                        </div>
                    </div>
<!--                    <div class="profile-data-lesson">-->
<!--                        <div class="profile-data-lesson-title">-->
<!--                            <span>Вы обучаете “Английский” : </span> General English-->
<!--                        </div>-->
<!--                        <div class="profile-data-progress">-->
<!--                            <div class="progress-wrap">-->
<!--                                <div class="progress-title"><span>Уровень: </span> Elementary</div>-->
<!--                                <div class="progress-levels">-->
<!--                                    <div class="progress-levels-item active">Elementary</div>-->
<!--                                    <div class="progress-levels-item">Intermediate</div>-->
<!--                                    <div class="progress-levels-item">Advanced</div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="progress-wrap">-->
<!--                                <div class="progress-title"><span>До целей осталось:</span></div>-->
<!--                               <div class="progress-bar-wrap">-->
<!--                                   <div class="progress-bar-line active"></div>-->
<!--                                   <div class="progress-bar-point">-->
<!--                                       <img src="/images/icons/Icon.svg" alt="">-->
<!--                                       <p>5 занятий</p>-->
<!--                                   </div>-->
<!--                                   <div class="progress-bar-line active"></div>-->
<!--                                   <div class="progress-bar-point">-->
<!--                                       <img src="/images/icons/Icon.svg" alt="">-->
<!--                                       <p>10 занятий</p>-->
<!--                                   </div>-->
<!--                                   <p class="progress-bar-line-last-value">15</p>-->
<!--                                   <div class="progress-bar-line"></div>-->
<!--                               </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
        </section>
    </account-layout>
</template>

<script>
export default {
    computed: {
        user() {
            return this.$page.props.user;
        }
    }
}
</script>

<style scoped>
.profile {
    background: #F5F7F8;
    height: 100%;
}
.profile-title {
    padding: 30px 60px 35px 60px;
    border-bottom: 1px solid #E0E3EB;
}
.profile-title span {
    color: #050A1C;
    font-weight: 600;
    font-size: 24px;
    line-height: 140.62%;
}
.profile-inner {
    display: flex;
    padding: 25px 60px;
}
.profile-img-wrap {
    max-width: 100%;
    width: 646px;
    display: flex;
    flex-direction: column;
    background: #FFFFFF;
    align-items: center;
    border-radius: 7px;
    padding: 15px;
    margin-right: 30px;
    height: 100%;
    padding-bottom: 30px;
}
.profile-img-wrap img{
    margin-bottom: 25px;
    width: 270px;
    max-width: 100%;
}
.profile-img-btn {
    font-size: 18px;
    line-height: 140.62%;
    color: #003ECB;
    background: #F5F7F8;
    border-radius: 7px;
    padding: 10px;
    width: 270px;
    text-align: center;
    max-width: 100%;
}
.profile-data {
    width: 100%;
}
.profile-data-info {
    background: #FFFFFF;
    border-radius: 10px;
    margin-bottom: 25px;
}
.profile-data-info-title {
    padding: 25px 25px 17px 25px;
    border-bottom: 1px solid #E0E3EB;
    font-weight: 600;
    font-size: 20px;
    line-height: 140.62%;
    color: #050A1C;
}
.profile-data-info-body {
    padding: 25px 25px 17px 25px;

}
.profile-data-info-body-text {
    font-weight: 600;
    font-size: 18px;
    line-height: 140.62%;
    color: #8D96A0;
}.profile-data-info-body-text span{
    color: #2C2D32;
}
.profile-data-lesson {
    background: #FFFFFF;
    border-radius: 10px;
    padding: 25px 25px 60px 25px;
}
.profile-data-lesson-title {
    font-weight: 400;
    font-size: 22px;
    line-height: 140.62%;
    color: #2C2D32;
    margin-bottom: 35px;
}
.profile-data-lesson-title span {
    font-weight: 600;
}
.profile-data-progress {
    display: flex;
    justify-content: space-around;
}
.progress-wrap {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.progress-title {
    font-weight: 400;
    font-size: 22px;
    line-height: 140.62%;
    color: #2C2D32;
    margin-bottom: 20px;
}
.progress-title span{
    font-weight: 600;
}
.progress-levels {
    display: flex;
}
.progress-levels-item {
    padding: 16px;
    font-size: 13px;
    line-height: 18px;
    color: #2F80ED;
    text-align: center;
    border-bottom: 5px solid #97BFF6;
}
.progress-levels-item.active {
    font-weight: 600;
    border-bottom: 5px solid #2F80ED;
}
.progress-bar-wrap {
    display: flex;
    align-items: center;
    position: relative;
}
.progress-bar-line {
    height: 5px;
    width: 120px;
    background: #97BFF6;
}
.progress-bar-line:first-child {
    width: 55px;
}
.progress-bar-line:last-child {
    width: 55px;
}
.progress-bar-line.active {
    background: #2F80ED;
}
.progress-bar-point {
    position: relative;
}
.progress-bar-point p{
    position: absolute;
    left: -5px;
    font-size: 12px;
    line-height: 16px;
    text-align: center;
    color: #999999;
}
.progress-bar-line-last-value {
    position: absolute;
    right: -25px;
    bottom: -7px;
    font-size: 12px;
    line-height: 16px;
    text-align: center;
    color: #999999;
}

@media (max-width: 1440px) {
    .profile-data-progress {
        flex-wrap: wrap;
    }
    .progress-wrap {
        margin-bottom: 40px;
    }
}
@media (max-width: 768px) {
    .profile-title {
        padding: 30px 60px 20px 60px;
    }
    .profile-inner {
        flex-wrap: wrap;
        justify-content: center;
        margin-bottom: 100px;
        padding: 25px 15px;
    }

    .profile-img-wrap {
        margin-right: 0;
        border-radius: unset;
        width: 100%;
    }

    .profile-data-info{
        border-radius: unset;
    }
}
</style>
