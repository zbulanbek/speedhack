<template>
    <account-layout>
        <section class="bg-account">
            <div class="title-page">
                <span>Вебинары</span>
                <button type="button" class="btn btn-primary" @click="showModal = true">
                    Cоздать комнату
                </button>
            </div>
            <section class="table-wrap">
                <div class="table-main-wrap">
                    <table class="table-main">
                        <tr>
                            <th>№</th>
                            <th>Name</th>
                            <th>Lessons</th>
                            <th>Действия</th>
                        </tr>
                       <tbody v-for="(webinar, index) in webinars">
                       <tr>
                           <td>{{ index + 1 }}</td>
                           <td class="wrap">{{webinar.owner.name}} {{webinar.owner.surname}}<div class="new">new</div></td>
                           <td>{{webinar.course.title}}</td>
                           <td>
                               <a class="btn-main active" :href="route('webinars.show', webinar.id)">Посмотреть </a>
                           </td>
                       </tr>
                       </tbody>
                    </table>
                </div>
                <a class="btn-next"> Загрузить еще </a>
                <div v-if="showModal">
                    <transition name="modal">
                        <div class="modal-mask">
                            <div class="modal-wrapper">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Создать новый вебинар</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" @click=" showModal = false">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Название вебинара</label>
                                                <input type="text" id="name" placeholder="Введите название" class="form-control" v-model="form.name">
                                                <invalid-feedback-inertia :errors="form.errors" input="name"></invalid-feedback-inertia>
                                            </div>
                                            <div class="form-group">
                                                <label for="course">Курс</label>
                                                <select name="course" id="course" class="form-control" v-model="form.course_id">
                                                    <option v-for="course in courses" :value="course.id">{{course.title}}</option>
                                                </select>
                                                <invalid-feedback-inertia :errors="form.errors" input="course_id"></invalid-feedback-inertia>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" @click="showModal = false">Отмена</button>
                                            <button type="submit" class="btn btn-primary" @click="createWebinar">Создать</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </transition>
                </div>
            </section>
        </section>
    </account-layout>
</template>
<script>

export default {
    props: {
        webinars: Array,
        courses: Array,
    },
    data() {
        return {
            showModal: false,
            form: this.$inertia.form({
                name: '',
                course_id: '',
            }),
        }
    },
    methods: {
        createWebinar() {
            this.form.post(this.route('webinars.webinar.store'), {
                onSuccess: visit => {
                    this.showModal = false;
                    this.form.name = '';
                    this.form.course_id = '';
                },
            });
        },
    }
}
</script>
<style scoped>
.bg-account{
    background: #F5F7F8;
    width: 100%;
    height: 100%;
}

.title-page{
    display: flex;
    justify-content: space-between;
    padding: 30px 60px;
    border-bottom: 1px solid #E0E3EB;
    margin-bottom: 30px;
}
.title-page span{
    font-size: 24px;
    font-family: "Inter-Bold", sans-serif;
    color: #050A1C;
}
.tab-wrap{
    border-bottom: 1px solid #E0E3EB;
    display: flex;
    padding-right: 60px;
    padding-left: 60px;
    margin-bottom: 46px;
}
.tab-wrap .item{
    padding: 8px 0px;
    font-size: 18px;
    font-family: "Inter", sans-serif;
    color: rgb(123, 131, 139);
    margin-right: 40px;
    margin-bottom: -1px;
}
.tab-wrap .item.active{
    color: #003ECB;
    border-bottom: 1px solid #003ECB;
}

.table-wrap{
    padding-left: 60px;
    padding-right: 60px;
    display: flex;
    flex-direction: column;
}

.table-main{
    font-family: "Inter", sans-serif;
    border-collapse: collapse;
    width: 100%;
    background: #FFFFFF;
    box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
    border-radius: 8px;
    margin-bottom: 20px;
}

.table-main th {
    text-align: left;
    padding: 26px 0px 26px 40px;
    font-family: "Inter", sans-serif;
    font-size: 16px;
    color: #979797;
}

.table-main td {
    border-collapse: collapse;
    text-align: left;
    padding: 26px 0px 26px 40px;
    font-family: "Inter", sans-serif;
    font-size: 16px;
    color: #050A1C;
}

.table-main tr:nth-child(even) {
    background-color: #F9F9FA;
}
.btn-next{
    font-family: "Inter", sans-serif;
    font-size: 16px;
    line-height: 19px;
    text-align: right;
    text-decoration-line: underline;
    color: rgba(44, 44, 42, 0.8);
}
.btn-main{
    padding: 7px 30px;
    font-size: 14px;
    background-color: #fff;
    border:1px solid #F2994A;
    color: #F2994A;
}
.btn-main.active{
    background-color: #F2994A;
    border: none;
    color: #fff;
}
td  b{
    color: #003ECB;
}
.new{
    padding: 1px 8px;
    color: #3BA972;
    border: 1px solid #3BA972;
    border-radius: 5px;
    margin-left: 10px;
}
.wrap{
    display: flex;
    align-items: center;
}
.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, .5);
    display: table;
    transition: opacity .3s ease;
}

.modal-wrapper {
    display: table-cell;
    vertical-align: middle;
}
@media only screen and (max-width: 768px) {
    .title-page{
        padding: 30px 20px;
    }
    .table-main-wrap{
        overflow-x: auto;
        padding-bottom: 40px;
    }
    .table-wrap{
        margin-bottom: 100px;
        padding-left: 20px;
        padding-right: 20px;
    }
    .table-main th{
        padding: 20px 0px 20px 20px;
    }
    .table-main td{
        padding: 20px 0px 20px 20px;
    }
}
</style>
