<template>
    <tr v-if="show">
        <td>{{ item.student_id }}</td>
        <td> {{ item.student ? item.student.name : '' }} {{ item.student ? item.student.surname : '' }}</td>
        <td> 
            <div class="wrap-date">
                <template v-if="!edit_date">
                    {{ item.application ? start_time : '' | dateFormatForHuman }}
                    {{ item.application ? start_time : '' | timeFormat }}
                </template>
                <template v-else> 
                    <date-picker v-model="date" type="datetime" format="YYYY.MM.DD HH:mm"></date-picker>
                    <!-- <input id="datetime" type="datetime-local" v-model="date" class="date-input"> -->
                </template>
                <button @click="toggleUpdateDate" class="edit"><img src="/images/edit.svg"></button>
            </div>
           
        </td>
        <td class="wrap">
            <a class="link" :href="link">{{ link }}</a>
            <img src="/images/icons/copy-icon.svg" alt="copy-icon">
        </td>
        <td>
            <a :href="link" class="btn-main" :class="{'active': show_button}">Начать урок</a>
        </td>
    </tr>
</template>
<script>
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
            link: null,
            show_button: false,
            show: false,
            edit_date: false,
            date: null,
            start_time: this.item.application.start_time
        }
    },

    mounted: function () {
        //data
        this.link = this.route('trial-lessons.show', this.item.room_name);

        setInterval(() => {
            //data
            let my_date = moment(this.item.application.start_time).format("DD/MM/YYYY");
            let current_date = moment(moment()).format("DD/MM/YYYY");

            //minut
            let my_minut = (moment(this.item.application.start_time).hour() * 60) + moment(this.item.application.start_time).minute();
            let current_minut = (moment().hour() * 60) + moment().minute();
            let difference_minut = my_minut - current_minut;
            
            //is today
            if (my_date >= current_date) {
                // let plus_difference_minut = difference_minut * -1;
                // plus_difference_minut <= 60 ? this.show = true : this.show = false;

                let plus_difference_minut = difference_minut * -1;
                plus_difference_minut <= 60 ? this.show_button = true : this.show_button = false;
                this.show = true;
            } else {
                this.show = false;
            }
        }, 1000);
    },
    methods: {
        toggleUpdateDate(){
            this.edit_date = !this.edit_date;
        },
        async updateDate(){
            try {
                const { data } = await window.axios.post(route('api.methodist.applications.update_date', this.item.application.id), {date: this.date} );
                if(data.status == 'success'){
                    //this.edit_date = false;
                    this.start_time = data.date;
                }
            } catch (e) {
                console.log(e);
            }
        }
    },
    watch: {
        date: function(value) {
            if(value != null){
                this.updateDate();
            }
        }
    },
}
</script>
<style scoped>
.table-main th {
    text-align: left;
    padding: 26px 0 26px 40px;
    font-family: "Inter", sans-serif;
    font-size: 16px;
    color: #979797;
}

.table-main td {
    border-collapse: collapse;
    text-align: left;
    padding: 26px 0 26px 40px;
    font-family: "Inter", sans-serif;
    font-size: 16px;
    color: #050A1C;
}

.table-main tr:nth-child(even) {
    background-color: #F9F9FA;
}

.link {
    color: #003ECB;
    font-size: 18px;
    font-family: Inter, sans-serif;
    white-space: nowrap;
    overflow: hidden;
    width: 160px;
    display: block;
    text-overflow: ellipsis;
}

.btn-main {
    font-size: 14px;
    line-height: 20px;
    padding: 6px 20px;
    pointer-events: none;
    background-color: #C4C4C4;
}

.btn-main.active {
    pointer-events: auto;
    background-color: #F2994A;
}

.date-input{
    background: transparent;
}

.edit{
    background: transparent;
    margin-right: 16px;
}

.edit img{
    padding-bottom: 3px;
}
.wrap {
    display: flex;
    align-items: center;
}

.wrap img {
    width: 19px;
    height: 19px;
    margin-left: 16px;
}
</style>
