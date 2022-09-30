<template>
    <account-layout>
    	<section class="bg-account">
    		<div class="title-page"><span>Мое расписание</span></div>
    		<div class="row wrap-calendar">
    			<div class="col-12 col-md-6 col-lg-6 col-xl-6">
    				<div class="date-picker-wrap">
		    			<section class="date-wrap">
			    			<date-picker
			    				class="custom-calendar max-w-full"
			    				:attributes="attrs"
			    				mode="date"
			    				v-model="date"
			    				is-expanded>
			    				</date-picker>
			    		</section>
		    		</div>
    			</div>
    			<div class="col-12 col-md-6 col-lg-6 col-xl-6">
    				<div class="add-lesson" @click="showModal" v-if="$page.props.user.role_id == '1'">
                        Добавить урок
                    </div>

		    		<div class="calendar-info-wrap" v-if="events_curse">
		    			<template v-for="item in events_curse">
		    				<template  v-if="item.customData.title !== 'Today' ">
		    					<calendar-item :item="item" v-if="$page.props.user.role_id != '1'"></calendar-item>
		    					<calendar-item-admin :item="item" v-else>></calendar-item-admin>
		    				</template>
		    			</template>
		    		</div>
                    <div class="calendar-next-lesson" v-if="$page.props.user.role_id == '1'">
                    	<modal name="calendar-modal" :height="420">
					        <div class="login-form">
					        	 <div class="header">
						            <span class="title">Добавить урок</span>
						        </div>
						        <div class="body-m">
						   		<div v-if="courses.length > 0">
						   			<div class="wrap-form">
						   				<div class="form-group">
											<label>Курсы</label>
						                	<select class="form-control form-select-sm"  v-model="course_index">
							                	<template v-for="(course, index)  in courses" >
							                		<option :value="index">{{course.title}}</option>
							                	</template>
											</select>
										</div>
										<div class="form-group" v-if="section_show">
						                    <label>Pазделы</label>
											<select class="form-control"  v-model="section_index">
							                	<template v-for="(section, index)  in courses[course_index].sections" >
							                		<option :value="index">{{section.title}}</option>
							                	</template>
											</select>
										</div>
						   			</div>
						   			<div class="wrap-form">
										<div class="form-group" v-if="lesson_show">
						                    <label>Урок</label>
											<select class="form-control"  v-model="form.lesson_id">
							                	<template v-for="(lesson, index)  in courses[course_index].sections[section_index].lessons" >
							                		<option :value="lesson.id">{{index + 1}} Урок</option>
							                	</template>
											</select>
										</div>
										<template v-if="students.length > 0">
						                	<div class="form-group">
							                    <label>Ученик</label>
							                	<select class="form-control" v-model="form.student_id">
								                	<template v-for="(student, index)  in students" >
								                		<option :value="student.id">{{student.name}} {{student.surname}}</option>
								                	</template>
												</select>
											</div>
						                </template>
						            </div>
								</div>
								<div class="wrap-form">
									<template v-if="teachers.length > 0">
					                	<div class="form-group">
						                    <label>Учитель</label>
						                	<select class="form-control" v-model="form.teacher_id">
							                	<template v-for="(teacher, index)  in teachers" >
							                		<option :value="teacher.id">{{teacher.name}} {{teacher.surname}}</option>
							                	</template>
											</select>
										</div>
					                </template>
					               	<div class="form-group">
					                    <label>Дата и время</label>
					                    <input type="datetime-local" class="form-control" v-model="form.date">
					                </div>
				            	</div>
				                
				                <!-- <date-select  type="datetime" format="YYYY.MM.DD HH:mm"></date-select> -->
				                <button @click="submitForm" class="btn-main lil">Создать урок</button>
				            	</div>
				            </div>
					    </modal>
                    	
                        
                        <!-- <div class="next-lesson-inner">
                            <div class="next-lesson-timer">
                                <p class="timer-text">
                                    Следующий урок:
                                </p>
                                <TimerCountDown date="2022-05-10 15:32:00"></TimerCountDown>
                            </div>
                            <div class="next-lesson-info">
                                <p class="next-lesson-info-text"><span>Английский: </span>General</p>
                                <p class="next-lesson-info-text"><span>Уровень: </span>Elementary</p>
                                <p class="next-lesson-info-text"><span>Урок: </span>8 (to be)</p>
                                <p class="next-lesson-info-text"><span>Начало: </span>16:00</p>
                                <p class="next-lesson-info-text"><span>До начала урока: </span>45:12:03</p>
                            </div>
                        </div> -->
                    </div>
	    		</div>
    		</div>

    	
    	</section>
	</account-layout>
</template>

<script>
	import moment from 'moment';
	import DatePicker from 'v-calendar/lib/components/date-picker.umd'
    import TimerCountDown from "./TimerCountDown.vue";
    import CalendarItem from "@/Speedhack/Components/Account/CalendarItem";
    import CalendarItemAdmin from "@/Speedhack/Components/Account/CalendarItemAdmin";
 //    import DateSelect 'vue2-datepicker';
	// import 'vue2-datepicker/index.css';

	export default {
		props:{
			timetables: Array,
			courses: Array,
			students: Array,
			teachers: Array
		},
	    components: {
	    	DatePicker,
            TimerCountDown,
        	CalendarItem,
        	CalendarItemAdmin
	    },
	    data() {
	        return {
	        	date: "",
	        	events_curse: null,

	        	attrs: [
	        		{
			          	key: 'today',
			          	highlight: 'green',
			        	dates: new Date(),
			        	customData: {
				            title: 'Today',
				        },
			        },

				],
				form: {
	                lesson_id: '',
	                student_id: '',
	                teacher_id: '',
	                date: null,

	            },
	            disabled: false,
	            course_index: null,
	            section_index: null,
	            section_show: false,
	           	lesson_show: false,
	    	}
	    },
      	created() {
      		Array.prototype.push.apply(this.attrs, this.timetables);

    	},
    	methods: {
	        showModal () {
	            this.$modal.show('calendar-modal');
	        },
	        hideModal () {
	            this.$modal.hide('calendar-modal');
	        },
	        clearForm(){
	            this.form = {
	                name: '',
	                phone: '',
	                email: '',
	            };
	            this.$errors.flush();
	        },
	        async submitForm() {
	            try {
	            	const { data } = await window.axios.post(route('account.calendar.create').url(), this.form);
	            	console.log(data.status);
	            	this.disabled = true;
	            	if(data.status == 'success'){
	            		this.disabled = false;
		                this.clearForm();
		                this.hideModal();
		                window.location.reload();
	            	}
	               
	                
	            } catch (e) {
	            	console.log(e);
	                throw e;
	            }
	        },
    	},
    	watch: {
	     	date: {
	     		handler: function (value) {
	     			var valObj = this.attrs.filter(function(elem){
		    			if(moment(elem.dates).locale("ru").format('LL') == moment(value).locale("ru").format('LL'))
					    	return elem;
					});

					if(valObj.length > 0){
						this.events_curse = valObj;
					}else{
						this.events_curse = null;
					}
		    	},
		        deep: true
	     	},
	     	course_index(value) {
	     		if(value !== null ){
	     			this.section_show = true;
	     		}
	     	},
	     	section_index(value) {
	     		if(value !== null ){
	     			this.lesson_show = true;
	     		}
	     	},
	   	},

	}
</script>

<style scoped>
	.wrap-form{
		display: flex;
		justify-content: space-between;
	}
	.wrap-form .form-group{
		width: 50%;
	}
	.wrap-form .form-group:first-child{
		margin-right: 16px;
	}
	.bg-account{
		background: #F5F7F8;
		width: 100%;
    	height: 100%;
    	padding-bottom: 100px;
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
		margin-bottom: 10px;

	}

	.calendar-info .header-wrap{
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		padding: 16px 10px 28px 10px;
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
		font-size: 34px;

		font-family: "Inter-Bold", sans-serif;
	}
	.body-wrap{
		padding: 30px;
	}
	.body-wrap .item{
		display: flex;
		flex-direction: column;
		margin-bottom: 30px;
	}
	.body-wrap .item:last-child{
		margin-bottom: 0px;
	}
	.body-wrap .item b{
		font-size: 18px;
		color: #050A1C;
		font-family: "Inter-Bold", sans-serif;
		margin-bottom: 4px;
	}
	.body-wrap .item span{
		color: #7B838B;
		font-size: 18px;
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

	.login-form {
    width: 100%;
    background: #FFFFFF;

    border-radius: 8px;
    overflow: hidden;
}

.login-form .header {
    padding: 16px 25px 10px;
    border-bottom: 1px solid #F1F1F1;

}

.login-form .header .title {
    font-family: 'Inter-Bold', sans-serif;
    font-size: 24px;
    line-height: 20px;
}

.login-form .form-wrap {
    padding: 25px;
}

.form-group {
    font-family: 'Inter', sans-serif;
    font-weight: 500;
    font-size: 16px;
    line-height: 24px;
    margin-bottom: 8px;
    color: #2C2C2A;
    margin-bottom: 20px;
}

.form-group .form-control {
    border: 1px solid #CCCCCC;
    box-sizing: border-box;
    border-radius: 8px;
    padding: 6px;
    font-size: 16px;
    height: auto;
    line-height: 24px;
}

.form-group .form-control:focus {
    border-color: #F2994A;
}

.btn-main {
    font-size: 16px;
    line-height: 24px;
    width: 100%;
    padding: 15px;
}

.link {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    line-height: 24px;
    color: #979797;
    display: block;
    text-align: center;
    margin-bottom: 20px;
}

.footer-form {
    border-top: 1px solid #F1F1F1;
    padding-bottom: 20px;
    padding-top: 20px;
    display: flex;
    justify-content: center;
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    line-height: 24px;
}

.footer-form p {
    margin-bottom: 0px;
}

.footer-form p a {
    color: #F2994A;
}

.password-wrap {
    position: relative;
}

.pass-view {
    top: 50%;
    transform: translateY(-50%);
    height: inherit;
    right: 20px;
    width: inherit;
}

.pass-view img {
    width: 20px;
    height: 20px;
}

.body-m{
	padding: 16px;
}

.btn-main.lil{
	padding: 11px;
}
@media only screen and (max-width: 767px) {
    .login-page {
        padding: 40px 0;
    }

    .login-form {
        width: 100%;
        box-shadow: none;
    }
}
</style>
