<template>
    <account-layout>
        <section class="bg-account">
            <div class="title-page"><span> Домашняя работа</span></div>
            <div class="links-wrap">
                <button class="button" :class="{'active': selected_course === course.id}" v-for="course in courses"
                        @click="selectCourse(course.id)">{{ course.title }}
                </button>
            </div>
            <div class="container card-wrap">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4" v-for="(home_work, index) in home_works">
                        <a :href="route('account.home-works.show', home_work.id)" class="card-homework">
                            <div class="dark-wrap" v-if="index != 0">
                                <img src="/images/icons/lock.svg">
                                <span>Домашняя работа будет доступен
                                    когда вы пройдете эту тему</span>
                            </div>

                            <div class="img-wrap">
                                <img class="card-img-top" :src="home_work.image_url" :alt="home_work.name">
                            </div>
                            <div class="card-body">
                                <span class="subject_title">
                                    Название урока
                                </span>
                                <a href="#" class="content-text-wrap">
                                    <p class="card-text">
                                        {{ home_work.name }}
                                    </p>
                                    <img src="/images/icons/arrow-right.svg" alt="arrow" class="arrow">
                                </a>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </account-layout>
</template>

<script>

export default {
    name: "HomeWorks",
    props: {
        courses: Array
    },
    data() {
        return {
            selected_course: null,
            home_works: [],
        }
    },
    mounted() {
        if (this.courses.length > 0) this.selected_course = this.courses[0].id;
    },
    methods: {
        selectCourse(id) {
            this.selected_course = id;
        },
        async getHomeWorks() {
            const {data} = await window.axios.get(route('account.home-works.groupBy.course', this.selected_course));
            this.home_works = data.home_works;
        }
    },
    watch: {
        selected_course(value) {
            if (value) {
                this.getHomeWorks()
            }
        }
    }
}
</script>

<style scoped>
.title-page {
    padding: 30px 60px;
    border-bottom: 1px solid #E0E3EB;
    margin-bottom: 30px;
}

.title-page span {
    font-size: 24px;
    font-family: "Inter-Bold", sans-serif;
    color: #050A1C;
}

.links-wrap {
    display: flex;
    align-items: center;
    padding: 0px 60px;
}

.links-wrap .button {
    border: 1px solid #7A9CEA;
    border-radius: 10px;
    padding: 10px 20px;
    display: inline-block;
    margin-right: 16px;
    margin-bottom: 30px;
    font-family: "Inter-Bold", sans-serif;
    font-size: 18px;
    color: #7A9CEA;
    background: #fff;
}

.links-wrap .button.active {
    background: #D4EAFF;
    color: #003ECB;
}

.card-wrap {
    padding: 0px 60px;
    margin-bottom: 30px;
}

.card-homework {
    display: block;
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    width: 100%;
    background: #FFFFFF;
    box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
    margin-bottom: 30px;

}

.img-wrap {
    width: 100%;
    height: 170px;
}

.img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.card-body {
    padding: 16px 16px;
}

.card-body .subject_title {
    font-size: 14px;
    color: #7B838B;
}

.content-text-wrap {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.card-text {
    font-size: 20px;
    color: #050A1C;
    font-family: "Inter-Bold", sans-serif;
    margin-bottom: 0px;
}

.arrow {
    width: 22px;
    height: 22px;
}

.dark-wrap {
    position: absolute;
    top: 0px;
    left: 0px;
    width: 100%;
    background: rgba(0, 0, 0, .6);
    height: 100%;
    color: #fff;
    z-index: 2;
    text-align: center;
    border: 0;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 16px;
}

.dark-wrap img {
    margin-bottom: 16px;
}

.dark-wrap span {
    font-size: 16px;
    color: #fff;
    text-align: center;
    font-family: "Inter", sans-serif;
}

@media only screen and (max-width: 1000px)  and (min-width: 768px) {
    .title-page {
        padding: 45px;
    }

    .links-wrap {
        padding: 0px 45px;
        flex-wrap: wrap;
    }

    .links-wrap .button {
        margin-right: 10px;
        margin-bottom: 16px;
    }

    .card-wrap {
        padding: 0px 20px;
    }
}

@media only screen and (max-width: 767px) {
    .title-page {
        padding: 20px;
    }

    .links-wrap {
        padding: 0px 20px;
        flex-wrap: wrap;
    }

    .links-wrap .button {
        margin-right: 10px;
        margin-bottom: 16px;
    }

    .card-wrap {
        padding: 0px 20px;
    }
}
</style>
