<template>
    <account-layout>
        <section class="bg-account">
            <div class="title-page">
                <span>Заявки на пробный урок</span>
            </div>
            <section class="table-wrap">
                <div class="table-main-wrap">
                    <table class="table-main">
                        <tr>
                            <th>ID</th>
                            <th>ФИО</th>
                            <th>Телефон</th>
                            <th>Email</th>
                            <th>Дата и время урока</th>
                            <th>Действия</th>
                        </tr>
                        <template v-for="item in applications">
                            <application-item :item="item"></application-item>
                        </template>
                    </table>
                    <div class="empty" v-if="applications.length < 1">
                        Пусто
                    </div>
                </div>


                <modal name="acceptApplication"
                       :width="400"
                       :height="340"
                       :adaptive="true">
                    <div class="accept-wrap" v-if="application">
                        <div class="header">
                            <span>Заявка № {{ application.id }}</span>
                            <button class="close-btn" @click="closeChooseModal">
                                <img src="/images/icons/close-btn.svg" alt="close">
                            </button>
                        </div>
                        <div class="body">
		            		<span>
		            			Вы уверены что хотите принять <br> заявку от <b>{{ application.name }}</b>?
		            		</span>
                        </div>
                        <div class="footer">
                            <button class="accept" @click="acceptApplication">Принять</button>
                            <button class="close-btn" @click="closeChooseModal">Отмена</button>
                        </div>
                    </div>
                </modal>

                <modal name="updateApplicationStatus"
                       :width="600"
                       :height="510"
                       :adaptive="true">
                    <div class="accept-wrap">
                        <template v-if="application">
                            <div class="header">
                                <span>{{ application.name }}</span>
                                <button class="close-btn" @click="closeButtonsModal">
                                    <img src="/images/icons/close-btn.svg" alt="close">
                                </button>
                            </div>
                            <div class="info-wrap">
                                <div class="wrap">
                                    <div class="col-m">
                                        <label>Номер телефона</label>
                                        <span>{{ application.phone }}</span>
                                    </div>
                                    <div class="col-m">
                                        <label>Эл. почта</label>
                                        <span>{{ application.email }}</span>
                                    </div>
                                </div>
                                <div class="wrap">
                                    <div class="col-m">
                                        <label>Дата заявки</label>
                                        <span>
                                            {{ application.start_time | dateFormatForHuman }} {{
                                                application.start_time | timeFormat
                                            }}
                                        </span>
                                    </div>
                                    <div class="col-m">
                                        <label>Методист</label>
                                        <span>8 (777) 123 45 67</span>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons-wrap">
                                <span class="title">Я связался (-лась) с клиентом:</span>
                                <button
                                    v-for="methodist_status in methodist_statuses"
                                    class="btn-accept"
                                    :class="{
                                        yellow: methodist_status.id === 2,
                                        red: methodist_status.id === 3,
                                        active: btn_active,
                                    }"
                                    @click="updateApplicationStatus(methodist_status.id)">
                                    {{ methodist_status.name }}
                                </button>
                            </div>
                        </template>
                    </div>
                </modal>
            </section>
        </section>
    </account-layout>
</template>
<script>
import ApplicationItem from '@/Speedhack/Components/Metodist/ApplicationItem';
import {mapGetters, mapActions} from 'vuex';
import ModalSuccess from "@/Speedhack/Components/Details/ModalSuccess";

export default {
    components: {
        ApplicationItem,
        ModalSuccess,
    },
    data() {
        return {
            btn_active: true
        }
    },
    computed: {
        ...mapGetters([
            'application',
            'applications',
            'methodist_statuses',
        ]),
    },
    mounted() {
        this.getMethodistStatuses();
        this.getMethodistApplications();
    },
    methods: {
        ...mapActions([
            'getMethodistStatuses',
            'getMethodistApplications',
            'acceptMethodistApplication',
            'updateApplicationMethodistStatus',
        ]),
        closeChooseModal() {
            this.$modal.hide('acceptApplication');
        },
        async acceptApplication() {
            try {
                await this.acceptMethodistApplication(this.application)
                this.$modal.show('updateApplicationStatus');
            } catch (e) {
                const {data, status} = e.response;
                if (status === 403) {
                    Swal.fire('', data.message, 'error');
                }
            } finally {
                this.$modal.hide('acceptApplication');
            }
        },
        closeButtonsModal() {
            this.$modal.hide('updateApplicationStatus');
        },

        async updateApplicationStatus(status_id) {
            this.btn_active = false;
            try {
                this.application.methodist_status_id = status_id;
                await this.updateApplicationMethodistStatus(this.application)
                await this.getMethodistApplications();
                this.$modal.hide('updateApplicationStatus')
                this.$openSuccessModal('Заявка успешно обработана');
                this.btn_active = true;
            } catch (e) {
                throw e;
            }
        },


    }
}
</script>

<style scoped>
.bg-account {
    background: #F5F7F8;
    width: 100%;
    height: 100%;
}

.title-page {
    padding: 30px 60px;
}

.title-page span {
    font-size: 24px;
    font-family: "Inter-Bold", sans-serif;
    color: #050A1C;
}

.table-wrap {
    padding-left: 60px;
    padding-right: 60px;
    display: flex;
    flex-direction: column;
}

.table-main {
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

.btn-next {
    font-family: "Inter", sans-serif;
    font-size: 16px;
    line-height: 19px;
    text-align: right;
    text-decoration-line: underline;
    color: rgba(44, 44, 42, 0.8);
}

.btn-main {
    padding: 7px 30px;
    font-size: 14px;
    background-color: #fff;
    border: 1px solid #F2994A;
    color: #F2994A;
}

.btn-main.active {
    background-color: #F2994A;
    border: none;
    color: #fff;
}

td b {
    color: #003ECB;
}

.new {
    padding: 1px 8px;
    color: #3BA972;
    border: 1px solid #3BA972;
    border-radius: 5px;
    margin-left: 10px;
}

.wrap {
    display: flex;
    align-items: center;
}

@media only screen and (max-width: 768px) {
    .title-page {
        padding: 30px 20px;
    }

    .table-main-wrap {
        overflow-x: auto;
        padding-bottom: 40px;
    }

    .table-wrap {
        margin-bottom: 100px;
        padding-left: 20px;
        padding-right: 20px;
    }

    .table-main th {
        padding: 20px 0px 20px 20px;
    }

    .table-main td {
        padding: 20px 0px 20px 20px;
    }
}

.accept-wrap {
    height: 100%;
    display: flex;
    flex-direction: column;
}

.accept-wrap .header {
    padding: 20px 30px;
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #F1F1F1;
}


.accept-wrap .body span {
    text-align: center;
    color: #2C2C2A;
    font-size: 24px;
    line-height: 32px;
}

.accept-wrap .header .close-btn {
    background-color: transparent;
}

.accept-wrap .header .close-btn img {
    width: 17px;
    height: 17px;
}

.accept-wrap .header span {
    font-weight: bold;
    font-size: 21px;
    line-height: 40px;
    color: #2C2C2A;
}

.accept-wrap .body {
    padding: 16px 50px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.accept-wrap .body span {
    text-align: center;
    color: #2C2C2A;
    font-size: 18px;
    line-height: 25px;
    font-family: Inter;
}

.accept-wrap .body span b {
    font-weight: bold;
}

.accept-wrap .footer {
    background: transparent;
    display: flex;
    flex-direction: column;
    padding: 0px 40px 20px;
}

.accept-wrap .footer .close-btn {
    padding: 14px;
    font-size: center;
    background: #C4C4C4;
    border-radius: 8px;
    color: #fff;
}

.accept-wrap .footer {
    display: flex;
    flex-direction: column;
    padding: 30px 50px;
}

.accept-wrap .footer .accept {
    padding: 14px;
    font-size: center;
    color: #fff;
    margin-bottom: 8px;
    background: #F2994A;
    border-radius: 8px;
}

.accept-wrap .info-wrap {
    padding: 20px 30px;
    border-bottom: 1px solid #F1F1F1;
}

.accept-wrap .info-wrap .wrap {
    display: flex;
    justify-content: space-between;
}

.accept-wrap .info-wrap .wrap:first-child {
    margin-bottom: 32px;
}

.accept-wrap .col-m {
    width: 50%;
}

.accept-wrap .col-m label {
    font-weight: 500;
    font-size: 16px;
    line-height: 24px;
    color: #2C2C2A;
    margin-bottom: 8px;
    display: block;
}

.accept-wrap .col-m span {
    color: #050A1C;
    font-weight: 500;
    font-size: 18px;
    line-height: 24px;
    display: block;
}

.accept-wrap .buttons-wrap {
    display: flex;
    flex-direction: column;
    padding: 16px 80px;
}

.accept-wrap .buttons-wrap .title {
    color: #050A1C;
    font-size: 18px;
    line-height: 16px;
    margin-bottom: 24px;
}

.accept-wrap .buttons-wrap .btn-accept {
    padding: 14px;
    width: 100%;
    background: #3BA972;
    border-radius: 8px;
    margin-bottom: 8px;
    text-align: center;
    font-size: 19px;
    line-height: 19px;
    color: #fff;
    pointer-events: none;
    opacity: .7;
}

.accept-wrap .buttons-wrap .btn-accept.active{
    opacity: 1;
    pointer-events: auto;
}

.accept-wrap .buttons-wrap .btn-accept.yellow {
    background: #F8CC45;
}

.accept-wrap .buttons-wrap .btn-accept.red {
    background: #E36018;
}

.success-result {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.success-result .img {
    width: 200px;
    height: 200px;
    margin-bottom: 20px;
}

.success-result .text {
    color: #2C2C2A;
    margin-bottom: 20px;
    font-family: 'Inter', sans-serif;
    font-size: 20px;
    line-height: 30px;
}

.success-result .img img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.empty {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: #979797;
    font-size: 18px;
}
</style>
