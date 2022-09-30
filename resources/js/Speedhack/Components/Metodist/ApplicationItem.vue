<template>
    <tr v-if="event_show">
        <td>{{ item.id }}</td>
        <td class="wrap"> 
            {{ item.name }}
            <div class="new">new</div>
        </td>
        <td>
            {{ item.phone }}
        </td>
        <td>
            {{ item.email }}
        </td>
        <td>
            <template v-if="item.start_time">
                {{ start_time | dateFormatForHuman }} {{ start_time | timeFormat }}
            </template>
            <template v-else>
                <date-picker v-model="date" type="datetime" format="YYYY.MM.DD HH:mm"></date-picker>
                <!-- <input id="datetime" type="datetime-local" v-model="date" class="date-input"> -->
            </template>
        </td>
        <td class="last-btn">
            <button @click="accept" class="btn-main" :class="{'active': show_button || show_button_two}">Принять</button>
        </td>
    </tr>
</template>
<script>
import {mapGetters, mapActions} from 'vuex';
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';

export default {
    props: {
        item: Object
    },
    components: {
        DatePicker
    },
    data() {
        return {
            modal_show: false,
            show_api: false,
            api: null,
            buttons_show: true,
            show_button: false,
            event_show: true,
            date: null,
            show_button_two: false,
            start_time: this.item.start_time
        }
    },
    methods: {
        ...mapActions([
            'setApplication',
        ]),
        accept() {
            this.setApplication(this.item);
            this.$modal.show('acceptApplication');
        },
        async updateDate(){
            try {
                const { data } = await window.axios.post(route('api.methodist.applications.update_date', this.item.id), {date: this.date} );
                if(data.status == 'success'){
                    this.show_button_two = true;
                    this.start_time = data.date;
                }
            } catch (e) {
                console.log(e);
            }
        }
    },
    mounted() {
        let vm = this;
        window.Echo.private('metodist-application.' + this.item.id)
            .listen('.metodist.application', function ({item}) {
                vm.event_show = item.boolean;
            });

        setInterval(() => {
            //data
            let my_date = moment(this.item.start_time).format("DD/MM/YYYY");
            let current_date = moment(moment()).format("DD/MM/YYYY");

            //minut
            let my_minut = (moment(this.item.start_time).hour() * 60) + moment(this.item.start_time).minute();
            let current_minut = (moment().hour() * 60) + moment().minute();
            let difference_minut = my_minut - current_minut;

            //is today
            if (my_date == current_date) {
                let plus_difference_minut = difference_minut * -1;
                //is 15 minut
                if (difference_minut > 0 && difference_minut <= 15) {
                    this.show_button = true;
                } else if (plus_difference_minut <= 60) {
                    this.show_button = true;
                } else {
                    this.show_button = false;
                }
            } else {
                this.show_button = false;
            }

        }, 1000);
    },
    watch: {
        date: function(value) {
            console.log(value);
            if(value != null){
                this.updateDate();
            }
            
        }
    },
}
</script>
<style scoped>
.btn-accept {
    background-color: green;
    color: #fff;
}

.btn-accept img {
    width: 35px;
    height: 35px;
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
    padding: 6px 45px;
    font-size: 14px;
    border: 1px solid #C4C4C4;
    color: #fff;
    background: #C4C4C4;
    border-radius: 8px;
    pointer-events: none;
}

.btn-main.active {
    background-color: #F2994A;
    border: none;
    color: #fff;
    pointer-events: auto;
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

.date-input{
    background: transparent;
}

.last-btn{
    padding-right: 20px !important;
}

.last-btn .btn-main{
    padding: 6px 15px;
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
</style>
