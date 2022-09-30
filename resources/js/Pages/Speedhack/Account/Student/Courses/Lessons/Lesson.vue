<template>
    <account-layout>
        <section class="bg-account">
            <div class="account-title">
                <div class="wrap-text">
                    <a :href="route('account.courses.show', lesson.course_section.course_id)"><img src="/images/icons/arrow-left-blue.svg"></a>
                    <span>{{ lesson.course_section.title }}</span>
                </div>
            </div>

            <section class="lesson-wrap">
                <section class="video-wrap" style="width: 100%;">
                    <div class="title">
                        {{ lesson.title }}
                    </div>
                    <div class="video">
                        <vue-plyr>
                            <video controls crossorigin playsinline>
                                <source :src="lesson.video" />
                            </video>
                        </vue-plyr>
                    </div>
                </section>
                <section class="class-wrap" v-if="lesson.time_lines">
                    <lesson-blocks :lesson_id="lesson.id"></lesson-blocks>
                   <!--  <class-course :lesson="lesson"></class-course> -->
                </section>
            </section>

           <!--  <div class="content-wrap" v-if="lesson.description">
                <span class="title">Описание</span>
                <p>{{ lesson.description }}</p>
            </div> -->

            <div class="content-wrap" v-if="lesson.materials.length > 0">
                <span class="title">Материалы</span>
                <div class="btn-wrap">
                    <a v-for="material in lesson.materials" @click="download(material)" class="btn-download">
                        <img src="/images/icons/file-text-white.svg" class="img-1">
                        {{ material.name }}
                        <img src="/images/icons/download.svg" class="img-2">
                    </a>
                </div>
            </div>

            <modal name="LessonModel"
                   :width="1200"
                   :height="650"
                   :scrollable="true"
                   :adaptive="true">
                <lesson-modal></lesson-modal>
            </modal>

        </section>
    </account-layout>
</template>
<script>
import ClassCourse from '@/Speedhack/Components/Account/ClassCourse';
import LessonModal from '@/Speedhack/Components/Account/LessonModal';
import LessonBlocks from "@/Speedhack/Components/Trial/LessonBlocks";

export default {
    components: {
        ClassCourse,
        LessonModal,
        LessonBlocks
    },
    props: {
        lesson: {
            type: Object,
            required: true,
        }
    },
    methods: {
        async download(material) {
            const { name, url} = material;
            const { data } = await window.axios(url, {
                method: 'GET',
                responseType: 'blob',
            });
            const link = document.createElement('a');
            link.href = url;
            link.setAttribute('download', name);
            document.body.appendChild(link);
            link.click();
        },
        showLessonModal() {
            this.$modal.show('LessonModel');
        },
    },
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
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid #E0E3EB;
}

.account-title img {
    margin-right: 16px;
}

.lesson-wrap {
    display: flex;
    padding-right: 60px;
    padding-left: 60px;
    margin-bottom: 60px;
    padding-top: 40px;
    width: 100%;
    max-width: 100%;
    overflow: auto;
}

.video-wrap {
    width: 50%;
    padding-right: 15px;
}

.video-wrap .title {
    font-family: "Inter-Bold", sans-serif;
    font-weight: 600;
    font-size: 26px;
    color: #003ECB;
    margin-bottom: 24px;
}

.video-wrap .video {
    width: 100%;
    height: 600px;
    border-radius: 8px;
    overflow: hidden;
    background-color: #003ECB;
}

.class-wrap {
    width: 50%;
    margin-left: 15px;
    background: #fff;
    border-radius: 11px;
}

.content-wrap {
    margin-bottom: 40px;
    padding-right: 60px;
    padding-left: 60px;
}

.content-wrap .title {
    font-family: "Inter", sans-serif;
    font-size: 20px;
    color: #7B838B;
    display: block;
    margin-bottom: 8px;

}

.content-wrap p {
    font-family: "Inter", sans-serif;
    font-size: 18px;
    color: #2C2D32;
}

.btn-download {
    cursor: pointer;
    background: #003ECB;
    border-radius: 8px;
    font-family: "Inter", sans-serif;
    padding: 16px 20px;
    font-size: 16px;
    color: #FFFFFF;
}

.btn-download .img-1 {
    margin-right: 16px;
}

.btn-download .img-2 {
    margin-left: 16px;
}

.content-wrap .btn-wrap {
    display: flex;
}

.content-wrap .btn-wrap .btn-download {
    margin-right: 16px;
}

.btn-download.orange {
    background-color: #F2994A;
    padding: 12px 20px;
}

.btn-download.orange:hover {
    cursor: pointer;
}

@media only screen and (max-width: 768px) {
    .lesson-wrap {
        flex-direction: column;
        padding-right: 20px;
        padding-left: 20px;
    }

    .video-wrap {
        width: 100%;
        padding: 0px;
    }

    .class-wrap {
        width: 100%;
        padding: 0px;
    }

    .video-wrap .video {
        height: 250px;
    }

    .class-carousel-wrap {
        padding-top: 78px;
    }

    .content-wrap {
        padding-right: 20px;
        padding-left: 20px;
        height: auto;
    }

    .content-wrap {
        padding-right: 20px;
        padding-left: 20px;
    }

}

@media only screen and (max-width: 760px) {
    .content-wrap .btn-wrap {
        flex-direction: column;
    }

    .content-wrap .btn-wrap .btn-download {
        margin-right: 0px;
        margin-bottom: 16px;
    }

    .content-wrap .btn-wrap .btn-download:last-child {
        margin-bottom: 0px;
    }
}
</style>
