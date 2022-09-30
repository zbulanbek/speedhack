<template>
    <div class="countdown">
        <div class="block">
            <p class="digit">{{ hours | two_digits }}</p>
        </div>
        <span class="colon">:</span>
        <div class="block">
            <p class="digit">{{ minutes | two_digits }}</p>
        </div>
        <span class="colon">:</span>
        <div class="block">
            <p class="digit">{{ seconds | two_digits }}</p>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        window.setInterval(() => {
            this.now = Math.trunc((new Date()).getTime() / 1000);
        },1000);
    },
    props: {
        date: {
            type: String
        }
    },
    data() {
        return {
            now: Math.trunc((new Date()).getTime() / 1000)
        }
    },
    computed: {
        dateInMilliseconds() {
            return Math.trunc(Date.parse(this.date) / 1000)
        },
        seconds() {
            return (this.dateInMilliseconds - this.now) % 60;
        },
        minutes() {
            return Math.trunc((this.dateInMilliseconds - this.now) / 60) % 60;
        },
        hours() {
            return Math.trunc((this.dateInMilliseconds - this.now) / 60 / 60) % 24 + Math.trunc((this.dateInMilliseconds - this.now) / 60 / 60 / 24)*24;
        },
        // days() {
        //   return Math.trunc((this.dateInMilliseconds - this.now) / 60 / 60 / 24);
        // }
    }
}


</script>

<style scoped>
.countdown {
    display: flex;
    align-items: baseline;
}

.block {
    display: flex;
    margin-right: 6px;
    font-weight: 600;
    font-size: 30px;
    line-height: 140.62%;
    color: #003ECB;
    background: rgba(98, 156, 244, 0.17);
    border-radius: 6px;
    padding: 4px 8px;
}
.digit {
    margin-bottom: 0;

}
.colon {
    margin-right: 6px;
    font-size: 30px;
    color: #003ECB;
    line-height: 140.62%;
}
</style>
