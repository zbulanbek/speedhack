<template>
	<div>
	<div class="calendar-info" v-if="item.customData.title !== 'Today' ">
		<div class="header-wrap">
			<span class="date"> {{ item.dates | dateFormatForHuman }} </span>
			<span class="title">{{ item.customData.course_title }}</span>
		</div>
		<div class="body-wrap">
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
            <div class="wrap-items">
            	<div class="item">
					<b>Время</b>
					<span>{{ item.customData.date | timeFormat}}</span>
				</div>
				<div class="item">
					<b>Имя учителя</b>
					<span>{{ item.customData.student }}</span>
				</div>
            </div>
            <div class="wrap-items">
    			<div class="item">
    				<b>Курс раздел</b>
    				<span>{{ item.customData.course_section_title }}</span>
    			</div>
                <div class="item">
                    <b>Курс</b>
                    <span>{{ item.customData.title }}</span>
                </div>
            </div>
			<a :href="link" class="btn-main">Начать урок</a>
		</div>
	</div>
	</div>
</template>
<script>
	import moment from 'moment';
	export default {
		props:{
			item: Object,
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
            return moment(this.item.customData.date).format('X') - this.actualTime
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
			if(this.item.customData.title !== 'Today'){
				this.link = this.route('trial-lessons.show', this.item.customData.room_name);	
			}
        },
        watch: {
            actualTime (val,oldVal) {
                this.compute()
            }
        }
	}
</script>
<style scoped>
	.wrap-items{
		display: flex;
		justify-content: space-between;
            padding: 0px 30px;
	}
	.bg-account{
		background: #F5F7F8;
		width: 100%;
    	height: 100%;
	}

	.title-page{
		padding: 30px 60px;
		border-bottom: 1px solid #E0E3EB;
		margin-bottom: 30px;
	}
	.title-page span{
		font-size: 24px;
		font-family: "Inter-Bold", sans-serif;
		color: #050A1C;
	}

	.date-wrap{
		width: 100%;
	}
	.date-picker-wrap{
		display: flex;

	}
	.wrap-calendar{
		padding: 0px 45px;
	}
	.mine{
		position: absolute;
	}
	.wrap-calendar{
		display: flex;
	}

	.calendar-info{
		background: #FFFFFF;
		box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
		border-radius: 8px;
		margin-bottom: 16px;
		/*overflow: hidden;*/
	}

	.calendar-info .header-wrap{
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		padding: 9px 10px 11px 10px;
		background: #F8CC45;
		border-top-left-radius: 8px;
		border-top-right-radius: 8px;
		position: relative;
	}

	.calendar-info .header-wrap:before{
		content: '';
		display: block;
	  	width: 0;
	  	height: 0;
	  	position: absolute;
	  	top: 50%;
	  	transform: translateY(-50%);
	  	left: -15px;
	  	border-top: 20px solid transparent;
	  	border-bottom: 20px solid transparent;
	  	border-right: 20px solid #F8CC45;
	}

	.calendar-info .header-wrap .date{
		font-size: 16px;
		color: #E97B3B;
		margin-bottom: 12px;
		font-family: "Inter", sans-serif;
	}
	.calendar-info .header-wrap .title{
		color: #FFFFFF;
		font-size: 18px;

		font-family: "Inter-Bold", sans-serif;
	}
	.body-wrap{
		padding: 16px;
	}
	.body-wrap .item{
		display: flex;
		flex-direction: column;
		margin-bottom: 10px;
	}
	.body-wrap .item:last-child{
		margin-bottom: 0px;
	}
	.body-wrap .item b{
		font-size: 16px;
		color: #050A1C;
		font-family: "Inter-Bold", sans-serif;
		margin-bottom: 4px;
	}
	.body-wrap .item span{
		color: #7B838B;
		font-size: 16px;
		font-family: "Inter", sans-serif;
	}

	.vc-arrow{
		background: rgba(208, 208, 208, 0.56);
		border-radius: 12px;
	}
	.date-picker-wrap{
		max-width: 700px;
	}
	.calendar-info-wrap{
		max-width: 600px;
	}
    .calendar-next-lesson {

    }
    .add-lesson {
        background: #FFFFFF;
        box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
        border-radius: 8px;
        font-size: 22px;
        line-height: 140.62%;
        color: #979797;
        padding: 22px;
        text-align: center;
        cursor: pointer;
        margin-bottom: 17px;
    }
    .next-lesson-inner {
        background: #FFFFFF;
        box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
        border-radius: 8px;
    }
    .next-lesson-timer {
        display: flex;
        align-items: baseline;
       border-bottom: 1px solid #E0E3EB;
       padding: 24px;
    }
    .timer-text {
        font-weight: 600;
        font-size: 25px;
        line-height: 140.62%;
        color: #050A1C;
        margin-bottom: 0;
        margin-right: 12px;
    }
    .next-lesson-info {
        padding: 24px;
    }
    .next-lesson-info-text {
        font-size: 22px;
        line-height: 140.62%;
        color: #050A1C;
        margin-bottom: 16px;
    }
    .next-lesson-info-text span {
        font-weight: 600;
    }
	.btn-main{
		font-size: 16px;
	    margin-top: 33px;
	    display: block;
	    line-height: 15px;
	    padding: 15px 40px;
	}
	.btn-main.not-active{
		pointer-events: none;
		background: #7B838B;
	}
	@media only screen and (max-width: 1024px) {
		.wrap-calendar{
			padding: 0px 5px;
			margin-bottom: 40px;
		}
		.wrap-calendar{
			padding: 0px 20px;
		}
	}
	@media only screen and (max-width: 767px) {
		.title-page{
			padding: 20px;
		}
		.wrap-calendar{
			padding: 0px 20px;
		}
		.calendar-info-wrap{
			margin-top: 40px;
			margin-bottom: 40px;
		}

		.calendar-info .header-wrap:before{
			top: -28px;
		    transform: translateX(-50%) rotate(90deg);
		    left: 50%;
		}
		.wrap-calendar{
			margin-bottom: 40px;
		}
	}

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
        padding-top: 0;
        padding-top: 0;
        padding-bottom: 0;
        margin-bottom: 16px;
       /* position: absolute;
        top: 0;
        height: 100%;
        left: 0px;*/
        /*background: rgba(0, 0, 0, 0.6);*/
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
        color: #003ECB;
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
        font-size: 26px;
        line-height: 18px;
        text-align: center;
        letter-spacing: 0.3px;
        color: #003ECB;
        height: 56px;
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
        color: #003ECB;
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

    .time-unite{
    	color: #003ECB;
    	background: rgba(98, 156, 244, 0.17);
    	border-radius: 6px;
    	    padding-bottom: 10px;
    }
</style>
