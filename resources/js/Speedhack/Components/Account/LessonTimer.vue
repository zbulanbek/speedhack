<template>
    <a class="course">
        <div class="image-wrap">
            <img src="/images/bg/trialbg.jpg">
            <div class="time-wrap">
                <div class="time-unite created" v-show="months">
                    <div class="time-unite-value">{{ months }}</div>
                    <div class="time-unite-title">Месяцы</div>
                </div>
                <div class="time-unite created" v-show="days">
                    <div class="time-unite-value">{{ days }}</div>
                    <div class="time-unite-title">Дни</div>
                </div>
                <div class="time-unite created">
                    <div class="time-unite-value">{{ hours }}</div>
                    <div class="time-unite-title">Час</div>
                </div>
                <div class="time-unite created">
                    <div class="time-unite-value">{{ minutes }}</div>
                    <div class="time-unite-title">Минут</div>
                </div>
                <div class="time-unite created">
                    <div class="time-unite-value">{{ seconds }}</div>
                    <div class="time-unite-title">Секунд</div>
                </div>
            </div> 
        </div>
       <div class="content-wrap">
            <div class="name">
                <p class="top">Название курса</p>
                <p class="middle">General English</p>
                <p class="bottom">Пробный урок</p>
            </div>
            <a :href="link" class="btn-link" :class="{'active': seconds == 0}">Начать</a>
        </div>
    </a>
</template>

<script>
    import moment from 'moment'
    export default {
        props: {
            lessons: Object,
            
        },
        data () {
            return {
                actualTime: moment().format('X'),
                years: 0,
                months: 0,
                days: 0,
                hours: 0,
                minutes: 0,
                seconds: 0,
                link: null,
            }
        },
        methods: {
          addOneSecondToActualTimeEverySecond () {
              var component = this
              component.actualTime = moment().format('X')
              setTimeout(function(){
                  component.addOneSecondToActualTimeEverySecond()
              }, 1000);
          },
          getDiffInSeconds () {
            return moment(this.lessons.application.start_time).format('X') - this.actualTime
          },
          compute () {
            var duration = moment.duration(this.getDiffInSeconds(), "seconds")
            this.years = duration.years() > 0 ? duration.years() : 0
            this.months = duration.months() > 0 ? duration.months() : 0
            this.days = duration.days() > 0 ? duration.days() : 0
            this.hours = duration.hours() > 0 ? duration.hours() : 0
            this.minutes = duration.minutes() > 0 ? duration.minutes() : 0
            this.seconds = duration.seconds() > 0 ? duration.seconds() : 0
          }
        },
        created () {
          this.compute();
          this.addOneSecondToActualTimeEverySecond();
          this.link = this.route('trial-lessons.show', this.lessons.room_name);
        },
        watch: {
            actualTime (val,oldVal) {
                this.compute()
            }
        }
    }
</script>
<style scoped>
    .image-wrap{
        height: 180px;
        position: relative;
        width: 100%;
    }
    .image-wrap img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .course {
        display: block;
        background: #FFFFFF;
        box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 30px;
    }

    .content-wrap .title {
        font-family: "Inter-Bold", sans-serif;
        font-size: 18px;
        line-height: 16px;
        color: #050A1C;
        /*margin-bottom: 16px;*/
    }
    .content-wrap {
        padding: 20px 20px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;    
    }

    .time-wrap{
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: center;
        padding-top: 20px;
        padding-top: 35px;
        padding-bottom: 30px;
        position: absolute;
        top: 0;
        height: 100%;
        left: 0px;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(4px);
    }

    .time-wrap .time-unite{
        /*width: 100%;*/
        margin-right: 10px;
        position: relative;
    }

    .time-wrap .time-unite:after{
        content: ':';
        display: block;
        color: #fff;
        height: 70px;
        width: 70px;
        position: absolute;
        top: 11px;
        font-size: 30px;
        /*transform: translateY(-50%);*/
        left: 67px;
    }
    .time-wrap .time-unite:last-child:after{
        display: none;
    }
    .time-wrap .time-unite:last-child{
        margin-right: 0px;
    }
    .time-unite-value{
        font-family: Inter;
        font-style: normal;
        font-weight: 600;
        font-size: 36px;
        line-height: 18px;
        text-align: center;
        letter-spacing: 0.3px;
        color: #fff;
        height: 70px;
        width: 65px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .time-unite-title{
        font-family: Inter;
        font-weight: 600;
        font-size: 16px;
        line-height: 16px;
        letter-spacing: 0.9px;
        color: #fff;
        /*margin-top: 16px;*/
        text-align: center;
    }

    .title.not{
        color: #7B838B;
    }

    .name{
        display: flex;
        flex-direction: column;
    }

    .name .top{  
        font-family: Inter;
        font-size: 14px;
        line-height: 14px;
        color: #7B838B;
        opacity: 0.9;
        margin-bottom: 8px;
    }

    .name .middle{
        font-family: Inter;
        font-weight: 600;
        font-size: 18px;
        line-height: 19px;
        color: #050A1C;
        margin-bottom: 16px;
    }

    .name .bottom{
        font-family: Inter;
        font-size: 14px;
        line-height: 14px;
        color: #003ECB;
        opacity: 0.9;
        margin-bottom: 0px;
    }

    .btn-link{
        padding: 14px 17px;
        background: #E6E6E6;
        border-radius: 8px;
        font-family: Inter;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;
        color: #A1A1A1;
        pointer-events: none;
    }
    .btn-link.active{
        background: #F2994A;
        color: #fff;
        pointer-events: auto;
    }

    .btn-link:hover{
        text-decoration: none;
    }

</style>